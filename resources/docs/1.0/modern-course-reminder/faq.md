# FAQ

---

- [Which Moodle versions are supported?](#versions)
- [Can I migrate from local_course_reminder?](#migrate)
- [Why aren't reminders being sent?](#nosend)
- [How do I stop a learner being over-emailed?](#spam)
- [How are managers found for escalation?](#managers)
- [Does the AI feature need my own API key?](#ai)
- [Can teachers manage their own course reminders?](#teachers)
- [Is it really GPL?](#gpl)

<a name="versions"></a>
## Which Moodle versions are supported?

Moodle **4.5 through 5.2**. The current release is 1.0.3 (Stable), GNU GPL v3.

<a name="migrate"></a>
## Can I migrate from the free local_course_reminder?

Yes. A CLI script imports your existing data:

```bash
php local/moderncoursereminder/cli/migrate_from_course_reminder.php
```

Back up your database first. See [Installation & Migration](/{{route}}/{{version}}/modern-course-reminder/installation).

<a name="nosend"></a>
## Why aren't reminders being sent?

Almost always one of: **cron isn't running**, **email is disabled site-wide**, the **plugin master switch is off**, or there are **no enabled rules**. Run the **Health check** — it pinpoints the cause. See [Reports & Analytics](/{{route}}/{{version}}/modern-course-reminder/reports-and-analytics).

<a name="spam"></a>
## How do I stop a learner being over-emailed?

The queue **de-duplicates**, and each rule has a **Repeat every (days)** gap, a **Maximum reminders** cap, and an optional **daily send window**. Learners can also **opt out**, and suspended / no-email / exempt users are skipped automatically.

<a name="managers"></a>
## How are managers found for escalation?

By one of three methods — Moodle **manager role**, a **custom profile field** on the learner, or a **manual mapping table** (with CSV import). See [Manager Escalation](/{{route}}/{{version}}/modern-course-reminder/manager-escalation).

<a name="ai"></a>
## Does the AI feature need my own API key?

No key is stored in this plugin. AI drafting uses **Moodle's own AI subsystem** — you configure the provider and key once in *Site administration → AI*. The feature is optional and off by default.

<a name="teachers"></a>
## Can teachers manage their own course reminders?

Yes. With the right capability, a teacher manages rules for their own course, guided by a setup checklist that prevents rules which can't fire (e.g. completion not configured).

<a name="gpl"></a>
## Is it really GPL? Can we modify it?

Yes — **GNU GPL v3 or later**. You're free to modify it for your own installation.
