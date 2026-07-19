# Agunfon Brand, Content and Image QA Audit

**Audit date:** 19 July 2026  
**Scope:** All public marketing pages and shared components in `resources/views`, the site route inventory, existing QA evidence, and the 31-page Agunfon brand guide.  
**Review lens:** Senior copywriting, brand quality, image art direction, accessibility and commercial credibility.

## Executive verdict

Agunfon has a credible enterprise-learning proposition, but the current website does not yet look or read like Africa's leading LMS provider. The biggest gap is not the UI; it is trust. Generic stock photography, repeated images across unrelated sectors, inconsistent English, unfinished plugin pages, weak product evidence and contradictory commercial/legal copy make the business look less established than it is.

The brand guide calls for an **intelligent, modern and trustworthy** voice and a premium, structured, human-centred visual identity. The live site currently contains **89 Unsplash image placements across 31 templates, using 60 external URLs**. Every one of those 89 placements should be replaced or deliberately retired. Client logos and genuine plugin/LMS screenshots should remain because they function as evidence, not campaign photography.

### Release assessment

| Area | Verdict | Reason |
|---|---|---|
| Brand voice | Needs revision | Strong ideas are diluted by vague SaaS language, fragments, repetition and mixed English conventions. |
| Photography | Replace | Generic, externally hosted, repeatedly reused and often unrelated to Lagos, learning or consulting. |
| Product proof | Needs revision | Stock photos are used where real LMS screens, workflows and outcomes are required. |
| Commercial trust | Blocker | Broken purchase paths, placeholder prices/testimonials, contradictory pricing and unverifiable claims. |
| SEO and metadata | Blocker | Page title system is broken; descriptions and canonical/social metadata are missing or generic. |
| Accessibility | Needs revision | Vague/duplicated alt text, decorative images announced as content and form-label defects. |
| Legal consistency | Blocker | Nigeria/Georgia jurisdiction conflict, refund conflict and policies describing a different business model. |

## Brand standard to apply

- **Positioning:** Lagos-based enterprise learning specialists helping leading African organisations build capable, compliant and high-performing workforces.
- **Personality:** intelligent, modern, trustworthy.
- **Voice:** clear, precise, concise, confident, warm and evidence-led. Avoid inflated superlatives unless a claim can be substantiated.
- **Preferred English:** use en-GB consistently. It preserves the established product name “Modern Enrolment Notifier” and the documentation's dominant convention.
- **Palette:** Deep Blue `#022B69` as the dominant brand colour; Alice Blue `#EEF6FF`; Eerie Black `#181818`; white.
- **Typography:** Sora for headings and Inter for body copy, following the hierarchy in the brand guide.
- **Photography:** Black African professionals, primarily young Nigerian consultants and enterprise clients; recognisable contemporary Lagos context; candid working moments; natural skin texture; polished editorial lighting; restrained navy wardrobe accents.
- **Avoid:** anonymous global-office stock, skyscraper filler, handshake clichés, staged cheering, safari shorthand, tokenistic diversity, fake holograms, unreadable AI-generated text and embedded logos.

## Image replacement system

Seven original, brand-aligned master images were generated with the built-in ImageGen workflow and saved in `public/images/brand-2026/`. They form one coherent campaign rather than 89 unrelated stock selections.

| Asset | Best use |
|---|---|
| `agunfon-lagos-consultants-hero.png` | Home hero, About, Pricing, shared CTA backgrounds and broad corporate positioning. |
| `enterprise-learning-strategy-workshop.png` | Services, consulting, sales and marketing, customer service and enterprise transformation. |
| `adaptive-lms-product-team.png` | Adaptive LMS, Learning Suite, IT, analytics, integrations and product-feature cards. |
| `leadership-development-session.png` | Leadership, onboarding, HR, personal development, education and coaching. |
| `finance-compliance-advisory.png` | Finance, compliance, governance, risk and executive advisory. |
| `healthcare-social-impact-learning.png` | Healthcare, health and wellness, diversity and inclusion, nonprofit and social impact. |
| `retail-workforce-learning.png` | Retail, distributed workforce, frontline learning, mobile learning and operations. |

