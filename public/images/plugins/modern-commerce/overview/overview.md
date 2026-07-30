# Marketplace overview — Modern Commerce

Fill-ready fields for the plugin **overview / listing page** (moodle.org/plugins and
marketplace.moodle.com). Copy the text and upload the files. Every claim below is
traceable to the plugin's own `version.php`, `db/`, `settings.php`, lang strings and
`classes/` — nothing invented.

- **Frankenstyle:** `local_moderncommerce` (local plugin)
- **Release:** 2.1.6 · **Maturity:** Stable · **Moodle support:** 5.2 (`supported = [502, 502]`) · **PHP:** 8.3+
- **Pricing model:** Premium / paid (one-time Core licence). Be transparent on the listing that it is a paid plugin.

---

## Plugin name
Modern Commerce

## Icon (min 200×200)
Upload: `icon.png` (present — 512×512, on-brand agunfon gradient, shopping-bag glyph)
Path: `C:\xampp\htdocs\agunfon\public\images\plugins\modern-commerce\overview\icon.png`
Source: `plugin-icon.html` (re-render if the brand changes)

## Short description (1–2 sentences, up to 270 chars)
Sell courses, bundles and subscriptions from inside Moodle: a branded storefront with cart, checkout, coupons, enrolment keys, invoices and refunds — paid via Stripe, Paystack, PayPal or Flutterwave, plus course reviews, sales reports and email/Slack/Teams alerts.

`(264 characters — OK. First ~150 stand alone for truncated list views.)`

**Shorter alternate** (if the list view truncates hard, 148 chars):
> Sell courses, bundles and subscriptions inside Moodle — branded storefront, cart, checkout, coupons, invoices and refunds, with built-in gateways.

## Tags
`ecommerce`, `commerce`, `payments`, `sell courses`, `storefront`, `checkout`, `subscriptions`, `coupons`, `enrolment`, `invoices`

---

## Screenshots (upload 3–6 showing the plugin installed)
Capture these real screens on a seeded demo site (`php local/moderncommerce/cli/demo_data.php --seed`),
1280–1600px wide, light theme. Save into `screenshots/` in this folder, then re-run
`build-overview.mjs` to list them. Priority order:

1. **Storefront** — `/local/moderncommerce/index.php`
   *Caption:* "Branded, widget-driven storefront — arrange the catalogue, hero and promos in edit mode."
2. **Course detail page** — a catalogue product page with price + reviews
   *Caption:* "Course detail page with pricing, add-to-cart and verified learner reviews."
3. **Cart & checkout** — checkout with the payment-gateway selection
   *Caption:* "One-page cart and checkout — pay with Stripe, Paystack, PayPal or Flutterwave."
4. **Learner account** — the learner library / my-purchases + subscription page
   *Caption:* "Learner account: purchases, invoices, enrolment keys and active subscription."
5. **Admin dashboard** — `/local/moderncommerce/admin/index.php`
   *Caption:* "Sales dashboard with revenue KPIs and daily charts."
6. **Orders admin** — `/local/moderncommerce/admin/orders.php`
   *Caption:* "Manage orders, issue manual invoices and process refunds."

Optional extras if you want more than 6: **Subscriptions plans** (`admin/subscriptions.php`),
**Reports** (`admin/reports.php`), **Coupons** (`admin/coupons.php`), **Branding** settings.

> These must be screenshots of the **real product installed** — not marketing graphics
> (marketing composites belong on the landing page / "10 reasons" deck, not the listing).

---

## Documentation URL (required)
**Target (LaRecipe hub):** `https://agunfoninteractivity.com/docs/1.0/modern-commerce`

✅ **Live.** The full LaRecipe doc set now exists under `resources/docs/1.0/modern-commerce/`
(overview, requirements, installation, quick-start, products-and-pricing, storefront, payments,
subscriptions, coupons-and-keys, orders-invoices-refunds, notifications, reports-and-analytics,
admin-settings, faq) plus the sibling `modern-commerce.md` landing page, and it is registered in
`resources/docs/1.0/index.md`. Both `/docs/1.0/modern-commerce` and `/docs/1.0/modern-commerce/overview`
resolve (verified HTTP 200). Deploy the docs files + `index.md`, then run `php artisan cache:clear`.

---

## Mandatory disclosures (Plugin contribution checklist — state these on the listing)

- **External services / accounts required.** Payments are processed by third-party gateways
  the store owner configures under *Payment gateways*: **Stripe, Paystack, PayPal, Flutterwave**.
  Each needs the merchant's **own account and API keys/secrets**; card/payment capture happens
  on the gateway, not in Moodle. Optional operational alerts can post to **Slack / Microsoft
  Teams** incoming webhooks (opt-in, disabled by default).
- **Personal data processed.** Yes. The plugin stores buyer names/emails, order, invoice and
  optional billing details, contact-form messages, newsletter/lead-capture subscribers and
  subscription records. A full Moodle **privacy provider** is implemented (metadata +
  export + delete + user-list), so it is GDPR subject-request ready.
- **Dependencies.** No other Moodle plugin is required. The plugin bundles third-party PHP
  libraries via Composer (`composer.json`) — declare these in `thirdpartylibs.xml` for the
  directory submission.
- **Post-install steps (non-standard).** Run `composer install --no-dev --optimize-autoloader`
  in the plugin directory; configure Moodle **cron**; use **HTTPS** for live gateways/webhooks;
  optionally seed defaults with `php local/moderncommerce/cli/demo_data.php --install-defaults`.

---

## Upload checklist
- [ ] Plugin name: **Modern Commerce**
- [ ] Icon: upload `icon.png` (512×512)
- [ ] Short description: paste the 264-char text above
- [ ] Screenshots: capture the 6 screens, drop in `screenshots/`, upload
- [ ] Documentation URL: create the LaRecipe page (or use the README stopgap)
- [ ] Add the four mandatory disclosures to the full description
- [ ] Tags: add the list above
