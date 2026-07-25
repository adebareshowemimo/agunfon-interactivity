# Modern Video Player — Audio-aligned timeline (word-level)

**Authoritative sync sheet.** Timecodes are the **real** per-scene start/end derived from ElevenLabs character-level timestamps for the actual `voiceover.mp3` (re-synthesised with the with-timestamps endpoint, same Brian voice/settings, then re-mixed into `voiceover_music.mp3`). Use these exact times to sync the animation — they replace the estimates in `storyboard.md` §3.

- **Total runtime:** **72.91s** · **20 scenes** · voice = Brian, model `eleven_multilingual_v2`
- **Source:** `audio-timings.json` (machine-readable) · audio: `voiceover.mp3` / `voiceover_music.mp3`

## Scene timing

| # | Start | End | Dur | Type | Scene (visual) | VO line | Asset |
|---|-------|-----|-----|------|----------------|---------|-------|
| S01 | 0:00.00 | 0:01.21 | 1.21s | [F] | Upload ✔ + video tile | "You hit upload." | — |
| S02 | 0:01.21 | 0:08.17 | **6.97s** | [F] | 3 question chips pop across the hold | "And that's the last thing you really know about that video. Who watched it? Did they skip to the end? Did it leak?" | — |
| S03 | 0:08.17 | 0:10.40 | 2.23s | [F+SHOT] | player desaturated + "no data" | "Moodle just… plays it." | `player-view.png` |
| S04 | 0:10.40 | 0:17.64 | **7.24s** | [F] | logo reveal + 3 pillars light up | "Modern Video Player changes that. It turns any Moodle video into an activity you can track, protect, and prove." | — |
| S05 | 0:17.64 | 0:18.94 | 1.30s | [F] | **TRACK IT** title (blue) | "Track it." | — |
| S06 | 0:18.94 | 0:23.71 | 4.77s | [SHOT] | engagement heatmap | "Now you see exactly how every learner watches. An engagement heatmap." | `heatmap.png` |
| S07 | 0:23.71 | 0:26.67 | 2.96s | [F] | retention drop-off curve | "A retention curve that reveals where they drop off." | — |
| S08 | 0:26.67 | 0:32.41 | 5.74s | [F+SHOT] | rewatch + cohort/report | "The parts they rewatch. All on one dashboard, across every course and cohort." | `learner-report.png` |
| S09 | 0:32.41 | 0:33.49 | 1.08s | [F] | **PROTECT IT** title (coral) | "Protect it." | — |
| S10 | 0:33.49 | 0:36.56 | 3.07s | [F+SHOT] | watermark tiling + settings inset | "Stamp every stream with the learner's own name." | `settings-watermark.png` |
| S11 | 0:36.56 | 0:40.63 | 4.07s | [F] | signed S3/Azure URL flow | "Serve it through signed URLs from your own S3 or Azure storage." | — |
| S12 | 0:40.63 | 0:43.87 | 3.24s | [F] | capture warning + hash-chain ledger | "Deter screen capture with a tamper-evident audit trail." | — |
| S13 | 0:43.87 | 0:44.79 | **0.92s** | [F] | **PROVE IT** title (green) | "Prove it." | — |
| S14 | 0:44.79 | 0:46.77 | 1.98s | [SHOT] | audit export | "Full audit exports." | `audit-export.png` |
| S15 | 0:46.77 | 0:51.98 | 5.21s | [F+SHOT] | More menu + xAPI/LTI badges | "xAPI to your LRS. LTI 1.3 with grade passback." | `more-menu.png` |
| S16 | 0:51.98 | 0:57.62 | 5.64s | [F+SHOT] | sources + 7 skins | "Play from an upload, YouTube, Vimeo, or your own cloud, in seven player skins." | `video-source.png` + `player-styles.png` |
| S17 | 0:57.62 | 1:01.48 | 3.86s | [F] | product lockup + promise | "Modern Video Player. Know exactly how your videos are watched." | — |
| S18 | 1:01.48 | 1:05.64 | 4.17s | [F] | "Included" checklist | "One-time licence, a full year of support, no subscription." | — |
| S19 | 1:05.64 | 1:10.51 | 4.87s | [F] | CTA card (Moodle Marketplace) | "Start free on the Moodle Plugins Directory, or go Premium on the Moodle Marketplace." | — |
| S20 | 1:10.51 | 1:12.91 | 2.40s | [F] | sign-off sting | "Modern Video Player makes Moodle work harder." | — |

## Scene-start cue array (seconds)
For a `scenes.html`-style player or the NLE marker track:
```js
const CUES = [0.00, 1.21, 8.17, 10.40, 17.64, 18.94, 23.71, 26.67, 32.41, 33.49,
              36.56, 40.63, 43.87, 44.79, 46.77, 51.98, 57.62, 61.48, 65.64, 70.51];
const END = 72.91;
```

## Pacing notes (what the real timing revealed)
- **S02 (6.97s) and S04 (7.24s) are long holds** — don't leave them static. Spread the internal beats across the hold:
  - **S02:** the statement "…the last thing you really know…" runs first (~1.2–4.0s), then the three chips land on the words — **Watched?** ≈ 0:04.3, **Skipped?** ≈ 0:05.6, **Leaked?** ≈ 0:07.3 (place on "watched / skip / leak"; approximate, tune by ear).
  - **S04:** logo reveal first, then the three pillars light up on the words — **Track** / **Protect** / **Prove** land in the final ~1.5s ("track, protect, and prove"); stagger them there, not at the start.
- **Title cards are fast punches:** S05 1.3s, S09 1.1s, **S13 only 0.92s** — snap "Prove it." in hard, no hold; cut immediately to the audit export.
- **S14 "Full audit exports." is ~2s** — quick flash of `audit-export.png` with a fast callout; don't linger.
- **Music:** the near-silence beat lands on **S03 (0:08.2)**; the pillar lifts fall on S05/S09/S13 title cards; the swell begins into **S17 (0:57.6)** and resolves on the S20 sign-off.

## How this was produced (for the record / next plugins)
Re-synthesised the VO via `POST /v1/text-to-speech/{voice}/with-timestamps` (same settings), decoded the audio, and mapped each scene's opening phrase to `alignment.character_start_times_seconds`. Script: `moodle-pwtests/mvp-timestamps.mjs`. Because the audio was regenerated, `voiceover.mp3` + `voiceover_music.mp3` were rebuilt so these timecodes match the shipped audio exactly.
