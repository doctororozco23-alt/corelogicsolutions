/**
 * Chatbot Core Logic — llama a api/chat.php (Google Gemini en el servidor).
 */
(function () {
  var ENDPOINT = "api/chat.php";
  var history = [];
  var busy = false;

  var style = document.createElement("style");
  style.textContent = [
    ".cls-chat-root{position:fixed;right:1rem;bottom:1rem;z-index:1000;font-family:inherit}",
    ".cls-chat-btn{width:58px;height:58px;border-radius:50%;border:none;cursor:pointer;background:linear-gradient(145deg,#0f4c5c,#1a7a8c);color:#fff;box-shadow:0 10px 28px rgba(15,76,92,.35);display:grid;place-items:center;font-size:1.45rem}",
    ".cls-chat-btn:hover{transform:translateY(-1px)}",
    ".cls-chat-panel{display:none;width:min(380px,calc(100vw - 1.5rem));height:min(520px,calc(100vh - 6rem));background:#fff;border:1px solid #e2e8f0;border-radius:18px;box-shadow:0 18px 50px rgba(15,23,42,.18);flex-direction:column;overflow:hidden;margin-bottom:.75rem}",
    ".cls-chat-root.open .cls-chat-panel{display:flex}",
    ".cls-chat-root.open .cls-chat-btn{background:#0b1c24}",
    ".cls-chat-head{background:linear-gradient(135deg,#0f4c5c,#1a7a8c);color:#fff;padding:.9rem 1rem;display:flex;align-items:center;justify-content:space-between;gap:.5rem}",
    ".cls-chat-head strong{display:block;font-size:.95rem}",
    ".cls-chat-head span{display:block;font-size:.75rem;opacity:.9}",
    ".cls-chat-close{background:transparent;border:none;color:#fff;font-size:1.3rem;cursor:pointer;line-height:1;padding:.2rem}",
    ".cls-chat-msgs{flex:1;overflow:auto;padding:1rem;background:#f6f8fb;display:flex;flex-direction:column;gap:.65rem}",
    ".cls-msg{max-width:92%;padding:.7rem .85rem;border-radius:14px;font-size:.9rem;line-height:1.45;white-space:pre-wrap;word-break:break-word}",
    ".cls-msg.bot{background:#fff;border:1px solid #e2e8f0;align-self:flex-start;color:#0f172a}",
    ".cls-msg.user{background:#0f4c5c;color:#fff;align-self:flex-end}",
    ".cls-msg.err{background:#fef2f2;border:1px solid #fecaca;color:#991b1b;align-self:flex-start}",
    ".cls-chat-quick{display:flex;flex-wrap:wrap;gap:.35rem;padding:.35rem .75rem .15rem;background:#f6f8fb;border-top:1px solid #e2e8f0}",
    ".cls-chat-quick button{border:1px solid #c7e4ea;background:#e8f4f6;color:#0f4c5c;border-radius:999px;padding:.3rem .65rem;font-size:.75rem;font-weight:700;cursor:pointer}",
    ".cls-chat-form{display:flex;gap:.4rem;padding:.75rem;border-top:1px solid #e2e8f0;background:#fff}",
    ".cls-chat-form input{flex:1;border:1px solid #e2e8f0;border-radius:999px;padding:.65rem .9rem;font:inherit}",
    ".cls-chat-form button{border:none;border-radius:999px;padding:.65rem 1rem;background:#0f4c5c;color:#fff;font-weight:700;cursor:pointer;font:inherit}",
    ".cls-chat-form button:disabled{opacity:.55;cursor:not-allowed}",
    ".cls-typing{font-size:.8rem;color:#64748b;align-self:flex-start;padding:0 .25rem}",
    "@media (max-width:480px){.cls-chat-root{right:.65rem;bottom:.65rem}.cls-chat-panel{height:min(70vh,520px)}}"
  ].join("");
  document.head.appendChild(style);

  var root = document.createElement("div");
  root.className = "cls-chat-root";
  root.innerHTML = [
    '<div class="cls-chat-panel" role="dialog" aria-label="Chat de Core Logic">',
    '  <div class="cls-chat-head">',
    '    <div><strong>Asistente Core Logic</strong><span>IA · Google Gemini · en línea</span></div>',
    '    <button type="button" class="cls-chat-close" aria-label="Cerrar">×</button>',
    "  </div>",
    '  <div class="cls-chat-msgs" id="cls-chat-msgs"></div>',
    '  <div class="cls-chat-quick" id="cls-chat-quick"></div>',
    '  <form class="cls-chat-form" id="cls-chat-form">',
    '    <input type="text" id="cls-chat-input" placeholder="Escribe tu pregunta..." autocomplete="off" maxlength="1500" />',
    '    <button type="submit" id="cls-chat-send">Enviar</button>',
    "  </form>",
    "</div>",
    '<button type="button" class="cls-chat-btn" id="cls-chat-toggle" aria-label="Abrir chat">💬</button>'
  ].join("");
  document.body.appendChild(root);

  var msgs = document.getElementById("cls-chat-msgs");
  var form = document.getElementById("cls-chat-form");
  var input = document.getElementById("cls-chat-input");
  var sendBtn = document.getElementById("cls-chat-send");
  var toggle = document.getElementById("cls-chat-toggle");
  var closeBtn = root.querySelector(".cls-chat-close");
  var quick = document.getElementById("cls-chat-quick");

  function addMsg(text, kind) {
    var el = document.createElement("div");
    el.className = "cls-msg " + (kind || "bot");
    el.textContent = text;
    msgs.appendChild(el);
    msgs.scrollTop = msgs.scrollHeight;
    return el;
  }

  function setOpen(open) {
    root.classList.toggle("open", open);
    toggle.textContent = open ? "×" : "💬";
    toggle.setAttribute("aria-label", open ? "Cerrar chat" : "Abrir chat");
    if (open) input.focus();
  }

  toggle.addEventListener("click", function () {
    setOpen(!root.classList.contains("open"));
  });
  closeBtn.addEventListener("click", function () {
    setOpen(false);
  });

  // Bienvenida
  addMsg(
    "Hola, soy el asistente de Core Logic Solutions. Puedo orientarte sobre automatización, marketing/SEO, auditorías, web, apps y precios de entrada. ¿En qué te ayudo?",
    "bot"
  );

  var suggestions = [
    "¿Qué servicios ofrecen?",
    "Precios de automatización",
    "¿Por dónde empiezo?",
    "Quiero un sitio web"
  ];
  suggestions.forEach(function (s) {
    var b = document.createElement("button");
    b.type = "button";
    b.textContent = s;
    b.addEventListener("click", function () {
      input.value = s;
      form.dispatchEvent(new Event("submit", { cancelable: true }));
    });
    quick.appendChild(b);
  });

  form.addEventListener("submit", function (e) {
    e.preventDefault();
    if (busy) return;
    var text = (input.value || "").trim();
    if (!text) return;
    input.value = "";
    quick.style.display = "none";
    sendMessage(text);
  });

  function sendMessage(text) {
    busy = true;
    sendBtn.disabled = true;
    addMsg(text, "user");
    history.push({ role: "user", text: text });

    var typing = document.createElement("div");
    typing.className = "cls-typing";
    typing.textContent = "Escribiendo…";
    msgs.appendChild(typing);
    msgs.scrollTop = msgs.scrollHeight;

    // history previo sin el mensaje actual (el PHP lo añade)
    var prior = history.slice(0, -1).map(function (h) {
      return { role: h.role, text: h.text };
    });

    fetch(ENDPOINT, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ message: text, history: prior })
    })
      .then(function (res) {
        return res.json().then(function (body) {
          return { ok: res.ok, status: res.status, body: body };
        });
      })
      .then(function (result) {
        typing.remove();
        if (!result.ok || result.body.error) {
          var err =
            (result.body && result.body.error) ||
            "No se pudo obtener respuesta. Escribe a contact@corelogicsolutionsllc.com";
          addMsg(err, "err");
          // quitar último user del historial si falló, para reintentar limpio
          if (history.length && history[history.length - 1].role === "user") {
            history.pop();
          }
          return;
        }
        var reply = result.body.reply || "";
        addMsg(reply, "bot");
        history.push({ role: "model", text: reply });
      })
      .catch(function () {
        typing.remove();
        addMsg(
          "Error de red o el servidor PHP no está disponible. En cPanel el chat usa api/chat.php. También puedes escribir a contact@corelogicsolutionsllc.com",
          "err"
        );
        if (history.length && history[history.length - 1].role === "user") {
          history.pop();
        }
      })
      .finally(function () {
        busy = false;
        sendBtn.disabled = false;
        input.focus();
      });
  }
})();
