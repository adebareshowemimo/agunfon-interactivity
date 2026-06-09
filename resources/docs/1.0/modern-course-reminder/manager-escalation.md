# Manager Escalation

---

When a learner stays incomplete, Modern Course Reminder can notify their **line manager**. This page covers how a manager is resolved and how to set it up.

- [How a manager is resolved](#resolve)
- [Mapping methods](#methods)
- [Manual mapping & CSV import](#manual)
- [Escalation conditions](#conditions)

<a name="resolve"></a>
## How a manager is resolved

Escalation must be enabled site-wide (**Settings → Manager escalation → Enable manager escalation**), and each rule sets its own escalation conditions. When a condition is met, the plugin looks up the learner's manager using the configured **mapping method** and sends the manager template.

<a name="methods"></a>
## Mapping methods

Choose one method in **Settings → Manager escalation → Manager mapping method**:

| Method | How it works |
|---|---|
| **Moodle manager role** | Uses users assigned the manager role in the relevant context. |
| **Custom profile field** | A field on the *learner's* profile holds an identifier of their manager. |
| **Manual mapping table** | An explicit learner → manager table you maintain (with optional CSV import). |

### Custom profile field

The plugin auto-creates a text profile field with short name `linemanager`. Store each learner's manager identifier in it, then set **Profile field contains** to whether that value is the manager's **email**, **username**, or **ID number**.

> {warning} A yes/no field will not work — the field must say *which* manager a learner reports to. If you would rather not maintain per-learner values, use the manager-role or manual-table method instead.

<a name="manual"></a>
## Manual mapping & CSV import

Open **Manager mapping** to map learners to managers by hand, or **Bulk import** a CSV with `learneremail`, `manageremail`, and an optional `courseshortname` column. A downloadable CSV template is provided.

> {info} Course-specific mappings take precedence over organisation-wide ones, so you can override a learner's manager for a particular course.

<a name="conditions"></a>
## Escalation conditions

On each rule, set one or more conditions (any-of):

- **Days overdue** — notify the manager once the learner is this many days past the deadline (or past the first reminder / enrolment if there is no course end date).
- **Number of reminders** — notify once the learner has received at least this many reminders but is still incomplete.
- **Date** — notify for any learner still incomplete once a fixed date has passed.

Escalations are recorded and appear in the **Manager escalations** report. See [Reports & Analytics](/{{route}}/{{version}}/modern-course-reminder/reports-and-analytics).
