# Modern Learner Dashboard — Storyboard & Claude Animation Build Brief

**Purpose:** an executable animation spec. Each of the 17 scenes below is described precisely enough that Claude (or a motion designer) can build it as a self-contained **animated 1920×1080 HTML/CSS scene** — exact layout, hex colours, typography, and an element-by-element motion timeline (time in seconds from scene start, with named easing). Scene cuts land on the music beat unless a transition is named.

- **Companion files:** [script.md](script.md) (narration + rationale) · [voiceover.txt](voiceover.txt) (audio source of truth).
- **Total runtime:** ~78–85s · **17 scenes** · avg ~3.8s · none over ~5s (designed frames flex).
- **Cardinal rule:** every on-screen claim traces to a real feature. Do not add capabilities.
- **Emotional loop:** the **five scattered "page" cards** that fly apart in S02 and grey out in S03 return in S04/S17 **assembled and lit inside one block** — the whole story is "five scattered pages → one home".

---

## 0. How to build these (for Claude)

**Recommended build:** author each scene as one animated HTML page at `1920×1080` using **Inter** and the shared token block in §2. Drive motion with CSS `@keyframes` / the Web Animations API. This matches the existing `motion-frames` pipeline and lets each scene be screen-recorded (or frame-captured) into the edit. `[SHOT]` scenes composite the real screenshots from §5 inside an animated browser frame; `[F+SHOT]` scenes animate designed overlays on top of a dimmed screenshot.

**Motion principles (apply everywhere):**
1. **One idea per scene.** The VO line is the scene's job — animate that, nothing more.
2. **Enter → emphasise → hold → exit.** Most elements enter in the first ~0.6s, the key word/number gets a beat of emphasis, then a short hold, then cut.
3. **Fast but not frantic.** Entrances ~0.45–0.55s, cuts on the beat. Continuous micro-motion (breathing scale, floating chips) keeps held frames alive.
4. **Colour = meaning.** Green = completion/earned/success. Coral = the "old way" / scattered / at-risk. Brand blue = the product, the "one home".
5. **Payoff the opening.** The five grey scattered cards from S02–S03 return **assembled and glowing** in the close — shut the loop.

---

## 1. Story arc & music map

| Act | Scenes | Feel | Music |
|-----|--------|------|-------|
| **Hook / pain** | 01–03 | cold, scattered, human | restless anxious pulse → **DROP to near-silence on S03** |
| **The turn** | 04 | relief, the block assembles | warm resolving chord, brand enters |
| **Proof / capability** | 05–13 | kinetic, competent, calm-confident | steady driving bed |
| **Close / CTA** | 14–17 | assured, warm, resolved | swell on S14, resolve on S17 |

Transition grammar: default = **hard cut on beat**. Special: **gradient wipe** (03→04 pain→product, and 13→14 proof→close), **match-cut** (04 dashboard glyph → 05 overview block, same screen position), **push** (element slides up/left & out between screenshot scenes).

---

## 2. Shared design tokens (drop into every scene)

```css
:root{
  --nav:#0A1830;        /* base background                 */
  --panel:#0E2240;      /* cards / surfaces                */
  --panel-brd:#24406B;  /* 1px card borders                */
  --ink:#FFFFFF;        /* primary text                    */
  --muted:#9FB3D1;      /* secondary text / kickers        */
  --muted-2:#6B7A93;    /* de-emphasised text              */
  --card-off:#37455C;   /* "scattered / abandoned" grey    */
  --brand1:#0F3D7A;     /* gradient start                  */
  --brand2:#4B8BE8;     /* gradient end / product blue     */
  --green:#16B364;      /* completion / earned / success   */
  --coral:#F97316;      /* pain / scattered / the old way  */
  --grad:linear-gradient(135deg,#0F3D7A,#4B8BE8);
  /* easing tokens */
  --e-expo:cubic-bezier(.16,1,.3,1);    /* entrances (RISE)     */
  --e-back:cubic-bezier(.34,1.56,.64,1);/* pops / chips (POP)   */
  --e-inout:cubic-bezier(.65,0,.35,1);  /* moves / assembles    */
  --e-in:cubic-bezier(.55,0,1,.45);     /* exits (FALL)         */
}
/* type: Inter. mega 220/800 · h1 88/700 · h2 52/600 · body 32/500 · kicker 24/600 up .08em */
```

