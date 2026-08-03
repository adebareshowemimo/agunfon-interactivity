# Modern Commerce — Moodle Marketplace store listing

Fill-ready copy for the **marketplace.moodle.com** commercial store page. Paste each field.
Every claim is traceable to the plugin's `version.php`, `settings.php`, `db/`, `classes/` and
lang strings — nothing invented. Distinct from the Plugins Directory HTML
(`ten-reasons/plugins-directory.html`) and the overview form pack (`overview/overview.md`).

---

## Product name
Modern Commerce

## Title (store headline, ≤100 chars, no superlatives)
Modern Commerce — Sell Courses, Bundles & Subscriptions in Moodle

## Tagline / subtitle (one line)
Turn your Moodle site into a complete online course store — no second website, no revenue share.

## Short description (store summary — 258 chars, front-loaded)
Sell courses, bundles, programs and subscriptions from inside Moodle: a branded storefront with cart, checkout, coupons, enrolment keys, invoices and refunds — paid through your own Stripe, PayPal, Paystack or Flutterwave account. One plugin, one-time per site.

---

## Full description (store body — paste as the main listing text)

### Sell your courses from the Moodle you already own
Modern Commerce adds a complete e-commerce layer to Moodle. Instead of bolting a WordPress/WooCommerce shop or a monthly SaaS platform onto your LMS and syncing two systems, you sell your existing Moodle courses directly: a branded catalogue, a real multi-item cart and checkout, and automatic enrolment the moment payment clears — against the same courses and user accounts you already administer.

Core Moodle can put a price on a single course. Modern Commerce runs an entire course business.

### What you can sell
- **Single courses** — price any existing course; successful payment enrols the buyer automatically.
- **Bundles & programs** — package several courses and sell them as one product.
- **Subscriptions** — recurring plans with free trials, renewals, grace periods, plan changes and automatic access sync.
- **Enrolment & bundle keys** — prepaid keys for cohorts, resellers and B2B buyers.

### What's in the box
- **Branded, widget-driven storefront** you arrange in edit mode — catalogue, hero, featured, categories, testimonials, countdown, newsletter and more, across multiple public pages, with brand colour tokens and custom CSS.
- **Cart & checkout** with coupons, tax (inclusive or exclusive) and one of 21 store currencies.
- **Four payment gateways — Stripe, PayPal, Paystack and Flutterwave** — connected to your own merchant accounts, with signed webhooks and IP whitelisting. Money lands in your account; there is no revenue share.
- **Orders, invoices & refunds** — a full order console, downloadable invoices, manual invoicing, one-click refunds and an immutable audit log.
- **Coupons & discounts** — percentage or fixed codes with usage rules.
- **Marketing that runs itself** — abandoned-cart recovery and payment reminders on cron.
- **Notifications** — a queued delivery subsystem with email plus optional Slack and Microsoft Teams operational alerts and digests.
- **Verified course reviews, wishlists and a learner account area** — buyers self-serve orders, invoices, keys and subscriptions.
- **Sales dashboard & reports** — revenue, orders, conversion and top products, backed by capability-based access control (36 capabilities) and a full Moodle privacy provider.

### Why Modern Commerce
- **One system, always in sync** — the catalogue, cart, checkout, coupon, invoice, refund and enrolment all happen inside Moodle. No bridge plugin to break.
- **You keep 100% of every sale** — bring your own gateway accounts; we never touch your payout money.
- **Built for the latest Moodle** — targets Moodle 5.2 and PHP 8.3+.

### Requirements & disclosures
- **Moodle 5.2**, **PHP 8.3+**, Moodle cron enabled, and **HTTPS** for live gateways and webhooks.
- **Payment gateways require your own merchant accounts and API keys** (Stripe, PayPal, Paystack, Flutterwave). Card capture happens on the gateway, not in Moodle. No sale can be taken until at least one gateway is configured.
- **Optional external services:** Slack and Microsoft Teams incoming webhooks (ops alerts, off by default); Google reCAPTCHA (contact/newsletter spam protection).
- **No dependency on any other Moodle plugin.**
- **Personal data:** the plugin processes buyer names, emails and order/invoice/subscription/review/contact records to fulfil orders; a full **Moodle Privacy API provider** is included for GDPR export and erasure.
- **Licence:** proprietary **Modern Commerce Commercial License**, purchased per site (not GPL). Includes **one year of updates and priority support**.

### Documentation & support
- **Documentation:** https://moderncommerce.dev/docs/1.x/overview
- **Support:** support@agunfoninteractivity.com
- **Terms of Sale:** https://agunfoninteractivity.com/terms-of-sale

---

## Categories / tags
`ecommerce` · `commerce` · `payments` · `sell courses` · `storefront` · `checkout` · `subscriptions` · `bundles` · `coupons` · `enrolment keys` · `invoices` · `refunds`

## Compatibility
- Moodle **5.2** (`supported = [502, 502]`) · PHP **8.3+** · Release **2.1.6** (Stable)

## Pricing (per-site, one-time — includes 1 year of updates & support)
> Mirror of the pricing on the landing page. Only the Single-Site figure is sourced; confirm the multi-site figures before publishing.

| Tier | Price | Scope |
|---|---|---|
| Single Site | $300 one-time | 1 production site |
| 5 Sites (Best Value) | $900 one-time *(confirm)* | up to 5 production sites |
| 10 Sites | $1,500 one-time *(confirm)* | up to 10 production sites |
| Enterprise | Custom | unlimited / tenant-based, migration + onboarding |

All tiers include the complete commerce core, 1 year of updates and support, and no revenue share.

---

## Required store URLs (paste into the marketplace form fields)
- **Documentation URL:** https://moderncommerce.dev/docs/1.x/overview
- **Terms of Sale URL:** https://agunfoninteractivity.com/terms-of-sale
- **Support URL / email:** support@agunfoninteractivity.com
- **Homepage:** https://moderncommerce.dev

## Upload checklist
- [ ] Name: **Modern Commerce**
- [ ] Title + tagline + short description (above)
- [ ] Full description (paste the store body)
- [ ] Icon: `overview/icon.png` (512×512)
- [ ] Screenshots: the 6 real screens listed in `overview/overview.md` (or the covers in `coverpage/` for a richer gallery)
- [ ] Categories/tags, compatibility (Moodle 5.2 / PHP 8.3+)
- [ ] Pricing tiers — confirm the 5-site / 10-site figures
- [ ] Documentation, Terms of Sale and Support URLs
- [ ] Confirm the four mandatory disclosures are present in the full description
