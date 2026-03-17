/**
 * Crystal Crown Detailing — ecommerce.js
 * Shared JavaScript utilities, components, and behaviours
 * Modern ES2020+ standards, no frameworks required
 */

'use strict';

/* ─── Constants ─────────────────────────────────────────────── */
const WHATSAPP_NUMBER = '+254726426426'; // Update with real number

/* ─── DOM Utilities ─────────────────────────────────────────── */
const $ = (selector, context = document) => context.querySelector(selector);
const $$ = (selector, context = document) => [...context.querySelectorAll(selector)];

/**
 * Wait for DOM to be ready
 * @param {Function} fn
 */
const onReady = (fn) => {
  if (document.readyState !== 'loading') {
    fn();
  } else {
    document.addEventListener('DOMContentLoaded', fn, { once: true });
  }
};

/**
 * Throttle function
 * @param {Function} fn
 * @param {number} limit
 */
const throttle = (fn, limit = 100) => {
  let inThrottle;
  return (...args) => {
    if (!inThrottle) {
      fn(...args);
      inThrottle = true;
      setTimeout(() => { inThrottle = false; }, limit);
    }
  };
};



/* ─── Navigation ────────────────────────────────────────────── */
const Nav = {
  nav: null,
  toggle: null,
  mobileMenu: null,
  lastScrollY: 0,

  init() {
    this.nav = $('.nav');
    this.toggle = $('.nav__toggle');
    this.mobileMenu = $('.nav__mobile-menu');
    if (!this.nav) return;

    this.setActiveLink();
    this.setupScrollBehavior();
    this.setupMobileMenu();
    this.setupKeyboard();
  },

  setActiveLink() {
    const currentPath = window.location.pathname.split('/').pop() || 'index.html';
    $$('.nav__link, .nav__mobile-link').forEach(link => {
      const href = link.getAttribute('href')?.split('/').pop();
      if (href === currentPath || (currentPath === '' && href === 'index.html')) {
        link.classList.add('is-active');
        link.setAttribute('aria-current', 'page');
      }
    });
  },

  setupScrollBehavior() {
    const onScroll = throttle(() => {
      const scrollY = window.scrollY;
      if (scrollY > 80) {
        this.nav.classList.add('is-scrolled');
      } else {
        this.nav.classList.remove('is-scrolled');
      }
      this.lastScrollY = scrollY;
    }, 100);

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll(); // run immediately
  },

  setupMobileMenu() {
    if (!this.toggle || !this.mobileMenu) return;

    this.toggle.addEventListener('click', () => this.toggleMobileMenu());

    // Close on link click
    $$('.nav__mobile-link', this.mobileMenu).forEach(link => {
      link.addEventListener('click', () => this.closeMobileMenu());
    });

    // Close on backdrop click
    this.mobileMenu.addEventListener('click', (e) => {
      if (e.target === this.mobileMenu) this.closeMobileMenu();
    });
  },

  setupKeyboard() {
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') this.closeMobileMenu();
    });
  },

  toggleMobileMenu() {
    const isOpen = this.mobileMenu.classList.toggle('is-open');
    this.toggle.classList.toggle('is-open', isOpen);
    this.toggle.setAttribute('aria-expanded', isOpen);
    document.body.style.overflow = isOpen ? 'hidden' : '';
  },

  closeMobileMenu() {
    this.mobileMenu?.classList.remove('is-open');
    this.toggle?.classList.remove('is-open');
    this.toggle?.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
  }
};

