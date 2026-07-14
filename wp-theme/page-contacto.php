<?php
/**
 * Template Name: Contacto Page Template
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

get_header();
?>

  <!-- Banner / Hero de la Página -->
  <section class="section" style="padding-top: 10rem; text-align: center; max-width: 800px; margin: 0 auto;">
    <div class="hero-badge reveal">Contacto e Inversión</div>
    <h1 style="font-size: 3rem; margin-bottom: 1.5rem;" class="reveal">Inicia tu <span class="gradient-text">Transformación</span></h1>
    <p style="color: var(--text-muted); font-size: 1.15rem;" class="reveal">Selecciona las soluciones que requiere tu empresa y obtén una cotización estimada al instante antes de enviar tu mensaje.</p>
  </section>

  <!-- Seccion Configuradora de Presupuestos -->
  <section class="section" id="configurator-section" style="padding-top: 1rem;">
    <div class="section-title reveal">
      <h2>Configurador de <span class="gradient-text">Presupuesto</span></h2>
      <p>Selecciona uno o más servicios para armar tu plan a medida. Las tarifas y tiempos se calculan dinámicamente.</p>
    </div>

    <!-- Mensajes de Éxito / Error en Envío -->
    <div style="max-width: 1200px; margin: 0 auto;">
      <?php if ( isset($_GET['submit_success']) && $_GET['submit_success'] === 'true' ) : ?>
        <div class="glass-card reveal visible" style="border-color: var(--primary-cyan); margin-bottom: 2rem; text-align: center; padding: 2rem; background: rgba(0, 242, 254, 0.05);">
          <h3 class="gradient-text" style="font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--primary-cyan);">¡Mensaje Enviado con Éxito!</h3>
          <p style="color: var(--text-light);">Hemos recibido tu configuración de servicios. Un ingeniero de Core Logic Solutions se pondrá en contacto contigo en las próximas 12 horas.</p>
        </div>
      <?php elseif ( isset($_GET['submit_success']) && $_GET['submit_success'] === 'false' ) : ?>
        <div class="glass-card reveal visible" style="border-color: var(--primary-pink); margin-bottom: 2rem; text-align: center; padding: 2rem; background: rgba(255, 0, 127, 0.05);">
          <h3 class="gradient-text" style="font-size: 1.5rem; margin-bottom: 0.5rem; color: var(--primary-pink);">Error al Enviar</h3>
          <p style="color: var(--text-light);">Hubo un problema al procesar tu solicitud o falló la verificación de seguridad. Por favor, inténtalo de nuevo.</p>
        </div>
      <?php endif; ?>
    </div>

    <div class="config-grid reveal">
      <!-- Grid de Checkboxes de Servicio -->
      <div class="checkbox-grid">
        
        <!-- Checkbox 1 -->
        <label class="checkbox-card" id="card-service-auto">
          <input type="checkbox" class="service-checkbox" data-price="300" data-time="2" data-name="Automatización de Trabajo con IA" checked>
          <span class="custom-checkbox"></span>
          <div class="checkbox-info">
            <h4>Automatización de Trabajo con IA</h4>
            <p>Modelado de flujos en n8n/Zapier e integración de APIs de LLMs en tus workflows cotidianos.</p>
          </div>
          <div class="checkbox-meta">
            <span class="meta-price">$300</span>
            <div class="meta-time">~2 semanas</div>
          </div>
        </label>

        <!-- Checkbox 2 -->
        <label class="checkbox-card" id="card-service-marketing">
          <input type="checkbox" class="service-checkbox" data-price="200" data-time="3" data-name="Marketing Digital & SEO IA">
          <span class="custom-checkbox"></span>
          <div class="checkbox-info">
            <h4>Marketing Digital & SEO IA</h4>
            <p>Campañas automatizadas, prospección de clientes y redacción semántica avanzada mediante IA.</p>
          </div>
          <div class="checkbox-meta">
            <span class="meta-price">$200</span>
            <div class="meta-time">~3 semanas</div>
          </div>
        </label>

        <!-- Dropdown 1: Auditoría de Negocios -->
        <div class="checkbox-card" style="cursor: default; display: block;" id="card-service-audit-business">
          <div class="checkbox-info">
            <h4 style="margin-bottom: 0.25rem;">Auditoría de Negocios (Interna)</h4>
            <p>Análisis de eficiencia operativa y mapeo de flujos manuales elegibles para agentes IA.</p>
            <select class="service-select form-control" style="margin-top: 0.75rem; background: var(--bg-dark); border-color: var(--border-glass);" data-name="Auditoría de Negocios">
              <option value="0" data-price="0" data-time="0">Ninguno</option>
              <option value="basic" data-price="50" data-time="1">Plan Básico - $50 (~1 semana)</option>
              <option value="intermediate" data-price="100" data-time="2">Plan Intermedio - $100 (~2 semanas)</option>
              <option value="advanced" data-price="200" data-time="3">Plan Avanzado - $200 (~3 semanas)</option>
            </select>
          </div>
        </div>

        <!-- Dropdown 2: Auditoría de Competidores -->
        <div class="checkbox-card" style="cursor: default; display: block;" id="card-service-audit-competitor">
          <div class="checkbox-info">
            <h4 style="margin-bottom: 0.25rem;">Auditoría de Competencia de Mercado</h4>
            <p>Escaneo automatizado de precios, SEO y embudos de ventas de tu competencia por IA.</p>
            <select class="service-select form-control" style="margin-top: 0.75rem; background: var(--bg-dark); border-color: var(--border-glass);" data-name="Auditoría de Competidores">
              <option value="0" data-price="0" data-time="0">Ninguno</option>
              <option value="basic" data-price="75" data-time="1">Plan Básico - $75 (~1 semana)</option>
              <option value="intermediate" data-price="150" data-time="2">Plan Intermedio - $150 (~2 semanas)</option>
              <option value="advanced" data-price="300" data-time="3">Plan Avanzado - $300 (~3 semanas)</option>
            </select>
          </div>
        </div>

        <!-- Checkbox 5 -->
        <label class="checkbox-card" id="card-service-web">
          <input type="checkbox" class="service-checkbox" data-price="400" data-time="4" data-name="Creación de Página Web Premium">
          <span class="custom-checkbox"></span>
          <div class="checkbox-info">
            <h4>Páginas Web Corporativas</h4>
            <p>Desarrollo nativo (HTML/CSS/JS) ultra rápido y responsive con animaciones premium.</p>
          </div>
          <div class="checkbox-meta">
            <span class="meta-price">$400</span>
            <div class="meta-time">~4 semanas</div>
          </div>
        </label>

        <!-- Checkbox 6 -->
        <label class="checkbox-card" id="card-service-mobile">
          <input type="checkbox" class="service-checkbox" data-price="1000" data-time="6" data-name="Creación de Aplicaciones Móviles">
          <span class="custom-checkbox"></span>
          <div class="checkbox-info">
            <h4>Aplicaciones Móviles (iOS/Android)</h4>
            <p>Construcción de aplicaciones móviles a medida con integraciones de bases de datos e IA.</p>
          </div>
          <div class="checkbox-meta">
            <span class="meta-price">$1,000</span>
            <div class="meta-time">~6 semanas</div>
          </div>
        </label>

      </div>

      <!-- Panel del Presupuesto Estimado -->
      <div class="glass-card estimate-panel" id="estimate-output-box">
        <h3>Tu Proyecto</h3>
        
        <div class="est-row">
          <span class="est-label">Inversión Estimada:</span>
          <span class="est-val price" id="config-total-price">$0</span>
        </div>

        <div class="est-row">
          <span class="est-label">Tiempo de Entrega:</span>
          <span class="est-val" id="config-total-time">0 semanas</span>
        </div>

        <p class="est-disclaimer">* Los plazos asumen ejecuciones en paralelo y una semana adicional de acoplamiento e integración por cada servicio extra seleccionado.</p>
      </div>

    </div>
  </section>

  <!-- Formulario de Contacto Principal -->
  <section class="section" id="contact-form-section" style="background: var(--bg-deep); padding-bottom: 8rem;">
    <div class="contact-grid">
      <!-- Datos de contacto directos -->
      <div class="contact-info-card reveal">
        <h2 style="font-size: 2rem; margin-bottom: 1rem;">¿Prefieres hablar <span class="gradient-text">Directamente</span>?</h2>
        <p style="color: var(--text-muted); margin-bottom: 2rem; line-height: 1.6;">Si tienes un requerimiento muy específico o necesitas un acuerdo de confidencialidad (NDA) antes de detallar tus flujos operacionales, contáctanos:</p>
        
        <div class="contact-item">
          <div class="contact-icon">📧</div>
          <div class="contact-details">
            <h4>Email Corporativo</h4>
            <p>contacto@corelogicsolutions.com</p>
          </div>
        </div>

        <div class="contact-item">
          <div class="contact-icon">💬</div>
          <div class="contact-details">
            <h4>Canal de Slack / Teams</h4>
            <p>Disponible tras primera llamada de onboarding</p>
          </div>
        </div>

        <div class="contact-item">
          <div class="contact-icon">📍</div>
          <div class="contact-details">
            <h4>Operación Global</h4>
            <p>Equipo 100% distribuido y virtual</p>
          </div>
        </div>
      </div>

      <!-- Formulario de Captura -->
      <div class="glass-card reveal" style="border-color: var(--border-neon);">
        <form id="lead-contact-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
          <?php wp_nonce_field( 'core_logic_send_mail', 'contact_nonce' ); ?>
          <input type="hidden" name="action" value="core_logic_contact_form">

          <div class="form-group">
            <label for="contact-name">Nombre Completo</label>
            <input type="text" id="contact-name" name="name" class="form-control" placeholder="Ej. Juan Pérez" required>
          </div>

          <div class="form-group">
            <label for="contact-email">Correo Corporativo</label>
            <input type="email" id="contact-email" name="email" class="form-control" placeholder="Ej. juan@tuempresa.com" required>
          </div>

          <div class="form-group">
            <label for="contact-company">Nombre de la Empresa</label>
            <input type="text" id="contact-company" name="company" class="form-control" placeholder="Ej. Tech Logistics S.A." required>
          </div>

          <div class="form-group">
            <label for="contact-message">Detalles del Proyecto y Configuración</label>
            <!-- Este textarea será rellenado automáticamente por el configurador JS -->
            <textarea id="contact-message" name="message" class="form-control" placeholder="Describe brevemente tus cuellos de botella actuales..." required></textarea>
          </div>

          <button type="submit" class="btn-primary" style="width: 100%; border-radius: 10px; margin-top: 1rem;">Solicitar Propuesta de Proyecto</button>
        </form>
      </div>
    </div>
  </section>

<?php
get_footer();