**Hero glyph — the "dashboard tiles" mark (from `ten-reasons/icon.png`):**
Four white rounded tiles on a `--grad` rounded-square (radius 22%): a **tall tile top-left**, a **small tile top-right**, a **small tile bottom-left**, a **tall tile bottom-right** (2×2 asymmetric bento). Build in SVG/CSS as four `<rect rx="10">` in white at ~92% opacity. This mark is what the five scattered cards **assemble into**, and it anchors the logo lockup (S04, S14, S17).

**Reusable motion recipes (referenced by name below):**
- **RISE** — `opacity 0→1, translateY(28px→0)`, 0.55s `--e-expo`. Standard entrance.
- **POP** — `opacity 0→1, scale(.8→1)`, 0.45s `--e-back`. Chips, badges, glyphs, stat icons.
- **DRAW** — SVG stroke `stroke-dashoffset: len→0`, 0.4–0.6s `--e-expo`. Icons, rings, checks, chart lines.
- **COUNT** — number rolls `from→to`, 1.1s `--e-expo` (settle with scale 1.08→1.0).
- **SCATTER** — a card flies from centre to a screen edge/corner: `translate + rotate(±8°)`, 0.6s `--e-inout`, then desaturates to `--card-off`.
- **ASSEMBLE** — the inverse: scattered cards converge to centre, straighten, and **snap into the 4-tile glyph** (scale to tile size, 0.7s `--e-inout`, 60ms stagger, a soft flash on lock).
- **FALL/EXIT-UP** — `opacity 1→0, translateY(0→-40px)`, 0.3s `--e-in`.
- **BREATHE** — held hero elements loop `scale 1.0→1.005→1.0`, 3s ease-in-out.
- **STAGGER** — 70–80ms between sibling entrances (rows, tiles, chips, letters).
- **BROWSER-FRAME** — screenshot in rounded (16px) chrome: dark top bar, 3 dots, a faux URL pill (`…/my/`), soft shadow `0 40px 120px rgba(0,0,0,.5)`; slow **ken-burns** `scale 1.0→1.04` across the scene.
- **CALLOUT** — a 3px rounded rect that DRAWs around a UI region (brand blue) with a small label pill.

**The five "page" cards (S02–S03, callback in S14/S17)** — each a small `--panel` card with an icon + label:
① **Courses** (book, `--brand2`) · ② **Grades** (star, `--brand2`) · ③ **Deadlines** (calendar, `--coral`) · ④ **Badges** (shield, `--brand2`) · ⑤ **Profile** (person, `--brand2`). These are the "five different pages".

---

## 3. The 17 scenes

> Format per scene — **ID · time · type** · *VO line* → **Layout** / **Elements (hex)** / **Timeline** (t = seconds from scene start) / **SFX** / **Out**.

---

### S01 · 0:00–0:03 · [F] — *"Your learners log in to Moodle... then what?"*
**Layout:** full `--nav` with faint radial vignette. Centre: a small **login card** — an avatar circle, a greyed "•••••" field, a brand-blue **"Log in"** button — that resolves into a **cluttered mock dashboard** (6–8 mismatched panels of different sizes, low contrast, slightly chaotic). Kicker top-left: **"A LEARNER SIGNS IN"** (`--muted`). Big soft question mark forming from negative space, or the line **"…then what?"** bottom-centre (56px, `--muted`).
**Timeline:**
- 0.0 bg fades black→`--nav` (0.4s); login card **RISE**.
- 0.6 **"Log in"** button taps (scale 0.96 + brand glow); a quick screen-flash.
- 0.9 the cluttered dashboard panels **POP** in fast, overlapping, slightly misaligned (STAGGER 60ms) — deliberately busy/overwhelming.
- 1.8 everything dims 20%; **"…then what?"** fades in bottom-centre.
- 2.2→3.0 uneasy hold, panels **BREATHE** out of sync.
**SFX:** soft UI login chime → a subtle discordant swell as the clutter appears. **Out:** hard cut.

