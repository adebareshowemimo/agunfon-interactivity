# Templates & Content

---

Templates are the **content** a rule sends. They are reusable, branded, and support placeholders that are filled per learner at send time.

- [Audiences](#audiences)
- [Placeholders](#placeholders)
- [Branding](#branding)
- [Preview](#preview)
- [AI drafting](#ai)

<a name="audiences"></a>
## Audiences

Each template has an audience:

- **Learner** — the reminder sent to the learner.
- **Manager** — the escalation notice sent to a line manager.
- **Digest** — the batched summary sent to managers/admins.

A rule selects a learner template (or the site default) and, for escalation, a manager template. The plugin ships with starter learner and manager templates you can duplicate and edit.

<a name="placeholders"></a>
## Placeholders

Templates support around 25 placeholders, filled per recipient:

```
{firstname} {lastname} {fullname} {email} {username}
{coursename} {courseshortname} {courseurl}
{activityname} {activityurl} {progress} {completionstatus}
{duedate} {daysremaining} {daysoverdue} {lastaccess} {lastlogin}
{managername} {manageremail}
{sitename} {supportemail} {unsubscribeurl} {dashboardurl} {logo}
```

<a name="branding"></a>
## Branding

Under **Logo and branding** you choose the logo used in emails and notifications. The `{logo}` placeholder resolves to that source as an **absolute URL**, so it displays correctly outside Moodle (in an email client). Brand colours configured for the plugin are applied to branded email templates.

> {info} Some theme logos require a login to load and can fail to display in email. If the logo preview is broken, choose the **site** or **compact** logo instead.

<a name="preview"></a>
## Preview

Every template has a **sandboxed preview** that renders it with sample learner data and your brand colours. No email is sent from the preview.

<a name="ai"></a>
## AI drafting

If enabled by your administrator, **Generate with AI** lets you describe the reminder you want; the AI subsystem drafts a subject and HTML body using the available placeholders. Review the draft, then save it as a template you can refine.

> {primary} AI drafting uses Moodle's **own** AI provider configuration (*Site administration → AI*). No provider keys are stored in this plugin, and the feature is off until both the plugin setting and a Moodle text-generation provider are enabled. See [Requirements](/{{route}}/{{version}}/modern-course-reminder/requirements).