### Image placement inventory - all changes required

The count below includes each external Unsplash placement, including CSS background images. Replace the source, rewrite the alt text and confirm the crop at mobile, tablet and desktop widths.

| Template/page | Placements | Primary replacement direction |
|---|---:|---|
| About | 1 | Lagos consultants hero |
| Adaptive LMS | 6 | Product team + strategy workshop + Lagos hero |
| Book a Demo | 3 | Product team; use real UI screenshots for course cards where available |
| Compliance Training | 3 | Finance/compliance advisory |
| Customer Service | 3 | Strategy workshop + Lagos hero |
| Diversity & Inclusion | 3 | Healthcare/social-impact learning; avoid performative group posing |
| Education | 3 | Leadership session + product team |
| Employee Onboarding | 3 | Leadership session + strategy workshop |
| Finance | 3 | Finance/compliance advisory |
| Health & Wellness | 3 | Healthcare/social-impact learning |
| Healthcare | 3 | Healthcare/social-impact learning |
| Human Resources | 3 | Leadership session + strategy workshop |
| Information Technology | 3 | Adaptive LMS product team |
| Leadership Development | 3 | Leadership development session |
| Learning Suite | 4 | Adaptive LMS product team + strategy workshop |
| Nonprofit | 3 | Healthcare/social-impact learning |
| Personal Development | 3 | Leadership development session |
| Pricing | 2 | Lagos consultants hero + strategy workshop |
| Retail | 3 | Retail workforce learning |
| Sales & Marketing | 3 | Enterprise strategy workshop |
| Services | 10 | Use the seven-image library by service; prefer real UI screens for UI/UX, web, mobile and integrations |
| Header | 5 | Small crops from hero, product and strategy assets; remove purely decorative thumbnails on mobile if they add weight without meaning |
| Shared hero | 2 | Product team; replace “Course” alt text with the actual purpose or empty alt when decorative |
| LMS features | 4 | Real product UI is preferred; product-team photography is secondary |
| Features accordion | 1 | Leadership development session |
| Six plugin pages | 6 | Lagos hero for CTA background only; keep authentic plugin slides/screenshots |
| **Total** | **89** | **Replace all externally hosted stock placements.** |

### Images that should not be replaced

- Agunfon logo files and the giraffe-derived brand pattern.
- Client logos, subject to written permission and accurate relationship labelling.
- Genuine LMS/plugin screenshots, provided they reflect the current released product.
- Documentation screenshots that teach a real workflow.

## Highest-priority copy and brand issues

### Critical commercial and credibility issues

1. Six plugin purchase buttons return 404 and Starter/Pro routes do not preserve the selected plan.
2. Modern Flipbook contains `$XX`/`$XXX` pricing; Modern Flipbook and Modern Engagement Hub publish author instructions and placeholder statistics.
3. Every public page has an incorrect or generic `<title>` because the layout does not yield each page's title.
4. The Book a Demo form exposes a person's name, Gmail address and Nigerian mobile number as example placeholders.
5. Pricing claims “no hidden fees” while listing the same inclusions again as separately billed add-ons.
6. Terms name Nigeria and Georgia as conflicting governing jurisdictions and contradict each other on refunds.
7. Employee Onboarding contains Compliance Training copy and a pricing-inclusion list in place of onboarding capabilities.

### Senior copywriter review

- The site alternates between en-US and en-GB: “organization/personalized/optimization” versus “organisation/enrolment/licence”. Adopt en-GB and enforce it in CI.
- “Learning Suits” must be “Learning Suite”.
- “All Right Reserved” must be “All Rights Reserved”; use a dynamic year.
- “Key Feature & Capabilities” appears across 15 industry pages; use “Key Features & Capabilities”.
- “Give feedbacks” is incorrect; use “Give feedback” or “Provide feedback”.
- The Learning Suite hero sentence is grammatically incoherent and should be rewritten around a single value proposition.
- The Book a Demo H1 says “Adaptive's Learning Platform”; name the product and company clearly.
- Repeated phrases such as “transform your workforce”, “unlock potential” and “seamless learning” are category clichés. Replace them with specific actions and outcomes.
- Many marquee sentences omit full stops and read as unfinished rather than intentionally concise.
- Claims such as “industry-leading”, “trusted”, “secure”, “measurable” and “number one” need proof close to the claim: named results, dates, customer context or independently verifiable credentials.

