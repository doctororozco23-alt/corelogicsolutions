# Core Logic Solutions — Sitio web

Sitio en **español** para **corelogicsolutionsllc.com** (HTML estático + chatbot PHP/Gemini).

## Páginas

| Archivo | Menú |
|---------|------|
| `index.html` | Inicio |
| `servicios.html` | Servicios + flujos reales |
| `proceso.html` | Cómo trabajamos |
| `precios.html` | Precios |
| `contacto.html` | Cotizar |

## Chatbot con Google Gemini

El botón 💬 de la esquina inferior derecha llama a **`api/chat.php`**, que usa la **API de Google (Gemini)**. La API key **nunca** va en el JavaScript del navegador.

### 1. Crear la API key

1. Entra a [Google AI Studio → API keys](https://aistudio.google.com/apikey)
2. Crea una API key
3. Copia la key

### 2. Configurar en el servidor

1. Abre `api/config.php`
2. Reemplaza `PEGA_AQUI_TU_API_KEY_DE_GOOGLE` por tu key real
3. (Opcional) Cambia el modelo, p. ej. `gemini-2.0-flash` o `gemini-2.5-flash`

```php
return [
    'google_api_key' => 'AIza...tu_key...',
    'model' => 'gemini-2.0-flash',
    ...
];
```

### 3. Requisitos en cPanel

- PHP 7.4+ (mejor 8.x) con extensión **curl** habilitada
- Subir la carpeta `api/` junto al resto del sitio
- `config.php` está bloqueado por `api/.htaccess` (no se descarga por URL)

### Nota local (Windows)

`python -m http.server` **no ejecuta PHP**. El widget se ve, pero el chat solo responde de verdad en cPanel (o con PHP local: `php -S localhost:8765`).

## Vista local (solo HTML)

```powershell
cd C:\Users\kenne\corelogic-website
python -m http.server 8765
```

Con PHP (chat funcional si ya pusiste la key):

```powershell
cd C:\Users\kenne\corelogic-website
php -S localhost:8765
```

## Subir a cPanel

1. Respalda `public_html`.
2. Sube todo (incluido `api/`, `js/chatbot.js`, `.htaccess`).
3. Edita `api/config.php` en el servidor con tu Google API key.
4. Prueba el chat en el dominio en vivo.

## Formulario de contacto

FormSubmit → `contact@corelogicsolutionsllc.com` (confirmar el buzón la primera vez).
