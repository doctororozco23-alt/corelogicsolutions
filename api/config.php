<?php
/**
 * Configuración del chatbot (Gemini).
 * REEMPLAZA la key antes de subir a producción.
 * Obtén una en: https://aistudio.google.com/apikey
 */
return [
    'google_api_key' => 'YOUR_GOOGLE_API_KEY',
    'model' => 'gemini-flash-latest',
    'max_messages_per_session' => 40,
    'max_user_chars' => 1500,
];