### Recommended core positioning copy

**Homepage H1:** Enterprise learning, built for Africa's leading organisations.

**Homepage supporting copy:** Agunfon designs and delivers adaptive LMS platforms, learning content and specialist consulting that help large teams build skills, meet compliance requirements and improve performance.

**Primary CTA:** Book a consultation  
**Secondary CTA:** Explore the learning platform

**Proof-line format:** Trusted by learning and people teams across financial services, healthcare, retail and education. Use only approved client names and quantified outcomes.

## Writing system for every page

Each landing page should answer these questions in order:

1. Who is this for?
2. What costly problem does Agunfon solve?
3. What exactly is delivered?
4. How is it different in the African enterprise context?
5. What evidence reduces risk?
6. What is the single next action?

Use short headings that carry meaning without the paragraph below them. Body copy should favour concrete verbs: configure, integrate, assign, track, report, localise and support. Keep one primary CTA label per intent; “Book a Demo” must always route to `/book-demo`.

## Page-level QA summary

- **Home/shared components:** correct footer typos, remove “John Doe” and stale dates, distinguish feature copy, repair misleading resource links, improve image alt decisions.
- **About:** replace the generic team photo and substantiate company story, Lagos presence, expertise and leadership.
- **Adaptive LMS:** remove duplicated capability descriptions, correct enrolment spelling, add product evidence and finish sentence fragments.
- **Learning Suite:** rewrite the hero, reconcile “120+” versus “hundreds”, and route both demo CTAs correctly.
- **Services:** ten stock images do not prove ten capabilities. Pair consulting services with people imagery and digital services with authentic interfaces/case studies.
- **Pricing:** clarify currency, billing unit, plan name, inclusions and add-ons before publication.
- **Book a Demo:** remove personal data, replace the fake video control, use realistic enterprise course content and clarify that date selection is a preferred time, not a confirmed booking.
- **Contact:** align response-time promises with confirmation messaging and repair form accessibility.
- **Industry pages:** correct shared heading grammar, remove generic skyscraper backgrounds and add sector-specific problems, workflows and measurable outcomes. Employee Onboarding requires a full rewrite; Finance needs claim review; Retail's pottery image and garbled CTA are off-brief.
- **Plugin pages:** unpublish unfinished pages until pricing, testimonials, statistics and checkout are real. Standardise naming, licence language, documentation links and purchase flow.
- **Legal pages:** legal counsel must reconcile entity name, business model, governing law, refunds, privacy scope, cookies and GPL rights.
- **Email/admin:** add unsubscribe support and postal details before campaigns; correct demo-booking expectations and admin aggregate counts.

## Production requirements for the generated images

- Convert master PNGs to WebP/AVIF for delivery; keep PNG masters as the source of truth.
- Provide responsive `srcset` derivatives at approximately 640, 960, 1440 and 1920 pixels.
- Set explicit width and height to prevent layout shift.
- Use meaningful alt text only when the image communicates information. Use `alt=""` for decorative crops beside equivalent headings.
- Do not bake headlines, logos or interface copy into generated photography.
- Track each asset's prompt, generation date and approved crop in the DAM or repository.

## Recommended release order

1. Remove live placeholders and broken purchase paths.
2. Fix title/metadata, demo privacy issue and legal contradictions.
3. Replace the 89 external stock placements with the new local image system and real product screenshots.
4. Rewrite Home, Learning Suite, Pricing, Book a Demo and Employee Onboarding.
5. Standardise en-GB, CTA labels, headings, punctuation and alt-text rules.
6. Add named case studies and quantified evidence before claiming category leadership.

## Audit boundary

This document is the brand-and-content decision layer. `QA_REPORT.md` remains the detailed engineering/content defect register with file-level locations and 135 findings. The generated image masters are ready for art-direction approval; page references have intentionally not been switched automatically because final crop selection and whether a slot should use photography or authentic product UI require design approval.
