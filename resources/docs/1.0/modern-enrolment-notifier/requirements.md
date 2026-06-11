# Requirements

## Moodle & PHP

| Requirement | Detail |
|---|---|
| Moodle | 4.5 through 5.2 |
| Minimum build | `2024100700` |
| PHP | As required by your Moodle version |
| Component | `local_modernenrolnotifier` |
| License | GNU GPL v3 or later |

## Cron is required

Notifications are **queued** and delivered by Moodle cron. Without a running cron, messages remain queued and are never sent. Cron also drives expiry scans, retries, digests, and cleanup.

Confirm cron is running under **Site administration → Server → Tasks → Task processing**.

## Optional capabilities

| Feature | Needs |
|---|---|
| **AI-assisted drafting** | Moodle's core **AI subsystem** configured with a text-generation provider (Site administration → AI). No API keys are stored in this plugin. |
| **Webhook channel** | A reachable HTTPS endpoint that returns a 2xx status. |
| **Slack channel** | A Slack **incoming webhook** URL. |
| **Microsoft Teams channel** | A Teams **incoming webhook / workflow** URL. |
| **Line-manager routing** | A manager mapping source — manual table, user profile field, or Moodle manager role. |

## Optional integration

If **Modern Course Reminder** (`local_moderncoursereminder`) is installed, this plugin reuses its **manager-map** and **branding** sources instead of duplicating configuration.

## Next steps

- [Installation & Upgrade](/{{route}}/{{version}}/modern-enrolment-notifier/installation)
