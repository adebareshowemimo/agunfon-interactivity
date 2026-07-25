# Modern Learner Dashboard — Remotion Build Brief

**What this is:** the [storyboard.md](storyboard.md) 17-scene film, re-expressed as a **Remotion** (React, frame-driven) build. Creative source of truth stays `storyboard.md` §3 (exact layout, hex, per-element timeline); this file is the *engineering* layer — project shape, frame math, reusable recipe code, per-scene mapping, audio, and the render command.

- **Companions:** [cue-sheet.md](cue-sheet.md) (**authoritative timing — audio-aligned**) · [storyboard.md](storyboard.md) (creative) · [script.md](script.md) · [voiceover.txt](voiceover.txt)
- **Format:** 1920×1080 · **30 fps** · 17 `<Sequence>`s · **2463 frames (82.1s)** — locked to the rendered voiceover per `cue-sheet.md`.
- **Boundary:** building the video is *past* the promo-kit hand-off. This is the opt-in "build it in Remotion" path.

---

## 0. Why Remotion for this film
Everything in the storyboard is a pure function of time, which is exactly Remotion's model: `value = f(useCurrentFrame())`. Screenshots are first-class (`<Img>`), audio muxes in the same render, and output is deterministic 1080p/4K with exact durations. The only translation is **wall-clock CSS animation → frame interpolation** (done once in `recipes.tsx` below).

## 1. Project setup
```bash
npx create-video@latest mld-promo --blank   # or: npm i remotion @remotion/cli @remotion/transitions @remotion/google-fonts
cd mld-promo
# copy assets in:
#   public/shots/*         <- ten-reasons/edited-deck-media/*.png  (ANONYMISE the 2 profile shots first)
#   public/audio/voiceover_music.mp3   <- the Step-D final mix (or voiceover.mp3 + music/bed.mp3 separately)
npx remotion studio        # live preview
```
`remotion.config.ts`: `Config.setVideoImageFormat('jpeg'); Config.setConcurrency(null);` — defaults are fine.

## 2. Composition + timeline
`durationInFrames = 2463` (82.1s), **locked to the rendered voiceover** — the frame ranges below come straight from [cue-sheet.md](cue-sheet.md) (measured phrase boundaries × 30 fps). If you re-record the VO, re-run the cue-sheet's `silencedetect` and update both.

```tsx
// src/Root.tsx
import {Composition} from 'remotion';
import {Promo} from './Promo';
export const RemotionRoot = () => (
  <Composition id="mld-promo" component={Promo}
    durationInFrames={2463} fps={30} width={1920} height={1080} />
);
```

**Frame map (30 fps) — audio-aligned (from `cue-sheet.md`):**

| Scene | from | dur | In–Out (s) | type | Recipes / key motion | Asset |
|-------|-----:|----:|-----------|------|----------------------|-------|
| S01 | 0 | 111 | 0.00–3.70 | F | login POP → clutter STAGGER; "…then what?" RISE | — |
| S02 | 111 | 214 | 3.70–10.83 | F | 5 cards RISE then **SCATTER** one-per-page (~1.0s apart) | — |
| S03 | 325 | 110 | 10.83–14.49 | F | cards→`cardOff`; avatar walk-off; text RISE; **music drop** | — |
| S04 | 435 | 110 | 14.49–18.16 | F | **ASSEMBLE** 5 cards→glyph; wordmark RISE; wipe-in | — |
| S05 | 545 | 255 | 18.16–26.65 | SHOT | 7 tiles COUNT wave (18–23s) → **pull-back** to full block (23.6–26s) | `overview-hero.png` |
| S06 | 800 | 191 | 26.65–33.04 | SHOT | card cascade → progress bar 0→68% → resume CALLOUT | `continue-learning.png` |
| S07 | 991 | 140 | 33.04–37.70 | F+SHOT | search type-on; filter POP; self-enrol CALLOUT | `course-library.png` |
| S08 | 1131 | 132 | 37.70–42.10 | F+SHOT | date CALLOUT; "Due soon" pill flies (interpolate x/y) | `calendar.png` |
| S09 | 1263 | 89 | 42.10–45.08 | F+SHOT | badge+cert cards POP from dimmed overview; COUNT | `overview-hero.png` (blur) |
| S10 | 1352 | 127 | 45.08–49.31 | SHOT | transcript panel height-reveal; rows STAGGER; stamp POP | `my-courses-transcript.png` |
| S11 | 1479 | 171 | 49.31–55.01 | SHOT | modal RISE; field focus DRAW; Save toast POP | `profile-edit-modal.png` ⚠️ |
| S12 | 1650 | 187 | 55.01–61.24 | F | 3 chips strike (≈55.5 / 57.5 / 59.7s) → "Core Moodle" badge | — |
| S13 | 1837 | 158 | 61.24–66.51 | F+SHOT | ring hop across themes; 3 ✓ DRAW | `themes-compat.png` |
| S14 | 1995 | 115 | 66.51–70.34 | F | lockup RISE; 5 cards re-nest ASSEMBLE; "home" underline DRAW | — |
| S15 | 2110 | 140 | 70.34–75.00 | F | Included checklist — 4 checks DRAW (STAGGER); badge stamp | — |
| S16 | 2250 | 68 | 75.00–77.26 | F | Marketplace search type-on; "Get it now" pulse | — |
| S17 | 2318 | 145 | 77.26–82.10 | F | glyph BREATHE; nested cards shimmer; "one place" underline | — |

