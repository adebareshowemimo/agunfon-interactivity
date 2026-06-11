# Installation & Upgrade

## Install

1. Place the plugin directory at:

   ```text
   local/modernenrolnotifier
   ```

2. Visit **Site administration** to complete the plugin installation.

3. Configure it under:

   ```text
   Site administration → Plugins → Local plugins → Modern Enrolment Notifier
   ```

4. Confirm **Moodle cron is running**.

5. Review the seeded default rule and templates **before** enabling production delivery.

## Upgrade

Upgrade steps run automatically when you visit Site administration after replacing the plugin files. Earlier short-prefix or legacy table names are migrated to the current plugin-owned table names during upgrade.

> {info} Template output is rendered at send time and stored on the queue/log record as an audit snapshot, so upgrading does not change messages already delivered.

## First-run checklist

- [ ] Cron confirmed running.
- [ ] Email channel enabled (Settings).
- [ ] Notifications enabled globally, or per course.
- [ ] Default learner-welcome rule reviewed.
- [ ] A test enrolment sent, then queue and logs checked.

## Next steps

- [Quick Start](/{{route}}/{{version}}/modern-enrolment-notifier/quick-start)