### S02 · 0:03–0:08 · [F] — *"Their courses, grades, deadlines, badges, and profile are scattered across five different pages."*
**Layout:** the clutter resolves into **five clean labelled cards** stacked at centre (Courses / Grades / Deadlines / Badges / Profile — see §2). As the VO names each, that card **SCATTERs** to a different edge/corner of the screen. Faint dashed lines trail behind each (the "different pages"). Centre empties out.
**Timeline:**
- 0.0 the five cards **RISE** stacked at centre (STAGGER 70ms), each with icon + label.
- 0.6 / 1.1 / 1.6 / 2.1 / 2.6 as each word is spoken — *courses, grades, deadlines, badges, profile* — the matching card **SCATTERs** to its corner (TL, TR, R, BL, BR), a dashed trail drawing after it.
- each scattered card lands, tilts ±8°, and **desaturates toward `--card-off`**.
- 3.4 centre is empty but for five faint trails radiating out; a thin kicker **"5 DIFFERENT PAGES"** fades in centre (`--muted-2`).
**SFX:** five soft "whoosh-thunk" hits synced to each scatter; the bed thins with each. **Out:** quick cut — **music drops toward silence.**
> *Design note:* remember each card's final position — S14/S17 pulls them back from exactly here.

### S03 · 0:08–0:11 · [F] — *"So they stop looking, and they stop coming back."*
**Layout:** near-black (`#060D1A`); the five scattered cards sit dim and grey at the edges. Centre: a **learner silhouette** (simple avatar) that turns and walks off toward the bottom edge, fading. Two lines fade up: small — **"They stop looking."** then bold 84px — **"They stop coming back."** (the word **"back"** briefly flashes `--coral`→`--muted`).
**Timeline:**
- 0.0 near-silence; the five cards dim further to `--card-off` at 40% opacity.
- 0.4 line 1 fades in; 0.9 it dims.
- 1.1 line 2 **RISE**; **"back"** flashes coral then settles muted.
- 1.6 the avatar silhouette walks down and fades to nothing.
- to 3.0 stark, quiet hold.
**SFX:** one soft heartbeat thud under "back"; a door-close/absence sound as the avatar leaves. **Out:** **gradient WIPE** L→R (brand `--grad`) into S04 — music re-enters warm.

### S04 · 0:11–0:14 · [F] — *"Modern Learner Dashboard gives every learner one home."*
**Layout:** navy with a brand-gradient glow (top). The wipe **pulls the five grey cards back from their S02 corners toward centre**, where they **ASSEMBLE** — straightening, re-saturating to white/brand, and snapping into the **4-tile dashboard glyph**. Wordmark **"Modern Learner Dashboard"** (72px) RISEs beside/below it; kicker **"One learner home for Moodle"** (`#DCE7F7`); green chip **"ALL IN ONE BLOCK"**.
**Timeline:**
- 0.0 wipe completes; five grey cards fly back in from the edges (`--e-inout`, 0.6s, 60ms stagger), re-saturating mid-flight.
- 0.7 they **ASSEMBLE** into the 4-tile glyph with a soft white **flash** on lock; glyph settles with a ring pulse.
- 1.0 wordmark **RISE** (letters STAGGER 30ms).
- 1.4 kicker fades in.
- 1.7 **"ALL IN ONE BLOCK"** chip **POP** (`--green`).
- 2.0→3.0 glyph **BREATHE**.
**SFX:** warm swell + a bright "assemble/lock" confirm chime on the flash. **Out:** **match-cut** — the glyph scales/moves to the top-left position it occupies inside the real overview in S05.

