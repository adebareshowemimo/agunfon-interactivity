# Modern Learner Dashboard — Claude Design Build Brief

**What this is:** the [storyboard.md](storyboard.md) 17-scene film, packaged for **Claude Design** — i.e. built as **animated HTML/CSS** (Claude Artifacts, then captured to MP4). Creative source of truth stays `storyboard.md` §3; this file is the *how-to-hand-it-to-Claude-Design* layer — the recommended file architecture, the paste-ready token + recipe CSS, a per-scene prompt table, and the capture/assembly path.

- **Companions:** [cue-sheet.md](cue-sheet.md) (**authoritative timing — audio-aligned**) · [storyboard.md](storyboard.md) (creative) · [script.md](script.md) · [voiceover.txt](voiceover.txt)
- **Format:** 1920×1080 · **82.1s** (per `cue-sheet.md`) · 17 scenes · **Inter** · Web Animations API (WAAPI) driven so the film is *seekable* for a clean frame-accurate render.
- **Timing:** set each scene's master-timeline In–Out from `cue-sheet.md` §1 (it's aligned to the rendered VO); `storyboard.md`'s planned times are superseded.
- **Boundary:** building the video is *past* the promo-kit hand-off. This is the opt-in "build it with Claude Design" path.

---

## 0. Two ways to build with Claude Design (pick one)

**A) One `scenes.html` with a master timeline (recommended — matches the repo render harness).**
A single page holds all 17 `<section class="scene">` blocks stacked; a master WAAPI timeline shows/animates one scene at a time. This is what the repo's **`render-video.mjs` (WAAPI-seek → 1080p30 MP4)** pipeline expects — it *seeks* the timeline frame-by-frame (not rAF/virtual-time) and CDP-screenshots each frame, then ffmpeg-encodes. One file = one deterministic render. (This is exactly how the modern-course-reminder promo was built — see `motion-frames/scenes.html` there for a working reference.)

**B) One Artifact per scene (best for fast visual iteration).**
Ask Claude Design for 17 separate animated HTML scenes at 1920×1080. Iterate each in the Artifact preview, then screen-record or feed each into the harness. Easiest to art-direct; you stitch 17 clips in the edit. Good for review; consolidate into (A) for the final render.

> Start in **(B)** to lock the look scene-by-scene, then paste the approved scenes into one **(A)** `scenes.html` for the frame-accurate render.

## 1. The prompt to give Claude Design (per scene)
> "Build a single self-contained **animated HTML page, exactly 1920×1080**, no external requests (inline CSS, system/Inter font). Paste in the `:root` token block and the keyframe/WAAPI recipe classes I give you. Then build **Scene S05**: [paste that scene's block from `storyboard.md` §3 — Layout / Elements(hex) / Timeline / SFX / Out]. Drive motion with the **Web Animations API** on a single master timeline so the whole thing is **seekable** (I will render it by seeking, not by wall-clock playback). Expose `window.__seek(t)` that sets every animation's `currentTime`. For `[SHOT]` scenes, place `<img src="shots/NAME.png">` inside the browser-frame component and animate a slow ken-burns scale on it."

The `window.__seek(t)` contract is what lets the render harness step the film precisely. In `scenes.html` (approach A), the master timeline drives all scenes and `__seek` scrubs the whole film.

## 2. Paste-ready tokens (CSS)
```css
:root{
  --nav:#0A1830; --panel:#0E2240; --panel-brd:#24406B; --ink:#FFFFFF;
  --muted:#9FB3D1; --muted-2:#6B7A93; --card-off:#37455C;
  --brand1:#0F3D7A; --brand2:#4B8BE8; --green:#16B364; --coral:#F97316;
  --grad:linear-gradient(135deg,#0F3D7A,#4B8BE8);
  --e-expo:cubic-bezier(.16,1,.3,1); --e-back:cubic-bezier(.34,1.56,.64,1);
  --e-inout:cubic-bezier(.65,0,.35,1); --e-in:cubic-bezier(.55,0,1,.45);
}
html,body{margin:0;background:var(--nav);color:var(--ink);font-family:Inter,system-ui,sans-serif;}
.stage{width:1920px;height:1080px;position:relative;overflow:hidden;}
/* type: mega 220/800 · h1 88/700 · h2 52/600 · body 32/500 · kicker 24/600 up .08em */
```

## 3. Motion recipes (CSS keyframes + a WAAPI helper)
```css
@keyframes rise   {from{opacity:0;transform:translateY(28px)} to{opacity:1;transform:none}}
@keyframes pop    {from{opacity:0;transform:scale(.8)} to{opacity:1;transform:scale(1)}}
@keyframes fall   {from{opacity:1;transform:none} to{opacity:0;transform:translateY(-40px)}}
@keyframes breathe{0%,100%{transform:scale(1)} 50%{transform:scale(1.006)}}
.rise{animation:rise .55s var(--e-expo) both}
.pop {animation:pop .45s var(--e-back) both}
.breathe{animation:breathe 3s ease-in-out infinite}
/* DRAW: set stroke-dasharray:LEN; stroke-dashoffset:LEN; then animate offset→0 */
@keyframes draw{to{stroke-dashoffset:0}}
.draw{animation:draw .5s var(--e-expo) both}
/* ken-burns for [SHOT] images */
@keyframes ken{from{transform:scale(1)} to{transform:scale(1.04)}}
.ken{animation:ken 3.5s linear both}
```
```html
<!-- Master seekable timeline: build with WAAPI so __seek() can scrub every element -->
<script>
const anims = [];
function A(el, keyframes, opts){ const a = el.animate(keyframes, {...opts, fill:'both'}); a.pause(); anims.push({a, start:opts.delay||0}); return a; }
// COUNT helper (numbers): register a fake anim + update text on seek
const counters = []; // {el, from, to, start, dur}
window.__seek = (tMs) => {
  anims.forEach(({a,start}) => a.currentTime = Math.max(0, tMs - start));
  counters.forEach(c => { const p = Math.min(1, Math.max(0,(tMs-c.start)/c.dur)); c.el.textContent = Math.round(c.from + (c.to-c.from)*p); });
};
</script>
```
> The named recipes map 1:1 to `storyboard.md`: **RISE/POP/DRAW/COUNT/BREATHE/ken-burns** above; **SCATTER/ASSEMBLE** are per-scene WAAPI transforms (translate+rotate+`filter:saturate()`); **BROWSER-FRAME** and **CALLOUT** are the components in §4.

