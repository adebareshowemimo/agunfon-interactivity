# Admin Settings Reference

---

All settings live at **Site administration → Plugins → Activity modules → Modern video player**. Defaults below match the shipped plugin. Premium feature groups are marked *(Premium)*.

- [Activity defaults](#defaults)
- [Premium analytics](#analytics)
- [Content protection](#protection)
- [Player appearance](#appearance)
- [Source policy](#sources)
- [Scheduled reports](#reports)
- [Cloud storage](#cloud)
- [Standards & integration](#standards)

<a name="defaults"></a>
## Activity defaults

These set the starting values for new activities; teachers can override most per activity.

| Setting | Default | Notes |
|---|---|---|
| Default required percent | 95 | Watch coverage that counts as complete. |
| Default heartbeat interval | 15 | Seconds between progress reports. |
| Default grace seconds | 3 | Tolerance for validation. |
| Allow playback speed | On | Let learners change speed. |
| Max playback speed | 1.25 | Upper speed limit. |
| Resume enabled | On | Resume from last validated position. |
| Allow next-activity overlay | On | End-of-video "next" prompt. |
| Fullscreen enabled | On | |
| Autoplay | Unmuted | off / muted / unmuted. |
| Allow captions | On | |
| Default caption language | en | |
| Show primary / secondary nav | On | Page chrome around the player. |
| Show course index | On | |
| Show right blocks | On | |
| Title position | Left | left / center / right / hidden. |
| Show control text | On | |
| Suspicious logging | On | Record suspicious playback events. |

<a name="analytics"></a>
## Premium analytics *(Premium)*

| Setting | Default | Notes |
|---|---|---|
| Enable heatmap | On | [Heatmap, retention, rewatch](/{{route}}/{{version}}/modern-video-player/analytics). |
| Enable audit export | On | [Multi-format exports](/{{route}}/{{version}}/modern-video-player/exports-and-integrations). |
| Enable cohort dashboard | On | Site-level dashboard under Reports. |

<a name="protection"></a>
## Content protection *(Premium)*

| Setting | Default | Notes |
|---|---|---|
| Enable watermark | On | Dynamic learner watermark. |
| Default watermark | Off | off / name / email / name+email. |
| Enable capture deterrence | Off | Best-effort heuristics. |
| Default capture deterrence | Off | Per-activity default. |

See [Content Protection](/{{route}}/{{version}}/modern-video-player/content-protection).

<a name="appearance"></a>
## Player appearance *(Premium)*

| Setting | Default | Notes |
|---|---|---|
| Enable player styles | On | Turns on the skin picker. |
| Default player style | Classic | See [Player Skins](/{{route}}/{{version}}/modern-video-player/player-skins). |

<a name="sources"></a>
## Source policy *(Premium)*

| Setting | Default | Notes |
|---|---|---|
| Allow external sources | On | Direct MP4/WebM URLs. |
| Allow provider sources | On | YouTube / Vimeo. |
| Enable signed URLs | Off | User-bound, time-limited links. |
| Signed URL TTL | 2 hours | Lifetime of a signed link. |

<a name="reports"></a>
## Scheduled reports *(Premium)*

| Setting | Default | Notes |
|---|---|---|
| Enable instructor reports | Off | Weekly digest (Mon 07:00, adjustable). Requires cron. |

<a name="cloud"></a>
## Cloud storage *(Premium)*

| Setting | Default | Notes |
|---|---|---|
| Enable cloud sources | Off | S3 / Azure playback. |
| Cloud URL TTL | 2 hours | Signed playback-link lifetime. |

**S3-compatible connection:** bucket, region (default `us-east-1`), endpoint (for non-AWS stores like R2/Wasabi/MinIO), access key, secret.

**Azure Blob connection:** account, container, account key.

> {warning} Store least-privilege (ideally read-only) credentials and rotate them periodically.

<a name="standards"></a>
## Standards & integration *(Premium)*

| Setting | Default | Notes |
|---|---|---|
| Enable xAPI | Off | Emit statements to an LRS. |
| LRS endpoint / username / password | — | External Learning Record Store. |
| Enable LTI publishing | On | LTI 1.3 / LTI Advantage. |

See [Exports & Integrations](/{{route}}/{{version}}/modern-video-player/exports-and-integrations).