### S05 · 0:14–0:18 · [SHOT] — *"Courses, completion, due dates, grades, badges, and certificates, together in a single block."*
**Asset:** `overview-hero.png` in **BROWSER-FRAME** (faux URL `…/my/`).
**Layout:** the dashboard overview; overlay-highlight the **7 stat tiles** row (Total courses, Completion rate, Completed activities, Due soon, Grade average, Earned badges, Achieved certificates).
**Timeline:**
- 0.0 frame **RISE** + scale 0.97→1 (matched from S04's glyph, now the block's sidebar mark).
- 0.4 **ken-burns** begins (→1.04 over 3.5s).
- 0.6–2.4 the seven stat tiles **COUNT/POP** in a quick left-to-right wave (STAGGER 90ms) — each tile's value ticks up, its icon POPs; the words *courses, completion, due dates, grades, badges, certificates* land on their tiles.
- 2.6 a thin brand underline **DRAWs** under the tile row.
**SFX:** soft UI whoosh + six light ticks across the tiles. **Out:** hard cut.
> *Asset note:* `overview-hero.png` currently reads sparse (2 courses, 0%). Prefer a **re-capture on richer seed data** (non-zero completion/badges/certificates) so the tiles feel alive; if not, the COUNT animation rolling the visible values still sells it.

### S06 · 0:18–0:22 · [SHOT] — *"Continue learning surfaces the courses they opened last, with progress bars and a one-click resume."*
**Asset:** `continue-learning.png` in **BROWSER-FRAME**.
**Layout:** the grid of recent course cards (thumbnails + titles + dates + Start/Continue buttons).
**Timeline:**
- 0.0 frame **RISE**; ken-burns.
- 0.5 course cards cascade in (STAGGER 80ms).
- 1.3 on the first card, a **progress bar fills** 0→68% (`--green`, 0.8s `--e-expo`).
- 2.1 a **CALLOUT** draws around its **"Continue learning"** button, label **"One-click resume"**; the button **pulses** with a cursor tap.
**SFX:** soft cascade ticks + a click on the resume tap. **Out:** push-left.

### S07 · 0:22–0:26 · [F+SHOT] — *"A searchable course library lets them find and self-enrol in what's next."*
**Asset:** `course-library.png` in **BROWSER-FRAME** (light ken-burns), with designed overlays.
**Layout:** the Course Library — search field, Category / Enrolment status / Sort controls, catalog stat tiles (84 courses / 11 categories / 162 activities / 83 certificate courses), grid of "Not enrolled" course cards.
**Timeline:**
- 0.0 frame **RISE**.
- 0.4 text **types** into the search field — *"leadership"* — cursor visible (0.9s).
- 1.3 the filter chips + **"Not enrolled"** pills **POP**/light brand blue (STAGGER).
- 2.0 a **CALLOUT** draws around one card's enrol action, label **"Self-enrol"**; button pulses.
**SFX:** keyboard ticks + soft filter clicks + enrol pop. **Out:** hard cut.

### S08 · 0:26–0:30 · [F+SHOT] — *"A built-in calendar and a due-soon count keep deadlines from slipping."*
**Asset:** `calendar.png` in **BROWSER-FRAME**.
**Layout:** the monthly calendar grid + Upcoming events panel + "View full calendar". A **designed "Due soon" pill** (coral→brand) flies from the calendar to sit over an overview **due-soon** stat.
**Timeline:**
- 0.0 frame **RISE**; ken-burns.
- 0.5 a **CALLOUT** draws around today's date cell; a small event dot **POPs**.
- 1.2 a **"Due soon · 3"** pill lifts off the calendar and **flies** to the top-right, landing with a `--coral` glow that settles brand blue (deadline caught, not missed).
- 2.2 a green **check** ticks beside it.
**SFX:** soft calendar tick + a rising "caught it" chime. **Out:** push-up.