```tsx
// src/Promo.tsx  — all plain hard-cut Sequences at the cue-sheet frames.
// The two gradient WIPES (S03→S04, S13→S14) are done as an in-scene wipe overlay
// inside the trailing pause of S03 / S13, so frame numbers stay 1:1 with the cue sheet.
import {AbsoluteFill, Sequence, Audio, staticFile} from 'remotion';
import {C} from './tokens';
import {S01,S02,S03,S04,S05,S06,S07,S08,S09,S10,S11,S12,S13,S14,S15,S16,S17} from './scenes';

const CUES: [number, number, React.FC][] = [
  [0,    111, S01], [111,  214, S02], [325,  110, S03], [435,  110, S04],
  [545,  255, S05], [800,  191, S06], [991,  140, S07], [1131, 132, S08],
  [1263,  89, S09], [1352, 127, S10], [1479, 171, S11], [1650, 187, S12],
  [1837, 158, S13], [1995, 115, S14], [2110, 140, S15], [2250,  68, S16],
  [2318, 145, S17],
];

export const Promo: React.FC = () => (
  <AbsoluteFill style={{backgroundColor: C.nav}}>
    {/* one pre-ducked mix spanning the whole film (Step-D output) */}
    <Audio src={staticFile('audio/voiceover_music.mp3')} />
    {CUES.map(([from, dur, Scene], i) => (
      <Sequence key={i} from={from} durationInFrames={dur}><Scene/></Sequence>
    ))}
  </AbsoluteFill>
);
```
> Prefer real cross-dissolves via `@remotion/transitions`? Wrap only the S03/S04 and S13/S14 pairs in a `<TransitionSeries>` with `wipe()` — but then subtract the transition's `durationInFrames` from the following `from` values, because a `TransitionSeries.Transition` overlaps (consumes) frames. The plain-Sequence + overlay approach above keeps the numbers matching `cue-sheet.md` exactly, which is why it's the default here.

## 3. Design tokens
```ts
// src/tokens.ts
export const C = {
  nav:'#0A1830', panel:'#0E2240', panelBrd:'#24406B', ink:'#FFFFFF',
  muted:'#9FB3D1', muted2:'#6B7A93', cardOff:'#37455C',
  brand1:'#0F3D7A', brand2:'#4B8BE8', green:'#16B364', coral:'#F97316',
  grad:'linear-gradient(135deg,#0F3D7A,#4B8BE8)',
} as const;
// type: mega 220/800 · h1 88/700 · h2 52/600 · body 32/500 · kicker 24/600 up .08em
```

