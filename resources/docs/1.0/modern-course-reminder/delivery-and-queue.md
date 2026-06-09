# Delivery, Queue & Campaigns

---

How reminders actually get sent: channels, the queue, the scheduled tasks, retries, digests, manual sends, and campaigns.

- [Channels](#channels)
- [The queue](#queue)
- [Scheduled tasks](#tasks)
- [Retries & throttling](#retries)
- [Manager digests](#digests)
- [Manual send](#manual)
- [Scheduled campaigns](#campaigns)

<a name="channels"></a>
## Channels

Two channels ship in this release: **email** and **Moodle notification**. Each rule chooses which to use, gated by the site-wide switches (**Settings → Channels**). A channel disabled site-wide is never used, even if a rule requests it.

<a name="queue"></a>
## The queue

When rules are evaluated, matched learners become per-recipient **queue items**. The queue **de-duplicates** so a learner is never sent the same reminder twice within a rule's cadence. Open **Reminder queue** to see pending/sent/failed/cancelled items and to **cancel** or **requeue** individual items.

<a name="tasks"></a>
## Scheduled tasks

The engine is a set of Moodle scheduled tasks (all configurable under *Site administration → Server → Tasks*):

| Task | Default schedule | Purpose |
|---|---|---|
| Evaluate reminder rules | every 30 min | Find matching learners. |
| Build reminder queue | every 15 min | Enqueue items, including scheduled campaigns. |
| Send queued reminders | every 5 min | Deliver due items. |
| Retry failed reminders | hourly | Re-attempt failures. |
| Send digest notifications | daily 07:00 | Batch manager/admin digests. |
| Clean up old reminder logs | daily 02:30 | Prune logs past retention. |
| Refresh completion snapshots | hourly | Cache analytics data. |

> {warning} Nothing is sent unless **cron is running**. The [Health check](/{{route}}/{{version}}/modern-course-reminder/reports-and-analytics) reports when cron last ran.

<a name="retries"></a>
## Retries & throttling

- **Maximum reminders per cron run** caps how many items each send pass processes (0 = unlimited).
- **Maximum retries** and **retry delay** control how failures are re-attempted before being abandoned.

<a name="digests"></a>
## Manager digests

Instead of one email per overdue learner, managers can receive a **batched digest** — daily, weekly, or monthly (**Settings → Channels → Digest frequency**). The digest lists the manager's overdue team members in one message.

<a name="manual"></a>
## Manual send

**Send reminder now** is a one-off, on-demand send for a course. Choose the audience (all enrolled / not completed / not started), then **preview recipients** — both the **eligible** list and the **skipped** list with reasons (no email, suspended, opted out, exempt) — and see an email preview before confirming.

<a name="campaigns"></a>
## Scheduled campaigns

**Scheduled campaigns** run a send once or on a recurring schedule (daily / weekly / monthly) at a chosen time, handled by the build-queue task.
