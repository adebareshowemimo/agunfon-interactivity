# Content Protection *(Premium)*

---

Premium adds layered protection and audit evidence around your video. These features are **deterrence and evidence**, not DRM — see the honest note below.

- [Signed URLs](#signed)
- [Dynamic learner watermark](#watermark)
- [Screen-capture deterrence](#capture)
- [Tamper-evident audit log](#audit-log)
- [What this is *not*](#not-drm)

<a name="signed"></a>
## Signed URLs

Uploaded and cloud videos can be served through **user-bound, time-limited signed URLs**. Each playback link is tied to the viewing learner and expires after a set lifetime, so links can't be shared or reused.

Admin settings:

- **Enable signed URLs** (off by default).
- **Signed URL TTL** — how long a link stays valid (default 2 hours).
- For cloud sources, the separate **Cloud URL TTL** applies.

<a name="watermark"></a>
## Dynamic learner watermark

Overlay learner-identifying text on the video so any captured copy is traceable back to a person.

- **Enable watermark** (on by default at site level).
- **Default watermark content:** off, name, email, or **name + email**.

Watermarking is supported on the source types listed in [Video Sources](/{{route}}/{{version}}/modern-video-player/video-sources).

<a name="capture"></a>
## Screen-capture deterrence

Best-effort browser heuristics detect signals associated with screen capture and inattention — **PrintScreen**, hidden/background tab, focus loss, and context-menu use — and record them as events.

- **Enable capture deterrence** (off by default).
- **Default capture deterrence** per activity (off by default).

<a name="audit-log"></a>
## Tamper-evident audit log

Capture-deterrence events are written to a **hash-chained audit table**, so any later alteration of the records is detectable. These events are included in [audit exports](/{{route}}/{{version}}/modern-video-player/exports-and-integrations) and are covered by the plugin's Privacy API provider.

<a name="not-drm"></a>
## What this is *not*

> {warning} Screen-capture deterrence is **best-effort browser heuristics**, not DRM. It discourages and *evidences* copying — it does not make screen recording impossible. True DRM (Widevine/FairPlay/PlayReady) is a separate enterprise roadmap track and is **not** part of the current package.
