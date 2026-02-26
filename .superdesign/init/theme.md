# Theme & Tokens

## Fonts
- Primary (Headings): **Sora**
- Secondary (Body): **Inter**

Loaded in `resources/views/layouts/app.blade.php`:
```
https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap
```

## Colors (Brand Spec)
- Deep Blue (Primary): `#022B69` (brand-700)
- Alice Blue (Secondary): `#EEF6FF` (brand-50)
- Eerie Black (Text): `#181818` (base-900)
- White: `#FFFFFF`

Tailwind tokens defined in `layouts/app.blade.php`:
```
brand: {
  50: '#EEF6FF',
  100: '#D9EBFF',
  200: '#B3D9FF',
  500: '#1E4D8B',
  600: '#1A3F6F',
  700: '#022B69',
  900: '#01143F',
  950: '#000A1F'
}
base: {
  900: '#181818',
  500: '#6B7280'
}
```

## Shadows
- soft: `0 10px 40px -10px rgba(2, 43, 105, 0.08)`
- float: `0 20px 40px -10px rgba(2, 43, 105, 0.15)`

## Layout
- Main container: `max-w-7xl` + `px-4 sm:px-6 lg:px-8`
- Page background: `.bg-page-gradient`

## Current Issues (for Phase 3)
- Multiple gradient overlays and blur elements exist in CTA + bento cards
- Decorative blur circles in `cta-section.blade.php`
- Heavy overlays in `lms-features.blade.php` and solution pages
