# Reminder Rules

---

A **rule** decides *who* gets reminded, *when*, *how often*, and *on which channel*. Rules are evaluated on cron and matched learners are queued for sending.

- [Trigger](#trigger)
- [Scope — who it applies to](#scope)
- [Reminder target](#target)
- [Timing & repeat](#timing)
- [Channels](#channels)
- [Escalation](#escalation)
- [Preview & rule library](#preview)

<a name="trigger"></a>
## Trigger

The trigger is the condition that makes a learner eligible:

| Trigger | Fires when |
|---|---|
| **Course not completed** | The learner has not completed the course. |
| **Learner inactive** | No course access (or no progress) for a set number of days. |
| **Course deadline approaching/overdue** | Before, on, or after a deadline, repeating until completion. |
| **Enrolled but not started** | The learner enrolled but never accessed the course. |

<a name="scope"></a>
## Scope — who it applies to

A rule applies to one of:

- **A single course**
- **All courses in a category**
- **A cohort** (site-wide or category) — evaluated across every course the cohort's members are enrolled in
- **All courses (site-wide)**

<a name="target"></a>
## Reminder target

Choose what the rule chases:

- **Course completion** — the overall course completion state.
- **Specific activities** — one or more completion-tracked activities (multi-select). Learners keep receiving reminders until every selected activity is complete.

> {info} Only activities with **completion tracking enabled** can be targeted. If a course has none, the rule form tells you and links you to set it up.

<a name="timing"></a>
## Timing & repeat

| Setting | What it does |
|---|---|
| **Repeat every (days)** | Minimum gap before the same learner is reminded again. |
| **Maximum reminders** | Stop after this many reminders (0 = unlimited). |
| **Start / stop sending on** | Optional campaign window — the rule sends only between these dates. |
| **Daily send window** | Reminders only go out between these hours; items due outside it wait until the window next opens. |
| **Days after enrolment** | Only target learners whose enrolment is at least this old. |

<a name="channels"></a>
## Channels

Each rule can send by **email** and/or **Moodle notification**. These are further limited by the site-wide channel switches — a channel disabled site-wide is never used. See [Delivery & Queue](/{{route}}/{{version}}/modern-course-reminder/delivery-and-queue).

<a name="escalation"></a>
## Escalation

A rule can escalate a still-incomplete learner to their **line manager**. Set one or more conditions; the manager is notified as soon as **any** is met:

- **Escalate after (days overdue)**
- **Escalate after (number of reminders)**
- **Escalate after (date)** — a fixed compliance deadline

Leave a condition blank to ignore it. See [Manager Escalation](/{{route}}/{{version}}/modern-course-reminder/manager-escalation) for how managers are resolved.

<a name="preview"></a>
## Preview & rule library

- **Preview matched learners** shows who matches the rule right now, without sending anything.
- The **Rule library** offers ready-made starter blueprints (not started, incomplete, inactive, deadline, overdue-with-escalation). Each is created disabled and site-wide for you to adjust and enable.
