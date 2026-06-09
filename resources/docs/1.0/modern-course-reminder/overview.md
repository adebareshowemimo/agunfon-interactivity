# Modern Course Reminder — Overview

---

- [What it is](#what-it-is)
- [Who it's for](#who)
- [How reminders work](#how)
- [Where to go next](#next)

<a name="what-it-is"></a>
## What it is

**Modern Course Reminder** (`local_moderncoursereminder`) is a Moodle **local plugin** that automates learner follow-up. Instead of teachers chasing learners by hand, you define **rules** that detect who has not started, not finished, gone inactive, or missed a deadline — and the plugin sends the right reminder, on the right channel, on cron.

On that foundation it **escalates** still-incomplete learners to their line manager, drafts **branded templates** (optionally with AI), batches **manager digests**, and **reports** on what actually moved completion — with filterable, exportable logs and a Report Builder datasource for audit.

> {primary} Modern Course Reminder is a commercial plugin licensed under **GNU GPL v3**. It is the enterprise successor to the older free `local_course_reminder`, and includes a one-command migration that brings your existing reminder data across. See [Installation](/{{route}}/{{version}}/modern-course-reminder/installation).

<a name="who"></a>
## Who it's for

- **Compliance & L&D teams** running mandatory training who need deadlines, escalation, and an audit trail.
- **Course administrators & training providers** who want to lift completion rates without manual chasing.
- **Teachers** who want to manage reminders for their own course, with a guided setup that prevents broken rules.

<a name="how"></a>
## How reminders work

Reminders run as a pipeline of scheduled tasks on Moodle cron:

1. **Evaluate** — rules are checked against learners (completion, enrolment, last access, deadlines).
2. **Build queue** — matched learners become per-recipient queue items, de-duplicated so nobody is spammed.
3. **Send** — items go out by email and/or Moodle notification, within each rule's daily send window.
4. **Retry / digest / clean up** — failures retry, manager digests are batched, old logs are pruned.

Completion, inactivity, and deadline state are read from Moodle's own **Completion**, **Enrolment**, and **Messaging** APIs — there is no external service to host.

<a name="next"></a>
## Where to go next

- [Requirements](/{{route}}/{{version}}/modern-course-reminder/requirements)
- [Installation & Migration](/{{route}}/{{version}}/modern-course-reminder/installation)
- [Quick Start](/{{route}}/{{version}}/modern-course-reminder/quick-start)
- [Admin Settings Reference](/{{route}}/{{version}}/modern-course-reminder/admin-settings)
