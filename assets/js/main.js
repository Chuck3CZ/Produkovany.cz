/* ProDukovany Theme – main.js */

document.addEventListener('DOMContentLoaded', function () {

  // ── Mobilní menu toggle ──────────────────────────────
  const toggle = document.querySelector('.nav-toggle');
  const links  = document.querySelector('.nav-links');

  if (toggle && links) {
    toggle.addEventListener('click', function () {
      const expanded = this.getAttribute('aria-expanded') === 'true';
      this.setAttribute('aria-expanded', !expanded);
      links.classList.toggle('open');
    });

    // Zavři menu při kliknutí na odkaz
    links.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', function () {
        links.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
      });
    });
  }

  // ── Smooth scroll pro anchor linky ──────────────────
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        const offset = 80; // výška navigace
        const top = target.getBoundingClientRect().top + window.pageYOffset - offset;
        window.scrollTo({ top: top, behavior: 'smooth' });
      }
    });
  });

  // ── Scroll animace (Intersection Observer) ──────────
  const animTargets = document.querySelectorAll(
    '.pillar-card, .candidate-card, .news-card, .stat-box, .contact-item'
  );

  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateY(0)';
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12 });

    animTargets.forEach(function (el, i) {
      el.style.opacity = '0';
      el.style.transform = 'translateY(20px)';
      el.style.transition = 'opacity .5s ease ' + (i % 4 * 0.08) + 's, transform .5s ease ' + (i % 4 * 0.08) + 's';
      observer.observe(el);
    });
  }

  // ── Aktivní nav odkaz při scrollu ───────────────────
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.nav-links a');

  function setActiveLink () {
    let current = '';
    sections.forEach(function (section) {
      if (window.pageYOffset >= section.offsetTop - 120) {
        current = section.getAttribute('id');
      }
    });
    navLinks.forEach(function (link) {
      link.classList.remove('active');
      if (link.getAttribute('href') === '#' + current) {
        link.classList.add('active');
      }
    });
  }

  window.addEventListener('scroll', setActiveLink, { passive: true });

  // ── Odpočet do voleb ─────────────────────────────────
  const countdownEl = document.getElementById('election-countdown');
  if (countdownEl) {
    const electionDate = new Date(countdownEl.dataset.date || '2026-10-02');
    function updateCountdown () {
      const now  = new Date();
      const diff = electionDate - now;
      if (diff <= 0) {
        countdownEl.textContent = 'Volby probíhají!';
        return;
      }
      const days    = Math.floor(diff / 86400000);
      const hours   = Math.floor((diff % 86400000) / 3600000);
      const minutes = Math.floor((diff % 3600000)  / 60000);
      countdownEl.textContent = days + ' dní ' + hours + ' h ' + minutes + ' min';
    }
    updateCountdown();
    setInterval(updateCountdown, 60000);
  }

});
