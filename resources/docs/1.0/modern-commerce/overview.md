# Modern Commerce — Overview

---

- [What it is](#what-it-is)
- [Who it's for](#who)
- [How the store works](#how)
- [Where to go next](#next)

<a name="what-it-is"></a>
## What it is

**Modern Commerce** (`local_moderncommerce`) is a Moodle **local plugin** that runs a complete ecommerce storefront inside your Moodle site. Instead of bolting a shopping cart onto an external system, it sells your Moodle courses directly: a public catalog, product and detail pages, cart and checkout, real payment gateways, and automatic enrolment the moment a payment succeeds.

On that foundation it adds **bundles and programs**, **subscription plans**, **coupons and prepaid enrolment keys**, **invoices and refunds**, a **branded, widget-driven storefront**, transactional and marketing **notifications**, and a **dashboard with sales analytics** — all backed by Moodle's own roles, enrolment, messaging, and cron. There is no external service to host.

> {primary} Modern Commerce is a **commercial** plugin licensed under the **Modern Commerce Commercial License** — proprietary and per site, not GPL. A licence includes one year of updates and support. See [Requirements](/{{route}}/{{version}}/modern-commerce/requirements) and [Installation](/{{route}}/{{version}}/modern-commerce/installation).

<a name="who"></a>
## Who it's for

- **Course sellers & training providers** who want to sell Moodle courses directly, without a separate WordPress/WooCommerce or Shopify front end.
- **Store managers** who create products, bundles, coupons, and subscription plans and arrange the storefront visually.
- **Finance & operations teams** who need invoices, refunds, an audit trail, and reconciled payment/webhook ledgers.
- **Administrators** who want payments, enrolment, and notifications to happen automatically on cron, inside Moodle.

<a name="how"></a>
## How the store works

A purchase flows through the same pipeline every time:

1. **Catalog** — buyers browse the storefront catalog and open a course, bundle, or program detail page.
2. **Cart** — they add a product and go to checkout; a coupon can be applied here.
3. **Checkout** — an order is created and the buyer is sent to their chosen payment gateway. Card details are captured **on the gateway**, never in Moodle.
4. **Gateway** — Stripe, PayPal, Paystack, or Flutterwave processes the payment and returns a callback; a signed webhook confirms it asynchronously.
5. **Fulfilment** — on a confirmed payment, Modern Commerce grants access: it enrols the buyer into the course(s), redeems keys, or activates a subscription.
6. **Invoice & notify** — an invoice/receipt is generated, and order, payment, and enrolment emails are queued. The order and entitlements appear in the learner dashboard.

Subscriptions, key expiry, abandoned-cart recovery, payment reminders, report snapshots, and the notification queue all run as **scheduled tasks on Moodle cron** — so nothing critical is left to a page load.

> {success} Because access is granted through Moodle's own enrolment and roles, learners land in exactly the courses they bought with no manual steps.

<a name="next"></a>
## Where to go next

- [Requirements](/{{route}}/{{version}}/modern-commerce/requirements)
- [Installation](/{{route}}/{{version}}/modern-commerce/installation)
- [Quick Start](/{{route}}/{{version}}/modern-commerce/quick-start)
- [Payments](/{{route}}/{{version}}/modern-commerce/payments)
- [Admin Settings Reference](/{{route}}/{{version}}/modern-commerce/admin-settings)
