# Modern Course Reminder — Storyboard & Claude Animation Build Brief

**Purpose:** an executable animation spec. Each of the 19 scenes below is described precisely enough that Claude (or a motion designer) can build it as a self-contained **animated 1920×1080 HTML/CSS scene** — exact layout, hex colours, typography, and an element-by-element motion timeline (time in seconds from scene start, with named easing). Scene cuts land on the music beat unless a transition is named.

- **Companion files:** [script.md](script.md) (narration + rationale) · [voiceover.txt](voiceover.txt) (audio source of truth).
- **Total runtime:** ~74–80s · **19 scenes** · avg ~3.4s · none over 4s.
- **Cardinal rule:** every on-screen claim traces to a real feature. Do not add capabilities.

---

## 0. How to build these (for Claude)

**Recommended build:** author each scene as one animated HTML page at `1920×1080` using **Inter** and the shared token block in §2. Drive motion with CSS `@keyframes` / the Web Animations API. This matches the existing `motion-frames` pipeline and lets each scene be screen-recorded (or frame-captured) into the edit. `[SHOT]` scenes composite the real screenshots from §5 inside an animated browser/email frame; `[F+SHOT]` scenes animate designed overlays on top of a dimmed screenshot.

**Motion principles (apply everywhere):**
1. **One idea per scene.** The VO line is the scene's job — animate that, nothing more.
2. **Enter → emphasise → hold → exit.** Most elements enter in the first ~0.6s, the key word/number gets a beat of emphasis, then a short hold, then cut.
3. **Fast but not frantic.** Entrances ~0.45–0.55s, cuts on the beat. Continuous micro-motion (breathing scale, floating chips) keeps held frames alive.
4. **Colour = meaning.** Green = completion/success. Amber/coral = at-risk / overdue / the "old way". Brand blue = the product acting.
5. **Payoff the opening.** The grey "drop-off" dots from Scene 02 return in Scene 18 as green checks — close the emotional loop.

---

## 1. Story arc & music map

| Act | Scenes | Feel | Music |
|-----|--------|------|-------|
| **Hook / pain** | 01–03 | cold, tense, human | tense minimal pulse → **DROP to near-silence on Scene 03** |
| **The turn** | 04–05 | relief, brand enters | warm re-entry, confident |
| **Proof / capability** | 06–16 | kinetic, competent | steady driving bed |
| **Close / CTA** | 17–19 | assured, uplifting | swell on Scene 16→18, resolve on 19 |

Transition grammar: default = **hard cut on beat**. Special: **gradient wipe** (03→04 and 16→17), **push-up** (element slides up & out), **match-cut** (05 rule card → 06 real rule builder, same position).

---

## 2. Shared design tokens (drop into every scene)

```css
:root{
  --nav:#0A1830;        /* base background            */
  --panel:#0E2240;      /* cards / surfaces           */
  --panel-brd:#24406B;  /* 1px card borders           */
  --ink:#FFFFFF;        /* primary text               */
  --muted:#9FB3D1;      /* secondary text / kickers   */
  --muted-2:#6B7A93;    /* de-emphasised text         */
  --dot-off:#37455C;    /* "dropped-off learner" grey */
  --brand1:#0F3D7A;     /* gradient start             */
  --brand2:#4B8BE8;     /* gradient end / product blue*/
  --green:#16B364;      /* completion / success       */
  --coral:#F97316;      /* pain / overdue / at-risk    */
  --grad:linear-gradient(120deg,#0F3D7A,#4B8BE8);
  /* easing tokens */
  --e-expo:cubic-bezier(.16,1,.3,1);   /* entrances (RISE)      */
  --e-back:cubic-bezier(.34,1.56,.64,1);/* pops / chips (POP)    */
  --e-inout:cubic-bezier(.65,0,.35,1); /* moves                 */
  --e-in:cubic-bezier(.55,0,1,.45);    /* exits (FALL)          */
}
/* type: Inter. mega 260/800 · h1 88/700 · h2 52/600 · body 32/500 · kicker 24/600 up .08em */
```

