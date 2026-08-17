<?php
/**
 * Proxy seguro hacia Google Gemini (API key solo en el servidor).
 * POST JSON: { "message": "texto", "history": [ { "role": "user"|"model", "text": "..." }, ... ] }
 */
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');

// Solo POST
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Methods: POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');
    http_response_code(204);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido. Usa POST.']);
    exit;
}

$configPath = __DIR__ . '/config.php';
if (!is_file($configPath)) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Falta api/config.php. Copia config.sample.php y añade tu Google API key.',
    ]);
    exit;
}

/** @var array{google_api_key:string,model:string,max_messages_per_session:int,max_user_chars:int} $config */
$config = require $configPath;
$apiKey = trim((string) ($config['google_api_key'] ?? ''));
$model = trim((string) ($config['model'] ?? 'gemini-2.0-flash'));
$maxSession = (int) ($config['max_messages_per_session'] ?? 40);
$maxChars = (int) ($config['max_user_chars'] ?? 1500);

if ($apiKey === '' || strpos($apiKey, 'PEGA_AQUI') === 0) {
    http_response_code(503);
    echo json_encode([
        'error' => 'El chatbot aún no está configurado. Añade tu Google API key en api/config.php (obtén una en aistudio.google.com/apikey).',
        'code' => 'not_configured',
    ]);
    exit;
}

$raw = file_get_contents('php://input');
$data = json_decode($raw ?: '', true);
if (!is_array($data)) {
    http_response_code(400);
    echo json_encode(['error' => 'JSON inválido.']);
    exit;
}

$message = trim((string) ($data['message'] ?? ''));
if ($message === '') {
    http_response_code(400);
    echo json_encode(['error' => 'Escribe un mensaje.']);
    exit;
}

$msgLen = function_exists('mb_strlen') ? mb_strlen($message) : strlen($message);
if ($msgLen > $maxChars) {
    http_response_code(400);
    echo json_encode(['error' => "El mensaje es demasiado largo (máx. {$maxChars} caracteres)."]);
    exit;
}

// Rate limit simple por sesión PHP
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
$_SESSION['cls_chat_count'] = (int) ($_SESSION['cls_chat_count'] ?? 0) + 1;
if ($_SESSION['cls_chat_count'] > $maxSession) {
    http_response_code(429);
    echo json_encode(['error' => 'Has alcanzado el límite de mensajes de esta sesión. Recarga más tarde o escríbenos a contact@corelogicsolutionsllc.com.']);
    exit;
}

$history = $data['history'] ?? [];
if (!is_array($history)) {
    $history = [];
}

// Construir contents para Gemini (máx. 12 turnos previos)
$contents = [];
$history = array_slice($history, -12);
foreach ($history as $turn) {
    if (!is_array($turn)) {
        continue;
    }
    $role = ($turn['role'] ?? '') === 'model' ? 'model' : 'user';
    $text = trim((string) ($turn['text'] ?? ''));
    if ($text === '') {
        continue;
    }
    $contents[] = [
        'role' => $role,
        'parts' => [['text' => (function_exists('mb_substr') ? mb_substr($text, 0, $maxChars) : substr($text, 0, $maxChars))]],
    ];
}

// Mensaje actual del usuario
$contents[] = [
    'role' => 'user',
    'parts' => [['text' => $message]],
];

$system = <<<'SYS'
Eres el asistente virtual de Core Logic Solutions LLC (corelogicsolutionsllc.com).
Respondes SIEMPRE en español, claro, profesional y breve.

PRECIOS DE ENTRADA (USD) — si preguntan precios, cítalos tal cual:
• Automatización con IA: desde $300 (~2 semanas)
• Marketing y SEO con IA: desde $200 (~3 semanas)
• Auditoría de procesos: $50 / $100 / $200
• Auditoría de competencia: $75 / $150 / $300
• Sitio web: desde $400 (~4 semanas)
• App MVP: desde $1,000 (~6 semanas)
Proyectos mayores se cotizan aparte tras un diagnóstico breve.

Proceso: Descubrir → Diseñar → Integrar → Entregar.
Contacto: contact@corelogicsolutionsllc.com
Clientes de cualquier industria. Equipo remoto.

Reglas: no inventes métricas mágicas; no pidas datos sensibles; si no sabes, ofrece el email o la página Contacto/Cotizar.
SYS;

$payload = [
    'systemInstruction' => [
        'parts' => [['text' => $system]],
    ],
    'contents' => $contents,
    'generationConfig' => [
        'temperature' => 0.6,
        'maxOutputTokens' => 1024,
    ],
    'safetySettings' => [
        ['category' => 'HARM_CATEGORY_HARASSMENT', 'threshold' => 'BLOCK_ONLY_HIGH'],
        ['category' => 'HARM_CATEGORY_HATE_SPEECH', 'threshold' => 'BLOCK_ONLY_HIGH'],
        ['category' => 'HARM_CATEGORY_SEXUALLY_EXPLICIT', 'threshold' => 'BLOCK_ONLY_HIGH'],
        ['category' => 'HARM_CATEGORY_DANGEROUS_CONTENT', 'threshold' => 'BLOCK_ONLY_HIGH'],
    ],
];

$url = 'https://generativelanguage.googleapis.com/v1beta/models/'
    . rawurlencode($model)
    . ':generateContent?key='
    . rawurlencode($apiKey);

$ch = curl_init($url);
curl_setopt_array($ch, [
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
    CURLOPT_POSTFIELDS => json_encode($payload, JSON_UNESCAPED_UNICODE),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 45,
]);

$responseBody = curl_exec($ch);
$curlErr = curl_error($ch);
$httpCode = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($responseBody === false) {
    http_response_code(502);
    echo json_encode(['error' => 'No se pudo contactar a Google AI: ' . $curlErr]);
    exit;
}

$gemini = json_decode($responseBody, true);
if (!is_array($gemini)) {
    http_response_code(502);
    echo json_encode(['error' => 'Respuesta inválida de Google AI.']);
    exit;
}

if ($httpCode >= 400) {
    $msg = $gemini['error']['message'] ?? 'Error de la API de Google.';
    // No filtrar la API key
    $msg = str_replace($apiKey, '[key]', (string) $msg);
    http_response_code(502);
    echo json_encode(['error' => $msg, 'code' => 'gemini_error']);
    exit;
}

// Extraer texto
$reply = '';
$candidates = $gemini['candidates'] ?? [];
if (is_array($candidates) && isset($candidates[0]['content']['parts']) && is_array($candidates[0]['content']['parts'])) {
    foreach ($candidates[0]['content']['parts'] as $part) {
        if (isset($part['text'])) {
            $reply .= $part['text'];
        }
    }
}

$reply = trim($reply);
if ($reply === '') {
    $block = $candidates[0]['finishReason'] ?? 'UNKNOWN';
    http_response_code(502);
    echo json_encode([
        'error' => 'No se generó respuesta (motivo: ' . $block . '). Prueba reformular o contáctanos por email.',
    ]);
    exit;
}

echo json_encode([
    'reply' => $reply,
    'model' => $model,
], JSON_UNESCAPED_UNICODE);
