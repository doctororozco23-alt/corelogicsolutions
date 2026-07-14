<?php
/**
 * Core Logic Solutions Theme Functions
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// 1. Encolar Estilos y Scripts del Tema
function core_logic_theme_assets() {
    // Cargar estilo principal de la carpeta de assets
    wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0' );

    // Cargar script principal global
    wp_enqueue_script( 'theme-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true );

    // Cargar chatbot global flotante
    wp_enqueue_script( 'theme-chatbot', get_template_directory_uri() . '/assets/js/chatbot.js', array(), '1.0', true );

    // Cargar scripts interactivos condicionalmente en la página de Servicios
    if ( is_page_template( 'page-servicios.php' ) || is_page( 'servicios' ) ) {
        wp_enqueue_script( 'theme-auditor', get_template_directory_uri() . '/assets/js/auditor.js', array(), '1.0', true );
        wp_enqueue_script( 'theme-calculator', get_template_directory_uri() . '/assets/js/calculator.js', array(), '1.0', true );
    }

    // Cargar script del cotizador interactivo en la página de Contacto
    if ( is_page_template( 'page-contacto.php' ) || is_page( 'contacto' ) ) {
        wp_enqueue_script( 'theme-configurator', get_template_directory_uri() . '/assets/js/configurator.js', array(), '1.0', true );
    }
}
add_action( 'wp_enqueue_scripts', 'core_logic_theme_assets' );

// 2. Configuración de Características de Soporte del Tema
function core_logic_theme_setup() {
    // Permitir a WordPress manejar el título dinámicamente (<title>)
    add_theme_support( 'title-tag' );
    
    // Habilitar soporte para miniaturas de post (imágenes destacadas)
    add_theme_support( 'post-thumbnails' );

    // Registrar menú principal navegable
    register_nav_menus( array(
        'primary' => esc_html__( 'Menú Principal', 'core-logic-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'core_logic_theme_setup' );

// 3. Procesar Envío de Formulario de Contacto Nativo (admin-post.php)
function handle_core_logic_contact_form() {
    // Validar datos enviados
    if ( isset( $_POST['contact_nonce'] ) && wp_verify_nonce( $_POST['contact_nonce'], 'core_logic_send_mail' ) ) {
        if ( isset( $_POST['name'] ) && isset( $_POST['email'] ) ) {
            $name    = sanitize_text_field( $_POST['name'] );
            $email   = sanitize_email( $_POST['email'] );
            $company = sanitize_text_field( $_POST['company'] );
            $message = sanitize_textarea_field( $_POST['message'] );

            $to      = get_option( 'admin_email' );
            $subject = 'Nuevo prospecto - Core Logic Solutions: ' . $name;
            
            $body  = "Has recibido un nuevo mensaje desde el configurador de Core Logic Solutions:\n\n";
            $body .= "Nombre: $name\n";
            $body .= "Email: $email\n";
            $body .= "Empresa: $company\n\n";
            $body .= "Detalles del proyecto y propuesta:\n";
            $body .= "------------------------------------\n";
            $body .= "$message\n";
            $body .= "------------------------------------\n";

            $headers = array(
                'Content-Type: text/plain; charset=UTF-8',
                'From: ' . $name . ' <' . $email . '>'
            );

            // Enviar correo
            wp_mail( $to, $subject, $body, $headers );

            // Redirigir al contacto indicando éxito
            wp_redirect( add_query_arg( 'submit_success', 'true', home_url( '/contacto/' ) ) );
            exit;
        }
    }
    
    // Si falla la verificación
    wp_redirect( add_query_arg( 'submit_success', 'false', home_url( '/contacto/' ) ) );
    exit;
}
add_action( 'admin_post_nopriv_core_logic_contact_form', 'handle_core_logic_contact_form' );
add_action( 'admin_post_core_logic_contact_form', 'handle_core_logic_contact_form' );
