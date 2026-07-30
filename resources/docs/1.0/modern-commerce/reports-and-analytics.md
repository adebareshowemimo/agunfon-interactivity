# Modern Commerce — Reports & Analytics

---

- [Dashboard & reports](#dashboard)
- [Scheduled tasks & automation](#tasks)
- [Roles & capabilities](#capabilities)
- [Privacy & GDPR](#privacy)

<a name="dashboard"></a>
## Dashboard & reports

The Modern Commerce dashboard (`/local/moderncommerce/admin/index.php`) shows sales analytics and charts; detailed reports live at `/local/moderncommerce/admin/reports.php`. Reporting is backed by snapshot tables refreshed on cron, so the dashboard stays fast even on busy stores.

Viewing reports, dashboard charts, payment/webhook events, and wishlists requires `local/moderncommerce:viewreports`.

> {primary} Set your store currency **before** launch — changing it after orders exist makes older and newer report figures harder to compare. Reports use the single active store currency.

<a name="tasks"></a>
## Scheduled tasks & automation

Modern Commerce runs **17 scheduled tasks** on Moodle cron. Highlights:

| Task | Schedule | Purpose |
|---|---|---|
| `notify_send_queue` | Every minute | Drain the notification delivery queue. |
| `notify_reap_stale` | Every 10 min | Requeue stale processing notifications. |
| `abandoned_cart_recovery` | Hourly (min 15) | Send abandoned-cart recovery notifications. |
| `expire_keys` | Every 6h (min 30) | Expire enrolment keys. |
| `send_payment_reminders` | Daily 09:00 & 15:00 | Payment reminders for unpaid orders. |
| `generate_sales_report` | Daily 01:05 | Generate sales report snapshots. |
| `cleanup_cart` | Daily 02:00 | Clean old carts. |
| `cancel_abandoned_orders` | Daily 03:00 | Cancel abandoned orders. |
| `notify_process_digests` | Daily 07:00 | Process notification digests. |
| `notify_daily_scan` | Daily 07:30 | Daily invoice/admin notification scan. |

The remaining tasks run the **subscription lifecycle**: check expiring, process expired, sync access, process pending plan changes, process trials, process recurring payments, and clean up old subscriptions.

> {warning} All analytics refresh and automation depend on cron running **every minute** in production.

<a name="capabilities"></a>
## Roles & capabilities

Modern Commerce uses Moodle's native roles and capabilities — there is no separate permission system. It defines **36 capabilities** and seeds a set of ready-made role presets (commerce admin, finance, product, reporting, storefront, marketing, support, subscription, and payment operations). Assign roles at **system context** via *Site administration -> Users -> Permissions -> Assign system roles*.

Common capabilities:

| Capability | Purpose |
|---|---|
| `local/moderncommerce:viewreports` | Reports, dashboard charts, payment/webhook events, wishlists. |
| `local/moderncommerce:viewauditlog` | View immutable audit logs. |
| `local/moderncommerce:manageorders` | Manage orders, invoices, and order status. |
| `local/moderncommerce:processrefunds` | Process refunds. |
| `local/moderncommerce:configuregateways` | Configure payment gateways and their credentials. |
| `local/moderncommerce:managesettings` | Manage store settings, branding, navigation. |
| `local/moderncommerce:viewnotificationlog` | View notification delivery logs. |

Refresh the seeded role presets at any time with `php local/moderncommerce/cli/seed_role_presets.php` (it adds missing preset roles/capabilities and never assigns users automatically).

<a name="privacy"></a>
## Privacy & GDPR

Modern Commerce processes personal data (buyers, orders, invoices, contacts, subscribers) and ships a **full Moodle Privacy API provider**. That means data export and erasure requests raised through Moodle's core privacy tools cover Modern Commerce data — supporting GDPR subject-access and right-to-be-forgotten workflows through Moodle's standard mechanisms.

> {primary} Because privacy is handled through Moodle's core Privacy API, you administer export and deletion from *Site administration -> Users -> Privacy and policies* like any other compliant plugin.

## Where to go next

- [Orders, Invoices & Refunds](/{{route}}/{{version}}/modern-commerce/orders-invoices-refunds)
- [Notifications](/{{route}}/{{version}}/modern-commerce/notifications)
- [Admin Settings Reference](/{{route}}/{{version}}/modern-commerce/admin-settings)
- [FAQ](/{{route}}/{{version}}/modern-commerce/faq)
