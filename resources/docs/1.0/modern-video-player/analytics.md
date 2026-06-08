# Analytics & Reporting *(Premium)*

---

Premium turns validated watch data into insight — for a single activity and across your whole site.

- [Per-activity report](#report)
- [Engagement heatmap](#heatmap)
- [Audience-retention curve](#retention)
- [Rewatch intensity](#rewatch)
- [Cohort dashboard](#cohort)
- [Scheduled instructor digests](#digests)

<a name="report"></a>
## Per-activity report

Every activity has a report showing per-learner completion, watch coverage, suspicious-event counts, and integrity-failure counts. The free edition includes this report plus a basic CSV export; Premium adds the visual analytics below and [multi-format audit export](/{{route}}/{{version}}/modern-video-player/exports-and-integrations).

All analytics are built from **server-validated watched segments** — not client-side guesses.

<a name="heatmap"></a>
## Engagement heatmap

Shows how many distinct learners watched each part of the timeline, so you can see which moments hold attention and which are skipped. Enabled by **Enable heatmap** (on by default).

<a name="retention"></a>
## Audience-retention curve

Plots where learners drop off across the video — the classic retention curve. Use it to find the exact point attention falls away, then trim or re-order content.

<a name="rewatch"></a>
## Rewatch intensity

Highlights sections learners replay more than once — usually a signal of either high value or genuine confusion worth clarifying.

<a name="cohort"></a>
## Cohort dashboard

A **site-level** dashboard aggregating engagement across courses and activities, with an optional **cohort filter**. Find it under:

**Site administration → Reports → Modern video player cohort dashboard**

Access is controlled by the capability `mod/modernvideoplayer:viewcohortdashboard`. Enabled by **Enable cohort dashboard** (on by default).

<a name="digests"></a>
## Scheduled instructor digests

A scheduled task emails engagement/completion summaries to instructors.

- Enabled by **Enable instructor reports** (off by default).
- Default schedule: **weekly, Monday 07:00** — adjustable in *Site administration → Server → Tasks → Scheduled tasks*.

> {info} Digests and other scheduled features require **Moodle cron** to be running.
