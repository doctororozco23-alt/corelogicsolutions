<?php
/**
 * Template Name: Servicios Page Template
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

get_header();
?>

  <!-- Banner / Hero de la Página -->
  <section class="section" style="padding-top: 10rem; text-align: center; max-width: 800px; margin: 0 auto;">
    <div class="hero-badge reveal">Soluciones Avanzadas</div>
    <h1 style="font-size: 3rem; margin-bottom: 1.5rem;" class="reveal">Servicios de <span class="gradient-text">Ingeniería e IA</span></h1>
    <p style="color: var(--text-muted); font-size: 1.15rem;" class="reveal">Construimos la infraestructura digital que tu empresa necesita para liberar su máximo potencial operacional y captar más clientes en la era de la inteligencia artificial.</p>
  </section>

  <!-- Catálogo de Servicios Detallado -->
  <section class="section" id="servicios-catalogo" style="padding-top: 2rem;">
    <div class="grid-3">
      
      <!-- Servicio 1: Automatización -->
      <article class="glass-card reveal">
        <div style="font-size: 2rem; margin-bottom: 1rem;">⚙️</div>
        <h3 style="font-size: 1.35rem; margin-bottom: 0.75rem;">Automatización de Tareas</h3>
        <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1rem;">Conectamos tus sistemas existentes (CRM, ERP, correos, bases de datos) mediante plataformas de orquestación avanzadas como n8n y Zapier. Eliminamos tareas administrativas repetitivas.</p>
        <ul style="color: var(--primary-cyan); list-style: none; font-size: 0.85rem; display: flex; flex-direction: column; gap: 0.4rem;">
          <li>✔ Flujos de facturación automáticos</li>
          <li>✔ Sincronización de leads multi-canal</li>
          <li>✔ Respuestas y reportes automáticos</li>
        </ul>
      </article>

      <!-- Servicio 2: Marketing Digital -->
      <article class="glass-card reveal">
        <div style="font-size: 2rem; margin-bottom: 1rem;">📈</div>
        <h3 style="font-size: 1.35rem; margin-bottom: 0.75rem;">Marketing Digital & SEO IA</h3>
        <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1rem;">Optimizamos tus campañas digitales utilizando IA para el análisis de audiencias y la redacción de contenidos optimizados semánticamente. Implementamos estrategias SEO avanzadas.</p>
        <ul style="color: var(--primary-cyan); list-style: none; font-size: 0.85rem; display: flex; flex-direction: column; gap: 0.4rem;">
          <li>✔ SEO técnico y Programmatic SEO</li>
          <li>✔ Copywriting estratégico con IA</li>
          <li>✔ Embudos de ventas automatizados</li>
        </ul>
      </article>

      <!-- Servicio 3: Auditorías e Inteligencia -->
      <article class="glass-card reveal">
        <div style="font-size: 2rem; margin-bottom: 1rem;">🔍</div>
        <h3 style="font-size: 1.35rem; margin-bottom: 0.75rem;">Auditorías e Inteligencia</h3>
        <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1rem;">Auditorías técnicas exhaustivas de tu sitio web, competencia y brechas comerciales en tu nicho para detectar oportunidades clave donde la IA puede darte una ventaja de rendimiento.</p>
        <ul style="color: var(--primary-cyan); list-style: none; font-size: 0.85rem; display: flex; flex-direction: column; gap: 0.4rem;">
          <li>✔ Auditorías SEO, rendimiento y seguridad</li>
          <li>✔ Análisis competitivo por IA</li>
          <li>✔ Detección de fugas de conversión</li>
        </ul>
      </article>

      <!-- Servicio 4: Desarrollo Web a Medida -->
      <article class="glass-card reveal">
        <div style="font-size: 2rem; margin-bottom: 1rem;">💻</div>
        <h3 style="font-size: 1.35rem; margin-bottom: 0.75rem;">Páginas Web Premium</h3>
        <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1rem;">Desarrollamos páginas web corporativas rápidas, seguras y visualmente impactantes que captan leads al instante. Optimizadas para velocidad y con un diseño premium y responsive.</p>
        <ul style="color: var(--primary-cyan); list-style: none; font-size: 0.85rem; display: flex; flex-direction: column; gap: 0.4rem;">
          <li>✔ Sitios web interactivos y dinámicos</li>
          <li>✔ Diseños premium listos para móviles</li>
          <li>✔ Carga rápida (Core Web Vitals optimizados)</li>
        </ul>
      </article>

      <!-- Servicio 5: Apps de Negocios y Móviles -->
      <article class="glass-card reveal">
        <div style="font-size: 2rem; margin-bottom: 1rem;">📱</div>
        <h3 style="font-size: 1.35rem; margin-bottom: 0.75rem;">Aplicaciones Web & Móviles</h3>
        <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1rem;">Diseño y desarrollo de aplicaciones móviles a medida (iOS & Android) y portales web internos para centralizar las operaciones de tu negocio e interactuar con tus clientes.</p>
        <ul style="color: var(--primary-cyan); list-style: none; font-size: 0.85rem; display: flex; flex-direction: column; gap: 0.4rem;">
          <li>✔ Aplicaciones empresariales a medida</li>
          <li>✔ Apps nativas y multiplataforma</li>
          <li>✔ Conectividad total con tu base de datos</li>
        </ul>
      </article>

      <!-- Servicio 6: Auditoría de Negocios -->
      <article class="glass-card reveal">
        <div style="font-size: 2rem; margin-bottom: 1rem;">📈</div>
        <h3 style="font-size: 1.35rem; margin-bottom: 0.75rem;">Auditoría de Negocios</h3>
        <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1rem;">Analizamos la eficiencia administrativa interna de tu empresa. Trazamos mapas de procesos manuales e identificamos tareas elegibles para ser asumidas por agentes autónomos de IA.</p>
        <ul style="color: var(--primary-cyan); list-style: none; font-size: 0.85rem; display: flex; flex-direction: column; gap: 0.4rem;">
          <li>✔ Mapeo de flujos de trabajo repetitivos</li>
          <li>✔ Análisis coste/beneficio de automatización</li>
          <li>✔ Plan de adopción tecnológica e IA</li>
        </ul>
      </article>
      
    </div>
  </section>

  <!-- WIDGET 1: Previsualizador de Auditoría IA en Tiempo Real -->
  <section class="section" id="web-auditor-section" style="background: var(--bg-deep);">
    <div class="section-title reveal">
      <h2>Previsualizador de Auditorías <span class="gradient-text">por IA</span></h2>
      <p>Simula un reporte en tiempo real para tu negocio. Alterna entre la Auditoría Interna y de Competencia para ver el nivel de análisis básico, intermedio y avanzado.</p>
    </div>

    <!-- Buscador de Empresa -->
    <div class="auditor-box glass-card reveal" style="margin-bottom: 3rem;">
      <form class="audit-input-group" id="audit-form" style="margin-bottom: 0;">
        <input type="text" id="audit-url-input" placeholder="Introduce el nombre de tu empresa (ej. Inversiones Pérez)" required>
        <button type="button" class="btn-primary" id="start-audit-btn">Generar Previsualización</button>
      </form>
    </div>

    <!-- Controles de Auditoría e Informe Ficticio -->
    <div class="reveal">
      <div class="audit-controls">
        <!-- Pestañas de Tipo de Auditoría -->
        <div class="audit-tabs">
          <button class="audit-tab-btn active" data-audit="business">Auditoría de Negocios</button>
          <button class="audit-tab-btn" data-audit="competitor">Auditoría de Competidores</button>
        </div>

        <!-- Píldoras de Niveles de Análisis -->
        <div class="tier-pills">
          <button class="tier-pill active" data-tier="basic">Análisis Básico</button>
          <button class="tier-pill" data-tier="intermediate">Análisis Intermedio</button>
          <button class="tier-pill" data-tier="advanced">Análisis Avanzado</button>
        </div>
      </div>

      <!-- Papel del Informe de Previsualización -->
      <div class="report-paper">
        <div class="report-watermark">PREVISUALIZACIÓN</div>
        
        <div class="report-header-preview">
          <div class="report-logo">
            <div class="report-logo-icon">
              <svg viewBox="0 0 24 24"><path d="M12 2L2 22h20L12 2zm0 4l6 12H6L12 6z"/></svg>
            </div>
            <span>Core Logic <span class="gradient-text">Solutions</span></span>
          </div>
          <div class="report-meta-info">
            <div>Tipo: <span id="report-meta-type">Auditoría de Negocios (Interna)</span></div>
            <div>Empresa: <span id="report-meta-company">Tu Empresa S.A.</span></div>
            <div>Nivel: <span id="report-meta-tier">Plan Básico</span></div>
          </div>
        </div>

        <div class="report-title-section">
          <h3 id="report-title-text">Reporte de Eficiencia y Automatización de Negocios</h3>
          <div class="report-score-box">
            <div class="score-circle-wrapper">
              <svg class="score-svg" viewBox="0 0 100 100">
                <circle class="score-bg" cx="50" cy="50" r="45"></circle>
                <circle class="score-bar" id="audit-score-circle" cx="50" cy="50" r="45"></circle>
              </svg>
              <div class="score-text">
                <span id="audit-score-number">74</span><span class="score-pct">%</span>
              </div>
            </div>
            <div class="score-label">Puntaje de Eficiencia</div>
          </div>
        </div>

        <!-- SECCIÓN 1: INTRODUCCIÓN (Siempre Visible) -->
        <div class="report-section" id="report-sec-1">
          <h4 class="report-section-title">1. Diagnóstico Inicial y Fugas Operacionales Detectadas</h4>
          <ul class="report-list" id="report-sec-1-content">
            <!-- Rellenado por JS -->
          </ul>
        </div>

        <!-- SECCIÓN 2: PROCESOS DETALLADOS (Difuminado en Básico) -->
        <div class="report-section" id="report-sec-2">
          <h4 class="report-section-title">2. Análisis de Flujos y Tiempos de Carga Operativos</h4>
          
          <div class="blur-container" id="blur-container-sec-2">
            <ul class="report-list" id="report-sec-2-content">
              <!-- Rellenado por JS -->
            </ul>
          </div>

          <!-- Overlay de Bloqueo -->
          <div class="lock-overlay" id="lock-sec-2" style="display: none;">
            <div class="lock-box">
              <div class="lock-icon">🔒</div>
              <h4>Contenido Premium Bloqueado</h4>
              <p>El análisis de procesos está disponible únicamente en el <strong style="color: var(--primary-cyan);"><span class="next-tier">Plan Intermedio</span></strong>.</p>
              <button type="button" class="btn-unlock">Desbloquear Análisis</button>
            </div>
          </div>
        </div>

        <!-- SECCIÓN 3: PLAN DE RECOMENDACIONES IA (Difuminado en Básico e Intermedio) -->
        <div class="report-section" id="report-sec-3">
          <h4 class="report-section-title">3. Plan de Recomendaciones e Integración de IA Paso a Paso</h4>
          
          <div class="blur-container" id="blur-container-sec-3">
            <ul class="report-list" id="report-sec-3-content">
              <!-- Rellenado por JS -->
            </ul>
          </div>

          <!-- Overlay de Bloqueo -->
          <div class="lock-overlay" id="lock-sec-3" style="display: none;">
            <div class="lock-box">
              <div class="lock-icon">🔒</div>
              <h4>Plan de Implementación IA Bloqueado</h4>
              <p>Las recomendaciones y automatizaciones específicas de IA requieren el <strong style="color: var(--primary-pink);"><span class="next-tier">Plan Avanzado</span></strong>.</p>
              <button type="button" class="btn-unlock">Revelar Plan Completo</button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- WIDGET 2: Calculadora de ROI de Automatización -->
  <section class="section" id="roi-calculator-section">
    <div class="section-title reveal">
      <h2>Calculadora de ROI de <span class="gradient-text">Automatización</span></h2>
      <p>Descubre cuánto tiempo y dinero puedes ahorrar mensualmente optimizando tus flujos repetitivos con IA.</p>
    </div>

    <div class="calculator-box glass-card reveal" id="calculator-widget">
      <div class="calc-sliders">
        <!-- Slider 1: Empleados -->
        <div class="slider-group">
          <div class="slider-header">
            <span>Número de Empleados</span>
            <span class="slider-value" id="val-employees">1</span>
          </div>
          <input type="range" class="calc-slider" id="calc-employees" min="1" max="100" value="10">
        </div>

        <!-- Slider 2: Horas repetitivas semanales -->
        <div class="slider-group">
          <div class="slider-header">
            <span>Horas semanales en tareas repetitivas (por empleado)</span>
            <span class="slider-value" id="val-hours">1h</span>
          </div>
          <input type="range" class="calc-slider" id="calc-hours" min="1" max="40" value="8">
        </div>

        <!-- Slider 3: Coste por hora medio -->
        <div class="slider-group">
          <div class="slider-header">
            <span>Salario/Costo medio por hora</span>
            <span class="slider-value" id="val-rate">$25</span>
          </div>
          <input type="range" class="calc-slider" id="calc-rate" min="10" max="100" value="25">
        </div>
      </div>

      <div class="calc-results">
        <!-- Horas ahorradas al mes -->
        <div class="glass-card result-card" id="result-hours">
          <h4>Horas Ahorradas al Mes</h4>
          <div class="result-value" id="roi-hours-saved">0h</div>
          <p style="font-size: 0.85rem; color: var(--text-muted);">Tiempo que reenfocarás en tareas estratégicas.</p>
        </div>

        <!-- Ahorro de dinero mensual -->
        <div class="glass-card result-card" id="result-money">
          <h4>Ahorro de Dinero Mensual</h4>
          <div class="result-value" id="roi-money-saved">$0</div>
          <p style="font-size: 0.85rem; color: var(--text-muted);">Reducción de coste directo de administración.</p>
        </div>

        <!-- Ahorro Anual Estimado -->
        <div class="glass-card result-card" id="result-annual" style="grid-column: span 2;">
          <h4>Ahorro Anual Estimado</h4>
          <div class="result-value" id="roi-annual-savings">$0</div>
          <div style="font-weight: bold; color: var(--primary-pink); font-size: 1.1rem; margin-top: 0.5rem;" id="roi-efficiency-boost">+250%</div>
          <p style="font-size: 0.85rem; color: var(--text-muted); margin-top: 0.25rem;">Aumento estimado en eficiencia operativa.</p>
        </div>

        <p class="calc-disclaimer">* Los cálculos asumen una automatización efectiva del 75% del tiempo gastado en tareas repetitivas identificadas en la auditoría.</p>
      </div>
    </div>
  </section>

<?php
get_footer();
