# Modern Video Player — Overview

---

- [What it is](#what-it-is)
- [Community vs Premium](#community-vs-premium)
- [How tracking works](#how-tracking-works)
- [Where to go next](#next)

<a name="what-it-is"></a>
## What it is

**Modern Video Player** (`mod_modernvideoplayer`) is a Moodle **activity module** for tracked video learning. Unlike a plain YouTube embed or an uploaded file, it is a controlled activity that validates *who* watched, *how much* they watched, and *whether* viewing was genuine — all server-side.

The **Premium edition** is a commercial superset of the free Community edition. It keeps every free feature and adds engagement analytics, protected delivery, cloud and provider sources, branded player skins, audit-ready exports, and standards integrations (xAPI/cmi5 and LTI 1.3).

> {primary} Premium shares the **same component name** as the free edition (`mod_modernvideoplayer`), so you can upgrade in place. Every activity, file, progress record, completion, grade, caption, bookmark, report, and backup is preserved. See [Installation & Upgrade](/{{route}}/{{version}}/modern-video-player/installation).

<a name="community-vs-premium"></a>
## Community vs Premium

| Capability | Community (free) | Premium |
|---|:---:|:---:|
| Tracked HTML5 playback, completion & gradebook | ✅ | ✅ |
| Captions, transcript, chapters, resume, bookmarks | ✅ | ✅ |
| Integrity: seek enforcement, validated watched segments | ✅ | ✅ |
| Backup/restore, Privacy API, Moodle events | ✅ | ✅ |
| Direct URL, YouTube & Vimeo sources | — | ✅ |
| S3 / Azure cloud storage via signed URLs | — | ✅ |
| Signed URLs + dynamic learner watermarking | — | ✅ |
| Engagement heatmap, retention curve & rewatch intensity | — | ✅ |
| Cohort dashboard & multi-format audit export | — | ✅ |
| Scheduled instructor digests | — | ✅ |
| xAPI / cmi5 to an external LRS | — | ✅ |
| LTI 1.3 publishing | — | ✅ |

Premium **never paywalls** core learning, accessibility, privacy, integrity, or backup/restore — those stay free.

<a name="how-tracking-works"></a>
## How tracking works

The player reports progress to the server during playback (a "heartbeat"). The server **merges and validates** watched intervals, enforces seek and playback-rate limits, and records suspicious-event and integrity-failure counters. Completion and gradebook results are derived from these validated watched segments — not from client-side claims — so reports stand up to scrutiny.

<a name="next"></a>
## Where to go next

- [Requirements](/{{route}}/{{version}}/modern-video-player/requirements)
- [Installation & Upgrade](/{{route}}/{{version}}/modern-video-player/installation)
- [Quick Start for teachers](/{{route}}/{{version}}/modern-video-player/quick-start)
- [Admin Settings Reference](/{{route}}/{{version}}/modern-video-player/admin-settings)
