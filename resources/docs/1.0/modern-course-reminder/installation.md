# Installation & Migration

---

- [Install (ZIP upload)](#zip)
- [Install (Git / manual)](#manual)
- [Migrating from local_course_reminder](#migrate)
- [After installing](#after)
- [Uninstalling](#uninstall)

<a name="zip"></a>
## Install (ZIP upload)

1. Sign in as a site administrator.
2. Go to **Site administration → Plugins → Install plugins**.
3. Upload the `local_moderncoursereminder` ZIP.
4. Click **Install plugin from the ZIP file** and follow the upgrade prompts.

> {warning} The release ZIP must contain a single top-level folder named `moderncoursereminder` — Moodle derives the component name `local_moderncoursereminder` from it.

<a name="manual"></a>
## Install (Git / manual)

Place the plugin in your Moodle `local/` directory so the path is:

```
<moodleroot>/local/moderncoursereminder
```

Then visit **Site administration → Notifications** (or run the CLI upgrade) to complete the database install:

```bash
php admin/cli/upgrade.php
```

<a name="migrate"></a>
## Migrating from local_course_reminder

Modern Course Reminder is the successor to the older free `local_course_reminder`. A CLI script migrates your existing data:

```bash
php local/moderncoursereminder/cli/migrate_from_course_reminder.php
```

> {warning} **Back up your database first** — standard practice before any migration. Run the script once, then review the imported rules and logs before enabling the plugin.

<a name="after"></a>
## After installing

Find everything under:

**Site administration → Plugins → Local plugins → Modern Course Reminder**

Recommended first pass:

1. Open **Settings** and confirm the master switch, default subject/sender, and channels. See the [Admin Settings Reference](/{{route}}/{{version}}/modern-course-reminder/admin-settings).
2. Confirm **cron is running** — nothing sends without it.
3. Run the **Health check** to catch email, mapping, or task problems early.
4. Create your first rule from the [Quick Start](/{{route}}/{{version}}/modern-course-reminder/quick-start), or apply a starter rule from the **Rule library**.

> {info} The plugin ships **enabled** but with **no rules**, so it sends nothing until you create one. New rules can be created **disabled** so you can preview matched learners before going live.

<a name="uninstall"></a>
## Uninstalling

Uninstall from **Site administration → Plugins → Plugins overview → Modern Course Reminder → Uninstall**. This removes the plugin and its data. Export any [logs or reports](/{{route}}/{{version}}/modern-course-reminder/reports-and-analytics) you need to keep **before** uninstalling.
