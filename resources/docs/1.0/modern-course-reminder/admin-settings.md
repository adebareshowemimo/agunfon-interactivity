# Admin Settings Reference

---

All settings live at **Site administration → Plugins → Local plugins → Modern Course Reminder → Settings**. Defaults below match the shipped plugin.

- [General](#general)
- [Channels](#channels)
- [Delivery and retries](#delivery)
- [Manager escalation](#escalation)
- [Compliance](#compliance)
- [AI template generation](#ai)

<a name="general"></a>
## General

| Setting | Default | Notes |
|---|---|---|
| **Enable plugin** | On | Master switch. When off, nothing is evaluated, queued or sent. |
| **Default subject** | "Reminder: complete your course" | Used when a rule/template has no subject. |
| **Default sender name** | (blank) | Sender display name; blank uses the site support contact. |
| **Support email** | (blank) | Reply-to shown in reminder emails; blank uses the site support email. |

<a name="channels"></a>
## Channels

| Setting | Default | Notes |
|---|---|---|
| **Enable email reminders** | On | Send reminders by email. |
| **Enable Moodle notifications** | On | Send reminders as Moodle notifications. |
| **Enable digest emails** | On | Batch manager/admin notifications into periodic digests. |
| **Digest frequency** | Weekly | Daily / Weekly / Monthly. |

<a name="delivery"></a>
## Delivery and retries

| Setting | Default | Notes |
|---|---|---|
| **Maximum reminders per cron run** | 200 | Caps items processed per send pass (0 = unlimited). |
| **Maximum retries** | 3 | Attempts before a failed reminder is abandoned. |
| **Retry delay (minutes)** | 60 | Minimum wait between retry attempts. |
| **Log retention (days)** | 365 | Older logs are pruned by the cleanup task (0 = keep forever). |

<a name="escalation"></a>
## Manager escalation

| Setting | Default | Notes |
|---|---|---|
| **Enable manager escalation** | On | Allow rules to escalate overdue learners to managers. |
| **Manager mapping method** | Moodle manager role | Role / Custom profile field / Manual mapping table. |
| **Manager profile field** | (none) | Which field identifies the manager (profile-field method only). |
| **Profile field contains** | Email | Whether the field holds the manager's email / username / ID number. |

See [Manager Escalation](/{{route}}/{{version}}/modern-course-reminder/manager-escalation) for setup detail.

<a name="compliance"></a>
## Compliance

| Setting | Default | Notes |
|---|---|---|
| **Enable compliance mode** | Off | Toggle for mandatory-training workflows (required due dates and escalation on compliance rules). |

<a name="ai"></a>
## AI template generation

| Setting | Default | Notes |
|---|---|---|
| **Enable AI template generation** | Off | Allow drafting templates via Moodle's AI subsystem. Requires a text-generation provider configured in *Site administration → AI*. No keys are stored in this plugin. |
