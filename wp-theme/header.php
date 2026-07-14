<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <!-- Orbes de luz de fondo neo-futurista -->
  <div class="bg-glow-orb orb-cyan"></div>
  <div class="bg-glow-orb orb-purple"></div>

  <!-- Header / Navbar -->
  <header class="header" id="main-header">
    <div class="nav-container">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" id="logo-link">
        <div class="logo-icon">
          <svg viewBox="0 0 24 24"><path d="M12 2L2 22h20L12 2zm0 4l6 12H6L12 6z"/></svg>
        </div>
        <span>Core Logic <span class="gradient-text">Solutions</span></span>
      </a>
      
      <nav aria-label="Navegación principal">
        <?php
        // Cargar el menú dinámico de WordPress si existe, si no, usar el fallback estático
        if ( has_nav_menu( 'primary' ) ) {
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'nav-menu',
                'fallback_cb'    => false,
                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            ) );
        } else {
            // Fallback con el orden e interactividad original
            ?>
            <ul class="nav-menu" id="nav-menu">
              <li class="nav-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-link">Inicio</a></li>
              <li class="nav-item"><a href="<?php echo esc_url( home_url( '/servicios/' ) ); ?>" class="nav-link">Servicios</a></li>
              <li class="nav-item"><a href="<?php echo esc_url( home_url( '/nosotros/' ) ); ?>" class="nav-link">Nosotros</a></li>
              <li class="nav-item"><a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" class="nav-link">Contacto</a></li>
            </ul>
            <?php
        }
        ?>
      </nav>
      
      <button class="hamburger" id="mobile-menu-toggle" aria-label="Abrir menú de navegación">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </button>
    </div>
  </header>
