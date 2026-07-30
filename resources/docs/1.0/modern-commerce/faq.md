# Modern Commerce — FAQ

---

- [Do I need WordPress or WooCommerce?](#wordpress)
- [Can I sell my existing Moodle courses?](#existing)
- [Can I sell seats to a company or team?](#seats)
- [Which Moodle and PHP versions are supported?](#versions)
- [Do you take a revenue share or transaction fee?](#revshare)
- [Do I need my own payment gateway account?](#gateway)
- [Do I need any other plugin?](#dependency)
- [Does it do subscriptions / memberships?](#subs)
- [How is personal data / GDPR handled?](#gdpr)
- [Is it GPL? Can we modify it?](#gpl)
- [What happens after the first year of support?](#support)

<a name="wordpress"></a>
## Do I need WordPress or WooCommerce?

No. Modern Commerce runs the whole store **inside Moodle** — catalog, cart, checkout, payments, invoices, and enrolment. There is no separate WordPress, WooCommerce, or Shopify front end to host or sync.

<a name="existing"></a>
## Can I sell my existing Moodle courses?

Yes. You attach commerce to courses you already have — set a price, and buyers are auto-enrolled on payment. You can also group courses into **bundles** and **programs**. See [Products & Pricing](/{{route}}/{{version}}/modern-commerce/products-and-pricing).

<a name="seats"></a>
## Can I sell seats to a company or team?

Yes. Use **enrolment keys** for prepaid, bulk, or corporate sales: generate a block of keys, hand them to the customer, and their learners self-redeem. Seat totals and usage are tracked. See [Coupons & Keys](/{{route}}/{{version}}/modern-commerce/coupons-and-keys).

<a name="versions"></a>
## Which Moodle and PHP versions are supported?

Moodle **5.2 only**, and **PHP 8.3 or later**. The current release is **2.1.6 (Stable)**. See [Requirements](/{{route}}/{{version}}/modern-commerce/requirements).

<a name="revshare"></a>
## Do you take a revenue share or transaction fee?

No. Modern Commerce takes **no revenue share and no transaction fee**. Payments go straight to your own merchant account; the only fees are your payment provider's standard processing fees.

<a name="gateway"></a>
## Do I need my own payment gateway account?

Yes. You connect **your own** account for one or more of **Stripe, PayPal, Paystack, or Flutterwave** using each provider's API keys. Card capture happens on the gateway, not in Moodle. There's **no sale until at least one gateway is configured**. See [Payments](/{{route}}/{{version}}/modern-commerce/payments).

<a name="dependency"></a>
## Do I need any other plugin?

No. Modern Commerce has **no dependency on any other plugin**. Optional integrations (e.g. Slack/Teams alerts, Google reCAPTCHA, or sibling add-ons) enhance it but aren't required.

<a name="subs"></a>
## Does it do subscriptions / memberships?

Yes — a full subscription subsystem: plans, trials, renewals, grace periods, plan changes, access sync, subscription keys, and lifecycle emails. See [Subscriptions](/{{route}}/{{version}}/modern-commerce/subscriptions).

<a name="gdpr"></a>
## How is personal data / GDPR handled?

Modern Commerce processes personal data and ships a **full Moodle Privacy API provider**, so export and erasure requests run through Moodle's standard privacy tools. See [Reports & Analytics](/{{route}}/{{version}}/modern-commerce/reports-and-analytics).

<a name="gpl"></a>
## Is it GPL? Can we modify it?

**No — Modern Commerce is not GPL.** It is proprietary software under the **Modern Commerce Commercial License**, licensed **per site**. Use is limited to the number of sites purchased, and redistribution or sublicensing is prohibited except as stated in the licence.

<a name="support"></a>
## What happens after the first year of support?

A licence includes **one year of updates and support**. After that first year the plugin keeps working on the site it's licensed for; continued updates and support are covered by renewing per the commercial licence terms. Contact support@agunfoninteractivity.com for licence and renewal details.

## Where to go next

- [Overview](/{{route}}/{{version}}/modern-commerce/overview)
- [Requirements](/{{route}}/{{version}}/modern-commerce/requirements)
- [Quick Start](/{{route}}/{{version}}/modern-commerce/quick-start)
