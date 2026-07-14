(function() {
  function runConfigurator() {
    const serviceCheckboxes = document.querySelectorAll('.service-checkbox');
    const serviceSelects = document.querySelectorAll('.service-select');
    const priceDisplay = document.getElementById('config-total-price');
    const timeDisplay = document.getElementById('config-total-time');
    const contactMessage = document.getElementById('contact-message');
    
    if (serviceCheckboxes.length === 0 && serviceSelects.length === 0) return;

    function updateEstimate() {
      let totalPrice = 0;
      let selectedTimes = [];
      let selectedNames = [];

      // Procesar Checkboxes
      serviceCheckboxes.forEach(checkbox => {
        if (checkbox.checked) {
          const price = parseInt(checkbox.getAttribute('data-price')) || 0;
          const time = parseInt(checkbox.getAttribute('data-time')) || 0;
          const name = checkbox.getAttribute('data-name');
          
          totalPrice += price;
          selectedTimes.push(time);
          selectedNames.push(name);
        }
      });

      // Procesar Dropdowns (Auditorías)
      serviceSelects.forEach(select => {
        const activeOption = select.options[select.selectedIndex];
        const val = select.value;
        
        if (val !== '0') {
          const price = parseInt(activeOption.getAttribute('data-price')) || 0;
          const time = parseInt(activeOption.getAttribute('data-time')) || 0;
          const name = select.getAttribute('data-name');
          const tierText = activeOption.textContent.split(' - ')[0]; // Extrae "Plan Básico", etc.
          
          totalPrice += price;
          selectedTimes.push(time);
          selectedNames.push(`${name} (${tierText})`);
        }
      });

      let totalWeeks = 0;
      if (selectedTimes.length > 0) {
        // Fórmula de tiempo: El proyecto dura el tiempo de la tarea más larga, 
        // más una semana de integración y coordinación por cada servicio extra.
        const maxTime = Math.max(...selectedTimes);
        const extraTime = selectedTimes.length - 1;
        totalWeeks = maxTime + extraTime;
      }

      // Actualizar visualizaciones
      if (priceDisplay) {
        priceDisplay.textContent = totalPrice === 0 ? '$0' : '$' + totalPrice.toLocaleString();
      }
      if (timeDisplay) {
        timeDisplay.textContent = totalWeeks === 0 ? '0 semanas' : totalWeeks === 1 ? '1 semana' : totalWeeks + ' semanas';
      }

      // Rellenar dinámicamente el mensaje del formulario
      if (contactMessage) {
        if (selectedNames.length > 0) {
          const servicesList = selectedNames.map(s => `- ${s}`).join('\n');
          contactMessage.value = `Hola, me interesa solicitar una propuesta de Core Logic Solutions para los siguientes servicios contratados:\n${servicesList}\n\nPresupuesto estimado: $${totalPrice.toLocaleString()}\nTiempo estimado: ${totalWeeks} semanas.\n\nPor favor, pónganse en contacto conmigo para discutir los detalles.`;
        } else {
          contactMessage.value = '';
        }
      }
    }

    // Escuchar eventos en cada checkbox
    serviceCheckboxes.forEach(checkbox => {
      checkbox.addEventListener('change', updateEstimate);
    });

    // Escuchar eventos en cada selector
    serviceSelects.forEach(select => {
      select.addEventListener('change', updateEstimate);
    });

    // Inicializar presupuesto
    updateEstimate();
  }

  // Ejecución segura e inmediata del script
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', runConfigurator);
  } else {
    runConfigurator();
  }
})();
