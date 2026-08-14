<?php
/**
 * Copia este archivo como config.php y pega tu API key de Google AI Studio.
 * No subas config.php a repositorios públicos.
 *
 * Cómo obtener la key:
 * 1. https://aistudio.google.com/apikey
 * 2. Create API key
 * 3. Pégala abajo
 */
return [
    // Obligatorio
    'google_api_key' => 'PEGA_AQUI_TU_API_KEY_DE_GOOGLE',

    // Modelos (cámbialo si Google renombra):
    // gemini-flash-latest | gemini-2.0-flash | gemini-1.5-flash
    'model' => 'gemini-flash-latest',

    // Límite simple por sesión (mensajes del usuario)
    'max_messages_per_session' => 40,

    // Longitud máxima del mensaje del usuario (caracteres)
    'max_user_chars' => 1500,
];
