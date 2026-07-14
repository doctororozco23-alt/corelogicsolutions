<?php
/**
 * Fallback template for Core Logic Solutions Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

get_header();
?>

<main class="main-content" style="padding: 140px 20px 80px; min-height: 70vh; display: flex; align-items: center; justify-content: center; text-align: center; position: relative; z-index: 1;">
  <div class="reveal visible" style="max-width: 800px; margin: 0 auto; background: var(--bg-glass); border: 1px solid var(--border-glass); border-radius: 24px; padding: 3rem 2rem; backdrop-filter: blur(12px); box-shadow: var(--shadow-neon);">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            ?>
            <h1 class="gradient-text" style="font-size: 3rem; font-weight: 800; margin-bottom: 1.5rem; letter-spacing: -1px;"><?php the_title(); ?></h1>
            <div class="post-content" style="color: var(--text-light); line-height: 1.8; font-size: 1.1rem; text-align: left;">
                <?php the_content(); ?>
            </div>
            <?php
        endwhile;
    else :
        ?>
        <h1 class="gradient-text" style="font-size: 3rem; font-weight: 800; margin-bottom: 1.5rem; letter-spacing: -1px;">Contenido No Encontrado</h1>
        <p style="color: var(--text-muted); font-size: 1.2rem; margin-bottom: 2rem;">Lo sentimos, el contenido que estás buscando no existe o ha sido movido.</p>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-primary" style="display: inline-block;">Volver al Inicio</a>
        <?php
    endif;
    ?>
  </div>
</main>

<?php
get_footer();
