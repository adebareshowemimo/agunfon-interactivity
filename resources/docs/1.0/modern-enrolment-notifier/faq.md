# FAQ

**Which Moodle versions are supported?**
Moodle 4.5 through 5.2.

**Do I need cron?**
Yes. Notifications are queued and delivered by Moodle cron. Without cron, messages remain queued and are never sent — cron also drives expiry scans, retries, digests, and cleanup.

**Will it slow my site down?**
No. Enrolment events are captured instantly, but rendering and sending happen later through scheduled tasks, so enrolment stays fast even when email or external endpoints are slow.

**How do Slack and Teams notifications work?**
Add an incoming webhook URL for each in Settings. Use the **Test delivery channels** page to confirm each endpoint works before relying on it in a rule.

**Are webhook payloads secure?**
When a signing secret is configured, each webhook request includes an `X-MEN-Signature: sha256=<hmac>` header — an HMAC-SHA256 of the raw JSON body — so the receiver can verify authenticity.

**Will it send duplicates if an event re-fires?**
No. Notifications are deduplicated per learner, course, event, enrolment, channel, recipient, and rule. A later **re-enrolment** can create a new notification.

**Who can be notified?**
The enrolled learner, course teachers, course managers, Moodle course contacts, or the learner's line manager. Deleted, suspended, guest, and email-less users are skipped.

**How is the line manager determined?**
By a manual mapping table, a user profile field, or the Moodle manager role — your choice in Settings. Mappings can be bulk-imported from CSV.

**Can teachers manage their own course notifications?**
Yes. With the `manage` capability, course managers can enable notifications, pick a template or custom message, preview, and create course-scoped rules — within limits you set. Course-level rules are limited to email and in-app channels.

**Does the AI feature need an API key?**
No. It uses Moodle's core AI subsystem; no provider keys are stored in the plugin. Generated drafts are shown for review before saving.

**How is learner data handled (GDPR)?**
A bundled privacy provider supports full user export and deletion across queue records, logs, digests, mappings, opt-outs, conditions, and messages.

**Is it really GPL?**
Yes — GNU GPL v3 or later. You're free to modify it for your own installation.
