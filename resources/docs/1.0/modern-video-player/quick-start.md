# Quick Start (Teachers)

---

This guide walks a teacher through adding a tracked video activity and choosing how it behaves. It assumes an administrator has already installed the plugin and enabled the Premium features you want to use.

- [Add the activity](#add)
- [Choose a video source](#source)
- [Set tracking & completion](#tracking)
- [Pick a player skin](#skin)
- [Review learner progress](#review)

<a name="add"></a>
## 1. Add the activity

1. Turn on **Edit mode** in your course.
2. In the section where you want the video, click **Add an activity or resource**.
3. Choose **Modern Video Player**.
4. Give it a **name** and (optionally) a description.

<a name="source"></a>
## 2. Choose a video source

In the activity form, pick where the video comes from. Available options depend on what your administrator enabled:

- **Uploaded video** — upload an MP4/WebM into the activity (optionally protected with [signed URLs](/{{route}}/{{version}}/modern-video-player/content-protection)).
- **Direct URL** — a direct link to an MP4/WebM file *(Premium)*.
- **YouTube / Vimeo** — paste a provider link *(Premium)*.
- **Cloud storage** — a video held in your S3 or Azure bucket, served via short-lived signed URLs *(Premium)*.

See [Video Sources](/{{route}}/{{version}}/modern-video-player/video-sources) for the full matrix and tracking limits per source.

> {info} If you pick a source that can't support a control (for example, a provider that limits seek enforcement), the form will warn you. These are the **source guardrails**.

<a name="tracking"></a>
## 3. Set tracking & completion

- **Required watch percentage** — how much of the video counts as "watched" (site default is 95%).
- **Completion** — complete on validated watch coverage and/or on reaching the end.
- **Gradebook** — optionally push watched percentage to the gradebook.
- **Playback rules** — resume, allowed playback speed, autoplay, captions, and Focus Mode.

These start from the site defaults your admin set, and you can override them per activity.

<a name="skin"></a>
## 4. Pick a player skin *(Premium)*

If player styles are enabled, choose a skin — classic, YouTube, Vimeo, Netflix, Plyr, Apple, or minimal. The tracking and enforcement engine is identical across skins; only the look changes. See [Player Skins](/{{route}}/{{version}}/modern-video-player/player-skins).

<a name="review"></a>
## 5. Review learner progress

Open the activity and use the **report** to see per-learner completion, watch coverage, and integrity flags. With Premium you also get the [engagement heatmap and retention analytics](/{{route}}/{{version}}/modern-video-player/analytics).
