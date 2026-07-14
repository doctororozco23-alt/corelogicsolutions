(function() {
  function runAuditor() {
    const tabBtns = document.querySelectorAll('.audit-tab-btn');
    const tierPills = document.querySelectorAll('.tier-pill');
    
    const reportTitle = document.getElementById('report-title-text');
    const reportTypeMeta = document.getElementById('report-meta-type');
    const reportTierMeta = document.getElementById('report-meta-tier');
    const reportCompanyMeta = document.getElementById('report-meta-company');
    const urlInput = document.getElementById('audit-url-input');
    const auditFormBtn = document.getElementById('start-audit-btn');
    
    // Contenedores del Reporte
    const scoreNum = document.getElementById('audit-score-number');
    const scoreCircle = document.getElementById('audit-score-circle');
    
    const reportSec2 = document.getElementById('report-sec-2');
    const reportSec3 = document.getElementById('report-sec-3');

    if (tabBtns.length === 0 || !reportTitle) return;

    let activeAudit = 'business'; // 'business' o 'competitor'
    let activeTier = 'basic';    // 'basic', 'intermediate', 'advanced'
    let companyName = 'Tu Empresa S.A.';

    // Base de datos de contenidos de informes ficticios para renderizado
    const reportDatabase = {
      business: {
        title: "Reporte de Eficiencia y Automatización de Negocios",
        typeText: "Auditoría de Negocios (Interna)",
        scores: { basic: 74, intermediate: 74, advanced: 74 },
        sec1: `
          <li><strong>Estructura Organizativa:</strong> Procesos manuales detectados en 4 departamentos clave (Finanzas, Ventas, Soporte, Logística).</li>
          <li><strong>Fugas de Tiempo:</strong> Un empleado promedio pierde ~8 horas semanales en transcripción de datos de CRM a hojas de cálculo.</li>
          <li><strong>Digitalización Básica:</strong> Tu infraestructura tecnológica actual tiene soporte API, lo que facilita integraciones directas sin rehacer tu software de base.</li>
        `,
        sec2: `
          <li><strong>Procesamiento de Facturación (Finanzas):</strong> El tiempo promedio de procesamiento de facturas es de 4.2 horas por lote. El 90% es carga manual propensa a errores.</li>
          <li><strong>Atención al Cliente (Soporte):</strong> Retraso medio en la primera respuesta de soporte de 28 minutos. Pérdida estimada de un 12% de leads en horario no laboral.</li>
          <li><strong>Cualificación de Leads (Ventas):</strong> No hay filtrado inicial. Los ejecutivos de cuentas dedican el 45% de su tiempo a llamadas con prospectos no calificados.</li>
        `,
        sec3: `
          <li><strong>Recomendación 1:</strong> Implementar workflow en <strong>n8n</strong> para automatizar el ingreso de facturas desde Gmail a tu ERP. <em>(Ahorro estimado: 3.5h/semana)</em>.</li>
          <li><strong>Recomendación 2:</strong> Desplegar un agente inteligente de <strong>Anthropic Claude</strong> integrado en WhatsApp/Web para atención al cliente y pre-cualificación 24/7.</li>
          <li><strong>Recomendación 3:</strong> Conectar base de datos vectorial <strong>Pinecone</strong> con tu base de conocimientos para responder preguntas de soporte interno al instante.</li>
        `
      },
      competitor: {
        title: "Informe de Competencia Digital y Posicionamiento de Mercado",
        typeText: "Auditoría de Competencia de Mercado",
        scores: { basic: 68, intermediate: 68, advanced: 68 },
        sec1: `
          <li><strong>Presencia de Marca:</strong> Tu competencia principal cuenta con un 35% más de autoridad de dominio (DA), limitando tu visibilidad orgánica.</li>
          <li><strong>Canales de Captación:</strong> Los competidores utilizan campañas activas de publicidad programática orientada a automatización con un coste por click (CPC) de ~$2.50.</li>
          <li><strong>Brecha Básica:</strong> El 80% de tus competidores ya integran cotizadores automáticos o asistentes IA interactivos en sus páginas de aterrizaje.</li>
        `,
        sec2: `
          <li><strong>Análisis de Tráfico:</strong> El competidor líder capta 45,000 visitas mensuales. Sus principales fuentes de tráfico orgánico son palabras clave asociadas a "automatización operativa" e "IA en finanzas".</li>
          <li><strong>Estrategia de Contenidos:</strong> Publican un promedio de 12 artículos optimizados al mes creados de manera semi-automatizada, superando tu ritmo actual.</li>
          <li><strong>Embudo de Ventas:</strong> Tienen un tiempo de respuesta de ventas de menos de 5 minutos mediante secuencias automatizadas de correo electrónico.</li>
        `,
        sec3: `
          <li><strong>Estrategia Defensiva:</strong> Lanzar landing pages hiper-específicas para competir por palabras clave de cola larga ("long-tail") de bajo coste y alta conversión.</li>
          <li><strong>Automatización del Embudo:</strong> Integrar secuencias automatizadas de nutrición de prospectos por email conectando n8n a tu software de marketing por correo.</li>
          <li><strong>Generación de Contenido con IA:</strong> Configurar un flujo de publicación de blogs optimizados por IA con revisión humana obligatoria (Human-in-the-Loop) para recuperar cuota de mercado orgánica.</li>
        `
      }
    };

    function updateReportUI() {
      const data = reportDatabase[activeAudit];
      
      // Actualizar Metadatos y Título
      reportTitle.textContent = data.title;
      reportTypeMeta.textContent = data.typeText;
      reportCompanyMeta.textContent = companyName;
      reportTierMeta.textContent = activeTier === 'basic' ? 'Plan Básico' : activeTier === 'intermediate' ? 'Plan Intermedio' : 'Plan Avanzado';

      // Actualizar Contenido Sección 1 (Siempre Visible)
      const sec1Content = document.getElementById('report-sec-1-content');
      if (sec1Content) sec1Content.innerHTML = data.sec1;

      // Actualizar Contenido Sección 2 (Procesos)
      const sec2Content = document.getElementById('report-sec-2-content');
      if (sec2Content) sec2Content.innerHTML = data.sec2;

      // Actualizar Contenido Sección 3 (Recomendaciones IA)
      const sec3Content = document.getElementById('report-sec-3-content');
      if (sec3Content) sec3Content.innerHTML = data.sec3;

      // Actualizar Score Circular
      const score = data.scores[activeTier];
      scoreNum.textContent = score;
      
      const circumference = 283;
      scoreCircle.style.strokeDasharray = circumference;
      const offset = circumference - (circumference * score) / 100;
      scoreCircle.style.strokeDashoffset = offset;

      // --- Manejo de Difuminado y Bloqueo según el Nivel ---
      const overlay2 = document.getElementById('lock-sec-2');
      const container2 = document.getElementById('blur-container-sec-2');
      
      const overlay3 = document.getElementById('lock-sec-3');
      const container3 = document.getElementById('blur-container-sec-3');

      if (activeTier === 'basic') {
        // Bloqueo del 75% del reporte: Secciones 2 y 3 difuminadas al máximo
        container2.className = 'blur-container blur-content-75';
        if (overlay2) overlay2.style.display = 'flex';
        
        container3.className = 'blur-container blur-content-75';
        if (overlay3) overlay3.style.display = 'flex';
        
        // El texto del botón de desbloqueo varía según sección
        if (overlay2) overlay2.querySelector('span.next-tier').textContent = 'Plan Intermedio';
        if (overlay3) overlay3.style.display = 'none'; // En básico, solo mostramos el primer cartel de bloqueo para no saturar
      } 
      else if (activeTier === 'intermediate') {
        // Bloqueo del 50% del reporte: Sección 2 visible, Sección 3 difuminada
        container2.className = 'blur-container';
        if (overlay2) overlay2.style.display = 'none';

        container3.className = 'blur-container blur-content-50';
        if (overlay3) {
          overlay3.style.display = 'flex';
          overlay3.querySelector('span.next-tier').textContent = 'Plan Avanzado';
        }
      } 
      else {
        // Desbloqueado al 100%
        container2.className = 'blur-container';
        if (overlay2) overlay2.style.display = 'none';

        container3.className = 'blur-container';
        if (overlay3) overlay3.style.display = 'none';
      }
    }

    // Escuchadores de pestañas de tipo de auditoría
    tabBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        tabBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        activeAudit = btn.getAttribute('data-audit');
        updateReportUI();
      });
    });

    // Escuchadores de píldoras de nivel (Básico, Intermedio, Avanzado)
    tierPills.forEach(pill => {
      pill.addEventListener('click', () => {
        tierPills.forEach(p => p.classList.remove('active'));
        pill.classList.add('active');
        activeTier = pill.getAttribute('data-tier');
        updateReportUI();
      });
    });

    // Cambiar dinámicamente el nombre de la empresa al digitar
    if (urlInput) {
      urlInput.addEventListener('input', () => {
        const val = urlInput.value.trim();
        companyName = val ? val : 'Tu Empresa S.A.';
        reportCompanyMeta.textContent = companyName;
      });
    }

    // Botón de simulación para cambiar de pestañas/cargar
    if (auditFormBtn && urlInput) {
      auditFormBtn.addEventListener('click', (e) => {
        e.preventDefault();
        const val = urlInput.value.trim();
        companyName = val ? val : 'Tu Empresa S.A.';
        
        // Simular carga rápida
        auditFormBtn.disabled = true;
        auditFormBtn.textContent = 'Analizando...';
        
        setTimeout(() => {
          auditFormBtn.disabled = false;
          auditFormBtn.textContent = 'Generar Previsualización';
          updateReportUI();
          
          // Desplazarse suavemente al reporte generado
          const reportPaperEl = document.querySelector('.report-paper');
          if (reportPaperEl) {
            reportPaperEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
          }
        }, 800);
      });
    }

    // Botones de desbloqueo dentro de los overlays (llevan a contacto)
    document.querySelectorAll('.btn-unlock').forEach(btn => {
      btn.addEventListener('click', () => {
        window.location.href = '../contacto/';
      });
    });

    // Inicializar UI del Reporte
    updateReportUI();
  }

  // Ejecución segura e inmediata del script
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', runAuditor);
  } else {
    runAuditor();
  }
})();