### S09 · 0:30–0:33 · [F+SHOT] — *"Badges and certificates sit front and centre,"*
**Asset:** `overview-hero.png` re-used, dimmed 45% + 4px blur as backdrop (or a captured Badges/Certificates tab — see §5).
**Layout:** two designed cards zoom forward from the overview's **"Earned badges"** and **"Achieved certificates"** tiles: a **badge/shield glyph** (`--green`) and a **certificate/ribbon glyph** (`--brand2`), each with a count.
**Timeline:**
- 0.0 backdrop dims/blurs.
- 0.3 **Badges card POP** (shield DRAWs, a small sparkle).
- 0.7 **Certificates card POP** (ribbon DRAWs).
- 1.2 both **float** gently; counts **COUNT** up.
**SFX:** two bright "earned" chimes. **Out:** cards slide down to reveal S10.

### S10 · 0:33–0:37 · [SHOT] — *"and a learning transcript records every completed course, ready for audit."*
**Asset:** `my-courses-transcript.png` in **BROWSER-FRAME**.
**Layout:** the My courses tab — stats band + the **"Learning transcript" / Completed training records** panel.
**Timeline:**
- 0.0 frame **RISE**; ken-burns.
- 0.5 a **CALLOUT** draws around the **"Learning transcript"** button; it presses and the **Completed training records** panel expands (height reveal, 0.6s).
- 1.6 the record rows cascade in (STAGGER 60ms); a small **"AUDIT-READY"** stamp **POPs** (`--green`) in the corner.
**SFX:** soft expand swish + stamp thud. **Out:** hard cut.

### S11 · 0:37–0:42 · [SHOT] — *"Learners even edit their own profile right here, so your team stops fielding profile tickets."*
**Asset:** `profile-edit-modal.png` in **BROWSER-FRAME** — **anonymised** (re-seed the email to `learner@example.com`).
**Layout:** the Edit profile modal (Basic details + custom fields).
**Timeline:**
- 0.0 modal **RISE** + scale 0.96→1 (backdrop dims).
- 0.5 two fields **highlight** in sequence (brand focus ring DRAWs) as if being edited; the avatar control gets a small camera badge POP.
- 1.6 the **"Save changes"** button presses (brand glow); a green **"Saved"** toast **POPs**.
- 2.4 a small **"support ticket"** chip in the corner gets a red ✗ → fades (self-service = fewer tickets).
**SFX:** soft focus ticks + save confirm + a light "dismiss" whoosh on the ticket. **Out:** push-up.

### S12 · 0:42–0:47 · [F] — *"And it runs on core Moodle. No external service, no new tables, no cron."*
**Layout:** three horizontal "cost" chips at centre — **External service** · **New database tables** · **Background cron** — each gets **struck through** with a coral line and a ✗. Then a clean **"Core Moodle only"** badge (brand `--grad`, with the Moodle-style graduation-cap or the dashboard glyph) **lands** below, green check ring.
**Timeline:**
- 0.0 three chips **RISE** stacked (STAGGER).
- 0.6 / 1.1 / 1.6 each chip gets a **strike-through DRAW** (`--coral`) + ✗ POP as the VO says *no external service, no new tables, no cron*.
- 2.2 the struck chips desaturate and drop 8px.
- 2.6 **"Core Moodle only"** badge **POP** + green check ring **DRAW**.
**SFX:** three light "strike" swishes + a solid confirm on the badge. **Out:** **gradient WIPE**? no — hard cut to S13.

