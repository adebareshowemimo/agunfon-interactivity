# Dashboard & Logs

## Dashboard

The dashboard summarises delivery health:

- **Sent** notifications in the last 30 days
- **Failed** notifications in the last 30 days
- **Pending** queue items
- **Failed** queue items
- **Pending digest** items
- Enrolments **expiring in 7 days**
- **Active rules**
- Breakdown by **event, channel, and status**
- **Recent delivery activity**

It also links to logs, queue, rules, and CSV exports.

## Delivery logs

Every send attempt writes a delivery log row with status, subject, body, channel, recipient email, event type, course, and error details when available. Logs can be **filtered** and **exported to CSV**.

> {info} The rendered subject/body is stored on the queue and log record as an **audit snapshot** — what you see in the log is exactly what was sent.

## Exports

Both the **queue** and the **logs** can be exported to CSV for audit or reporting.

## Next steps

- [Course-Level Notifications](/{{route}}/{{version}}/modern-enrolment-notifier/course-level)
- [Admin Settings Reference](/{{route}}/{{version}}/modern-enrolment-notifier/admin-settings)
