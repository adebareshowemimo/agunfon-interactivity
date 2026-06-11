# Overview

Modern Enrolment Notifier helps Moodle sites send clear, timely notifications around the enrolment lifecycle — without manual follow-up. It keeps learners, teachers, managers, and even external systems informed when enrolment activity happens.

## What it does

- Sends learner **welcome** messages when users are enrolled.
- Notifies **teachers, course managers, course contacts, or line managers** about enrolment activity.
- Sends **enrolment expiry reminders** before or after access ends.
- Sends **course completion** congratulations or next-step messages.
- Collects high-volume notifications into **daily or weekly digests**.
- Delivers through **email, Moodle in-app/mobile, webhook, Slack, and Microsoft Teams**.
- Gives administrators **dashboards, delivery logs, queue controls, and CSV exports**.
- Lets course managers configure **course-specific** notifications when permitted.

## How it works

The plugin is built around **notification rules**. A rule decides:

1. **When** — which enrolment event triggers it (created, expiring, expired, completed).
2. **Who** — which recipient receives the message.
3. **What** — which template renders the subject and body.
4. **How** — which delivery channel(s) carry it.

Event observers only **enqueue** work. Rendering, sending, retrying, and logging happen later through **scheduled tasks**, so enrolment activity stays fast even when mail servers or external endpoints are slow.

```text
Enrolment event  →  Match rule(s)  →  Queue message  →  Deliver on cron  →  Retry / digest / log
```

## Who it's for

| Role | Value |
|---|---|
| Site administrators | One engine for every enrolment notification; full visibility and audit. |
| L&D / compliance teams | Automatic welcomes, expiry reminders, and completion messages at scale. |
| Teachers / course managers | Self-service course notifications within admin-set limits. |
| Ops / integration teams | Push enrolment events to Slack, Teams, or a webhook for downstream automation. |

## Next steps

- [Requirements](/{{route}}/{{version}}/modern-enrolment-notifier/requirements)
- [Quick Start](/{{route}}/{{version}}/modern-enrolment-notifier/quick-start)