### S13 · 0:47–0:51 · [F+SHOT] — *"Privacy-clean, fast on big sites, and native in the theme you already run."*
**Asset:** `themes-compat.png` in **BROWSER-FRAME** (the Themes admin grid: Boost, Boost Union, Academi, Adaptable, Classic, Degrade, Moove).
**Layout:** the theme tiles; three designed **✓ badges** tick in along the bottom: **✓ Privacy-clean** · **✓ Fast on big sites** · **✓ Native in your theme**.
**Timeline:**
- 0.0 frame **RISE**; ken-burns across the theme grid.
- 0.4 a **CALLOUT** sweeps tile-to-tile (a brand ring hops across 3–4 theme cards, "it fits here… and here…").
- 1.2 / 1.8 / 2.4 the three green **✓ badges DRAW** in along the bottom (STAGGER), synced to *privacy-clean, fast, native*.
**SFX:** a soft hop tick per theme + three crisp checks. **Out:** **gradient WIPE** into the close.

### S14 · 0:51–0:55 · [F] — *"Modern Learner Dashboard. Bring every learner home."*
**Layout:** hero logo lockup on brand-gradient glow — the **4-tile dashboard glyph** + wordmark; tagline **"Bring every learner home."** Below, a **callback row**: the five S02 cards (Courses/Grades/Deadlines/Badges/Profile) fly back in from the edges and **nest neatly inside a single outlined "home" block** (payoff of the scatter).
**Timeline:**
- 0.0 gradient glow blooms; glyph + wordmark **RISE** (letters STAGGER).
- 0.7 tagline fades in; **"home"** gets a green underline **DRAW**.
- 1.3 **the five scattered cards return** from S02's corners and **snap into the one block** (ASSEMBLE, left→right wave), re-saturated and lit.
- 2.2→3.0 gentle **BREATHE** hold.
**SFX:** warm resolve chord + a soft "all-together" chime on the snap. **Out:** push-up.

### S15 · 0:55–0:59 · [F] — *"One-time licence, a full year of support, no subscription."*
**Layout:** ThemeForest-style **"Included:"** card (brand-bordered `--panel`); four checklist rows; a **"Moodle 4.5–5.2"** compatibility badge top-right.
**Timeline:**
- 0.0 card **RISE**.
- 0.4 / 0.9 / 1.4 / 1.9 four rows tick in (STAGGER) — each a green check **DRAW** + label slide:
  **✓ One-time licence · ✓ 1 year of support · ✓ No subscription · ✓ Moodle 4.5 – 5.2**
- 2.4 the **"Moodle 4.5–5.2"** badge stamps (scale 1.2→1).
**SFX:** four crisp ascending ticks + a stamp. **Out:** push-up.
> *Fixed series card — keep identical wording/order across every plugin video.*

### S16 · 0:59–1:02 · [F] — *"Get it on the Moodle Marketplace."*
**Layout:** CTA card — a **Moodle Marketplace** motif (search bar + result card), **"Modern Learner Dashboard"** as the result with a brand **"Get it now"** button and price-agnostic **"marketplace.moodle.com"** footer; small agunfon mark in a corner.
**Timeline:**
- 0.0 CTA card **RISE**; search bar **types** "Modern Learner Dashboard", cursor clicks, a result card slides up.
- 1.2 **"Get it now"** button pulses (scale loop) with a cursor tap.
- 2.0 agunfon mark + footer fade in.
**SFX:** type + click + a confident sting. **Out:** hard cut.

### S17 · 1:02–1:05 · [F] — *"Modern Learner Dashboard: everything your learners are working toward, in one place."*
**Layout:** final sign-off sting — the **4-tile dashboard glyph** + wordmark centred on brand-gradient glow; sign-off line **"Everything your learners are working toward, in one place."** The five callback cards from S14 glow softly **inside the one block** behind the glyph; a subtle vignette. Optional small agunfon mark bottom-corner.
**Timeline:**
- 0.0 glyph + wordmark settle from S16; the five nested cards **glow up** once (green→brand shimmer, left→right — the completed payoff).
- 0.6 sign-off line fades in; **"one place"** gets a soft green underline **DRAW**.
- 1.4→3.0 gentle hold; glyph **BREATHE**; vignette closes slightly.
**SFX:** warm final chord + a single soft chime on "one place". **Out:** fade to `--nav` end card.
> *This sign-off is **customised** for this plugin (per your direction) instead of the series-fixed "makes Moodle work harder."*

