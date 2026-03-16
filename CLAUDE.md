# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Crystal Crown Mobile Detailing — a static marketing website for a mobile car detailing business. This is a **vanilla HTML/CSS/JavaScript** project with zero dependencies, no build system, no framework, and no package manager.

The site is served directly from `/var/www/html/` with no compilation or bundling step.

## Development

**To run locally:** Open any `.html` file in a browser, or serve the directory with any static file server.

**There is no build, lint, or test command.** No `package.json`, no tooling, no CI/CD pipeline.

## Architecture

### File Organization

All files live in a single flat directory. There are no subdirectories for source code.

- **7 HTML pages**: `index.html`, `bookings.html`, `contact.html`, `login.html`, `register.html`, `customerdashboard.html`, `profile.html`
- **1 CSS file**: `styles.css` (~2660 lines) — shared across all pages
- **1 JS file**: `script.js` (~700 lines) — shared across all pages

### Key Architectural Patterns

**No templating or components.** The navbar and footer are copy-pasted into every HTML file. Changes to shared elements must be replicated across all 7 pages.

**No backend integration.** All form submissions (`contact`, `booking`, `login`, `register`) call `e.preventDefault()` and log data to `console.log()`. There are no `fetch()` calls or API endpoints. Auth is simulated — login redirects to `customerdashboard.html` with no actual session.

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

- **Booking form** (`bookings.html`): 4-step multi-step form with step navigation and validation
- **Profile page** (`profile.html`): 5 tabs switched via `data-tab` attributes
- **FAQ accordion** (`contact.html`): Only one item open at a time
- **Password strength meter** (`register.html`): Real-time visual feedback

## Conventions

- SVG icons are inline in HTML (no icon library)
- Images use `loading="lazy"`
- Google Fonts loaded via `<link>` tags in each HTML `<head>`
- Class naming is descriptive but not BEM (e.g., `.service-card`, `.hero-content`, `.btn-primary`)