**Reusable motion recipes (referenced by name below):**
- **RISE** — `opacity 0→1, translateY(28px→0)`, 0.55s `--e-expo`. Standard entrance.
- **POP** — `opacity 0→1, scale(.8→1)`, 0.45s `--e-back`. Chips, badges, nodes.
- **DRAW** — SVG stroke `stroke-dashoffset: len→0`, 0.4–0.6s `--e-expo`. Icons, rings, arrows, chart lines.
- **COUNT** — number rolls `from→to`, 1.1s `--e-expo` (settle with scale 1.08→1.0).
- **FALL/EXIT-UP** — `opacity 1→0, translateY(0→-40px)`, 0.3s `--e-in`.
- **BREATHE** — held hero elements loop `scale 1.0→1.005→1.0`, 3s ease-in-out.
- **STAGGER** — 80ms between sibling entrances (rows, letters, chips).
- **BROWSER-FRAME** — screenshot in rounded (16px) chrome: dark top bar, 3 dots, soft shadow `0 40px 120px rgba(0,0,0,.5)`; slow **ken-burns** `scale 1.0→1.04` across the scene.
- **CALLOUT** — a 3px rounded rect that DRAWs around a UI region (amber→brand blue) with a small label pill.

---

## 3. The 19 scenes

> Format per scene — **ID · time · type** · *VO line* → **Layout** / **Elements (hex)** / **Timeline** (t = seconds from scene start) / **SFX** / **Out**.

---

### S01 · 0:00–0:03 · [F] — *"You enrolled five hundred learners."*
**Layout:** full `--nav` with faint radial vignette; a 10×10 dot grid at 8% opacity (brand blue) behind a centred mega number **"500"** (260px/800, `--ink`); kicker above: **"LEARNERS ENROLLED"** (`--muted`).
**Timeline:**
- 0.0 bg fades black→`--nav` (0.4s).
- 0.2 background dot grid fades in (STAGGER, low opacity).
- 0.3 **"500" COUNT** 0→500 (1.1s, digit slot-roll).
- 0.5 kicker **RISE**.
- 1.6→3.0 hold, number **BREATHE**.
**SFX:** rising whoosh; single low hit when 500 lands (~1.4s). **Out:** hard cut.

### S02 · 0:03–0:07 · [F] — *"Six weeks later, half of them never finished —"*
**Layout:** the 100-dot grid becomes the hero (dots ~28px, gap 22px, brand blue `--brand2`); top-left label **"500 enrolled"**; bottom kicker **"6 WEEKS LATER"**; an amber counter that fills to **"250 unfinished"** (`--coral`).
**Timeline:**
- 0.0 S01's "500" match-shrinks to the top-left label (0.5s).
- 0.3 dot grid **POP** from centre outward (STAGGER 15ms), all brand blue.
- 1.0 **"6 WEEKS LATER"** wipes in.
- 1.4 **50 dots drain** brand-blue→`--dot-off`, opacity→0.35, nudge down 6px, staggered 20ms across 1.2s (learners falling away).
- 2.8 **"250" COUNT** up in `--coral` as grey dots accumulate; label "unfinished".
**SFX:** descending ticks synced to greying dots; hollow low tone. **Out:** quick cut — **music drops toward silence.**

### S03 · 0:07–0:10 · [F] — *"…not because your course was bad, but because nobody reminded them."*
**Layout:** near-black (`#060D1A`); two centred lines. Line 1 (small, 40px): **"It wasn't the course."** Line 2 (bold, 84px): **"Nobody reminded them."**
**Timeline:**
- 0.0 near-silence. Line 1 fades in (0.4s).
- 0.9 Line 1 dims to `--muted-2`.
- 1.1 Line 2 **RISE**; the word **"Nobody"** flashes `--coral`→`--ink`.
- to 3.0 stark hold.
**SFX:** one soft heartbeat thud under "Nobody". **Out:** **gradient WIPE** L→R (brand) into S04 — music re-enters warm.

### S04 · 0:10–0:13 · [F] — *"Modern Course Reminder fixes that — automatically."*
**Layout:** navy with a brand-gradient glow (top). Centre logo lockup: **bell glyph with a small green check badge** + wordmark **"Modern Course Reminder"** (72px); kicker **"Automated learner reminders for Moodle"** (`#DCE7F7`); green chip **"AUTOPILOT"**.
**Timeline:**
- 0.0 wipe completes.
- 0.3 glyph **DRAW** (0.5s) + green check badge forms with a ring pulse.
- 0.6 wordmark **RISE** (letters STAGGER 30ms).
- 1.0 kicker fades in.
- 1.3 **"AUTOPILOT"** chip **POP** (`--green`).
**SFX:** warm swell + bright confirm chime on the check. **Out:** **push-up.**

