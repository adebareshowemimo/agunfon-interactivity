# Modern Commerce — Requirements

---

- [Supported Moodle versions](#moodle)
- [Server requirements](#server)
- [Cron is mandatory](#cron)
- [Payment gateway accounts](#gateways)
- [Optional external services](#optional)
- [Dependencies](#dependencies)
- [Licensing](#licensing)

<a name="moodle"></a>
## Supported Moodle versions

| Item | Value |
|---|---|
| Supported Moodle | **5.2 only** |
| Plugin type | Local plugin (`local_moderncommerce`) |
| Current release | 2.1.6 |
| Maturity | Stable |
| License | Modern Commerce Commercial License (proprietary, per site) |

Modern Commerce targets Moodle **5.2** specifically. It is not a multi-version plugin.

<a name="server"></a>
## Server requirements

- **PHP 8.3 or later.**
- **HTTPS in production** — required for payment gateway redirects and webhooks to work reliably and securely.
- **Composer** available during installation or packaging (the self-hosted commercial package pulls PHP dependencies). See [Installation](/{{route}}/{{version}}/modern-commerce/installation).

<a name="cron"></a>
## Cron is mandatory

Modern Commerce relies on Moodle scheduled tasks for cart cleanup, key expiry, abandoned-cart recovery, payment reminders, report snapshots, notification delivery, and the entire subscription lifecycle.

> {warning} **Run Moodle cron every minute in production.** Without cron, notifications don't send, subscriptions don't renew or expire, and reports don't refresh. See *Site administration → Server → Tasks*.

<a name="gateways"></a>
## Payment gateway accounts

To take live payments you connect **your own merchant accounts** for one or more of:

- **Stripe**
- **PayPal**
- **Paystack**
- **Flutterwave**

You provide each provider's API keys/secrets in the gateway admin; card capture happens **on the gateway**, not inside Moodle.

> {warning} There is **no sale until at least one gateway is configured**. Set one up before opening checkout — see [Payments](/{{route}}/{{version}}/modern-commerce/payments).

<a name="optional"></a>
## Optional external services

These are optional and off until you configure them:

- **Slack** and **Microsoft Teams** incoming webhooks — for operational store alerts.
- **Google reCAPTCHA** — spam protection on the public contact and newsletter forms. Modern Commerce reads Moodle's **core** reCAPTCHA keys; it stores no separate keys.

<a name="dependencies"></a>
## Dependencies

**None.** Modern Commerce does not depend on any other plugin. Optional add-ons (such as Enrolment Notifier or Course Reminders) integrate when present, but the store is fully functional on its own.

<a name="licensing"></a>
## Licensing

Modern Commerce is distributed under the **Modern Commerce Commercial License** — a proprietary, **per-site** licence, **not** GPL. A licence includes **one year of updates and support**. See the [product page](https://www.agunfoninteractivity.com) or contact support@agunfoninteractivity.com.

## Where to go next

- [Installation](/{{route}}/{{version}}/modern-commerce/installation)
- [Quick Start](/{{route}}/{{version}}/modern-commerce/quick-start)
- [Payments](/{{route}}/{{version}}/modern-commerce/payments)
