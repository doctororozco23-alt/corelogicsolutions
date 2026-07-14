(function() {
  function runCalculator() {
    const employeesInput = document.getElementById('calc-employees');
    const hoursInput = document.getElementById('calc-hours');
    const rateInput = document.getElementById('calc-rate');

    const valEmployees = document.getElementById('val-employees');
    const valHours = document.getElementById('val-hours');
    const valRate = document.getElementById('val-rate');

    const hoursSavedEl = document.getElementById('roi-hours-saved');
    const moneySavedEl = document.getElementById('roi-money-saved');
    const annualSavingsEl = document.getElementById('roi-annual-savings');
    const efficiencyEl = document.getElementById('roi-efficiency-boost');

    if (!employeesInput || !hoursInput || !rateInput) return;

    function updateCalculations() {
      const employees = parseInt(employeesInput.value);
      const hours = parseInt(hoursInput.value);
      const rate = parseInt(rateInput.value);

      // Actualizar etiquetas sobre los controles deslizantes
      valEmployees.textContent = employees;
      valHours.textContent = hours + 'h';
      valRate.textContent = '$' + rate;

      // --- Fórmulas de ROI ---
      // Asumimos que la IA automatiza el 75% del tiempo gastado en tareas repetitivas
      const efficiencyFactor = 0.75; 
      
      // Horas semanales ahorradas en total
      const weeklyHoursSaved = employees * hours * efficiencyFactor;
      // Horas mensuales ahorradas (promedio de 4.33 semanas por mes)
      const monthlyHoursSaved = Math.round(weeklyHoursSaved * 4.33);
      
      // Ahorro monetario mensual
      const monthlyMoneySaved = Math.round(monthlyHoursSaved * rate);
      
      // Ahorro monetario anual
      const annualSavings = monthlyMoneySaved * 12;

      // Aumento de eficiencia dinámica
      const efficiencyBoost = 150 + Math.min(200, hours * 5);

      // Actualización fluida de los textos
      animateTextValue(hoursSavedEl, monthlyHoursSaved, 'h');
      animateTextValue(moneySavedEl, monthlyMoneySaved, '$');
      animateTextValue(annualSavingsEl, annualSavings, '$');
      
      if (efficiencyEl) {
        efficiencyEl.textContent = `+${efficiencyBoost}%`;
      }
    }

    function animateTextValue(element, target, prefix = '') {
      if (!element) return;
      const start = parseInt(element.textContent.replace(/[^0-9]/g, '')) || 0;
      if (start === target) return;

      let current = start;
      const duration = 400; // 400ms
      const stepTime = 20;
      const steps = duration / stepTime;
      const increment = (target - start) / steps;

      const timer = setInterval(() => {
        current += increment;
        if ((increment > 0 && current >= target) || (increment < 0 && current <= target)) {
          current = target;
          clearInterval(timer);
        }
        
        const formatted = Math.round(current).toLocaleString();
        if (prefix === '$') {
          element.textContent = '$' + formatted;
        } else if (prefix === 'h') {
          element.textContent = formatted + 'h';
        } else {
          element.textContent = formatted;
        }
      }, stepTime);
    }

    // Escuchar eventos
    employeesInput.addEventListener('input', updateCalculations);
    hoursInput.addEventListener('input', updateCalculations);
    rateInput.addEventListener('input', updateCalculations);

    // Inicializar cálculos
    updateCalculations();
  }

  // Ejecución segura e inmediata del script
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', runCalculator);
  } else {
    runCalculator();
  }
})();