---

## 4. Screen-count check
> **Timing is now locked to the rendered voiceover in [cue-sheet.md](cue-sheet.md)** (measured phrase boundaries → per-scene In–Out + 30 fps frame ranges). Build to those numbers; the *planned* times in §3 below are the creative reference. Total = **82.1s**.

17 scenes · durations `3,5,3,3,4, 4,4,4,3,4, 5,5,4,4,4, 3,3` = **~72s of frame time**; VO runs ~82s, the extra absorbed by the hook's dramatic pauses (S01–S03) and held BREATHE frames. Every scene ≤ ~5s ✓ (only the two "the turn"/close design frames S04, S11, S14 reach 5s and can flex). If final audio runs long, trim holds on the screenshot scenes (S06/S07/S10/S13) first; if short, extend S05 and S14 holds.

## 5. Screenshot & asset manifest

Source: **`ten-reasons/edited-deck-media/`** — the extracted + renamed deck captures (all ~803×653; `calendar.png` and `my-courses-transcript.png` are 805×655). Composite each inside the **BROWSER-FRAME** recipe.

| Scene | Asset | Frame | Callout / note |
|-------|-------|-------|----------------|
| S05 | `overview-hero.png` | browser | 7 stat tiles wave. **Prefer a richer-data re-capture** (currently 2 courses / 0%). Alt: `dashboard-fullpage-editmode.png` (6 courses, but has edit-mode chrome). |
| S06 | `continue-learning.png` | browser | first card progress bar + "Continue learning" resume button |
| S07 | `course-library.png` | browser + overlay | search "leadership" + Not-enrolled chips + self-enrol callout. Alt/extend: `course-library-grid.png`. |
| S08 | `calendar.png` | browser + overlay | today's cell callout + a "Due soon" pill flies out |
| S09 | `overview-hero.png` (dimmed backdrop) | overlay | badge + certificate cards zoom from the overview tiles. **Ideal capture:** dedicated **Badges** and **Certificates** tab shots. |
| S10 | `my-courses-transcript.png` | browser | Learning-transcript panel expands + "Audit-ready" stamp |
| S11 | `profile-edit-modal.png` | browser | **ANONYMISE the email** → `learner@example.com`; field-focus + Save toast |
| S13 | `themes-compat.png` | browser + overlay | ring hops across theme tiles + 3 ✓ badges |

**Anonymise before public use:** `profile-edit-modal.png` **and** `profile-details.png` both show a real gmail address — blur or re-seed to `learner@example.com`.
**Ideal to capture (nice-to-have, not blocking):** richer-data **overview** (S05), dedicated **Badges** + **Certificates** tabs (S09), and a **loading-spinner mid-load** shot if you want to literally show "fast on big sites".
**Unused deck assets available** (handy if you extend the cut): `overview-hero-viewall.png`, `course-library-grid.png`, `block-config.png` (great for a "brand it without touching theme code" beat), `dashboard-fullpage-editmode.png`, `profile-details.png`.

## 6. Build order (suggested)
1. Scaffold the shared token CSS (§2) + reusable components (stat tile, chip, browser-frame, checklist, the 4-tile glyph, the five "page" cards).
2. Build the all-design act first — **S01–S04, S12, S14–S17** (no screenshot dependency, and they carry the emotional loop).
3. Build `[SHOT]`/`[F+SHOT]` scenes as assets are confirmed; **anonymise** the two profile shots; capture the ideal extras (richer overview, Badges/Certificates tabs).
4. Review pacing against the rendered voiceover; trim/extend holds per §4.
