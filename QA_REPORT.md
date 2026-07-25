# Agunfon — Site-Wide Content QA Report

**Date:** 2026-07-16
**Reviewer:** Senior content review (grammar, links, images, SEO)
**Scope:** All 45 landable public pages, 6 plugin landing pages, 10 shared components, 50 LaRecipe docs, 9 admin views, 5 transactional email templates, `routes/web.php`
**Method:** Full read of every file, plus runtime verification against a live `php artisan serve` instance, the real `php artisan route:list` table, an on-disk asset inventory, and live HTTP checks of every external link.
**Status:** Report only — **no code was changed.** `git status` is unchanged apart from pre-existing untracked asset folders.

---

## 1. Executive summary

The site is well-designed and the writing, where finished, is good. But it is **not in a shippable commercial state**, and the reasons are concentrated and fixable.

Three findings are severe enough to act on today:

1. **Nobody can buy anything.** All six "Buy Starter" / "Buy Pro" buttons on the three plugin pages that sell products point to `marketplace.moodle.com/plugins/{68,69,76}` — every one returns a hard **404**. The domain root returns 200, so this is not a network artifact; the entire `/plugins/` path does not exist on that host. A seventh plugin page prices in `$XX` placeholders. **The revenue path is broken end to end.**
2. **Two plugin pages were published in draft state.** `modern-flipbook` and `modern-engagement-hub` render bracketed authoring instructions — `[TESTIMONIAL — an engagement or L&D lead, their institution, and a concrete result…]` under a five-star rating — plus `[XX]%` placeholder statistics and internal notes reading *"replace with verified data before publishing"*. All confirmed publicly visible in rendered HTML.
3. **Not one page on the site has a correct `<title>`.** The layout is missing `@yield('title')`, so all 31 content pages ship an identical generic title, and all 6 plugin pages leak body copy into the title (`<title>Serve a large video library</title>`). Combined with one hardcoded meta description sitewide and zero canonical tags, the site is close to invisible to search.

Beyond those, two areas carry real risk: the **legal pages contradict each other on governing law** (Nigeria vs. Georgia), and the **social proof block** contains anonymous testimonials, a rating badge contradicted by its own data, and a wall of major bank logos with no stated relationship.

### Findings by severity

| Severity | Count | Meaning |
|---|---|---|
| Critical | 14 | Visitor cannot complete a task, sees something visibly broken, or the site states something false |
| High | 31 | Misleading claim, broken/mis-pointed link, or credibility damage on a commercial page |
| Medium | 48 | Noticeable copy, consistency, or accessibility defect |
| Low | 42 | Polish |
| **Total** | **135** | |

### Fix these five first

1. **C-01** — Repair or remove the six 404ing Buy buttons. Nothing else on this list costs money every day.
2. **C-02 / C-03** — Unpublish or finish `modern-flipbook` and `modern-engagement-hub`.
3. **C-04** — Add `@yield('title')` to the layout. One line fixes 37 pages.
4. **C-05** — Remove the real person's name, personal Gmail, and mobile number from the Book a Demo form placeholders.
5. **C-06 / C-07** — Resolve the pricing page's self-contradiction and the Nigeria/Georgia jurisdiction conflict.

### Health verdict by area

| Area | Verdict |
|---|---|
| LaRecipe docs (50 files) | **Good.** Zero broken links, zero broken anchors, version claims consistent. Best-maintained content on the site. |
| Industry pages (15) | **Good.** 14 of 15 are industry-correct; contamination is confined to one file. |
| Core marketing pages | **Mixed.** Pricing page is self-contradictory; Learning Suite hero is incoherent. |
| Plugin landing pages (6) | **Poor.** 2 unfinished, 3 with 404 checkout, 1 with no purchase path. |
| Legal pages (4) | **Poor.** Contradictory contracts; describe the wrong business. |
| Emails / admin | **Mixed.** Merge variables verified clean; expectation-setting and compliance gaps. |
| SEO / metadata | **Broken.** No correct titles, one meta description, no canonicals, no OG tags. |

---

## 2. Systemic issues

These are single root causes producing many symptoms. Fixing each one closes multiple rows at once — and stops them reopening.

### S-01 — The layout never yields the title *(root cause of 37 broken pages)*

