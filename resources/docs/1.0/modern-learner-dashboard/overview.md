# Modern Learner Dashboard — Overview

---

- [What it is](#what-it-is)
- [Who it's for](#who)
- [How it works](#how)
- [Where to go next](#next)

<a name="what-it-is"></a>
## What it is

**Modern Learner Dashboard** (`block_modernlearnerdashboard`) is a Moodle **block** that turns the Dashboard into a single, focused home for each learner. Instead of hunting across My courses, the gradebook, the calendar and their profile, learners see one tabbed view of everything that matters: an overview of completion and due-soon work, continue-learning cards, a course library, grades, badges, certificates, a calendar, and their profile.

It is built entirely on core Moodle data and renders full-width with the standard block header hidden, so it reads like a purpose-built dashboard rather than a bolted-on block.

> {primary} Modern Learner Dashboard is a commercial plugin licensed under **GNU GPL v3**. It stores **no personal data of its own** — it only displays data Moodle already holds. See [Requirements](/{{route}}/{{version}}/modern-learner-dashboard/requirements).

<a name="who"></a>
## Who it's for

- **Administrators & instructional designers** who want a clearer first screen that reduces "where do I start?" confusion — with no per-learner setup.
- **Compliance & L&D teams** who need learners to see progress, deadlines, and a completed-training record at a glance.
- **Course providers** who want to drive re-entry and self-enrolment from one branded, theme-aware home.

<a name="how"></a>
## How it works

The block reads core Moodle data for whoever is viewing it and renders a tabbed dashboard:

1. **Overview** loads immediately — welcome hero, a stats grid (completion, due-soon, grade average, badges, certificates) and continue-learning cards.
2. **Other tabs load on demand.** Course Library, My courses, Calendar, Grades, Badges and Certificates are **lazy-loaded over AJAX** when the learner opens them, so the page paints fast.
3. **Site-wide counts are cached** for five minutes to keep large sites responsive.

Data comes from Moodle's own **Completion**, **Enrolment**, **Calendar**, **Badges** and **Grades** APIs. There are no new database tables, no cron tasks, and no external service to host.

<a name="next"></a>
## Where to go next

- [Requirements](/{{route}}/{{version}}/modern-learner-dashboard/requirements)
- [Installation & Upgrade](/{{route}}/{{version}}/modern-learner-dashboard/installation)
- [Quick Start](/{{route}}/{{version}}/modern-learner-dashboard/quick-start)
- [Dashboard Tabs](/{{route}}/{{version}}/modern-learner-dashboard/dashboard-tabs)
