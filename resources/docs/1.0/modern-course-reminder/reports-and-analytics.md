# Reports, Analytics & Health

---

Everything you need to see what was sent, what it achieved, and whether the engine is healthy.

- [Dashboard](#dashboard)
- [Effectiveness analytics](#analytics)
- [Reports](#reports)
- [Logs](#logs)
- [Report Builder](#reportbuilder)
- [Health check](#health)

<a name="dashboard"></a>
## Dashboard

The dashboard shows at-a-glance metric cards: **active rules**, **disabled rules**, **sent today**, **sent this week**, **pending in queue**, **failed reminders**, **overdue learners**, and **manager escalations** — plus recent activity.

<a name="analytics"></a>
## Effectiveness analytics

The **Reminder effectiveness** report answers "did it work?":

- **Learners reminded** and **reminders sent**
- **Completed after reminder**
- **Average days to complete**
- **Repeated reminders**

Figures are cached by the *Refresh completion snapshots* task; you can also refresh on demand.

<a name="reports"></a>
## Reports

Built-in reports include:

- **Reminder delivery log**
- **Overdue learners**
- **Inactive learners**
- **Rule performance**
- **Manager escalations**

<a name="logs"></a>
## Logs

**Reminder logs** is the full audit trail of every reminder, filterable by course, audience, channel, status and date, and **exportable to CSV**. Log retention is configurable (**Settings → Delivery and retries → Log retention**); set 0 to keep forever.

<a name="reportbuilder"></a>
## Report Builder

A **`reminder_logs`** datasource is provided for Moodle's core **Report Builder**, so you can build and schedule your own custom reports over the reminder delivery log.

<a name="health"></a>
## Health check

The **Health check** page runs diagnostics and shows OK / Warning / Problem for:

- **Cron** — when it last ran
- **Email delivery** — whether site email is enabled
- **Send queue** — pending count and oldest item age
- **Scheduled tasks** — failing/disabled counts
- **Manager mapping** — method and (if used) the configured profile field
- **Message templates** — learner/manager template counts
- **AI** — whether AI drafting is enabled and available

> {success} Run the Health check after install and whenever reminders aren't arriving — it usually pinpoints the cause (most often cron not running or email disabled site-wide).
