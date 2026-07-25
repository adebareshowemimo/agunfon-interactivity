# Modern Learner Dashboard — Promo Cue Sheet (audio-aligned)

**The authoritative timing map.** Every scene is re-fit to the **rendered voiceover** (`voiceover.mp3` / final mix `voiceover_music.mp3`, **82.1s**), using the real phrase boundaries measured from the audio (ffmpeg `silencedetect`, see §3). This supersedes the *planned* times in `storyboard.md` §3 — build to these numbers.

- **Audio:** `voiceover_music.mp3` · **82.10s** · music fades from **80.0s**
- **Frame base:** **30 fps → 2463 frames** total (`durationInFrames`)
- **Legend:** `[F]` designed frame (no screenshot) · `[SHOT]` real screenshot · `[F+SHOT]` overlay on screenshot
- **"Speech" column** = when the VO line is actually audible inside the scene; the remainder of the scene is a **hold** (where the transition/emphasis lands). Screenshots stay on screen for the whole scene In–Out.

## 1. Master cue sheet

| Scene | In–Out (s) | Dur | Frames | Type | **Image on screen** | VO speech window | Line |
|-------|-----------|-----|--------|------|---------------------|------------------|------|
| **S01** | 0.00–3.70 | 3.70 | 0–111 | [F] | *designed:* login → cluttered mock dashboard | 0.00–3.13 | "Your learners log in to Moodle… then what?" |
| **S02** | 3.70–10.83 | 7.13 | 111–325 | [F] | *designed:* 5 page-cards scatter to corners | 3.70–10.16 | "Their courses, grades, deadlines, badges, and profile are scattered across five different pages." |
| **S03** | 10.83–14.49 | 3.66 | 325–435 | [F] | *designed:* cards grey out, learner walks off | 10.83–13.53 | "So they stop looking, and they stop coming back." |
| **S04** | 14.49–18.16 | 3.67 | 435–545 | [F] | *designed:* cards ASSEMBLE → dashboard glyph + logo | 14.49–17.53 | "Modern Learner Dashboard gives every learner one home." |
| **S05** | 18.16–26.65 | 8.49 | 545–800 | [SHOT] | **`overview-hero.png`** | 18.16–26.02 | "Courses, completion, due dates, grades, badges, and certificates, together in a single block on the Dashboard." |
| **S06** | 26.65–33.04 | 6.39 | 800–991 | [SHOT] | **`continue-learning.png`** | 26.65–32.21 | "Continue learning surfaces the courses they opened last, with progress bars and a one-click resume." |
| **S07** | 33.04–37.70 | 4.66 | 991–1131 | [F+SHOT] | **`course-library.png`** | 33.04–37.05 | "A searchable course library lets them find and self-enrol in what's next." |
| **S08** | 37.70–42.10 | 4.40 | 1131–1263 | [F+SHOT] | **`calendar.png`** | 37.70–41.33 | "A built-in calendar and a due-soon count keep deadlines from slipping." |
| **S09** | 42.10–45.08 | 2.98 | 1263–1352 | [F+SHOT] | **`overview-hero.png`** (dimmed/blur) + badge & certificate cards | 42.10–44.59 | "Badges and certificates sit front and centre," |
| **S10** | 45.08–49.31 | 4.23 | 1352–1479 | [SHOT] | **`my-courses-transcript.png`** | 45.08–48.77 | "and a learning transcript records every completed course, ready for audit." |
| **S11** | 49.31–55.01 | 5.70 | 1479–1650 | [SHOT] | **`profile-edit-modal.png`** ⚠️ *anonymise email* | 49.31–54.27 | "Learners even edit their own profile right here, so your team stops fielding profile tickets." |
| **S12** | 55.01–61.24 | 6.23 | 1650–1837 | [F] | *designed:* ✗ service · ✗ tables · ✗ cron → "Core Moodle only" | 55.01–60.67 | "And it runs on core Moodle. No external service, no new tables, no cron." |
| **S13** | 61.24–66.51 | 5.27 | 1837–1995 | [F+SHOT] | **`themes-compat.png`** + 3 ✓ badges | 61.24–65.88 | "Privacy-clean, fast on big sites, and native in the theme you already run." |
| **S14** | 66.51–70.34 | 3.83 | 1995–2110 | [F] | *designed:* logo lockup + 5 cards re-nest | 66.51–69.77 | "Modern Learner Dashboard. Bring every learner home." |
| **S15** | 70.34–75.00 | 4.66 | 2110–2250 | [F] | *designed:* "Included" checklist card | 70.34–74.45 | "One-time licence, a full year of support, no subscription." |
| **S16** | 75.00–77.26 | 2.26 | 2250–2318 | [F] | *designed:* Moodle Marketplace CTA card | 75.00–76.54 | "Get it on the Moodle Marketplace." |
| **S17** | 77.26–82.10 | 4.84 | 2318–2463 | [F] | *designed:* sign-off sting + glyph | 77.26–81.70 | "Modern Learner Dashboard: everything your learners are working toward, in one place." |

