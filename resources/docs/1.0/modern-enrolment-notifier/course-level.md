# Course-Level Notifications

Users with the `local/modernenrolnotifier:manage` capability in a course get a course navigation link to **Modern Enrolment Notifier**.

## What course managers can do

From the course page they can:

- **Enable or disable** notifications for the course.
- Choose a **course default template**.
- Use a **custom course message** instead of a template.
- **Preview** the rendered email with sample data.
- View **site-wide or category rules** that apply to the course.
- **Disable or re-enable** applicable site-wide rules when opt-out is allowed.
- **Create and manage** rules scoped to that course.

## Administrator limits

Administrators can restrict the course-manager rule editor by configuring:

- Allowed **recipient targets**
- Allowed **channels**
- Whether course managers may **choose templates**
- Whether course managers may **opt out** of site-wide rules

> {info} Course-level rules are limited to **person-targeted channels** (`email` and `message`). Endpoint channels (webhook, Slack, Teams) are configured through site-wide rules only. Course-manager limits affect course-scoped rules, not site-wide rules.

## Next steps

- [Admin Settings Reference](/{{route}}/{{version}}/modern-enrolment-notifier/admin-settings)
