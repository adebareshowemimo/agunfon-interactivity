# Branding & Themes

---

- [Theme compatibility](#themes)
- [The loading indicator](#loader)
- [Custom CSS](#css)
- [Full-width layout](#fullwidth)

<a name="themes"></a>
## Theme compatibility

Modern Learner Dashboard is built to look native in the theme you already run. It is tested and styled for **Boost, Boost Union, Classic, Moove, Adaptable, Academi and Degrade**, and it adds a `mld-theme-{name}` class to its wrapper so you can target the active theme in your own CSS if needed. No theme migration or front-end rebuild is required.

<a name="loader"></a>
## The loading indicator

Because tabs load on demand, the block shows a loading indicator while content streams in. It is fully configurable per block instance:

- **Loader size** — Small (40px), Medium (56px), Large (72px), Extra large (96px), or Huge (128px).
- **Loader colour** — a hex value (e.g. `#0f6cbf`); leave empty to use the theme primary colour.
- **Custom loader image** — upload one GIF, SVG, PNG, JPG or WebP to replace the default spinner.

<a name="css"></a>
## Custom CSS

The **Custom CSS** setting lets trusted administrators or block editors add scoped styles for a single instance. Scope your selectors with `#mld-dashboard-{instanceid}`, `.mld-dashboard`, or `.block_modernlearnerdashboard` so changes don't affect the rest of the page. For safety, `<style>`/`<script>` tags and control characters are stripped from the value.

<a name="fullwidth"></a>
## Full-width layout

The block renders full-width without the default block card chrome. Enable **Hide dashboard page header** to suppress the standard Dashboard heading above it, so the dashboard reads as a purpose-built learner home. See the [Admin Settings Reference](/{{route}}/{{version}}/modern-learner-dashboard/admin-settings).
