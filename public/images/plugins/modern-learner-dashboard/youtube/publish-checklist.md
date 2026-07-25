# Modern Learner Dashboard — YouTube publish checklist

**Video:** `../motion-frames/modern-learner-dashboard-promo.mp4` (build it first from the storyboard) · **82.1s** · 1920×1080
**Kit:** `title.txt` · `description.txt` · `tags.txt` · `thumbnail.png` (render `thumbnail.html`) · `metadata.json`

> **No chapters** — an 82s ad can't meet YouTube's chapter rules (≥3 chapters, first at 0:00, each ≥10s). The description omits a timestamp block on purpose.

## Before upload
1. **Build the MP4** (Remotion or Claude Design brief) and drop it in `../motion-frames/`.
2. **Render the thumbnail:** open `thumbnail.html`, screenshot the 1280×720 `.tn` element → `thumbnail.png` (< 2 MB). (Playwright: `page.setViewportSize({width:1280,height:720})` → `locator('.tn').screenshot()`.)
3. **Anonymise:** confirm no real email/name is visible in the thumbnail screenshot (the `overview-hero.png` used is clean; if you swap in `profile-*`/`continue-learning`, re-check).

## YouTube Studio (studio.youtube.com → Create → Upload video)
1. Upload the MP4.
2. **Title** → paste line 1 of `title.txt`.
3. **Description** → paste all of `description.txt`.
4. **Thumbnail** → upload `thumbnail.png` (requires a verified channel).
5. **Audience** → "No, it's not made for kids."
6. **Show more:**
   - **Tags** → paste `tags.txt`
   - **Language** → English
   - **Category** → Education
   - **License** → Standard YouTube License
7. **Playlist** → "Modern Moodle Plugins" (create it if new).
8. **End screen** → Subscribe element + link to `https://agunfoninteractivity.com/plugins/modern-learner-dashboard` + "next video". **Card** → link the same page mid-roll.
9. **Visibility** → **Unlisted** first. Send the link for review.
10. After sign-off → **Public** (or Schedule). *Public is outward-facing — confirm before flipping.*
11. Post-publish → **pin a comment** with the Marketplace buy link + the agunfon details page.

## Optional API upload
Only if you provide Google OAuth credentials and explicitly ask: `references/upload-youtube.mjs` (YouTube Data API v3 `videos.insert` + `thumbnails.set`), driven by `metadata.json`. Needs a `token.json` refresh token (`youtube.upload` scope). ~1600 quota units/upload. `privacyStatus` in `metadata.json` is **unlisted** — leave it there until you approve going public.

## Pre-flight verify
- [ ] Title ≤ 100 chars, "Moodle" + "Learner Dashboard" in the first ~60 ✓ (59 chars)
- [ ] Description first line carries the hook + keyword ✓
- [ ] Every bullet traces to a real feature (fact sheet) ✓
- [ ] Links resolve (Marketplace `/plugins/73`; confirm the agunfon `/plugins/modern-learner-dashboard` page is live)
- [ ] Thumbnail exactly 1280×720, < 2 MB, ≤ 4 big words, legible small, anonymised
- [ ] `metadata.json` valid, `privacyStatus` = unlisted
- [ ] Made-for-kids = No
