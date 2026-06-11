# Templates & Branding

The plugin seeds **20 HTML templates** on install and lets you create, edit, duplicate, preview, filter, and delete your own. When a template is deleted, course settings and rules that referenced it reset to the default template fallback.

## Seeded templates

Welcome (Professional / Simple / Minimalist), Compliance Training, Onboarding, Marketing & Sales, Leadership Development, Technical Skills, Refresher, Microlearning — plus a **Premium** set: Modern Welcome, Compliance Training, Onboarding Journey, Professional Development, Technical Skills, Skills Refresher, Leadership Excellence, Microlearning, Safety & Well-being, and Certification Program.

## Placeholders

| Group | Examples |
|---|---|
| Learner | `{{user.firstname}}`, `{{user.fullname}}`, `{{user.email}}`, `{{user.department}}` |
| Recipient | `{{recipient.firstname}}`, `{{recipient.fullname}}`, `{{recipient.email}}` |
| Course | `{{course.fullname}}`, `{{course.url}}`, `{{course.startdate}}`, `{{teacher.fullname}}` |
| Enrolment | `{{enrolment.method}}`, `{{enrolment.startdate}}`, `{{enrolment.enddate}}`, `{{enrolment.status}}` |
| Completion | `{{completion.progress}}` |
| Site & brand | `{{site.name}}`, `{{site.url}}`, `{{site.supportemail}}`, `{{logo}}` |
| Brand colors | `{{brand.primary}}`, `{{brand.accent}}`, `{{brand.gray}}` |
| Custom profile fields | `{{profile.<shortname>}}` |

Legacy single-brace placeholders (`{firstname}`, `{coursename}`, `{logo}`, …) continue to work for existing templates.

## Conditional blocks

```text
{{#has_expiry}}This appears when an expiry date exists.{{/has_expiry}}
{{^not_started}}This appears when the course has already started.{{/not_started}}
{{#has_teacher}}Your teacher is {{teacher.fullname}}.{{/has_teacher}}
```

Available flags: `has_expiry`, `not_started`, `has_teacher`, `has_enroldate`.

## Branding

The **Branding** page controls the logo used by `{{logo}}`:

- Moodle **site logo**
- Moodle **compact** site logo
- Discovered **theme** logo files

> {info} Core site logos are preferred — they are normally reachable from email clients without a Moodle login session. Theme file URLs may display in Moodle but not in some external email clients.

Brand colors derive from the active theme where available, with Bootstrap palette fallbacks. If Modern Course Reminder manages branding, this plugin uses that source.

## AI-assisted drafting

When enabled in Settings and Moodle's core AI subsystem has a text-generation provider, you can generate a draft **subject** and **body** from a plain-language brief. The plugin stores **no** provider keys — it only calls Moodle's AI action and asks for a JSON response. Generated content is shown for **review before saving**.

## Next steps

- [Channels & Delivery](/{{route}}/{{version}}/modern-enrolment-notifier/channels-and-delivery)
