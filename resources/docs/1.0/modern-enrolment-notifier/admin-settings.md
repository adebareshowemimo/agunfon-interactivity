# Admin Settings Reference

Settings live under **Site administration → Plugins → Local plugins → Modern Enrolment Notifier**.

## Global

| Setting | Purpose |
|---|---|
| Enable notifications globally | Master on/off for the plugin. |
| Manager mapping method | Manual table, profile field, or Moodle role. |
| Manager profile field & matching type | Which field holds the manager identifier and how it is matched. |
| Course-manager limits | Allowed recipients, channels, template choice, and opt-out for course managers. |

## Channels

| Setting | Purpose |
|---|---|
| Enable email channel | Toggle email delivery. |
| Enable Moodle message channel | Toggle in-app/mobile delivery. |
| Enable & configure webhook | URL and signing secret for the generic webhook. |
| Enable & configure Slack | Slack incoming webhook URL. |
| Enable & configure Microsoft Teams | Teams incoming webhook / workflow URL. |

## Delivery

| Setting | Purpose |
|---|---|
| Delivery batch size | How many queue items send per run. |
| Maximum retries | How many times a failed item is retried. |
| Retry delay | Wait between retries. |
| Log retention period | How long logs and finished queue items are kept (`0` = keep indefinitely). |
| Weekly digest day | The weekday weekly digests are sent. |
| Enable AI message generation | Allow AI-assisted drafting (requires Moodle AI). |

## Administration pages

Dashboard · Settings · Notification rules · Rule presets · Manage Email Templates · Manager mapping · Branding · Notification logs · Notification queue · Test delivery channels.

## Capabilities

| Capability | Context | Purpose |
|---|---|---|
| `local/modernenrolnotifier:manage` | Course | Manage course notification settings and course-scoped rules. |
| `local/modernenrolnotifier:managetemplates` | System | Manage templates, branding, and manager mappings. |
| `local/modernenrolnotifier:manageglobalrules` | System | Manage site-wide rules and presets. |
| `local/modernenrolnotifier:viewlogs` | System | View dashboard, queue, logs, and delivery data. |

## Privacy

The plugin implements Moodle's **Privacy API**, with export and deletion covering queue records, delivery logs, digest items, learner-to-manager mappings, course opt-outs, smart conditions, and messages sent through the message subsystem.

## Next steps

- [FAQ](/{{route}}/{{version}}/modern-enrolment-notifier/faq)
