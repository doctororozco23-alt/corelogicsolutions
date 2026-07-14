  <!-- Footer -->
  <footer class="footer" id="main-footer">
    <div class="footer-grid">
      <div class="footer-info">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
          <div class="logo-icon">
            <svg viewBox="0 0 24 24"><path d="M12 2L2 22h20L12 2zm0 4l6 12H6L12 6z"/></svg>
          </div>
          <span>Core Logic <span class="gradient-text">Solutions</span></span>
        </a>
        <p class="footer-desc">Haciendo que la Inteligencia Artificial sea accesible y rentable para las empresas modernas.</p>
      </div>
      <div class="footer-links">
        <h3 class="footer-title">Enlaces Rápidos</h3>
        <ul>
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-link">Inicio</a></li>
          <li><a href="<?php echo esc_url( home_url( '/servicios/' ) ); ?>" class="footer-link">Servicios</a></li>
          <li><a href="<?php echo esc_url( home_url( '/nosotros/' ) ); ?>" class="footer-link">Nosotros</a></li>
          <li><a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" class="footer-link">Contacto</a></li>
        </ul>
      </div>
      <div class="footer-services">
        <h3 class="footer-title">Soluciones</h3>
        <ul>
          <li><a href="<?php echo esc_url( home_url( '/servicios/' ) ); ?>" class="footer-link">Automatización de Tareas</a></li>
          <li><a href="<?php echo esc_url( home_url( '/servicios/' ) ); ?>" class="footer-link">Marketing Inteligente</a></li>
          <li><a href="<?php echo esc_url( home_url( '/servicios/' ) ); ?>" class="footer-link">Auditoría de Procesos & SEO</a></li>
          <li><a href="<?php echo esc_url( home_url( '/servicios/' ) ); ?>" class="footer-link">Desarrollo Web & Apps</a></li>
        </ul>
      </div>
      <div class="footer-newsletter">
        <h3 class="footer-title">Newsletter</h3>
        <p>Suscríbete para recibir insights semanales sobre automatización e IA aplicada a negocios.</p>
        <form class="newsletter-form" id="newsletter-form">
          <input type="email" placeholder="Tu email corporativo" required id="newsletter-email">
          <button type="submit" aria-label="Suscribirse">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
          </button>
        </form>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; <?php echo date('Y'); ?> Core Logic Solutions. Todos los derechos reservados.</p>
      <p>Diseño y Tecnología con Inteligencia Artificial.</p>
    </div>
  </footer>

  <!-- Chatbot Widget (Floating Assistant) -->
  <div class="chatbot-widget" id="chatbot-widget-container">
    <button class="chatbot-bubble" id="chatbot-trigger" aria-label="Abrir Asistente Virtual">
      <svg viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 9h12v2H6V9zm8 5H6v-2h8v2zm4-6H6V6h12v2z"/></svg>
    </button>
    <div class="chatbot-panel" id="chatbot-panel-card">
      <div class="chatbot-header">
        <div class="chatbot-profile">
          <div class="chatbot-avatar">🤖</div>
          <div class="chatbot-name">
            <h4>CoreBot</h4>
            <span class="chatbot-status">En línea</span>
          </div>
        </div>
        <button class="chatbot-close" id="chatbot-close-btn" aria-label="Cerrar chat">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
      </div>
      <div class="chatbot-messages" id="chatbot-messages-box"></div>
      <div class="chatbot-suggestions">
        <button class="suggestion-btn" data-key="services">Servicios</button>
        <button class="suggestion-btn" data-key="automation">¿Cómo funciona la IA?</button>
        <button class="suggestion-btn" data-key="audit">Simular Auditoría</button>
        <button class="suggestion-btn" data-key="pricing">Presupuestos</button>
        <button class="suggestion-btn" data-key="human">Hablar con Humano</button>
      </div>
      <div class="chatbot-input-area">
        <input type="text" id="chat-input" placeholder="Pregunta algo sobre IA...">
        <button id="chat-send" aria-label="Enviar mensaje">
          <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
        </button>
      </div>
    </div>
  </div>

  <?php wp_footer(); ?>
</body>
</html>
