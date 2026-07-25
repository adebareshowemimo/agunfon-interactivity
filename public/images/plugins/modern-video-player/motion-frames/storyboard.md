# Modern Video Player (Premium) — Storyboard & Claude Animation Build Brief

**Purpose:** an executable animation spec. Each of the 20 scenes is described precisely enough to build as a self-contained **animated 1920×1080 HTML/CSS scene** — exact layout, hex, typography, and a second-by-second motion timeline. Cuts land on the beat unless a transition is named. Same design system as `modern-course-reminder` so the catalogue reads as one series.

- **Companion files:** [script.md](script.md) · [voiceover.txt](voiceover.txt) (audio source of truth).
- **Runtime:** **72.9s** — word-level audio-aligned; **[audio-timeline.md](audio-timeline.md) has the exact per-scene timecodes and is authoritative** (the times in §3 below are the original design estimates). **20 scenes.**
- **Cardinal rule:** every on-screen claim traces to the code / `docs/premium-features.md`. No invented features.
- **Structure:** three pillars — **Track** (blue) · **Protect** (coral) · **Prove** (green). No em-dashes in any VO.

---

## 0. How to build (for Claude)

Author each scene as one animated HTML page at `1920×1080` using **Inter** + the token block in §2 (CSS `@keyframes` / Web Animations). `[SHOT]` scenes composite the real screenshots from §5 in an animated browser frame; `[F+SHOT]` animate designed overlays on a dimmed screenshot; `[F]` are pure design.

**Motion principles:** one idea per scene (the VO line is the job) · enter→emphasise→hold→exit · fast but not frantic (entrances ~0.45–0.55s, cuts on the beat) · **colour = meaning** (blue = the product tracking, coral = protection/at-risk, green = proof/success) · the three pillar title cards (Track/Protect/Prove) are the spine.

---

## 1. Story arc & music map

| Act | Scenes | Feel | Music |
|-----|--------|------|-------|
| **Hook / blind after upload** | 01–03 | uneasy, losing control | tense pulse → **near-silence on "Moodle just… plays it."** |
| **The turn** | 04–05 | relief, product enters | warm re-entry, confident |
| **Track / Protect / Prove** | 06–16 | kinetic, competent, building | steady driving bed, a lift at each pillar title |
| **Close / CTA** | 17–20 | assured, uplifting | swell into 17 → resolve on the sign-off sting |

Transitions: default **hard cut on beat**. Special: **gradient wipe** into S04 (the turn) and into S17 (the close); **push-up** between pillar sub-scenes.

---

## 2. Shared design tokens (drop into every scene)

```css
:root{
  --nav:#0A1830; --nav-deep:#060D1A; --panel:#0E2240; --panel-2:#12294C;
  --brd:#24406B; --ink:#FFFFFF; --muted:#9FB3D1; --muted-2:#6B7A93; --dot-off:#37455C;
  --brand1:#0F3D7A; --brand2:#4B8BE8;         /* TRACK accent */
  --coral:#F97316;                            /* PROTECT accent */
  --green:#16B364;                            /* PROVE accent   */
  --grad:linear-gradient(120deg,#0F3D7A,#4B8BE8);
  --e-expo:cubic-bezier(.16,1,.3,1); --e-back:cubic-bezier(.34,1.56,.64,1);
  --e-inout:cubic-bezier(.65,0,.35,1); --e-in:cubic-bezier(.55,0,1,.45);
}
/* type: Inter. mega 240/900 · h1 88/800 · h2 56/700 · body 32/500 · kicker 24/600 up .16em */
```

**Reusable motion recipes (by name):** **RISE** (opacity0→1, y28→0, .55s e-expo) · **POP** (scale.8→1, .45s e-back) · **DRAW** (SVG stroke-dashoffset→0) · **COUNT** (number roll, easeOut) · **BROWSER-FRAME** (screenshot in rounded 16px chrome, 3 dots, soft shadow, slow ken-burns scale 1→1.04) · **CALLOUT** (3px rounded rect draws around a UI region + label pill) · **BREATHE/float** (held heroes).