## 4. Shared components
- **BROWSER-FRAME** — rounded 16px card, dark 44px top bar with 3 traffic-light dots + a faux URL pill `…/my/`, shadow `0 40px 120px rgba(0,0,0,.5)`; the `<img>` inside gets `.ken`.
- **4-tile glyph** — four white rounded `<rect>`s (2×2 asymmetric bento) on a `--grad` rounded square; the logo lockup mark (S04/S14/S17).
- **Five "page" cards** — `--panel` cards with icon+label: Courses / Grades / Deadlines / Badges / Profile. They **SCATTER** in S02 and **ASSEMBLE** into the glyph in S04/S14.
- **Included checklist card** (S15) + **Marketplace CTA card** (S16) — see storyboard.

## 5. Per-scene build table
Full layout/hex/timeline for each is in **`storyboard.md` §3** — paste that block into the per-scene prompt. This is the quick index.

| Scene | Type | Build gist | Screenshot |
|-------|------|------------|-----------|
| S01 | F | login tap → busy clutter POPs; "…then what?" RISE | — |
| S02 | F | 5 cards RISE, then **SCATTER** to 5 corners on each VO word | — |
| S03 | F | cards → `--card-off`; avatar walks off; text RISE; **music drop** | — |
| S04 | F | **ASSEMBLE** cards → 4-tile glyph; wordmark RISE (gradient wipe-in) | — |
| S05 | SHOT | BROWSER-FRAME + `.ken`; 7 stat tiles COUNT/POP wave | `overview-hero.png` |
| S06 | SHOT | card cascade; progress bar fills 0→68%; "resume" CALLOUT | `continue-learning.png` |
| S07 | F+SHOT | search types "leadership"; filter POP; self-enrol CALLOUT | `course-library.png` |
| S08 | F+SHOT | date CALLOUT; "Due soon" pill flies out | `calendar.png` |
| S09 | F+SHOT | badge + certificate cards POP from dimmed overview | `overview-hero.png` (blur) |
| S10 | SHOT | transcript panel reveals; rows STAGGER; "Audit-ready" stamp | `my-courses-transcript.png` |
| S11 | SHOT | modal RISE; field-focus DRAW; Save toast POP | `profile-edit-modal.png` ⚠️ |
| S12 | F | 3 chips strike-through DRAW + ✗; "Core Moodle only" badge | — |
| S13 | F+SHOT | ring hops across theme tiles; 3 ✓ DRAW | `themes-compat.png` |
| S14 | F | lockup RISE; 5 cards **re-nest**; "home" underline DRAW | — |
| S15 | F | Included checklist — 4 checks DRAW; "Moodle 4.5–5.2" stamp | — |
| S16 | F | Marketplace search types; "Get it now" pulse | — |
| S17 | F | glyph BREATHE; nested cards shimmer; "one place" underline | — |

## 6. Screenshots
Put the renamed captures where the `<img src>` can reach them (e.g. a `shots/` folder next to `scenes.html`). Source: `ten-reasons/edited-deck-media/`.
- **ANONYMISE first:** `profile-edit-modal.png` **and** `profile-details.png` show a real gmail → re-seed to `learner@example.com`.
- `overview-hero.png` (S05) reads sparse (2 courses / 0%) — a richer re-capture is ideal; the COUNT animation covers it otherwise.
- Ideal extra captures: dedicated **Badges** + **Certificates** tabs (S09), and a **loading-spinner mid-load** if you want to literally show "fast".

## 7. Capture & assemble (hand-off ends here; this is the optional render)
Two routes to the final MP4:
1. **Repo WAAPI-seek harness** (recommended, frame-accurate): point `render-video.mjs` at `scenes.html`; it seeks `window.__seek(t)` per frame, CDP-screenshots at 1920×1080, and ffmpeg-encodes true **1080p30**. Then mux the audio:
   ```bash
   ffmpeg -i frames.mp4 -i audio/voiceover_music.mp3 -c:v copy -c:a aac -shortest mld-promo.mp4
   ```
2. **Screen-record** each Artifact (approach B), then ffmpeg-concat + mux `voiceover_music.mp3`.

**Gotchas (from the repo pipeline):** seek via WAAPI `currentTime`, **not** rAF/virtual-time; **warm the font** before the first capture (render a throwaway frame or wait for `document.fonts.ready`) or early frames render fontless; CDP screenshots need the stage pinned to exactly 1920×1080 with no scrollbars/DPR surprises.

## 8. Build order
1. Scaffold `scenes.html` with the token + recipe CSS, the `__seek` timeline, and the shared components (browser-frame, glyph, five cards, checklist, CTA).
2. Build the design-only scenes first — **S01–S04, S12, S14–S17** (the scatter→assemble emotional loop).
3. Add `[SHOT]`/`[F+SHOT]` scenes as assets land; **anonymise** the profile shots.
4. Wire the master timeline durations to the measured voiceover, then render via §7.