### S05 · 0:13–0:16 · [F] — *"Set one rule, and it chases them for you. Forever."*
**Layout:** one centred **rule card** (`--panel`, border `--panel-brd`, radius 24px). Three stacked pill rows: **WHEN** `course not completed` · **IF** `7 days passed` · **THEN** `send reminder`. Top-right: looping **∞ / repeat** glyph (`--green`) with an orbit ring.
**Timeline:**
- 0.0 card **RISE** + scale 0.96→1.
- 0.3–0.9 three rows slide in (STAGGER 0.2s).
- 1.1 ∞ glyph spins once, pulses green; orbit ring loops continuously.
- 1.6 lower-third **"Forever"** fades; ∞ keeps looping.
**SFX:** three soft clicks + sustained shimmer. **Out:** **match-cut** — card slides to where the real rule builder sits in S06.

### S06 · 0:16–0:19 · [SHOT] — *(bridge) "It finds the learners who slipped —"*
**Asset:** `rulebuilder.png` in **BROWSER-FRAME**.
**Timeline:**
- 0.0 frame **RISE** + scale 0.97→1.
- 0.4 **ken-burns** begins (→1.04 over 3s).
- 0.8 **CALLOUT** draws around the trigger/WHEN area, label **"Rule builder"**.
**SFX:** soft UI whoosh. **Out:** hard cut; callout position carries into S07 chips.

### S07 · 0:19–0:23 · [F+SHOT] — *"never started, inactive for weeks, past the deadline, still incomplete."*
**Asset:** `rulebuilder.png` dimmed 40% + 4px blur as backdrop.
**Layout:** four trigger chips centre-stage: **① Never started** (`--coral`) · **② Inactive 14+ days** (`--coral`) · **③ Past deadline** (`--coral`) · **④ Still incomplete** (`--brand2`); a **"learners matched"** counter.
**Timeline:**
- 0.0 backdrop dims/blurs.
- 0.3 / 0.7 / 1.1 / 1.5 chips **POP** one per VO phrase (icon DRAW each); each pop flies a dot into the counter.
- chips **float** continuously (±3px).
- 2.2 counter reads **"142 learners matched"** (`--green`).
**SFX:** four pops synced to VO; counter tick. **Out:** chips converge into one "audience" node → cut.

### S08 · 0:23–0:26 · [SHOT] — *"Target one course, a whole category, or a cohort."*
**Asset:** `setup.png` in **BROWSER-FRAME** (or re-shot scope selector).
**Layout:** overlay segmented control **[ Course ][ Category ][ Cohort ]**.
**Timeline:**
- 0.0 frame **RISE**.
- 0.4 / 0.9 / 1.4 selection slider slides across, lighting each pill brand blue as the VO names it.
- ken-burns.
**SFX:** three soft toggle clicks. **Out:** push-left.

### S09 · 0:26–0:29 · [F+SHOT] — *"Then it nudges them by email and Moodle notification,"*
**Asset:** `channels.png` dimmed backdrop.
**Layout:** **Email card** (envelope) + **Notification card** (bell), brand-blue accents.
**Timeline:**
- 0.3 Email card slides in L; a paper-plane arcs out (send).
- 0.9 Notification card slides in R; bell rings (rotate ±12° ×2) + red **"1"** badge **POP**.
- 1.6 both settle; green **"delivered"** check ticks on each.
**SFX:** whoosh + email swoosh + bell ding. **Out:** cards slide down to reveal S10.

### S10 · 0:29–0:32 · [SHOT] — *"on your schedule, in your branding."*
**Asset:** `templates.png` in an **email-client frame**.
**Layout:** branded template preview; three brand swatches (primary/accent/body).
**Timeline:**
- 0.0 frame **RISE**.
- 0.5 swatches tick in; the template **header bar fills** with brand primary via a colour-wipe (branding applied).
- ken-burns.
**SFX:** soft paint-fill swish. **Out:** hard cut.

