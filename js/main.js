(function () {
  // Mobile nav
  var toggle = document.querySelector(".nav-toggle");
  var links = document.querySelector(".nav-links");
  if (toggle && links) {
    toggle.addEventListener("click", function () {
      var open = links.classList.toggle("open");
      toggle.setAttribute("aria-expanded", open ? "true" : "false");
    });
    links.querySelectorAll("a").forEach(function (a) {
      a.addEventListener("click", function () {
        links.classList.remove("open");
        toggle.setAttribute("aria-expanded", "false");
      });
    });
  }

  // Header scroll + progress
  var header = document.querySelector(".site-header");
  var bar = document.querySelector(".scroll-progress");
  function onScroll() {
    var y = window.scrollY || 0;
    if (header) header.classList.toggle("scrolled", y > 12);
    if (bar) {
      var doc = document.documentElement;
      var max = doc.scrollHeight - doc.clientHeight;
      var pct = max > 0 ? (y / max) * 100 : 0;
      bar.style.width = pct + "%";
    }
  }
  window.addEventListener("scroll", onScroll, { passive: true });
  onScroll();

  // Reveal on scroll
  var reveals = document.querySelectorAll(".reveal");
  if ("IntersectionObserver" in window) {
    var io = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (e) {
          if (e.isIntersecting) {
            e.target.classList.add("in");
            io.unobserve(e.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: "0px 0px -40px 0px" }
    );
    reveals.forEach(function (el) {
      io.observe(el);
    });
  } else {
    reveals.forEach(function (el) {
      el.classList.add("in");
    });
  }

  // Budget builder
  var checks = document.querySelectorAll("[data-price]");
  var totalEl = document.getElementById("budget-total");
  var weeksEl = document.getElementById("budget-weeks");
  var summaryEl = document.getElementById("selected-services");
  var budgetNote = document.getElementById("budget_note");

  function updateBudget() {
    if (!totalEl) return;
    var total = 0;
    var weeks = 0;
    var names = [];
    checks.forEach(function (el) {
      if (!el.checked) return;
      total += Number(el.getAttribute("data-price") || 0);
      weeks = Math.max(weeks, Number(el.getAttribute("data-weeks") || 0));
      names.push(el.getAttribute("data-name") || el.value);
    });
    if (names.length > 1) weeks += 1;
    totalEl.textContent = "$" + total.toLocaleString("en-US");
    if (weeksEl) {
      weeksEl.textContent = weeks
        ? weeks + (weeks === 1 ? " semana" : " semanas")
        : "—";
    }
    if (summaryEl) summaryEl.value = names.length ? names.join(", ") : "";
    if (budgetNote) {
      budgetNote.value =
        total === 0
          ? ""
          : totalEl.textContent +
            " · típico " +
            (weeksEl ? weeksEl.textContent : "—");
    }
  }

  checks.forEach(function (el) {
    el.addEventListener("change", updateBudget);
  });
  updateBudget();

  var params = new URLSearchParams(window.location.search);
  var service = params.get("servicio") || params.get("service");
  var map = {
    automatizacion: "automation",
    automation: "automation",
    marketing: "marketing",
    web: "website",
    website: "website",
    app: "app",
    "auditoria-proceso": "biz-std",
    "biz-audit": "biz-std",
    "auditoria-competencia": "comp-std",
    "comp-audit": "comp-std"
  };
  if (service && map[service]) {
    var target = document.querySelector('input[value="' + map[service] + '"]');
    if (target) {
      target.checked = true;
      updateBudget();
    }
  }

  document.querySelectorAll("[data-year]").forEach(function (el) {
    el.textContent = String(new Date().getFullYear());
  });
})();
