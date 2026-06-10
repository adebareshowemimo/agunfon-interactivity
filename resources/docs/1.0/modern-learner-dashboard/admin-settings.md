# Admin Settings Reference

---

All settings are **per block instance** — open the block's gear menu and choose *Configure Modern Learner Dashboard block*.

- [Layout](#layout)
- [Continue learning](#continue)
- [Dates](#dates)
- [Loading indicator](#loader)
- [Custom CSS](#css)
- [Capabilities](#capabilities)

<a name="layout"></a>
## Layout

| Setting | Default | What it does |
|---|---|---|
| Hide dashboard page header | Off | Hides the standard Moodle Dashboard heading above the block for a clean, full-width home. |

<a name="continue"></a>
## Continue learning

| Setting | Default | What it does |
|---|---|---|
| Continue learning course limit | 8 | How many recent-course cards show on the overview before *View all courses* — 4, 8, 12, 16 or 24. |

<a name="dates"></a>
## Dates

| Setting | Default | What it does |
|---|---|---|
| Date format | US (MM/DD/YYYY) | The date-only format used inside the block. Options: US, Day first (DD/MM/YYYY), ISO (YYYY-MM-DD), Long (Month DD, YYYY). Times are not shown. |

<a name="loader"></a>
## Loading indicator

| Setting | Default | What it does |
|---|---|---|
| Loader size | Medium (56px) | Size of the spinner / uploaded loader image — Small (40px) to Huge (128px). |
| Loader colour | Theme primary | Optional hex colour for the default spinner (e.g. `#0f6cbf`). |
| Custom loader image | — | Upload one GIF/SVG/PNG/JPG/WebP to replace the default spinner. |

<a name="css"></a>
## Custom CSS

| Setting | Default | What it does |
|---|---|---|
| Custom CSS | — | Scoped CSS for this instance. Use `#mld-dashboard-{instanceid}`, `.mld-dashboard`, or `.block_modernlearnerdashboard`. `<style>`/`<script>` tags are stripped. For trusted admins/editors. |

<a name="capabilities"></a>
## Capabilities

| Capability | Allowed by default |
|---|---|
| `block/modernlearnerdashboard:myaddinstance` | Authenticated users (add to their Dashboard) |
| `block/modernlearnerdashboard:addinstance` | Editing teacher, Manager |

Profile editing from the dashboard additionally respects the core `moodle/user:editownprofile` capability.