Every view sets `@section('title', '…')`. But [`resources/views/layouts/app.blade.php:8`](resources/views/layouts/app.blade.php#L8) reads:

```blade
<title>{{ $title ?? 'Agunfon - Enterprise LMS' }}</title>
```

There is no `@yield('title')` anywhere, so every `@section('title')` is silently discarded. Worse: because Blade renders child content *before* the layout, a `@foreach ($features as [$icon, $title, $desc])` loop variable **leaks into layout scope**, so plugin pages inherit the last loop value as their page title.

Verified at runtime across all 37 pages:

| Page | Rendered `<title>` |
|---|---|
| `/`, `/about`, `/pricing`, +28 more | `Agunfon - Enterprise LMS` (identical on all 31) |
| `/plugins/modern-course-reminder` | `Re-engage inactive learners` |
| `/plugins/modern-enrolment-notifier` | `Notify the systems you run on` |
| `/plugins/modern-engagement-hub` | `Drive program milestones` |
| `/plugins/modern-learner-dashboard` | `A dashboard that fits your site` |
| `/plugins/modern-video-player` | `Serve a large video library` |
| `/plugins/modern-flipbook` | `Reading packs &amp;amp; workbooks` ← also double-escaped |

**Fix:** `<title>@yield('title', 'Agunfon - Enterprise LMS')</title>`, and rename the `$title` loop variable (e.g. `$cardTitle`) so body copy can never reach `<head>` again. The `&amp;amp;` artifact resolves with it — its source is `modern-flipbook.blade.php:199`, `'Reading packs &amp; workbooks'`, escaped a second time on the way into `<title>`.

### S-02 — The nav is three hand-maintained copies of one menu

Desktop nav, mobile nav, and footer each hardcode the link set independently, and they disagree:

- **Same label, two destinations:** "Motivation & Insights" → `/contact` in the header, `/sales-marketing` in the footer.
- **Mobile is missing five items** the desktop has, including `/information-technology` and `/human-resources` — unreachable from mobile nav entirely.
- **Same URL, two labels:** `/sales-marketing` is "Sales & Marketing" in the header, "Motivation & Insights" in the footer.
- **Label drift:** "Our services" / "Our Services" / "Services"; "Non Profit" / "Non-Profit"; "Health care" / "Healthcare"; "Case Studies" / "Case studies".

The Plugins menu at `header.blade.php:87–94` already drives itself from a `@php` array and is **the only part of the nav with no inconsistencies.** Extracting the Solutions and Resources lists the same way closes roughly eight findings permanently.

### S-03 — Twelve links promise content and deliver a contact form

`Blog`, `Guides`, `Webinars`, `Case Studies` — in both header and footer — all point to `/contact`. So do `Manufacturing` and `Professional Services`, which sit in the Industry grid beside seven real pages and look identical to them.

A `/resources` route already exists and **nothing in the nav points at it.** The desktop menu at least says "Coming soon"; the footer says nothing, so a footer visitor clicking "Case studies" gets a sales form with no explanation. This is the most likely bounce trigger on the page.

### S-04 — The site is split between British and American English

The split is clean and almost certainly unintentional:

- **Product & docs → British:** `Enrolment` (143 uses), `organisation`, `catalogue`, `licence`, `cancelled`
- **Marketing pages → American:** `organization`, `personalized`, `prioritize`, `optimization`, `catalog`

A visitor crossing from the nav ("Modern **Enrolment** Notifier") to a marketing page ("automate **enrollments**") crosses a spelling boundary. Two specific clashes matter most because they hit the brand term itself:

- `adaptive-lms.blade.php:129` — "Automate **enrollments**"
- `plugins/modern-enrolment-notifier.blade.php:275` — "Greet every new **enrollee**", on the page whose own H1, URL and product name are all "Enrolment"

`header.blade.php` contains both in one dropdown: `Modern Enrolment Notifier` (:89) beside `A personalized learner home` (:91).

**Decision required:** pick one locale. Given the product names and docs, **en-GB** is the lower-cost choice — it leaves 143 uses of "Enrolment" untouched.

### S-05 — Three of four legal pages describe a business Agunfon does not run

Privacy Policy, Terms of Service and Cookies Policy all describe a **hosted multi-tenant LMS SaaS**. Terms of Sale describes the actual business: *"purchases of premium Moodle plugins"* that *"install into your live Moodle environment, which you control."*

This single mismatch is the origin of several downstream Criticals — the Nigeria governing-law clause, the cookie banner that doesn't exist, and the Google Analytics / Facebook / Intercom disclosures for tools that were never deployed. They all read as unadapted SaaS boilerplate. Re-scoping those three pages to the plugin business resolves the cluster.

### S-06 — Sentences ending without full stops

Not a nitpick at this scale: **four of the site's marquee sentences end mid-air**, which is why they read as truncated rather than terse.

| File:Line | Text |
|---|---|
| `components/footer.blade.php:13` | "…tools that support smarter workforce" ← **word missing too** |
| `components/footer.blade.php:115` | "…transform through smarter learning system" ← **should be plural** |
| `components/hero.blade.php:9` | "…to elevate how organizations learn" |
| `components/cta-section.blade.php:13` | "…built for measurable progress" |

Plus ~20 more across `about`, `adaptive-lms`, `pricing`, `services`, and 8 of 15 industry pages (the other 7 have them — a near 50/50 split, clearly unintentional).

---

## 3. Findings by severity

### CRITICAL

| ID | Page / File:Line | Category | Issue | Recommended fix |
|---|---|---|---|---|
| **C-01** | `plugins/modern-course-reminder.blade.php:316,329`<br>`plugins/modern-enrolment-notifier.blade.php:311,323`<br>`plugins/modern-video-player.blade.php:310,322` | Links | **All 6 Buy buttons 404.** `marketplace.moodle.com/plugins/{68,69,76}` all return `404 Not Found`. Control-tested: the domain root returns **200**, and `/plugins` *itself* also 404s — the path does not exist on that host. Additionally, **Starter and Pro point to the identical URL** on all three pages, so a "Buy Pro" ($299) click loses the plan selection even if the URL is fixed. | Confirm the real store URL (the Moodle directory is conventionally `moodle.org/plugins`). Give each tier its own URL or variant parameter. |
| **C-02** | `plugins/modern-flipbook.blade.php:230,242` | Placeholder | Live pricing reads **`$XX/yr`** and **`$XXX/yr`**. Confirmed in rendered HTML. Both Buy CTAs (`:237`, `:249`) then point to `/contact`. The page has no working purchase path at all. | Set `$99`/`$299` to match siblings, or pull the pricing section until priced. |
| **C-03** | `plugins/modern-engagement-hub.blade.php:193-194`<br>`plugins/modern-flipbook.blade.php:213-214` | Placeholder | **Authoring instructions rendered to the public** under a `★★★★★` rating: `"[TESTIMONIAL — an engagement or L&D lead, their institution, and a concrete result, e.g. higher response or retention.]"` — `"— [Name, Role, Institution]"`. Internal notes also visible: *"Scenario-based examples — replace with named customer results before publishing."* | Remove the blocks until real quotes exist. |
| **C-04** | `layouts/app.blade.php:8` | SEO | **No page on the site has a correct `<title>`.** See **S-01**. 31 pages share one title; 6 leak body copy. | `<title>@yield('title', 'Agunfon - Enterprise LMS')</title>` |
| **C-05** | `book-demo.blade.php:75,80,87,111` | Privacy | The Book a Demo form uses **real personal data as public placeholders**: `Elebute Usman`, `Hype360`, `elebuteusman@gmail.com`, `09079682537` (a real mobile number). This looks like a genuine submission pasted in. `contact.blade.php` correctly uses generic placeholders, so this is clearly the defect. | Replace with generic examples (`Jane Doe`, `Acme Ltd`, `you@company.com`, `+1 555 0100`). Confirm consent/removal with the individual. |
| **C-06** | `pricing.blade.php:86-103` vs `:37-49` | Pricing | **"Optional Add-Ons (Billed Separately)" lists the same four items already under "Plan Includes"** — `Secure cloud hosting`, `Full LMS setup & configuration`, `User onboarding & administrator training`, `Ongoing technical support`. Verified as byte-identical strings. The page headline is *"no hidden fees, no unexpected charges."* A prospect cannot tell what they are paying for. | Replace with genuinely separate add-ons, or delete the section. |
| **C-07** | `terms-of-service.blade.php:203` vs `terms-of-sale.blade.php:164` | Legal | **Two live contracts name mutually exclusive governing law.** ToS: *"laws of the Federal Republic of Nigeria… courts of competent jurisdiction in Nigeria."* Sale: *"laws of the State of Georgia, United States… exclusive jurisdiction of the state and federal courts located in Georgia."* | The Atlanta address and +1 478 number suggest Georgia is correct. Make both identical. **Counsel review.** |
| **C-08** | `terms-of-service.blade.php:124` vs `terms-of-sale.blade.php:102` | Legal | **Refund contradiction.** ToS: *"fees paid are non-refundable."* Sale: *"we will refund **100%** of your purchase"* within 30 days. An advertised guarantee contradicted by another posted term invites chargeback and regulator risk. | Add a carve-out in ToS §4.3 stating the Terms of Sale prevail for product purchases. **Counsel review.** |
| **C-09** | `terms-of-sale.blade.php` (whole file) | Legal | **Orphaned.** `grep` for `terms-of-sale` across `resources/views/` returns **zero** inbound links; the footer links only Privacy, ToS and Cookies. The page governing every purchase, the 30-day guarantee and licensing is reachable **only by typing the URL**. Terms not reasonably presented pre-purchase are frequently unenforceable. | Add to the footer bottom bar and link from pricing/checkout with an acceptance checkbox. |
| **C-10** | `cookies-policy.blade.php:247` | Legal | **States a control that does not exist.** *"you will see a cookie consent banner"* and *"clicking the 'Cookie Settings' link in the footer."* Verified: no banner anywhere in `resources/views/`, and no such footer link. The stated route for withdrawing consent does not exist. | Ship the banner, or rewrite §5.1 to describe browser controls only. |
| **C-11** | `cookies-policy.blade.php:154,204,236` | Legal | **Discloses tracking that does not occur.** Names `_ga` (Google Analytics), `_fbp` (Facebook Pixel), and Intercom/Zendesk. Verified: **none are deployed** — no `gtag`, `googletagmanager`, `fbq`, `connect.facebook`, `intercom` or `zendesk` in any view. Also claims *"We only use these with your explicit consent"* while no consent mechanism exists. | Trim to cookies actually set (`agunfon_session`, `XSRF-TOKEN`); re-add rows as each tool ships. |
| **C-12** | `terms-of-sale.blade.php:71` | Legal | **Entity identity inconsistent.** Only page naming *"Agunfon Interactivity"*; the other three contract as bare *"Agunfon"*. No legal form (LLC/Inc/Ltd) or registration number anywhere. Contracting under an unidentified trade name weakens enforceability. | Use one full legal entity name and form across all four pages. |
| **C-13** | `employee-onboarding.blade.php:42` | Copy | **Entire Solution Overview is Compliance Training's copy, verbatim** (byte-identical to `compliance-training.blade.php:43`). Under an H1 about onboarding, the body never mentions onboarding or new hires — it discusses audits and regulatory risk. | Write onboarding-specific copy matching the H1. |
| **C-14** | `employee-onboarding.blade.php:63-105` | Copy | **"Key Feature & Capabilities" is `pricing.blade.php`'s plan-inclusion list**, verbatim — same 8 items, same order. It is a pricing list, not capabilities. Combined with C-13, **only the hero and CTA of this page are actually about onboarding.** | Replace with real onboarding capabilities (30/60/90 paths, buddy assignment, document acknowledgement). |

### HIGH

| ID | Page / File:Line | Category | Issue | Recommended fix |
|---|---|---|---|---|
| H-01 | `plugins/modern-learner-dashboard.blade.php:314,326` | Links | Priced at $99/$299 and badged "Premium", but both Buy CTAs dead-end at `/contact`. Priced product, no purchase path. | Link to the real store URL. |
| H-02 | `plugins/modern-engagement-hub.blade.php` | Links | No purchase path of any kind. Three different checkout patterns now exist across 6 plugins (marketplace / `/contact` / none). | Standardise. |
| H-03 | `plugins/modern-engagement-hub.blade.php:65-66`<br>`plugins/modern-flipbook.blade.php:86` | Placeholder | `[XX]%` and `[XX] hrs` render live in a stats band. Adjacent note admits *"replace with verified data before publishing."* | Use verified figures or delete the tiles. |
| H-04 | `pricing.blade.php:77` | Pricing | **`$5,000 Per User/Mo`** = $60,000/user/year. Implausible for a Moodle LMS; likely meant as a total or annual fee. Currency `$` unqualified (both forms default to 🇳🇬 +234, so USD vs NGN is unknowable). | Confirm the model and state it unambiguously, with an explicit currency. |
| H-05 | `pricing.blade.php:12` vs `:27` | Copy | Hero promises *"Choose from scalable… packages"* (plural); page shows exactly **one unnamed plan**. No plan name exists anywhere. | Name the plan and drop "choose from packages", or add tiers. |
| H-06 | `pricing.blade.php:121` | Grammar | Truncated and garbled: *"…integrations, and additional services organization's goals"* — a fragment spliced in, no full stop. | *"…and any additional services aligned to your organisation's goals."* |
| H-07 | `learning-suite.blade.php:35` | Grammar | **Hero subhead is incoherent** — *"courses across webinars, and tools that support smarter modern, flexible learning environment"*. First thing a visitor reads. | Rewrite; see suggested text in §7. |
| H-08 | `learning-suite.blade.php:37`, `:265` | Links | **"Book a Demo" → `/contact`**, in both CTAs. This is the prior audit's bug, still live. All other Book-a-Demo CTAs sitewide correctly target `/book-demo` — Learning Suite is the sole offender. | `href="/book-demo"` |
| H-09 | `learning-suite.blade.php:135` vs `:139` | Claims | Contradiction inside one card: badge says **"120+ Courses"**, body says **"hundreds"**. `services.blade.php:102` corroborates 120+. | Change body to "120+". |
| H-10 | `book-demo.blade.php:51` | Copy | **Wrong brand in the H1** of the highest-intent page: *"See Adaptive's Learning Platform in Action!"* — "Adaptive" is not a company. | *"See the Agunfon Adaptive LMS in Action!"* |
| H-11 | `book-demo.blade.php:188,270-274` | Claims | **Promises a video that does not exist.** *"Watch a 30-60 second overview…"* — the section below is a static mockup; "Play Demo" is an inert `<div>` with no handler, no `<video>`, no link. | Embed the video or delete the promise and the fake affordance. |
| H-12 | `book-demo.blade.php:212,250,279+` | Placeholder | Template filler shipped live: *"Basic Fundamental of..."* (truncated), *"LEARNING PATH: Become a Professional UX Specialist"*, *"Begin with rudiment of graphic design including typography, layouts, colours"* — repeated on three cards. Graphic-design courses on an enterprise LMS demo page. | Replace with realistic enterprise courses. |
| H-13 | `contact.blade.php:31` | Grammar | **H1 is ungrammatical**: *"Let's know How!"* = "let us know how" addressed to yourself. First words on the contact page. | *"Tell us how."* |
| H-14 | `components/testimonials.blade.php:66` vs `:32` | Claims | Badge *"Rated 5.0 by our clients"* is contradicted by a **4.9** review rendered directly beneath it. | *"Rated 4.9/5 by our clients."* |
| H-15 | `components/testimonials.blade.php:83-85` | Code defect | Star row is hardcoded `@for($i = 0; $i < 5; $i++)` and **ignores `$t['rating']`** — the 4.9 review displays 5 filled stars while its own caption reads "★ 4.9". The card contradicts itself. | Render stars from `$t['rating']`. |
| H-16 | `components/testimonials.blade.php:3-54` | Claims | **All ten testimonials are anonymous** — no name, role, company or photo. The slot where a name belongs holds a project type ("SCORM Training File"), under a `badge-check` avatar and a *"Verified reviews from clients"* claim. Unattributable quotes read as fabricated. | Add real name + role + company, or state the sourcing platform. |
| H-17 | `components/trusted-by.blade.php:9-36` | Claims / legal | Ten named third-party logos — Fidelity Bank, UBA Group, Access Bank, Heirs Holdings, FITC — under *"Trusted by leading organizations"*, with **no case study, quote, or engagement detail anywhere on the site**, and no testimonial naming them. Compounding it, **Access Bank's logo is served from `/images/logos/images (1) 1.png`** — an unrenamed browser-download artifact. | Confirm written permission for each mark; add a qualifier stating the actual relationship; rename the file. |
| H-18 | `adaptive-lms.blade.php:74-75` | Claims | On the **Adaptive LMS** page, the stat credits the wrong product: *"20+ Top organizations are using agunfon **learning suite**"*. Brand also lowercased. Unsourced. | Point at the Adaptive LMS; capitalise; source or remove. |
| H-19 | `adaptive-lms.blade.php:78-79`<br>`learning-suite.blade.php:72-73` | Claims | Unsourced *"4.8 ★ Rating per user feedback"* — no platform, no sample size, no link. Also ungrammatical. Legal exposure if fabricated. | Attribute or remove. |
| H-20 | `services.blade.php:48` | Copy | The **LMS Implementation** description is a verbatim copy of `learning-suite.blade.php:99` and describes industry learning paths, not implementation. The only one of 10 services whose intro isn't about the service. | Write a genuine implementation intro. |
| H-21 | `contact-success.blade.php:44` | Links | *"Explore Resources"* renders the **Our Services** page (`/resources` → `view('services')`). The route is a decoy; no resources content exists. | Relabel and link `/services`, or build the page. |
| H-22 | `plugins/modern-engagement-hub.blade.php:229` | Copy | **Attacks Agunfon's own product.** Tells visitors *"Reminders send a single message"* and can't escalate or report — but `modern-course-reminder.blade.php:87,190,193` sells exactly those. A prospect comparing the two pages sees Agunfon contradicting itself. | Reframe against core Moodle, not the sibling SKU. |
| H-23 | `plugins/modern-course-reminder.blade.php:273-274` | Claims | Badge says **"Customers"**, heading says **"real"**, source comment says `CASE STUDIES` — but the three entries are invented scenarios with no named customer and **no disclaimer**. The two sibling pages with the same content type both disclaim it. | Change to "Use cases" + scenario framing, or add the disclaimer. |
| H-24 | `plugins/modern-course-reminder.blade.php:72` | Claims | *"Completion +23%"* — a specific performance claim as a hero chip, unsourced and undisclaimed, while sibling pages explicitly disclaim their illustrative figures. Sole quantitative outcome claim in the set. | Substantiate or make non-numeric. |
| H-25 | `finance.blade.php:115` | Grammar | *"empower your finance and **compliant** team"* — adjective where a noun belongs, in a 60px CTA H2 on a regulated-industry page. | *"…finance and compliance teams"* |
| H-26 | `header.blade.php:203` vs `footer.blade.php:142` | Links | "Motivation & Insights" → `/contact` in header, `/sales-marketing` in footer. Same label, two destinations. | Pick one. See **S-02**. |
| H-27 | `header.blade.php:255,267` | Links | `Manufacturing` and `Professional Services` sit in the Industry grid beside 7 real pages but silently dump the user on `/contact`. | Remove or mark "Coming soon" and disable. |
| H-28 | `header.blade.php:312,325,338,351`<br>`footer.blade.php:179-182` | Links | 12 links (`Blog`, `Guides`, `Webinars`, `Case Studies`) → `/contact`. Footer copies lack the "Coming soon" qualifier the desktop menu shows. See **S-03**. | Point at `/resources` or real pages. |
| H-29 | `header.blade.php:427-443` | Links | **Mobile nav omits five Solutions items** the desktop has. `/information-technology` and `/human-resources` are unreachable from mobile nav entirely. | Drive both from one array. See **S-02**. |
| H-30 | `components/footer.blade.php:115-116` | Grammar | *"…transform through smarter learning system"* — no full stop, singular where plural is required. Reads as cut off. Distinct from the `:13` truncation. | *"…through smarter learning systems."* |
| H-31 | `components/hero.blade.php:66-67` | Copy | Sentence split across `<h3>` and `<p>`, so the heading ends mid-clause on *"an"*: *"…stand a chance to win an"* / *"Ipad. We mean it when we say it!"*. "Ipad" mis-cased; tone drift on an enterprise page. This is the mockup a first-time visitor studies. | Rewrite as a self-contained heading. |
| H-32 | `emails/demo-confirmation.blade.php:6,35` | Emails | Subject *"Demo Booking Confirmed"* and H1 *"Your Demo is Scheduled!"* — but `DemoRequestController.php:56` creates the record as **`pending`**, and **no time is ever collected** (only a preferred date range). The email contradicts itself at `:63`. | *"Demo Request Received."* Reserve "Confirmed" for a real confirmation. |
| H-33 | Newsletter (site-wide) | Compliance | **No unsubscribe mechanism exists.** The schema (`create_newsletter_subscribers_table.php:14`) and `NewsletterController.php:61` both support an `unsubscribed` status, but **no route and no link anywhere** can set it. Subscribers cannot opt out. | Add a signed unsubscribe route + link and a `List-Unsubscribe` header **before any campaign ships**. |
| H-34 | `emails/*` (all 5) | Compliance | No postal address or phone in any customer-facing email footer. CAN-SPAM requires a valid physical postal address in commercial email. The site footer has it. | Add the Atlanta address and phone. |
| H-35 | `admin/demos/index.blade.php:16,20,24` | Data | "Pending"/"Confirmed"/"This Week" stat cards filter the **paginated collection**, so they only count the current page. "Total Demos" correctly uses `$demos->total()`. With >1 page the admin sees silently wrong numbers. | Pass real aggregates from the controller. |
| H-36 | `admin/settings/emails.blade.php:83` | Code defect | `onclick="openEditModal({{ $email->id }}, '{{ $email->name }}', …)"` — a name containing an apostrophe (O'Brien) breaks out of the JS string; Edit then silently does nothing. Also an XSS vector. | Use `data-*` attributes + `@json()`. |

### MEDIUM — grouped

**Copy & grammar**
- `"Key Feature & Capabilities"` — number disagreement, on **all 15** industry pages.
- `components/lms-features.blade.php:19` — `"Give feedbacks"`; "feedback" is uncountable. On the largest homepage card.
- `components/footer.blade.php:220` — `"© Agunfon 2025, All Right Reserved"`: stale year (site reads as abandoned) **and** should be "Rights". Use `{{ date('Y') }}`.
- `footer.blade.php:168` — **"Learning Suits"** (typo for "Learning Suite"). Visible on every page. *Open since the Feb 2026 audit.*
- `footer.blade.php:132` — `"Solutions-By use Case"`: lowercase noun, capitalised verb, no spaces, hyphen where a dash belongs.
- `pricing.blade.php:29` — `"Agunfon plan is crafted…"`, missing article.
- `adaptive-lms.blade.php:199` — `"…designed for organizations that need"` stops dead; needs a colon.
- `retail.blade.php:115` — *"facilitate sales in your retail processes"*; garbled, and the page is about training.
- `nonprofit.blade.php:118` — `"non profit"` unhyphenated, contradicting its own title and eyebrow.
- `adaptive-lms.blade.php:103` vs `:147` — near-duplicate copy under two headings; "Workforce Learning Automation" describes multi-tenancy.
- `learning-suite.blade.php:169` — automation boilerplate under a "Structured Learning Paths" heading.
- `components/lms-features.blade.php:8` — verbatim duplicate of `trusted-by.blade.php:5`; both render on the homepage, and it's a non-sequitur as a feature subhead.
- `plugins/modern-enrolment-notifier.blade.php:351` — FAQ asks about **teachers**, answer only grants **course managers**; `:187` treats them as distinct roles.
- `plugins/modern-flipbook.blade.php:277` — *"How can a course be completed?"*; the plugin completes an **activity**, as `:117` correctly says.
- `plugins/modern-video-player.blade.php:110,356` — drops "Premium" from the product name, undercutting the page's Premium-vs-Community thesis.

**Forms**
- `book-demo.blade.php:109` / `contact.blade.php:90` — **Canada option is broken**: `value="+1"` but the reselect test compares `'+1-CA'`, which can never be submitted. After a validation error a Canadian user's choice is silently lost and 🇺🇸 is reselected. Two options also render as identical "+1".
- `book-demo.blade.php:135-139` — **overlapping team-size bands** (`1-20`, `20-50`, `50-200`): 20, 50 and 200 each match two options.
- `book-demo.blade.php:117-127` — label says "Industry / Use Case"; options are departments (`Human Resources`, `Customer Support`). Asks two things, answers neither.
- Both forms — **no `for`/`id` label association anywhere**; the `country_code` select has no label or `aria-label` at all.
- `contact.blade.php:68` — helper text used as a placeholder, so the promise vanishes on typing and isn't announced by AT.

**Images & accessibility**
- `services.blade.php` (10 instances) — every `alt` duplicates the adjacent `<h2>`; screen readers hear each service name twice. All are decorative.
- `components/lms-features.blade.php:14,31,41,52` — same defect; use `alt=""`.
- One decorative CTA background photo carries **five different alt strings** across six industry pages.
- `nonprofit.blade.php:57` — `alt="Black woman working at laptop in home office"` foregrounds race, irrelevant to content and inconsistent with every other alt. Same photo appears on 3 other pages with 3 other descriptions.
- **8 Unsplash photos cover 22 of ~32 content image slots** across the 15 industry pages. One photo is the **hero on Compliance, IT and Finance simultaneously**; another is the hero on Leadership, HR and Customer Service. Strongest signal of templating.
- `components/hero.blade.php:101` — **"By John Doe"** placeholder in the hero mockup, on every page.
- `retail.blade.php:38` — an artisan-pottery photo illustrates "fast-paced retail environments / frontline staff".

**Legal & docs**
- `terms-of-service.blade.php:226` — drops `#11785` from the address. For a virtual-mailbox address, **legal notice may not be delivered**.
- `terms-of-sale.blade.php:167-170` — the only page forming a sales contract gives **no postal address and no phone**.
- `terms-of-sale.blade.php:169` — routes refunds to `support@agunfoninteractivity.com`, which appears on **no other page and in no footer** (everything else uses `info@`).
- `terms-of-service.blade.php:146` — *"You may not copy, modify, distribute…"* flatly contradicts Terms of Sale's GPLv3 grant, and purports to withdraw rights the GPL irrevocably grants.
- `terms-of-service.blade.php:110-125` — describes recurring subscriptions; Terms of Sale describes one-off purchase + term-limited updates. Two revenue models, never reconciled.
- `privacy-policy.blade.php:89-96` — claims automatic collection of **learner course progress and forum posts**, which self-hosted plugins never send to Agunfon. Needlessly assumes controller duties. (Follows from **S-05**.)
- `privacy-policy.blade.php:138` — *"Regular security assessments and penetration testing"* and unnamed *"industry-standard certifications"*: concrete, auditable claims. If untrue, this is the exact class of claim the FTC has pursued.
- `privacy-policy.blade.php:169` — single global age-16 line; US COPPA operates at **13**.
- `privacy-policy.blade.php:130,164` — no CCPA/CPRA "Do Not Sell or Share" section, no GDPR Art.6 legal bases, no named transfer mechanism.
- `docs/overview.md:21-23` — the docs **home page advertises only 1 of 4 plugins** and tells readers the others are "being added", while complete guides for all three already ship. Suppresses three finished products.
- `docs/modern-learner-dashboard/installation.md:19` — `/public` doc-root landed in Moodle **5.1**, not all of 5.x; admins on 5.0 will look for a directory that doesn't exist.
- `docs/modern-video-player/faq.md:27` — states signed-URL delivery as unconditional; `admin-settings.md:77` says it is **off by default**.

### LOW

42 findings — full detail in §4. Themes: terminal punctuation (~24 instances), heading capitalisation drift, five different CTA labels for one `/book-demo` action, `Webinar`/`Webinars` singular-plural, straight vs typographic quotes, `-ly` hyphenation in docs, and en-GB `Licence` vs `License` as a field label across 7 doc files.

---

## 4. Findings by page

*Indexed so a developer fixing one file sees everything in it at once.*

| File | Findings |
|---|---|
| `layouts/app.blade.php` | **C-04**, S-01; meta description (single, hardcoded); no canonical/OG |
| `components/header.blade.php` | H-26, H-27, H-28, H-29; label drift ×6; unhelpful alt ×2; Unsplash hotlinks |
| `components/footer.blade.php` | H-28, H-30; "Learning Suits"; "© 2025, All Right Reserved"; `:13` truncation; taxonomy conflict; no Plugins column; **C-09** (missing ToS link) |
| `components/testimonials.blade.php` | **H-14, H-15, H-16** |
| `components/trusted-by.blade.php` | **H-17**; near-duplicate heading/subhead |
| `components/hero.blade.php` | H-31; "John Doe"; "Explore Solutions" → `/services`; no full stop; stale "September 2023" |
| `components/lms-features.blade.php` | "Give feedbacks"; duplicate subhead; alt ×4; no full stop |
| `components/cta-section.blade.php` | Missing full stop (`:13`) — otherwise clean |
| `components/features-accordion.blade.php` | Clean apart from en-US spelling and one generic alt |
| `components/newsletter.blade.php` | **Dead code** — not rendered anywhere; retains a broken `action="#"`. Delete. |
| `pricing.blade.php` | **C-06**, H-04, H-05, H-06; grammar ×3 |
| `learning-suite.blade.php` | **H-07, H-08, H-09**; capitalisation; body/heading mismatch |
| `book-demo.blade.php` | **C-05**, H-10, H-11, H-12; form defects ×4 |
| `contact.blade.php` | H-13; form defects ×3 |
| `adaptive-lms.blade.php` | H-18, H-19; `enrollments`; duplicate copy; punctuation ×3; alt ×6 |
| `services.blade.php` | H-20; alt ×10; punctuation |
| `about.blade.php` | "Get Started" → `/contact`; punctuation ×3; en-US throughout |
| `contact-success.blade.php` | H-21; response-time mismatch |
| `demo-success.blade.php` | "Explore Features" → Learning Suite |
| `plugins/modern-flipbook.blade.php` | **C-02, C-03**, H-03; `&amp;amp;` source (`:199`); activity/course FAQ error |
| `plugins/modern-engagement-hub.blade.php` | **C-03**, H-02, H-03, H-22 |
| `plugins/modern-course-reminder.blade.php` | **C-01**, H-23, H-24; `Standardize`; no docs link |
| `plugins/modern-enrolment-notifier.blade.php` | **C-01**; `enrollee`; teacher/manager FAQ; channel-count mismatch; no docs link |
| `plugins/modern-video-player.blade.php` | **C-01**; drops "Premium" ×2; en-GB/US mixed in one scroll; missing Invoicing |
| `plugins/modern-learner-dashboard.blade.php` | H-01; three different theme lists; `$slideBase` naming; no docs link |
| `employee-onboarding.blade.php` | **C-13, C-14**; missing brand in CTA; duplicate `max-w-*` class |
| `finance.blade.php` | **H-25** |
| `retail.blade.php` | Garbled CTA; pottery hero vs "frontline staff" copy |
| `nonprofit.blade.php` | `"non profit"`; race-foregrounding alt; dated masked-staff hero |
| Other 11 industry pages | Clean on industry fit; consistency drift only |
| `terms-of-service.blade.php` | **C-07, C-08**; address unit dropped; GPL contradiction; subscription model mismatch |
| `terms-of-sale.blade.php` | **C-09, C-12**; no address/phone; `support@` orphaned |
| `privacy-policy.blade.php` | S-05 scope; COPPA age; no CCPA; no transfer mechanism; security claims |
| `cookies-policy.blade.php` | **C-10, C-11** |
| `emails/demo-confirmation.blade.php` | **H-32**; preferred range shown as booked date |
| `emails/*` | **H-34**; HTML-only (no plain-text part); response-time contradictions |
| `admin/demos/index.blade.php` | **H-35**; "This Week" is next-7-days; filter drops search |
| `admin/settings/emails.blade.php` | **H-36**; three names for one page |
| `docs/**` | **Zero broken links, zero broken anchors.** `overview.md` hides 3 of 4 plugins; en-GB polish ×7 files |

---

## 5. Prior audit reconciliation

The Feb 2026 audit (`Agunfon_Website_Content_QA_Audit.csv`) logged **20 findings, all still marked Open**. Current status:

| # | Item | Prior severity | Status now |
|---|---|---|---|
| 1 | "Explore Solution" → "Explore Solutions" | Medium | ✅ **Fixed** — `hero.blade.php:16` now reads "Explore Solutions" |
| 2 | Duplicate copy on "Analytics & Reporting" / "Automated Workflows" cards | High | ✅ **Fixed** — cards now carry distinct copy |
| 3 | "Motivation & Insights" → contact form | Critical | ⚠️ **Partially fixed** — footer now → `/sales-marketing`, but **header still → `/contact`** (H-26). New inconsistency introduced. |
| 4 | Mobile menu dropdown not clickable | Critical | ❓ **Cannot verify statically** — see §6 |
| 5 | "Agunfon Learning Suits" typo | Medium | ❌ **Still open** — `footer.blade.php:168` |
| 6 | Learning Suite description text | Low | ✅ Closed by decision ("can be left as the new version") |
| 7 | Core Capabilities: no images | Medium | ❌ **Still open** — icons only |
| 8 | Adaptive LMS: missing bullet | Low | ✅ Closed by decision |
| 9 | Adaptive LMS core features: no images | Medium | ❌ **Still open** |
| 10 | "Workforce Learning Automation" summary | Medium | ✅ Closed by decision — but note the copy still describes multi-tenancy, not automation |
| 11 | "Book a Demo" button → contact form | High | ❌ **Still open** — `learning-suite.blade.php:37` and `:265` (H-08). Every other Book-a-Demo CTA is correct. |
| 12 | Subscribe button → 405 error | Critical | ✅ **Fixed** — footer form posts correctly to `/newsletter/subscribe`. **Note:** the dead `components/newsletter.blade.php` still contains the broken `action="#"` that caused it. Delete the file. |
| 13 | About "Why Choose": no image loading | Critical | ⚠️ **Likely fixed, but root cause stands** — an `<img>` now exists at `about.blade.php:102`. It is **hotlinked from Unsplash**, which is plausibly why the auditor saw an empty box. Any Unsplash outage or hotlink block reproduces the original symptom sitewide. |
| 14 | Book a Demo Submit → verification error | Critical | ❓ **Cannot verify statically** — reCAPTCHA; see §6 |
| 15 | Country dropdown inactive, defaults to Nigeria | High | ⚠️ **Partly explained** — it is a real `<select>` and functional in markup, but has `appearance-none` with no visible chevron, which is likely why it reads as inactive. It **does** default to +234. Separately, the **Canada option is genuinely broken** (see §3 Medium). |
| 16 | Contact Sales country dropdown inactive | High | ⚠️ Same as #15 — `contact.blade.php:75` |
| 17 | Employee Onboarding image cropped | Medium | ❓ **Cannot verify statically** — visual; see §6 |

**Summary:** 4 fixed, 3 closed by decision, 4 still open, 4 partially addressed, 4 need runtime checks. Item **#3** is worth noting: fixing the footer without the header turned one bug into an inconsistency.

---

## 6. Requires runtime verification

Not confirmable from source. **Do not treat these as either fixed or broken on this report's authority.**

| Item | Why | How to check |
|---|---|---|
| Mobile menu not clickable (prior #4, Critical) | JS/CSS behaviour at breakpoint | Open `/` on a real tablet/phone, tap the hamburger |
| Book a Demo submit fails (prior #14, Critical) | reCAPTCHA depends on live keys + domain allowlist | Submit the form on production |
| Employee Onboarding image cropped (prior #17) | Visual/`object-fit` at breakpoint | Load `/employee-onboarding` at several widths |
| Country dropdown "inactive" | Markup is valid; likely a styling perception issue | Click it on production |
| **`APP_URL` in production** | Local `.env` is `APP_ENV=local`, `APP_URL=http://localhost`. All 5 emails build CTAs from `config('app.url')`. **If production `APP_URL` is unset, every email CTA is a dead link.** I could only see the local file — this is a config check, not a code defect. | `php artisan tinker --execute="echo config('app.url');"` on production |
| `twitter.com/agunfon` (footer `:206`) | Returned **404**; `x.com/agunfon` also 404. But X blocks automated clients aggressively, so this may be a false positive. | Open both in a browser while logged out |
| `linkedin.com/company/agunfon` | Returned 200, but LinkedIn 200s on login-walls and soft-404s | Open logged out |
| Unsplash hotlink reliability | All tested URLs returned 200 **today**. Unsplash may rate-limit or block hotlinking without notice. | Decide whether the site's entire photography should depend on a third party |
| Whether Access Bank / Fidelity / UBA / Heirs Holdings / FITC permitted logo use (H-17) | Not knowable from the repo. The downside is not a copy edit. | Legal/commercial confirmation |
| Whether the "$5,000 Per User/Mo" price is correct (H-04) | Commercial fact | Confirm with sales |

---

## 7. Recommendations

### Ship first (cheap, high leverage)

1. **`@yield('title')`** — one line, fixes 37 pages. Rename the `$title` loop variable at the same time.
2. **Delete `components/newsletter.blade.php`** — dead code carrying the exact bug the Feb audit flagged as Critical.
3. **Global find/replace:** `Key Feature & Capabilities` → `Key Features & Capabilities` (15 pages); `Learning Suits` → `Learning Suite`; `All Right Reserved` → `All Rights Reserved` with `{{ date('Y') }}`.
4. **Sweep terminal punctuation** — the four marquee sentences in `hero`, `footer` ×2, and `cta-section` are the ones a visitor actually reads.

### Decisions needed before copy work

- **Locale:** en-GB or en-US? Recommend **en-GB** — 143 uses of "Enrolment" already anchor it, and the docs are consistently British. The marketing pages are the smaller migration.
- **What is Agunfon selling?** An LMS, or Moodle plugins? Three legal pages, the emails ("Agunfon LMS"), and most marketing copy say LMS; Terms of Sale and all six product pages say plugins. This ambiguity generates findings across every section of this report.
- **Where do people buy?** Three checkout patterns exist across six plugins. Pick one.

### Preventive tooling (none exists today)

The repo has no link checker, no route smoke test, and no content lint. Every finding in §3 could have been caught automatically:

1. **Route smoke test** — assert every `GET` route returns 200 and has a **unique, non-default `<title>`**. Catches C-04 and any future regression, in ~30 lines of Pest.
2. **Link checker in CI** — crawl rendered output; fail on internal 404s and on external links returning ≥400. Catches **C-01**, the single most expensive finding here.
3. **Placeholder lint** — `grep -rE '\[XX\]|\$XX|\[TESTIMONIAL|John Doe|Lorem|before publishing'` over `resources/`, failing the build on a hit. Catches **C-02, C-03, H-03, H-12** and would have blocked both draft pages from shipping.
4. **Spelling lint** — a wordlist enforcing the chosen locale. Catches **S-04** permanently.
5. **Per-page meta** — add `@yield('description')` and a canonical, then set both per page. Without this, **C-04** partially reopens the moment someone adds a page.

### Structural

- **Drive the nav from one array.** The Plugins menu already does this and is the only clean part of the nav (**S-02**).
- **Link `/docs` from the header and footer.** Four plugins ship complete documentation; only one page links to it, and `overview.md` actively tells readers three of those guides don't exist. This is finished work that no visitor can find.
- **Decide on hotlinked stock photography.** 8 Unsplash photos cover 22 of ~32 industry-page image slots, with one photo serving as the hero for three different industries. Beyond the templating signal, it makes the site's imagery dependent on a third party — and is the likely root of the prior audit's "image not loading" Critical.

---

## 8. Method & limitations

**Verified at runtime, not inferred:**
- Every page title fetched over HTTP from a live server (37 pages).
- Placeholder text confirmed present in **rendered HTML**, not just source.
- All internal `href`s diffed against the real `php artisan route:list` output (69 routes). **Result: zero broken internal links.**
- All 331 files under `public/images` inventoried and diffed against every `src`. **Result: zero broken image references** — all four slider arrays resolve correctly.
- All 172 doc links and every doc TOC anchor checked programmatically. **Result: zero broken links, zero broken anchors.**
- External links checked live over HTTP, with a control test on `marketplace.moodle.com` to prove the 404s were real and not a local network artifact.
- Email merge variables cross-checked against the controllers and mailables. **Result: all clean** — no undefined variables.

**Reported as clean (checked, not skipped):** H1 hierarchy is correct — exactly one `<h1>` per page across all pages tested. No broken internal links. No broken images. No placeholder text in the legal pages. Reason-counts match slide-counts on all four slider pages. Moodle version claims agree across all docs and plugin pages. Plugin marketplace IDs are distinct per product (they are simply all 404).

**Limitations:**
- Static + local-runtime review. Nothing was checked on production, and the local `.env` is `APP_ENV=local` — the `APP_URL` item in §6 is a config check, not a defect claim.
- No visual, responsive, or accessibility-tool testing. Contrast, layout, and cropping are out of scope; the prior audit's visual items remain unverified.
- Severity is assigned on user impact: **Critical** means a visitor cannot complete a task, sees something visibly broken, or is told something false. A typo is never Critical, however prominent.
- Commercial facts (the $5,000 price, the +23% claim, logo permissions, the 4.8 rating) can be flagged but not adjudicated from a repository.