### S11 · 0:32–0:36 · [F+SHOT] — *"Need the wording fast? Let Moodle's built-in AI draft the template."*
**Asset:** `ai.png` dimmed backdrop.
**Layout:** AI panel — prompt field **"Describe the email…"**, **Generate draft** button, AI **sparkle** glyph, draft output area.
**Timeline:**
- 0.3 brief text **types** into the field (1.0s): *"A friendly nudge for learners who haven't started…"*
- 1.4 **Generate draft** button presses (scale 0.96 + brand glow); sparkle burst.
- 1.9 draft subject + body reveal line-by-line (STAGGER) behind a shimmer sweep.
- 3.2 green **"Saved as template"** toast **POP**.
**SFX:** keyboard ticks + sparkle + confirm. **Out:** push-up.

### S12 · 0:36–0:39 · [F] — *"Still no response? It escalates straight to their manager."*
**Layout:** escalation diagram — **learner node** (L, `--coral`, sub-label "3 reminders · still incomplete") → **arrow** → **manager node** (R, `--brand2`, alert bell). **"ESCALATED"** stamp.
**Timeline:**
- 0.0 learner node **RISE** (L).
- 0.6 arrow **DRAW** L→R (amber→brand); a pulse travels along it.
- 1.2 manager node **POP** (R); bell badge rings.
- 1.8 **"ESCALATED"** stamp slams in (scale 1.3→1, slight rotate, `--coral`).
**SFX:** rising alert tone + stamp thud. **Out:** cut.

### S13 · 0:39–0:42 · [SHOT] — *(holds escalation beat)*
**Asset:** `managermap.png` in **BROWSER-FRAME**.
**Timeline:**
- 0.0 frame **RISE**.
- 0.5 **CALLOUT** around one mapping row; a line animates learner-column → manager-column.
- ken-burns.
**SFX:** soft whoosh. **Out:** hard cut.

### S14 · 0:42–0:46 · [F] — *"Every reminder is queued, deduplicated, retried, and logged —"*
**Layout:** horizontal pipeline: **[Queue] → [Dedupe] → [Retry] → [Log]**; a glowing reminder **packet** token travels through; reassurance line.
**Timeline:**
- 0.0 four nodes **RISE** L→R (STAGGER); connectors **DRAW**.
- 0.8 packet enters **Queue**; at **Dedupe** a duplicate forks off and dissolves ("×2→×1"); at **Retry** it loops once (circular arrow); at **Log** it drops into a stack that increments a counter. Each node lights `--green` as the packet passes.
- 3.4 **"0 spammed · 0 lost"** ticks in green.
**SFX:** conveyor ticks per node + a "logged" chunk. **Out:** push-left.

### S15 · 0:46–0:49 · [SHOT] — *"so no one gets spammed, and nothing slips through."*
**Asset:** logs/queue table (**to capture**) in **BROWSER-FRAME**.
**Layout:** log rows with status pills.
**Timeline:**
- 0.0 frame **RISE**.
- 0.4 rows cascade in (STAGGER 40ms); **"Sent"** pills tick `--green` down the column.
- ken-burns.
**SFX:** rapid soft ticks. **Out:** hard cut.

### S16 · 0:49–0:53 · [SHOT] — *"And a live dashboard shows completion climbing."*
**Asset:** `reports.png` in **BROWSER-FRAME** + an animated overlay chart.
**Layout:** dashboard screenshot; overlaid rising **area/line chart** (brand-blue→green) + KPI.
**Timeline:**
- 0.0 frame **RISE**.
- 0.5 chart line **DRAW** L→R, area fills upward (trending up).
- 1.8 KPI **COUNT** e.g. **"48% → 71% completion"** (`--green`, up-arrow).
- 2.8 subtle sparkle on the peak.
**SFX:** rising pitch sweep peaking on the KPI. **Out:** **gradient WIPE** into close.

### S17 · 0:53–0:57 · [F] — *"Built for Moodle 4.5 to 5.2. One-time license — with a full year of support included. No subscription."*
**Layout:** ThemeForest-style **"Included:"** card (brand-bordered `--panel`); four checklist rows; a **"Moodle 4.5–5.2"** compatibility badge.
**Timeline:**
- 0.0 card **RISE**.
- 0.4 / 0.9 / 1.4 / 1.9 four rows tick in (STAGGER) — each a green check **DRAW** + label slide:
  **✓ One-time license · ✓ 1 year of support included · ✓ Works on Moodle 4.5 – 5.2 · ✓ No subscription**
- 2.4 **"Moodle 4.5–5.2"** badge stamps top-right.
**SFX:** four crisp ascending ticks. **Out:** push-up.

