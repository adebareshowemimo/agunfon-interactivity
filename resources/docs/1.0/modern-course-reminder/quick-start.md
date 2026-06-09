# Quick Start

---

This guide walks you through sending your first reminders. It assumes the plugin is installed and cron is running.

- [Check the essentials](#essentials)
- [Create a rule (or use the library)](#rule)
- [Choose a template](#template)
- [Preview before sending](#preview)
- [Verify it sent](#verify)

<a name="essentials"></a>
## 1. Check the essentials

Open **Site administration → Plugins → Local plugins → Modern Course Reminder → Health check**. Confirm cron has run recently and email is enabled. Fix anything flagged before going live.

<a name="rule"></a>
## 2. Create a rule (or use the library)

You have two ways to start:

- **Rule library** — open **Rule library** and apply a ready-made starter rule (course not started, incomplete, inactive re-engagement, deadline approaching, or overdue-with-escalation). Each one is created **disabled and site-wide** so you can adjust it first.
- **From scratch** — open **Reminder rules → Add rule** and set the trigger, scope, timing and channels yourself. See [Rules](/{{route}}/{{version}}/modern-course-reminder/rules) for every option.

> {info} **Teachers** can manage rules for their own course at *Course → Modern Course Reminder*. A setup checklist guides you through completion tracking and criteria, and blocks rules that target completion until the course is correctly configured — so you never create a rule that can't fire.

<a name="template"></a>
## 3. Choose a template

A rule sends the content of a **template**. Use the site default, pick an existing template, or create your own with placeholders like `{firstname}`, `{coursename}`, `{daysoverdue}` and `{courseurl}`. You can even **draft one with AI**. See [Templates](/{{route}}/{{version}}/modern-course-reminder/templates).

<a name="preview"></a>
## 4. Preview before sending

- On the rule, use **Preview matched learners** to see exactly who matches right now — no reminders are sent.
- For a one-off send, use **Send reminder now**: choose the course and audience, then preview the **eligible** and **skipped** recipients (with reasons) before confirming.

<a name="verify"></a>
## 5. Verify it sent

After the next cron cycle, check:

- **Dashboard** — cards for sent today/this week, pending queue, failed, overdue learners and escalations.
- **Reminder logs** — the per-recipient audit trail, filterable and exportable.

See [Reports & Analytics](/{{route}}/{{version}}/modern-course-reminder/reports-and-analytics) for the full picture.