## 4. Motion recipes → frame hooks
The storyboard's named recipes, as pure-frame helpers. Build these once; every scene composes them.
```tsx
// src/recipes.tsx
import {useCurrentFrame, useVideoConfig, interpolate, spring, Easing, Img} from 'remotion';

const clamp = {extrapolateLeft:'clamp' as const, extrapolateRight:'clamp' as const};

/** RISE — opacity 0→1, translateY 28→0 (~0.55s) */
export const rise = (frame:number, delay=0, dur=16) => ({
  opacity: interpolate(frame-delay, [0,dur], [0,1], clamp),
  transform: `translateY(${interpolate(frame-delay,[0,dur],[28,0],{...clamp,easing:Easing.out(Easing.cubic)})}px)`,
});

/** POP — scale .8→1 with springy back */
export const usePop = (delay=0) => {
  const frame = useCurrentFrame(); const {fps} = useVideoConfig();
  const s = spring({frame:frame-delay, fps, config:{damping:12, stiffness:180, mass:0.6}});
  return {opacity: interpolate(s,[0,0.3],[0,1],{extrapolateRight:'clamp'}), transform:`scale(${interpolate(s,[0,1],[0.8,1])})`};
};

/** COUNT — integer roll to `to` */
export const count = (frame:number, to:number, delay=0, dur=33) =>
  Math.round(interpolate(frame-delay,[0,dur],[0,to],{...clamp,easing:Easing.out(Easing.cubic)}));

/** DRAW — strokeDashoffset len→0 (set stroke-dasharray={len}) */
export const draw = (frame:number, len:number, delay=0, dur=15) =>
  interpolate(frame-delay,[0,len && dur],[len,0],clamp);

/** BREATHE — subtle looping scale (for held hero elements) */
export const breathe = (frame:number, amp=0.005, period=90) => 1 + amp*Math.sin((frame/period)*Math.PI*2);

/** kenBurns — slow zoom across a sequence */
export const kenBurns = (frame:number, dur:number, from=1, to=1.04) =>
  interpolate(frame,[0,dur],[from,to],{extrapolateRight:'clamp'});

/** SCATTER — card flies from centre to a target (px) and desaturates */
export const scatter = (frame:number, tx:number, ty:number, delay=0, dur=18) => {
  const p = interpolate(frame-delay,[0,dur],[0,1],{...clamp,easing:Easing.inOut(Easing.cubic)});
  return {transform:`translate(${tx*p}px,${ty*p}px) rotate(${8*p}deg)`, filter:`saturate(${1-0.85*p})`, opacity:1-0.6*p};
};

/** ASSEMBLE — inverse of scatter: from corner back to centre + snap to tile */
export const assemble = (frame:number, fromX:number, fromY:number, delay=0, dur=21) => {
  const p = interpolate(frame-delay,[0,dur],[0,1],{...clamp,easing:Easing.inOut(Easing.cubic)});
  return {transform:`translate(${fromX*(1-p)}px,${fromY*(1-p)}px) rotate(${8*(1-p)}deg) scale(${interpolate(p,[0,1],[1,0.42])})`, filter:`saturate(${0.15+0.85*p})`, opacity:interpolate(p,[0,0.2],[0.4,1],{extrapolateRight:'clamp'})};
};

/** BROWSER-FRAME — the [SHOT] chrome + ken-burns */
export const BrowserFrame: React.FC<{src:string; url?:string; dur:number}> = ({src,url='…/my/',dur}) => {
  const frame = useCurrentFrame();
  return (
    <div style={{borderRadius:16, overflow:'hidden', boxShadow:'0 40px 120px rgba(0,0,0,.5)', background:'#0b1526', maxWidth:1500, margin:'0 auto'}}>
      <div style={{height:44, background:'#0b1526', display:'flex', alignItems:'center', gap:8, padding:'0 16px'}}>
        {['#ff5f57','#febc2e','#28c840'].map(c=><span key={c} style={{width:12,height:12,borderRadius:6,background:c}}/>)}
        <div style={{marginLeft:16,height:26,flex:1,borderRadius:13,background:'#16233b',color:'#6B7A93',fontSize:14,display:'flex',alignItems:'center',padding:'0 14px'}}>{url}</div>
      </div>
      <Img src={src} style={{width:'100%', display:'block', transform:`scale(${kenBurns(frame,dur)})`, transformOrigin:'center'}}/>
    </div>
  );
};

/** CALLOUT — a brand ring that DRAWs around a region + label pill (place absolutely per scene) */
```
Scene usage sketch (S05):
```tsx
// src/scenes/S05.tsx
import {AbsoluteFill, staticFile, useCurrentFrame} from 'remotion';
import {BrowserFrame, count} from '../recipes';
import {C} from '../tokens';
export const S05: React.FC = () => {
  const f = useCurrentFrame();
  return (
    <AbsoluteFill style={{backgroundColor:C.nav, justifyContent:'center', alignItems:'center'}}>
      <BrowserFrame src={staticFile('shots/overview-hero.png')} dur={120}/>
      {/* overlay the 7 tiles' COUNT values positioned over the screenshot, e.g. count(f, 12, 18+i*3) per tile */}
    </AbsoluteFill>
  );
};
```

## 5. Fonts (determinism-safe)
```tsx
import {loadFont} from '@remotion/google-fonts/Inter';
export const {fontFamily} = loadFont(); // sets a delayRender internally; use fontFamily everywhere
```

## 6. Audio
Simplest and matches the kit: feed the **pre-ducked Step-D mix** as one `<Audio src={staticFile('audio/voiceover_music.mp3')} />` (already in `Promo` above). If instead you keep VO + music separate, duck by frame:
```tsx
<Audio src={staticFile('audio/voiceover.mp3')} />
<Audio src={staticFile('audio/bed.mp3')} volume={(f)=> f < 240 ? 0.7 : 0.22 } />  // dip under narration
```

## 7. Determinism gotchas (Remotion-specific)
- **No `Math.random()` / `Date.now()`** — use `random('mld-'+i)` from `remotion` for any jitter/positions.
- **Fonts**: use `@remotion/google-fonts/Inter` (above) or wrap manual `@font-face` loads in `delayRender()`/`continueRender()`, else first frames render fontless.
- **No CSS `animation:` loops** — `BREATHE`, floating chips, orbit rings must be `Math.sin(frame/…)` (see `breathe`).
- **Screenshots** must live under `public/` and load via `staticFile()`; a bare relative `<img src>` won't resolve in render.

## 8. Render
```bash
npx remotion render mld-promo out/mld-promo.mp4 --codec=h264 --crf=18
# 4K: add --scale=2 (renders 3840×2160). Prores for editing: --codec=prores.
```

## 9. Build order
1. `tokens.ts` + `recipes.tsx` + `<BrowserFrame>` + the `Card` (five-page) and `Glyph` (4-tile) components.
2. Design-only scenes first — **S01–S04, S12, S14–S17** (carry the scatter→assemble loop; no assets).
3. `[SHOT]`/`[F+SHOT]` scenes as assets land; **anonymise** `profile-edit-modal.png` first.
4. Drop in `<Audio>`, then re-fit `durationInFrames` + each `from` to the measured VO; trim/extend holds per storyboard §4.