**Screenshot on-screen windows (quick reference — when each real image is visible):**
| Image | On screen |
|-------|-----------|
| `overview-hero.png` | **18.16–26.65** (S05) and again dimmed **42.10–45.08** (S09) |
| `continue-learning.png` | **26.65–33.04** (S06) |
| `course-library.png` | **33.04–37.70** (S07) |
| `calendar.png` | **37.70–42.10** (S08) |
| `my-courses-transcript.png` | **45.08–49.31** (S10) |
| `profile-edit-modal.png` ⚠️ | **49.31–55.01** (S11) |
| `themes-compat.png` | **61.24–66.51** (S13) |

Everything else (S01–S04, S12, S14–S17 = 0.00–18.16 and 55.01–61.24 and 66.51–82.10) is **designed animation, no screenshot**.

## 2. Timing notes (holds got longer — keep them alive)
The measured VO (82.1s) is ~17s longer than the planned frame time (~65s), almost all of it in the narration-dense middle. Four scenes now hold well past 4s — add secondary motion so they don't feel static:
- **S02 (7.1s)** — one card scatters per named page (courses→grades→deadlines→badges→profile), ~1.0s apart, ending on the "5 different pages" kicker. The length is the point (five things leaving).
- **S05 (8.5s)** — the seven stat tiles COUNT up one per named item across 18.16–26.02 (~1.1s each); on "together in a single block on the Dashboard" (23.6–26.0) **pull back** to reveal the whole block + sidebar. Treat as S05a (tiles) → S05b (pull-back).
- **S06 (6.4s)** — cascade the cards (0–1.5s), fill the progress bar (1.5–3s), then the resume CALLOUT + cursor tap (3–5s), hold.
- **S12 (6.2s)** — space the three strike-throughs to the VO (✗ service ≈55.5s · ✗ tables ≈57.5s · ✗ cron ≈59.7s), then the "Core Moodle only" badge lands ~60.5s.

## 3. Transitions land on the pauses (not mid-word)
Fire the two special transitions inside the silent gap between scenes so they don't cut speech:
- **S03 → S04 gradient wipe:** in the **13.53–14.49** pause (VO "…coming back." ends 13.53; "Modern Learner Dashboard…" starts 14.49).
- **S13 → S14 gradient wipe:** in the **65.88–66.51** pause.
- **S04 → S05 match-cut** (glyph → overview block): in the **17.53–18.16** pause.
All other cuts are hard cuts on the beat, each already sitting on a measured phrase gap.

## 4. Measured phrase boundaries (source of truth)
From `ffmpeg silencedetect=noise=-32dB:d=0.22` on `voiceover.mp3`. Speech segments (gaps = gaps between them):

```
0.00–1.76  "Your learners log in to Moodle"
2.68–3.13  "then what?"
3.70–10.16 "Their courses, grades, deadlines, badges, and profile are scattered across five different pages."
10.83–11.90 "So they stop looking,"
12.39–13.53 "and they stop coming back."        ← hook ends
14.49–17.53 "Modern Learner Dashboard gives every learner one home."
18.16–23.03 "Courses, completion, due dates, grades, badges, and certificates,"
23.64–26.02 "together in a single block on the Dashboard."
26.65–32.21 "Continue learning surfaces the courses they opened last, with progress bars and a one-click resume."
33.04–37.05 "A searchable course library lets them find and self-enrol in what's next."
37.70–41.33 "A built-in calendar and a due-soon count keep deadlines from slipping."
42.10–44.59 "Badges and certificates sit front and centre,"
45.08–48.77 "and a learning transcript records every completed course, ready for audit."
49.31–54.27 "Learners even edit their own profile right here, so your team stops fielding profile tickets."
55.01–56.47 "And it runs on core Moodle."
56.99–60.67 "No external service, no new tables, no cron."
61.24–65.88 "Privacy-clean, fast on big sites, and native in the theme you already run."
66.51–67.80 "Modern Learner Dashboard."
68.46–69.77 "Bring every learner home."
70.34–74.45 "One-time licence, a full year of support, no subscription."
75.00–76.54 "Get it on the Moodle Marketplace."
77.26–81.70 "Modern Learner Dashboard: everything your learners are working toward, in one place."
```
Re-run after any re-record: `ffmpeg -i voiceover.mp3 -af "silencedetect=noise=-32dB:d=0.22" -f null -` then re-fit the In–Out column.
