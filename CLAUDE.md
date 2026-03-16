# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Crystal Crown Mobile Detailing — a marketing website for a mobile car detailing business. This is a **PHP/CSS/JavaScript** project with zero dependencies, no build system, no framework, and no package manager.

The site is served via PHP from `/var/www/html/` with no compilation or bundling step.

## Development

**To run locally:** Serve the directory with a PHP-capable server (e.g., Apache with mod_php, or `php -S localhost:8000`).

**There is no build, lint, or test command.** No `package.json`, no tooling, no CI/CD pipeline.

## Architecture

### File Organization

All files live in a single flat directory. There are no subdirectories for source code.

- **7 PHP pages**: `index.php`, `bookings.php`, `contact.php`, `login.php`, `register.php`, `customerdashboard.php`, `profile.php`
- **2 PHP partials**: `header.php` (DOCTYPE, `<head>`, navbar), `footer.php` (footer, `<script>`, closing tags)
- **1 CSS file**: `styles.css` (~2660 lines) — shared across all pages
- **1 JS file**: `script.js` (~700 lines) — shared across all pages

### Key Architectural Patterns

**PHP includes for shared layout.** The navbar and footer are defined once in `header.php` and `footer.php`, included in every page via `include`. Each page sets PHP variables before including `header.php`:
- `$pageTitle` — the `<title>` tag content
- `$pageDescription` — the meta description
- `$activePage` — which nav link gets the `active` class (e.g., `'home'`, `'bookings'`, `'contact'`, `'login'`, `'dashboard'`, `'profile'`)
- `$navType` — which nav menu to render: `'public'` (Home/Services/Book Now/Contact), `'auth'` (public + Login), or `'dashboard'` (Dashboard/Book Service/Profile/Logout)

**No backend integration.** All form submissions (`contact`, `booking`, `login`, `register`) call `e.preventDefault()` and log data to `console.log()`. There are no `fetch()` calls or API endpoints. Auth is simulated — login redirects to `customerdashboard.php` with no actual session.

**Single script for all pages.** `script.js` handles every page's interactivity. It guards against missing DOM elements with `if` checks so it can safely load on any page.

### CSS Theming

All colors and design tokens are CSS custom properties in `:root`:
- `--primary-navy: #0a1929`, `--secondary-navy: #132f4c`
- `--accent-blue: #3b82f6`, `--accent-gold: #d4af37`
- Fonts: `--font-display: 'Cinzel', serif` (headings), `--font-body: 'Montserrat', sans-serif` (body)

Glass-morphism effects use `backdrop-filter: blur()` with semi-transparent backgrounds.

### Responsive Breakpoints

- Desktop: default (1025px+)
- Tablet: 1024px and below
- Mobile large: 768px and below
- Mobile small: 480px and below

### Notable UI Flows

- **Booking form** (`bookings.php`): 4-step multi-step form with step navigation and validation
- **Profile page** (`profile.php`): 5 tabs switched via `data-tab` attributes
- **FAQ accordion** (`contact.php`): Only one item open at a time
- **Password strength meter** (`register.php`): Real-time visual feedback

## Conventions

- SVG icons are inline in HTML (no icon library)
- Images use `loading="lazy"`
- Google Fonts loaded via `<link>` tags in `header.php`
- Class naming is descriptive but not BEM (e.g., `.service-card`, `.hero-content`, `.btn-primary`)
- All internal links use `.php` extensions
- Footer copyright year is dynamic via `<?php echo date('Y'); ?>`
