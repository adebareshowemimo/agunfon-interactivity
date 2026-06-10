# Quick Start

---

This guide gets the dashboard live for your learners in a few minutes. It assumes the plugin is installed.

- [Add the block](#add)
- [Set it up for your site](#configure)
- [Roll it out to everyone](#rollout)
- [What learners see](#learners)

<a name="add"></a>
## 1. Add the block

On the **Dashboard** (`/my/`), turn editing on, open **Add a block**, and choose **Modern Learner Dashboard**. It appears immediately, populated with your own course data.

<a name="configure"></a>
## 2. Set it up for your site

Open the block's **Configure** panel (gear menu → *Configure Modern Learner Dashboard block*) and set:

- **Hide dashboard page header** — recommended for a clean, full-width home.
- **Continue learning course limit** — how many recent-course cards show before *View all courses* (4, 8, 12, 16 or 24).
- **Date format** — US, day-first, ISO, or long.
- **Loading indicator** — size, colour, or your own loader image.
- **Custom CSS** — optional scoped tweaks.

Every option is documented in the [Admin Settings Reference](/{{route}}/{{version}}/modern-learner-dashboard/admin-settings).

<a name="rollout"></a>
## 3. Roll it out to everyone

Add the block to the **default Dashboard** so every learner gets it automatically — see [Installation](/{{route}}/{{version}}/modern-learner-dashboard/installation#default). No per-learner setup is required.

> {info} Want the **Certificates** tab? Install the **Course Certificate** activity (`mod_coursecertificate`). Without it, the dashboard hides certificate features automatically.

<a name="learners"></a>
## 4. What learners see

When a learner opens the Dashboard they land on the **Overview**: a welcome hero, a stats grid (completion, due-soon, grade average, badges, certificates), and **continue-learning** cards ordered by recent access. The sidebar tabs — Course Library, My courses, Calendar, Grades, Badges, Certificates and Profile — load on demand.

See [Dashboard Tabs](/{{route}}/{{version}}/modern-learner-dashboard/dashboard-tabs) for a tour of each.