**Hero glyph:** a rounded-rect **video/camcorder** mark with a play triangle (teal→brand-blue), matching the plugin's own icon. Pillar title cards use the pillar accent colour.

---

## 3. The 20 scenes

> Format — **ID · time · type** · *VO* → **Layout** / **Timeline** (t = s from scene start) / **SFX** / **Out**.

### S01 · 0:00–0:03 · [F] — *"You hit upload."*
**Layout:** navy; centre an **Upload** pill with a progress bar, and a video thumbnail tile beside a Moodle activity row.
**Timeline:** 0.0 bg fade; 0.2 progress bar fills 0→100% then a green ✔ **POP**; 0.6 the video tile **RISE** into the activity row; hold, tile **BREATHE**.
**SFX:** soft upload swoosh + confirm tick. **Out:** hard cut.

### S02 · 0:03–0:07 · [F] — *"Who watched it? Did they skip to the end? Did it leak?"*
**Layout:** the video tile centre; three question chips stab in around it: 👁 **"Watched?"** (`--coral`) · ⏩ **"Skipped?"** (`--coral`) · 🔓 **"Leaked?"** (`--coral`); a huge faint **"?"** behind.
**Timeline:** chips **POP** at 0.3 / 1.4 / 2.5 (one per question), each with a small uncertainty shake; the "?" pulses.
**SFX:** three uneasy stabs. **Out:** cut, **music drops toward silence.**

### S03 · 0:07–0:10 · [F+SHOT] — *"Moodle just… plays it."*
**Layout:** `player-view.png` in **BROWSER-FRAME**, **desaturated**; a flat grey "— no data —" bar under it.
**Timeline:** 0.0 frame fades in greyed; 0.6 the flat "no data" line draws; lower-third "Moodle just… plays it." fades. Stark hold.
**SFX:** a hollow low tone. **Out:** **gradient WIPE** into S04, music re-enters warm.
**Asset:** `player-view.png` (rendered desaturated).

### S04 · 0:10–0:14 · [F] — *"…an activity you can track, protect, and prove."*
**Layout:** brand-gradient glow; hero **video glyph** + wordmark **"Modern Video Player"**; three pillar chips light up: **TRACK** (`--brand2`) · **PROTECT** (`--coral`) · **PROVE** (`--green`).
**Timeline:** wipe completes; 0.3 glyph **DRAW**; 0.6 wordmark **RISE** (letters stagger); 1.0 / 1.3 / 1.6 the three pillar chips **POP** in their colours.
**SFX:** warm swell + three bright ticks. **Out:** push-up.

### S05 · 0:14–0:16 · [F] — *"Track it."*
**Layout:** big **"TRACK IT"** (`--brand2`) + an eye/▶ motif; blue underline draws.
**SFX:** whoosh. **Out:** match-cut into the real UI.

### S06 · 0:16–0:19 · [SHOT] — *"Now you see exactly how every learner watches. An engagement heatmap."*
**Asset:** `heatmap.png` in **BROWSER-FRAME**. **Timeline:** frame **RISE** + ken-burns; 0.8 **CALLOUT** around "Viewers per moment", label **"Engagement heatmap"**. **Out:** hard cut.

### S07 · 0:19–0:23 · [F] — *"A retention curve that reveals where they drop off."*
**Layout:** designed **retention curve** — an area/line high on the left, dropping to the right, brand-blue→coral at the cliff; a marker + label **"drop-off"** lands on the cliff. *(No clean retention screenshot in the deck; `heatmap.png` is the real analytics behind it.)*
**Timeline:** line **DRAW** L→R descending (1.4s); 1.6 the drop-off marker **POP** coral; % label counts down.
**SFX:** a descending tone. **Out:** push-up.

