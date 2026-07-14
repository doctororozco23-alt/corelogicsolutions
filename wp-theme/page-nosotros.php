<?php
/**
 * Template Name: Nosotros Page Template
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

get_header();
?>

  <!-- Banner / Hero de la Página -->
  <section class="section" style="padding-top: 10rem; text-align: center; max-width: 800px; margin: 0 auto;">
    <div class="hero-badge reveal">Filosofía de Trabajo</div>
    <h1 style="font-size: 3rem; margin-bottom: 1.5rem;" class="reveal">Tus Socios en <span class="gradient-text">Eficiencia</span></h1>
    <p style="color: var(--text-muted); font-size: 1.15rem;" class="reveal">En Core Logic Solutions no actuamos como consultores tradicionales que entregan un archivo y se van. Nos convertimos en socios estratégicos integrados en el día a día de tu negocio.</p>
  </section>

  <!-- Secciones Clave de Filosofía -->
  <section class="section" id="filosofia-detalles" style="padding-top: 2rem;">
    <div class="grid-2">
      <!-- Columna 1: Workflow Partner -->
      <div class="reveal">
        <h2 style="font-size: 2rem; margin-bottom: 1.25rem;"><span class="gradient-text">Workflow Partner</span></h2>
        <p style="color: var(--text-muted); margin-bottom: 1.5rem; line-height: 1.7;">El verdadero valor de la Inteligencia Artificial no está en instalar una herramienta aislada, sino en su mantenimiento y optimización continua.</p>
        <p style="color: var(--text-muted); margin-bottom: 1.5rem; line-height: 1.7;">Como tus <strong>Workflow Partners</strong>, monitoreamos las integraciones y APIs de tu empresa en tiempo real, adaptamos las automatizaciones ante cualquier cambio en tus herramientas y actualizamos los modelos de IA conforme surgen tecnologías más veloces y rentables.</p>
      </div>
      <!-- Columna 2: Visual Glass Card -->
      <div class="glass-card reveal" style="border-color: var(--primary-cyan); background: linear-gradient(135deg, rgba(15, 17, 28, 0.8) 0%, rgba(0, 242, 254, 0.05) 100%);">
        <h3 style="margin-bottom: 1rem;">Nuestra Promesa Operacional</h3>
        <ul style="list-style: none; display: flex; flex-direction: column; gap: 1rem;">
          <li style="display: flex; gap: 10px; align-items: flex-start;">
            <span style="color: var(--primary-cyan);">⚡</span>
            <div>
              <strong>Monitoreo Activo:</strong> Vigilamos la salud de tus automatizaciones para prevenir caídas de workflows.
            </div>
          </li>
          <li style="display: flex; gap: 10px; align-items: flex-start;">
            <span style="color: var(--primary-cyan);">⚡</span>
            <div>
              <strong>Actualización de Modelos:</strong> Migramos tus tareas a los últimos modelos de IA para reducir costes y mejorar precisión.
            </div>
          </li>
          <li style="display: flex; gap: 10px; align-items: flex-start;">
            <span style="color: var(--primary-cyan);">⚡</span>
            <div>
              <strong>Escalabilidad:</strong> Agregamos nuevos agentes inteligentes a medida que tu negocio crece.
            </div>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <!-- Pilares de Tecnología -->
  <section class="section" id="filosofia-pilares" style="background: var(--bg-deep);">
    <div class="section-title reveal">
      <h2>Nuestros <span class="gradient-text">Pilares Técnicos</span></h2>
      <p>Nos enfocamos en construir sistemas estables, robustos y totalmente integrados en tu arquitectura empresarial.</p>
    </div>

    <div class="grid-3">
      <!-- Tech Card 1 -->
      <div class="glass-card reveal" style="padding: 2rem; text-align: center;">
        <div style="font-size: 2.2rem; margin-bottom: 1rem;">🧠</div>
        <h3 style="margin-bottom: 0.5rem;">Inteligencia Adaptativa</h3>
        <p style="color: var(--text-muted); font-size: 0.9rem;">Modelos lingüísticos (LLMs) refinados y sistemas de Recuperación Aumentada (RAG) entrenados con tus bases de datos internas para respuestas seguras y libres de alucinaciones.</p>
      </div>

      <!-- Tech Card 2 -->
      <div class="glass-card reveal" style="padding: 2rem; text-align: center;">
        <div style="font-size: 2.2rem; margin-bottom: 1rem;">🔗</div>
        <h3 style="margin-bottom: 0.5rem;">Orquestadores de Flujo</h3>
        <p style="color: var(--text-muted); font-size: 0.9rem;">Plataformas visuales como n8n y Zapier para integraciones API rápidas, y frameworks de agentes como LangChain y CrewAI para desarrollos complejos.</p>
      </div>

      <!-- Tech Card 3 -->
      <div class="glass-card reveal" style="padding: 2rem; text-align: center;">
        <div style="font-size: 2.2rem; margin-bottom: 1rem;">🗄️</div>
        <h3 style="margin-bottom: 0.5rem;">Bases de Datos & Backend</h3>
        <p style="color: var(--text-muted); font-size: 0.9rem;">Python y Node.js para servicios web, bases de datos relacionales como PostgreSQL, y bases vectoriales como Pinecone para búsqueda semántica.</p>
      </div>
    </div>
  </section>

  <!-- CTA de Nosotros -->
  <section class="section reveal" style="text-align: center; max-width: 800px; margin: 0 auto; padding-bottom: 8rem;">
    <h2 style="font-size: 2.3rem; margin-bottom: 1.5rem;">Trabajemos <span class="gradient-text">Juntos</span></h2>
    <p style="color: var(--text-muted); margin-bottom: 2.5rem; font-size: 1.1rem;">Cuéntanos qué cuellos de botella frenan tu crecimiento diario y diseñemos una prueba de concepto automatizada sin coste inicial.</p>
    <a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" class="btn-primary">Hablar con un Ingeniero</a>
  </section>

<?php
get_footer();