/* ─── Scroll Reveal ─────────────────────────────────────────── */
const ScrollReveal = {
  observer: null,

  init() {
    if (!('IntersectionObserver' in window)) {
      // Fallback: show all elements
      $$('.reveal').forEach(el => el.classList.add('is-visible'));
      return;
    }

    this.observer = new IntersectionObserver(
      (entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            this.observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
    );

    $$('.reveal').forEach(el => this.observer.observe(el));
  },

  /**
   * Observe newly added elements
   * @param {Element} container
   */
  observeNew(container) {
    $$('.reveal', container).forEach(el => this.observer?.observe(el));
  }
};

/* ─── Toast Notifications ───────────────────────────────────── */
const Toast = {
  container: null,

  init() {
    this.container = document.createElement('div');
    this.container.className = 'toast-container';
    this.container.setAttribute('role', 'region');
    this.container.setAttribute('aria-label', 'Notifications');
    document.body.appendChild(this.container);
  },

  /**
   * Show a toast message
   * @param {string} message
   * @param {'success'|'error'|'info'} type
   * @param {number} duration ms
   */
  show(message, type = 'info', duration = 5000) {
    const icons = {
      success: '✓',
      error: '✕',
      info: 'ℹ',
    };

    const toast = document.createElement('div');
    toast.className = `toast toast--${type}`;
    toast.setAttribute('role', 'alert');
    toast.innerHTML = `
      <span class="toast__icon toast__icon--${type}">${icons[type]}</span>
      <span class="toast__message">${message}</span>
      <button onclick="this.closest('.toast').remove()" class="toast__close" aria-label="Close">✕</button>
    `;

    this.container.appendChild(toast);

    setTimeout(() => {
      toast.classList.add('is-leaving');
      toast.addEventListener('animationend', () => toast.remove(), { once: true });
    }, duration);

    return toast;
  },

  success: (msg, dur) => Toast.show(msg, 'success', dur),
  error:   (msg, dur) => Toast.show(msg, 'error', dur),
  info:    (msg, dur) => Toast.show(msg, 'info', dur),
};

/* ─── WhatsApp Helper ───────────────────────────────────────── */
const WhatsApp = {
  buildLink(message = '', number = WHATSAPP_NUMBER) {
    const encoded = encodeURIComponent(message);
    return `https://wa.me/${number.replace(/\D/g, '')}${encoded ? `?text=${encoded}` : ''}`;
  },

  openChat(message = '') {
    window.open(this.buildLink(message), '_blank', 'noopener,noreferrer');
  },

  init() {
    $$('[data-whatsapp]').forEach(el => {
      el.addEventListener('click', (e) => {
        e.preventDefault();
        const msg = el.dataset.whatsapp || '';
        this.openChat(msg);
      });
    });
  }
};

/* ─── Smooth Scroll ─────────────────────────────────────────── */
const SmoothScroll = {
  init() {
    $$('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', (e) => {
        const target = $(anchor.getAttribute('href'));
        if (!target) return;
        e.preventDefault();
        const navHeight = parseInt(getComputedStyle(document.documentElement)
          .getPropertyValue('--nav-height'), 10) || 80;
        const top = target.getBoundingClientRect().top + window.scrollY - navHeight - 16;
        window.scrollTo({ top, behavior: 'smooth' });
      });
    });
  }
};

/* ─── Date Input — Set minimum to today ─────────────────────── */
const DateInputs = {
  init() {
    $$('input[type="date"]').forEach(input => {
      const today = new Date().toISOString().split('T')[0];
      // Only set min if the server hasn't already provided one
      if (!input.getAttribute('min')) input.setAttribute('min', today);
      if (!input.value) input.value = '';
    });
  }
};


/* ─── Scroll-to-top ──────────────────────────────────────────── */
const ScrollTop = {
  init() {
    const btn = $('#scroll-top');
    if (!btn) return;

    window.addEventListener('scroll', throttle(() => {
      btn.classList.toggle('is-visible', window.scrollY > 600);
    }, 200), { passive: true });

    btn.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }
};

/* ─── Main Initializer ───────────────────────────────────────── */
onReady(() => {
  Nav.init();
  ScrollReveal.init();
  Toast.init();
  WhatsApp.init();
  SmoothScroll.init();
  DateInputs.init();
  ScrollTop.init();
});

/* ─── Exports (for module environments) ─────────────────────── */
if (typeof module !== 'undefined' && module.exports) {
  module.exports = {
    $, $$, onReady, throttle,
    Nav, ScrollReveal, Toast,
    WhatsApp, SmoothScroll, DateInputs, ScrollTop,
    WHATSAPP_NUMBER
  };
}