# Layouts Inventory

## Primary Layout

- `resources/views/layouts/app.blade.php`
  - Global HTML shell
  - Includes header/footer components
  - Loads Google Fonts (Sora + Inter)
  - Uses `@vite(['resources/css/app.css', 'resources/js/app.js'])`
  - Defines core styles:
    - `.bg-page-gradient`
    - `.accordion-*`
    - `.hero-dashboard` shadow

## Notes
- Layout uses Tailwind classes throughout pages
- Brand palette and typography are defined in layout + `resources/css/app.css`
