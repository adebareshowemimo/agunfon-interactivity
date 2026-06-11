# Quick Start

This walks through a simple **learner welcome** workflow, then points to manager/teacher and endpoint setups.

## Send your first welcome

1. **Enable the email channel** — Settings → enable the email channel.
2. **Enable notifications** — globally in Settings, or on selected course pages.
3. **Review the default learner-welcome rule** — Notification rules. Or start from a [preset](/{{route}}/{{version}}/modern-enrolment-notifier/rules#presets).
4. **Choose or edit the template** — the course or global default. See [Templates](/{{route}}/{{version}}/modern-enrolment-notifier/templates).
5. **Run cron** and check the **queue** and **log** pages after a test enrolment.

```text
Enable email  →  Enable notifications  →  Review welcome rule  →  Pick template  →  Test enrolment  →  Check queue/log
```

## Notify teachers or managers

1. Configure **recipient resolution** (see [Recipients & Manager Mapping](/{{route}}/{{version}}/modern-enrolment-notifier/recipients-and-managers)).
2. Create a rule with recipient **Course teachers**, **Course managers**, **Course contacts**, or **Learner's line manager**.
3. Choose a template that addresses the recipient using **recipient placeholders**.
4. Use **digest mode** if enrolment volume would create too many individual messages.

## Automate an external system

1. Enable and configure the **webhook**, **Slack**, or **Teams** settings.
2. Use **Test delivery channels** to confirm the endpoint accepts a sample request.
3. Create a **site-wide** rule and select the endpoint channel.
4. Review **logs** for delivery success or endpoint errors.

## Next steps

- [Notification Rules](/{{route}}/{{version}}/modern-enrolment-notifier/rules)
- [Channels & Delivery](/{{route}}/{{version}}/modern-enrolment-notifier/channels-and-delivery)
