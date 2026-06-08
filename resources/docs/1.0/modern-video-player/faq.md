# FAQ

---

- [Which Moodle versions are supported?](#versions)
- [Can I upgrade from the free edition?](#upgrade)
- [How does protected delivery work?](#protection)
- [Is screen-capture deterrence DRM?](#drm)
- [Does it send data to our LRS?](#lrs)
- [Which cloud providers are supported?](#cloud)
- [Do scheduled features need cron?](#cron)
- [Is it really GPL?](#gpl)

<a name="versions"></a>
## Which Moodle versions are supported?

Moodle **4.5 through 5.2**. The current release is 1.18.2 (Stable).

<a name="upgrade"></a>
## Can I upgrade from the free Community edition?

Yes. Premium shares the same component (`mod_modernvideoplayer`) and carries a higher version, so you upgrade **in place**. Existing activities, files, progress, completion, gradebook entries, captions, bookmarks, reports, privacy data, and backup/restore data are all preserved. See [Installation & Upgrade](/{{route}}/{{version}}/modern-video-player/installation).

<a name="protection"></a>
## How does protected delivery work?

Uploaded and cloud videos are served through **user-bound, time-limited signed URLs**, with optional **dynamic learner watermarking** for supported sources — so credentials are never exposed and copies are traceable. See [Content Protection](/{{route}}/{{version}}/modern-video-player/content-protection).

<a name="drm"></a>
## Is the screen-capture deterrence DRM?

No. It's **best-effort browser heuristics** (PrintScreen, hidden tab, focus loss, context menu) recorded in a tamper-evident, hash-chained audit log. It is deterrence and evidence, **not DRM**.

<a name="lrs"></a>
## Does it send data to our LRS?

Yes, if you enable it. Premium emits **xAPI / cmi5-style statements** to an external LRS for initialized, completed, and flagged events, with asynchronous retry. See [Exports & Integrations](/{{route}}/{{version}}/modern-video-player/exports-and-integrations).

<a name="cloud"></a>
## Which cloud providers are supported?

**S3-compatible:** AWS S3, Cloudflare R2, Wasabi, DigitalOcean Spaces, Backblaze B2, MinIO, and other S3-compatible stores. Also **Azure Blob Storage**. All are served via short-lived signed URLs. See [Video Sources](/{{route}}/{{version}}/modern-video-player/video-sources).

<a name="cron"></a>
## Do scheduled features need cron?

Yes. Instructor digests and asynchronous xAPI delivery run on **Moodle cron**, so cron must be configured and running.

<a name="gpl"></a>
## Is it really GPL? Can we modify it?

Yes — **GNU GPL v3 or later**. You're free to modify it for your own installation.
