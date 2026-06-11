# Recipients & Manager Mapping

## Recipient targets

A rule can send to:

- **Enrolled learner**
- **Course teachers**
- **Course managers**
- **Course contacts** (from Moodle's course contact configuration)
- **Learner's line manager**

> {info} Deleted, suspended, and guest users, and users without an email address, are **not** queued as notification subjects or normal recipients.

## Line-manager lookup

The learner's line manager can be resolved three ways:

| Method | How it works |
|---|---|
| **Manual mapping table** | A learner → manager table maintained in this plugin. |
| **Profile field** | A user profile field or core user field containing a manager identifier. |
| **Moodle role** | The Moodle **manager** role in the course context. |

Choose the method under **Settings → Manager mapping method**.

## Manager mapping page

The **Manager mapping** page lets you add learner-to-manager mappings and **bulk-import** them from CSV.

> {primary} If **Modern Course Reminder** is installed and exposes its manager-map table, this plugin **reuses that table** instead of maintaining duplicate mappings — the Manager mapping page then links to Modern Course Reminder.

## Next steps

- [Notification Rules](/{{route}}/{{version}}/modern-enrolment-notifier/rules)
- [Admin Settings Reference](/{{route}}/{{version}}/modern-enrolment-notifier/admin-settings)
