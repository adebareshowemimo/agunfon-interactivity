# Channels & Delivery

## Delivery channels

### Email
Uses Moodle's `email_to_user()` with the rendered template subject/body. Enabled by default; can be disabled site-wide in Settings.

### Moodle in-app / mobile message
Sends through Moodle's Message API as an in-app and mobile notification. The plugin registers an `enrolment` message provider with popup enabled and email disallowed, so Moodle does not duplicate the separate email channel.

### Generic webhook
Sends one JSON `POST` per matched event to the configured URL. The payload includes event metadata, user/course identifiers, course URL, rendered subject, and rendered body. When a signing secret is configured, each request includes:

```text
X-MEN-Event: <event type>
X-MEN-Signature: sha256=<hmac>
```

The signature is an **HMAC-SHA256** hash of the raw JSON body.

### Slack
Posts to a Slack **incoming webhook** URL — a Markdown-style message with the rendered subject, plain-text body, and a course link when available.

### Microsoft Teams
Posts a **MessageCard** to a Teams incoming webhook / workflow URL, with the rendered subject, body, and a course action link when available.

### Channel testing
Use **Test delivery channels** (from Settings) to send a live test through configured endpoint channels before relying on them in rules.

## Queue

Notifications are stored in a queue before delivery. Queue records include event type, rule, learner, course, enrolment, recipient, channel, rendered snapshots, status, attempts, errors, and schedule time.

| Status | Meaning |
|---|---|
| `pending` | Waiting for its scheduled send time. |
| `sending` | Currently being delivered. |
| `sent` | Delivered successfully. |
| `failed` | Delivery failed (will retry within limits). |
| `cancelled` | Cancelled (e.g. enrolment removed, or manually). |

From the **queue** page (with log access) you can filter by status, **cancel** pending/sending items, **requeue** failed/cancelled items, and **export** to CSV.

## Retries & digests

- **Failed** items are retried according to `maxretries` and `retrydelay`.
- **Digest mode** stores matching events in a digest table instead of sending each immediately. Daily digests process every run of the digest task; weekly digests send only on the configured weekday.

## Scheduled tasks

Cron must be running. The plugin defines:

| Task | Default schedule | Purpose |
|---|---|---|
| `process_queue` | Every 5 minutes | Sends due pending queue items. |
| `retry_failed` | Hourly | Retries failed items within limits. |
| `cleanup_logs` | Daily 02:30 | Deletes old logs and finished queue items past retention. |
| `scan_expiry` | Daily 06:00 | Queues expiring and expired enrolment reminders. |
| `process_digest` | Daily 07:00 | Sends daily and weekly digest rollups. |

## Next steps

- [Dashboard & Logs](/{{route}}/{{version}}/modern-enrolment-notifier/dashboard-and-logs)