### S18 · 0:57–1:00 · [F] — *"Modern Course Reminder. Turn enrolments into completions."*
**Layout:** hero logo lockup on brand-gradient glow; tagline **"Turn enrolments into completions."**; a callback row of grey dots → green checks.
**Timeline:**
- 0.0 gradient glow blooms; glyph + wordmark **RISE** (letters STAGGER).
- 0.8 tagline fades in; **"completions"** gets a green underline **DRAW** + check.
- 1.4 **the grey drop-off dots from S02 flip to green checks** in a quick left→right wave (payoff).
**SFX:** warm resolve chord + bright chime on the green wave. **Out:** soft hold.

### S19 · 1:00–1:04 · [F] — *"Find it now on the Moodle Plugins Directory."*
**Layout:** CTA card — a Moodle Plugins Directory motif (search bar + result card, reuse the `ten-reasons/plugins-directory.html` styling), **"Search: Modern Course Reminder"**, brand **"Get it now"** button; small agunfon mark + `agunfoninteractivity.com` footer.
**Timeline:**
- 0.0 CTA card **RISE**; search bar **types** "Modern Course Reminder", cursor clicks, a result card slides up.
- 1.4 **"Get it now"** button pulses (scale loop) with a cursor tap.
- 2.2 agunfon logo + footer fade in.
- to end: gentle vignette; hold.
**SFX:** type + click + final confident sting. **Out:** fade to `--nav` end card.

---

## 4. Screen-count check
19 scenes · durations `3,4,3,3,3, 3,4,3,3,3, 4,3,3,4,3, 4,4,3,4` = **64s of frame time** + ~10–14s absorbed by VO pauses/holds ⇒ lands ~74–80s. Every scene ≤ 4s ✓. If final audio runs long, trim holds on S06/S08/S13 (screenshot scenes) first.

## 5. Screenshot & asset manifest

Two sources: **`coverpage/screenshots/`** (original clean captures) and **`ten-reasons/edited-deck-media/`** (the extracted + renamed deck captures, all 803×653). Prefer whichever is cleaner per scene.

| Scene | Asset | Source | Frame | Callout / note |
|-------|-------|--------|-------|----------------|
| S06, S07 | `rule-builder.png` | edited-deck-media | browser | trigger / WHEN area |
| S08 | `rules-list.png` *(stand-in)* or re-shoot a scope selector | edited-deck-media | browser | "Applies to": course / category / cohort |
| S09 | `channels-settings.png` | edited-deck-media | dimmed backdrop | email + notification toggles |
| S10 | `send-now-preview.png` (branded email) or `templates-list.png` | edited-deck-media | email-client | Agunfon-branded header |
| S11 | `ai.png` | coverpage/screenshots | dimmed backdrop | prompt → draft *(no AI shot in the deck)* |
| S13 | `manager-mapping.png` | edited-deck-media | browser | a mapping row |
| S15 | `reminder-queue.png` (all "Sent") ✓ | edited-deck-media | browser | green Sent status column |
| S16 | `reports-dashboard.png` (KPI cards) + overlay chart | edited-deck-media | browser | KPI tiles / effectiveness |

**Resolved:** the S15 logs/queue shot now exists — `reminder-queue.png`.
**Still ideal to capture:** a clean **scope-selector** ("Applies to" = All courses / Category / Cohort) for S08; `rules-list.png` is a serviceable stand-in.
**Anonymise before public use:** `send-now-preview.png` shows a real gmail address, and `reminder-logs.png` has red "Failed" rows (off-message for "nothing slips through" — prefer `reminder-queue.png`'s all-"Sent" view for S15). Blur or re-seed these.
**Extra deck assets available** (not in the current cut, handy if you extend): `add-campaign.png`, `health-check.png`, `templates-list.png`, `reports-dashboard.png`, `reminder-logs.png`, `send-now-form.png`.

## 6. Build order (suggested)
1. Scaffold the shared token CSS (§2) + reusable components (counter, dot-grid, chip, browser-frame, checklist).
2. Build the all-design act first (S01–S05, S12, S14, S17–S19) — no screenshot dependency.
3. Build `[SHOT]`/`[F+SHOT]` scenes as assets are confirmed; capture the 2 missing screenshots.
4. Review pacing against the rendered voiceover; trim holds as noted in §4.
