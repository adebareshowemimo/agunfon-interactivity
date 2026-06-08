# Video Sources

---

Modern Video Player can play video from several sources. The free edition plays Moodle-hosted uploads; **Premium** adds direct URLs, providers, and cloud storage. Each source has different tracking and protection capabilities, summarised below.

- [Source matrix](#matrix)
- [Uploaded video](#uploaded)
- [Direct URL](#direct)
- [YouTube & Vimeo](#providers)
- [Cloud storage (S3 & Azure)](#cloud)
- [Source guardrails](#guardrails)

<a name="matrix"></a>
## Source matrix

| Source | Edition | Signed URL | Watermark | Seek enforcement |
|---|:---:|:---:|:---:|:---:|
| Moodle upload | Free | Premium | Premium | ✅ |
| Direct MP4/WebM URL | Premium | — | Premium | ✅ |
| YouTube / Vimeo | Premium | n/a | limited | provider-limited |
| S3-compatible | Premium | ✅ | Premium | ✅ |
| Azure Blob | Premium | ✅ | Premium | ✅ |

<a name="uploaded"></a>
## Uploaded video

Upload an MP4/WebM directly into the activity. This is the most fully-featured source: full server-side tracking, and with Premium you can serve it through [signed URLs](/{{route}}/{{version}}/modern-video-player/content-protection) and overlay a learner watermark.

<a name="direct"></a>
## Direct URL *(Premium)*

Point the activity at a direct MP4/WebM link hosted outside Moodle. Useful when your video already lives on a CDN or file host. Tracking works the same as uploads; protection depends on whether the host supports the controls.

Enabled by the admin setting **Allow external sources**.

<a name="providers"></a>
## YouTube & Vimeo *(Premium)*

Paste a YouTube or Vimeo link and the player embeds and tracks it through the provider's API **where the provider allows it**. Provider sources are clearly labelled with their tracking/enforcement limits — for example, some enforcement controls that work on native video can't be guaranteed inside a provider player.

Enabled by the admin setting **Allow provider sources**.

<a name="cloud"></a>
## Cloud storage (S3 & Azure) *(Premium)*

Stream large libraries from object storage without exposing credentials to learners. At playback the plugin generates a **short-lived signed URL** (S3) or **read-only SAS URL** (Azure), so links can't be shared or reused after they expire.

**S3-compatible** providers supported: AWS S3, Cloudflare R2, Wasabi, DigitalOcean Spaces, Backblaze B2, MinIO, and other S3-compatible stores.

Configure under **Cloud storage** in the admin settings:

- S3: bucket, region, endpoint (for non-AWS), access key, secret.
- Azure: account, container, account key.
- Signed-URL lifetime: **Cloud URL TTL** (default 2 hours).

See the full field list in the [Admin Settings Reference](/{{route}}/{{version}}/modern-video-player/admin-settings).

<a name="guardrails"></a>
## Source guardrails

When a teacher picks a source that can't support a particular control, the activity form **warns them** rather than silently dropping the control. This keeps expectations honest: native Moodle-hosted video supports the strongest enforcement, while some provider sources are inherently more limited.
