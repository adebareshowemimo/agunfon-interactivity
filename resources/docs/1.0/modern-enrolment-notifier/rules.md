# Notification Rules

Rules define what happens when an enrolment event matches. They are evaluated **highest priority first**, and all of a rule's smart conditions must pass.

## Triggers

The plugin observes Moodle events and runs scheduled scans:

| Trigger | Source |
|---|---|
| `enrolment_created` | `user_enrolment_created` event |
| `enrolment_expiring` | scheduled expiry scan (days **before** end date) |
| `enrolment_expired` | scheduled expiry scan (after end date) |
| `course_completed` | `course_completed` event |

When an enrolment is deleted (`user_enrolment_deleted`), still-pending queue items for that enrolment are **cancelled**.

## What a rule configures

| Field | Options |
|---|---|
| Name & enabled state | — |
| Event type | `enrolment_created`, `enrolment_expiring`, `enrolment_expired`, `course_completed` |
| Scope | **global** (all courses), **category** (one category), **course** (one course) |
| Enrolment method filter | e.g. `manual`, `self` |
| Recipient target | learner, teachers, managers, course contacts, line manager |
| Template | specific template, or fall back to course/global default |
| Channels | one or more delivery channels |
| Delay | wait before sending |
| Days before expiry | for expiry-reminder rules |
| Digest mode | off, daily, or weekly |
| Priority | evaluated highest first |
| Smart conditions | all must pass |

## Deduplication

Rules are deduplicated per **learner, course, event, enrolment, channel, recipient, and rule**. Re-firing the same event for the same enrolment does not create duplicate sends, while a later **re-enrolment** can create a new notification.

## Smart conditions

Conditions narrow who a rule applies to. They can match on:

- User fields and **custom profile fields**
- **Cohort** membership
- **Completion** state
- **First course access**

## <a name="presets"></a>Built-in presets

The **Presets** page pre-fills the Add rule form with starter rules. Nothing is created or sent until you **review and save**:

- Learner welcome
- Teacher alert on new enrolment
- Expiry reminder 7 days before enrolment end
- Expiry reminder 1 day before enrolment end
- Course completion congratulations
- Manager weekly enrolment digest

## Next steps

- [Recipients & Manager Mapping](/{{route}}/{{version}}/modern-enrolment-notifier/recipients-and-managers)
- [Templates & Branding](/{{route}}/{{version}}/modern-enrolment-notifier/templates)
