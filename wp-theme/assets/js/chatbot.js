(function() {
  function runChatbot() {
    const chatbotBubble = document.querySelector('.chatbot-bubble');
    const chatbotPanel = document.querySelector('.chatbot-panel');
    const chatbotClose = document.querySelector('.chatbot-close');
    const chatMessages = document.querySelector('.chatbot-messages');
    const chatInput = document.getElementById('chat-input');
    const chatSend = document.getElementById('chat-send');
    const suggestionContainer = document.querySelector('.chatbot-suggestions');

    if (!chatbotBubble || !chatbotPanel) return;

    // Respuestas predefinidas basadas en intenciones/palabras clave
    const botResponses = {
      greeting: "¡Hola! Soy CoreBot 🤖, el asistente virtual de Core Logic Solutions. ¿Cómo puedo ayudarte hoy a potenciar tu negocio con Inteligencia Artificial?",
      services: "En **Core Logic Solutions** nos especializamos en:\n\n• **Automatización de Procesos con IA** (Workflows en n8n/Zapier, integraciones de CRM, agentes automáticos).\n• **Marketing Digital Inteligente** (SEO automatizado, generación de contenido por IA, campañas optimizadas).\n• **Auditorías de Negocios y Competencia** (Análisis de tu web y mercado por IA para identificar fugas de conversión y ventajas competitivas).\n• **Desarrollo de Páginas Web y Apps** (Desarrollos modernos y eficientes con integraciones IA).",
      automation: "La automatización con IA permite eliminar tareas repetitivas (facturación, atención a clientes, carga de datos). \n\nUsa nuestra **Calculadora de ROI** en la sección de Servicios para estimar tu ahorro en horas de trabajo y dinero mensual.",
      audit: "Nuestras auditorías analizan rendimiento, SEO, seguridad y oportunidades de integración de IA. \n\n¡Puedes probar el **previsualizador de reportes** en la página de Servicios ingresando el nombre de tu empresa ahora mismo!",
      pricing: "Los costos varían según el alcance del proyecto. Te sugiero ir a la página de **Contacto** y usar nuestro **Configurador de Servicios interactivo** para obtener un presupuesto aproximado al instante.",
      human: "Puedes contactar directamente con nuestro equipo técnico completando el formulario en la página de **Contacto** o enviándonos un email a `contacto@corelogicsolutions.com`. ¡Te responderemos en menos de 24 horas!",
      default: "Interesante pregunta. En Core Logic Solutions diseñamos soluciones tecnológicas a medida. Te recomiendo agendar una sesión de consultoría gratuita en nuestra sección de **Contacto** o seleccionar una de mis preguntas rápidas para guiarte."
    };

    // Abrir / Cerrar Chat
    chatbotBubble.addEventListener('click', () => {
      chatbotPanel.classList.toggle('active');
      if (chatbotPanel.classList.contains('active')) {
        // Mensaje de bienvenida inicial si está vacío
        if (chatMessages.children.length === 0) {
          showBotMessage(botResponses.greeting);
        }
        setTimeout(() => {
          if (chatInput) chatInput.focus();
        }, 300);
      }
    });

    if (chatbotClose) {
      chatbotClose.addEventListener('click', () => {
        chatbotPanel.classList.remove('active');
      });
    }

    // Enviar mensaje del usuario
    const handleSendMessage = () => {
      const text = chatInput.value.trim();
      if (!text) return;

      // Agregar mensaje del usuario
      showUserMessage(text);
      chatInput.value = '';

      // Procesar respuesta del bot con retraso simulado
      showTypingIndicator();
      
      setTimeout(() => {
        removeTypingIndicator();
        const response = processUserMessage(text);
        showBotMessage(response);
      }, 1000);
    };

    if (chatSend && chatInput) {
      chatSend.addEventListener('click', handleSendMessage);
      chatInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') handleSendMessage();
      });
    }

    // Delegación de eventos para botones de sugerencias
    if (suggestionContainer) {
      suggestionContainer.addEventListener('click', (e) => {
        if (e.target.classList.contains('suggestion-btn')) {
          const text = e.target.textContent;
          const key = e.target.getAttribute('data-key');
          
          showUserMessage(text);
          showTypingIndicator();

          setTimeout(() => {
            removeTypingIndicator();
            let response = botResponses.default;
            if (key && botResponses[key]) {
              response = botResponses[key];
            }
            showBotMessage(response);
          }, 800);
        }
      });
    }

    // --- Funciones Auxiliares ---

    function showUserMessage(text) {
      const msgDiv = document.createElement('div');
      msgDiv.className = 'chat-message user';
      msgDiv.textContent = text;
      chatMessages.appendChild(msgDiv);
      scrollToBottom();
    }

    function showBotMessage(text) {
      const msgDiv = document.createElement('div');
      msgDiv.className = 'chat-message bot';
      msgDiv.innerHTML = formatMarkdown(text);
      chatMessages.appendChild(msgDiv);
      scrollToBottom();
    }

    function showTypingIndicator() {
      removeTypingIndicator(); // Asegurar que no haya duplicados
      const indicatorDiv = document.createElement('div');
      indicatorDiv.className = 'typing-indicator';
      indicatorDiv.id = 'typing-indicator';
      indicatorDiv.innerHTML = '<span></span><span></span><span></span>';
      chatMessages.appendChild(indicatorDiv);
      scrollToBottom();
    }

    function removeTypingIndicator() {
      const indicator = document.getElementById('typing-indicator');
      if (indicator) indicator.remove();
    }

    function scrollToBottom() {
      chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function formatMarkdown(text) {
      return text
        .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
        .replace(/\*(.*?)\*/g, '<em>$1</em>')
        .replace(/`(.*?)`/g, '<code>$1</code>')
        .replace(/\n/g, '<br>');
    }

    function processUserMessage(text) {
      const lowerText = text.toLowerCase();
      
      if (lowerText.includes('hola') || lowerText.includes('saludos') || lowerText.includes('buenas')) {
        return "¡Hola de nuevo! ¿En qué te puedo asesorar hoy?";
      }
      if (lowerText.includes('servicios') || lowerText.includes('hacen') || lowerText.includes('ofrecen') || lowerText.includes('portafolio')) {
        return botResponses.services;
      }
      if (lowerText.includes('automatiz') || lowerText.includes('tareas') || lowerText.includes('ahorr') || lowerText.includes('n8n') || lowerText.includes('zapier')) {
        return botResponses.automation;
      }
      if (lowerText.includes('auditor') || lowerText.includes('anal') || lowerText.includes('seo') || lowerText.includes('diagnostico')) {
        return botResponses.audit;
      }
      if (lowerText.includes('precio') || lowerText.includes('cost') || lowerText.includes('presupuesto') || lowerText.includes('cuanto vale') || lowerText.includes('cotiz')) {
        return botResponses.pricing;
      }
      if (lowerText.includes('contacto') || lowerText.includes('humano') || lowerText.includes('hablar con') || lowerText.includes('persona') || lowerText.includes('correo') || lowerText.includes('email') || lowerText.includes('telefono')) {
        return botResponses.human;
      }
      
      return botResponses.default;
    }
  }

  // Ejecución segura e inmediata del script
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', runChatbot);
  } else {
    runChatbot();
  }
})();