### S08 · 0:23–0:27 · [F+SHOT] — *"The parts they rewatch. All on one dashboard, across every course and cohort."*
**Asset:** `learner-report.png` dimmed as backdrop (real cross-learner analytics). **Overlay:** a "rewatch" hotspot pulses on a timeline; a chip **"One dashboard · every course & cohort"** (`--green`).
**Timeline:** backdrop dims; 0.3 rewatch hotspot pulses; 1.2 the chip **RISE**. **Out:** hard cut.
*(A dedicated cohort-dashboard screen isn't in the deck — `learner-report.png` stands in; capture the cohort dashboard if you want it exact.)*

### S09 · 0:27–0:29 · [F] — *"Protect it."*
**Layout:** big **"PROTECT IT"** (`--coral`) + a shield/lock motif; coral underline draws. **Out:** match-cut.

### S10 · 0:29–0:33 · [F+SHOT] — *"Stamp every stream with the learner's own name."*
**Layout:** a designed **player with the learner watermark tiling** diagonally ("Ada Bello · ada@acme.edu", low-opacity, repeated) over a paused frame; a small **real inset** of `settings-watermark.png` showing **"Dynamic watermark: Learner name and email"**.
**Timeline:** 0.3 player frame RISE; 0.6 watermark text tiles in (stagger, low opacity); 1.4 the settings inset **POP** with a CALLOUT on the watermark dropdown.
**SFX:** soft stamp. **Out:** push-up.
*(Real watermark-on-video capture would be ideal; `settings-watermark.png` proves the setting.)*

### S11 · 0:33–0:36 · [F] — *"Serve it through signed URLs from your own S3 or Azure storage."*
**Layout:** designed flow — **S3** + **Azure** cloud boxes → a **signed URL token** (`🔒 expires 05:00`) → the player; micro-note "credentials stay on your server".
**Timeline:** clouds RISE; 0.6 a signed-URL token travels cloud→player along a DRAW connector; the lock clicks; a TTL counts down.
**SFX:** a secure "click". **Out:** hard cut.
*(No cloud-settings screenshot in the deck — designed; capture the S3/Azure admin settings if wanted.)*

### S12 · 0:36–0:40 · [F] — *"Deter screen capture with a tamper-evident audit trail."*
**Layout:** designed — a **"⚠ Screen capture discouraged"** flash over a dimmed/paused player → a **hash-chained ledger** (blocks linking with `#hash` arrows) building right.
**Timeline:** 0.3 the warning flashes (coral) and the player dims; 1.2 ledger blocks drop in one by one (stagger), each linked by a `#hash`; a green "tamper-evident" check lands.
**SFX:** alert blip + chain clicks. **Out:** gradient wipe into PROVE.

### S13 · 0:40–0:42 · [F] — *"Prove it."*
**Layout:** big **"PROVE IT"** (`--green`) + a checkmark/certificate motif; green underline draws. **Out:** match-cut.

### S14 · 0:42–0:45 · [SHOT] — *"Full audit exports."*
**Asset:** `audit-export.png` in **BROWSER-FRAME**. **Timeline:** frame RISE + ken-burns; 0.6 **CALLOUT** across the **CSV · JSON · Excel · ODS** buttons; a small badge on "Screen-capture deterrence events". **Out:** hard cut.

### S15 · 0:45–0:49 · [F+SHOT] — *"xAPI to your LRS. LTI 1.3 with grade passback."*
**Asset:** `more-menu.png` (real **More** menu showing *Engagement heatmap · Audit export · Publish via LTI*) as backdrop; **overlay:** an **xAPI → LRS** arrow flow + an **"LTI 1.3 · grade passback"** badge.
**Timeline:** backdrop RISE; 0.4 CALLOUT on "Publish via LTI"; 0.9 the xAPI statement flies to an "LRS" node; 1.6 the LTI badge **POP** (`--green`). **Out:** push-up.

### S16 · 0:49–0:53 · [F+SHOT] — *"Play from an upload, YouTube, Vimeo, or your own cloud, in seven player skins."*
**Asset:** `video-source.png` (left) + `player-styles.png` (right, the 7-skin dropdown). **Overlay:** a source chip row **Upload · YouTube · Vimeo · S3 · Azure**; the skin list highlights each of the 7 in a quick sweep.
**Timeline:** two frames slide in; source chips POP L→R; the skin dropdown highlights sweep top→bottom (7 ticks). **Out:** **gradient WIPE** into the close.

### S17 · 0:53–0:58 · [F] — *[Standard outro] "Modern Video Player. Know exactly how your videos are watched."*
**Layout:** hero video glyph + wordmark; promise line under it. **Timeline:** gradient glow; glyph + wordmark **RISE**; promise fades; **"watched"** gets a brand-blue underline draw. **Out:** push-up.

### S18 · 0:58–1:02 · [F] — *"One-time licence, a full year of support, no subscription."*
**Layout:** the canonical **"Included" checklist card** — ✓ One-time licence · ✓ 1 year of support · ✓ No subscription · ✓ Moodle 4.5–5.2 (green checks **DRAW** in, 80ms stagger). **Out:** push-up.

### S19 · 1:02–1:07 · [F] — *"Start free on the Moodle Plugins Directory, or go Premium on the Moodle Marketplace."*
**Layout:** **CTA card** — big **Moodle Marketplace** wordmark/URL (brand gradient) + a small line **"Free edition on the Moodle Plugins Directory"**. **Timeline:** card RISE; a cursor taps a "Get it" button (glow pulse). **Out:** hard cut.

### S20 · 1:07–1:11 · [F] — *"Modern Video Player makes Moodle work harder."* — sign-off sting
**Layout:** MVP wordmark + **"makes Moodle work harder."** (fixed series sign-off; only the plugin name changes). **Timeline:** wordmark RISE; tagline fades; a final brand-gradient sweep; hold. **SFX:** resolve chord. **Out:** fade to `--nav`.

---

## 4. Screen-count check
Durations `3,4,3,4,2, 3,4,4,2,4, 3,4,2,3,4, 4,5,4,5,4` ≈ **71s** frame time + ~10–14s absorbed by holds/pauses ⇒ ~80–88s. Every scene ≤ ~5s (title cards 2s). If audio runs long, trim holds on S06/S14/S16 first.

## 5. Screenshot & asset manifest
Real captures in `…/modern-video-player/ten-reasons/edited-deck-media/` (extracted + renamed from the `-edited.pptx`):

| Scene | Asset | Frame | Callout / note |
|-------|-------|-------|----------------|
| S03 | `player-view.png` | browser, **desaturated** | the "no data" void |
| S06 | `heatmap.png` | browser | "Viewers per moment" |
| S08 | `learner-report.png` | dimmed backdrop | rewatch + "one dashboard, every cohort" (cohort dashboard = stand-in) |
| S10 | `settings-watermark.png` | small inset | "Dynamic watermark: Learner name and email" |
| S14 | `audit-export.png` | browser | CSV · JSON · Excel · ODS |
| S15 | `more-menu.png` | backdrop | "Publish via LTI" (+ heatmap, audit export) |
| S16 | `video-source.png` + `player-styles.png` | two frames | sources + the 7-skin dropdown |

**Designed `[F]` (no clean screenshot in the deck):** retention curve (S07), watermark-on-player (S10 main), signed cloud URLs (S11), capture warning + hash-chain ledger (S12), plus all title cards / hook / outro.
**Available but not in the cut** (free-edition proof — swap in if you want a "built on a solid free core" beat): `resume-prompt.png`, `completion-conditions.png`, `enforcement-settings.png`. Duplicates of the More menu: `more-menu-wide.png`, `more-menu-alt.png`.
**Anonymise before public use:** `learner-report.png` shows a real gmail address — blur/re-seed it (and the watermark demo should use a fake name/email like "Ada Bello · ada@acme.edu").

## 6. Build order
1. Scaffold the shared token CSS (§2) + reusable components (browser-frame, callout, checklist, pillar title card, ledger).
2. Build the all-design scenes first (S01–S05, S07, S09, S11–S13, S17–S20).
3. Build `[SHOT]`/`[F+SHOT]` scenes with the manifest assets; anonymise the report + use a fake watermark identity.
4. Review pacing against the rendered voiceover; trim holds per §4.
