# Modern Video Player — YouTube publish checklist

**Video:** the finished MP4 you build with Claude Design from `storyboard.md` + `audio-timeline.md` + `voiceover_music.mp3` (1920×1080, ~73s).

## Manual upload (YouTube Studio → Create → Upload video)
1. Upload the MP4.
2. **Title** — paste line 1 of `title.txt`.
3. **Description** — paste `description.txt`. Fix the **Moodle Marketplace link** to the real plugin URL/id once listed.
4. **Thumbnail** — upload `thumbnail.png` (generate it from `thumbnail-prompt.txt`; requires a verified channel).
5. Audience: **"No, it's not made for kids."**
6. Show more → **Tags** (paste `tags.txt`) · **Language = English** · **Category = Education**.
7. Add to **playlist**: "Modern Moodle Plugins".
8. **End screen**: Subscribe + link to https://agunfoninteractivity.com/plugins/modern-video-player + "next video". **Card**: link the site.
9. **Visibility: Unlisted** first → review → then **Public** (or Schedule).
10. After publish: **pin a comment** with the Marketplace + agunfon links.

## Before it goes public
- ⚠️ **Anonymise** `learner-report.png` (real gmail) and use a fake watermark identity ("Ada Bello · ada@acme.edu") in the video.
- Confirm the **Moodle Marketplace** URL/id for Modern Video Player (the description + `metadata.json` use a placeholder).
- **Do NOT flip to Public** without your explicit go-ahead.

## No chapters
A ~73s ad can't meet YouTube's chapter rules (≥3 chapters, first at 0:00, each ≥10s) — the description omits them.

## Optional API upload
`references/upload-youtube.mjs` (YouTube Data API v3) once you have OAuth creds: paste `description.txt` into `metadata.json`'s `description`, set the real `video` path, then `node upload-youtube.mjs upload "<this youtube folder>"`. Uploads Unlisted per `privacyStatus`.
