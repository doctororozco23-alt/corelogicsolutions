<?php
/**
 * The template for displaying the front page
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

get_header();
?>

  <!-- Hero Section -->
  <section class="hero" id="hero-section">
    <div class="grid-2">
      <div class="hero-content reveal">
        <div class="hero-badge">
          <span class="pulse-dot"></span>
          Socios en Automatización
        </div>
        <h1 class="hero-title">Automatiza tu Operación. <span class="gradient-text">Escala con IA</span>.</h1>
        <p class="hero-subtitle">Integramos soluciones de Inteligencia Artificial a medida y automatizaciones de flujos de trabajo que reducen hasta un 75% el tiempo dedicado a tareas repetitivas.</p>
        <div class="hero-buttons">
          <a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" class="btn-primary" id="hero-cta-primary">Diseñar Proyecto</a>
          <a href="<?php echo esc_url( home_url( '/servicios/' ) ); ?>" class="btn-secondary" id="hero-cta-secondary">Ver Servicios</a>
        </div>
      </div>
      <div class="hero-visual reveal">
        <div class="hero-illustration">
          <div class="hero-code-block" id="hero-code-typing">
// Core Logic Solutions
const workflow = new AIWorkflow();
workflow.addAgent("Task Automation");
workflow.addAgent("Market Audit");
workflow.addAgent("Digital Marketing");

workflow.optimize({
  efficiency: "+250%",
  timeSaved: "75%",
  growth: "Exponential"
});

workflow.run();
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Highlights Section -->
  <section class="section" id="services-highlights">
    <div class="section-title reveal">
      <h2>Servicios de <span class="gradient-text">Próxima Generación</span></h2>
      <p>Aumentamos la eficiencia y los ingresos de tu empresa aplicando tecnología avanzada orientada a resultados operacionales.</p>
    </div>
    
    <div class="grid-3">
      <!-- Card 1: Automatización -->
      <article class="glass-card reveal" id="service-card-auto">
        <h3 class="gradient-text" style="font-size: 1.5rem; margin-bottom: 1rem;">Automatización con IA</h3>
        <p style="color: var(--text-muted); margin-bottom: 1.5rem; font-size: 0.95rem;">Diseño e integración de flujos de trabajo inteligentes que conectan tus herramientas cotidianas para eliminar la carga administrativa y manual.</p>
        <a href="<?php echo esc_url( home_url( '/servicios/' ) ); ?>" class="btn-secondary" style="padding: 0.6rem 1.5rem; font-size: 0.9rem;">Saber más</a>
      </article>

      <!-- Card 2: Marketing & SEO -->
      <article class="glass-card reveal" id="service-card-marketing">
        <h3 class="gradient-text" style="font-size: 1.5rem; margin-bottom: 1rem;">Marketing & SEO IA</h3>
        <p style="color: var(--text-muted); margin-bottom: 1.5rem; font-size: 0.95rem;">Optimización SEO automatizada, generación de contenido semántico de alta calidad y prospección automatizada de leads calificados por IA.</p>
        <a href="<?php echo esc_url( home_url( '/servicios/' ) ); ?>" class="btn-secondary" style="padding: 0.6rem 1.5rem; font-size: 0.9rem;">Saber más</a>
      </article>

      <!-- Card 3: Auditorías Inteligentes -->
      <article class="glass-card reveal" id="service-card-audit">
        <h3 class="gradient-text" style="font-size: 1.5rem; margin-bottom: 1rem;">Auditoría de Competencia</h3>
        <p style="color: var(--text-muted); margin-bottom: 1.5rem; font-size: 0.95rem;">Escaneo y análisis automático de tus competidores directos, precios, estrategias SEO y embudos de ventas utilizando algoritmos de IA.</p>
        <a href="<?php echo esc_url( home_url( '/servicios/' ) ); ?>" class="btn-secondary" style="padding: 0.6rem 1.5rem; font-size: 0.9rem;">Saber más</a>
      </article>
    </div>
  </section>

  <!-- Process Section (Workflow Map) -->
  <section class="section" id="process-section" style="background: var(--bg-deep);">
    <div class="section-title reveal">
      <h2>Cómo <span class="gradient-text">Trabajamos</span></h2>
      <p>Un modelo de integración estratégico en cuatro fases diseñado para mitigar riesgos y maximizar el retorno de inversión.</p>
    </div>

    <div class="grid-4">
      <!-- Step 1 -->
      <div class="glass-card process-step reveal" id="process-step-1">
        <div class="step-number">01</div>
        <h3>Auditoría</h3>
        <p>Analizamos minuciosamente tus procesos actuales y estructura web para encontrar los cuellos de botella óptimos para automatizar.</p>
      </div>

      <!-- Step 2 -->
      <div class="glass-card process-step reveal" id="process-step-2">
        <div class="step-number">02</div>
        <h3>Arquitectura</h3>
        <p>Diseñamos la infraestructura tecnológica y definimos las herramientas y APIs de IA idóneas para tu flujo operativo.</p>
      </div>

      <!-- Step 3 -->
      <div class="glass-card process-step reveal" id="process-step-3">
        <div class="step-number">03</div>
        <h3>Integración</h3>
        <p>Construimos y conectamos tus plataformas. Probamos rigurosamente cada agente de IA bajo un enfoque seguro.</p>
      </div>

      <!-- Step 4 -->
      <div class="glass-card process-step reveal" id="process-step-4">
        <div class="step-number">04</div>
        <h3>Optimización</h3>
        <p>Monitoreamos y mejoramos los sistemas permanentemente como tus socios tecnológicos de largo plazo (Workflow Partner).</p>
      </div>
    </div>
  </section>

  <!-- Tech Stack Section -->
  <section class="section" id="tech-stack-section">
    <div class="section-title reveal">
      <h2>Infraestructura <span class="gradient-text">Transparente</span></h2>
      <p>No creemos en la magia. Utilizamos tecnologías estables y de nivel empresarial para garantizar la fiabilidad del sistema.</p>
    </div>
    
    <div class="tech-container reveal" id="tech-badges-container">
      <span class="tech-badge">n8n</span>
      <span class="tech-badge">Zapier</span>
      <span class="tech-badge">LangChain</span>
      <span class="tech-badge">OpenAI API</span>
      <span class="tech-badge">Anthropic Claude</span>
      <span class="tech-badge">Python</span>
      <span class="tech-badge">Node.js</span>
      <span class="tech-badge">PostgreSQL</span>
      <span class="tech-badge">Pinecone Vector DB</span>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="section reveal" id="cta-section" style="text-align: center; max-width: 800px; margin: 0 auto;">
    <h2 style="font-size: 2.5rem; margin-bottom: 1.5rem;">¿Listo para multiplicar la <span class="gradient-text">eficiencia</span> de tu negocio?</h2>
    <p style="color: var(--text-muted); margin-bottom: 2.5rem; font-size: 1.1rem;">Comienza hoy mismo con un diagnóstico inicial gratuito o calcula tus ahorros estimados con nuestras herramientas online.</p>
    <div style="display: flex; gap: 1.2rem; justify-content: center;">
      <a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" class="btn-primary" id="cta-bottom-primary">Iniciar Proyecto</a>
      <a href="<?php echo esc_url( home_url( '/servicios/' ) ); ?>" class="btn-secondary" id="cta-bottom-secondary">Probar Herramientas de IA</a>
    </div>
  </section>

<?php
get_footer();
