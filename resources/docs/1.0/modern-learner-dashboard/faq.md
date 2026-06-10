# FAQ

---

- [Which Moodle versions are supported?](#versions)
- [Which themes does it work with?](#themes)
- [Does each learner need to set it up?](#setup)
- [Where do badges and certificates come from?](#badges)
- [What is the Learning transcript?](#transcript)
- [Can learners edit their own profile?](#profile)
- [How is learner data handled (GDPR)?](#privacy)
- [Does it need cron or an external service?](#infra)
- [Is it really GPL?](#gpl)

<a name="versions"></a>
## Which Moodle versions are supported?

Moodle **4.5 through 5.2**, CI-tested on 4.5, 5.1 and 5.2 with PHP 8.3. The current release is 1.4.17 (Stable), GNU GPL v3.

<a name="themes"></a>
## Which themes does it work with?

It is tested and styled for **Boost, Boost Union, Classic, Moove, Adaptable, Academi and Degrade**, and reads the active theme (via an `mld-theme-{name}` class) so you can scope your own tweaks. See [Branding & Themes](/{{route}}/{{version}}/modern-learner-dashboard/branding-and-themes).

<a name="setup"></a>
## Does each learner need to set it up?

No. The block reads core Moodle data and personalizes itself for whoever is viewing it — there is no learner configuration. Admins just add it to the Dashboard once.

<a name="badges"></a>
## Where do badges and certificates come from?

Badges use Moodle's **core badge** issue records. Certificates come from the **Course Certificate** activity (`mod_coursecertificate`) when present; without it, certificate features are hidden automatically. See [Requirements](/{{route}}/{{version}}/modern-learner-dashboard/requirements#certificates).

<a name="transcript"></a>
## What is the Learning transcript?

A completed-training record on the **My courses** tab: every finished course with its completion date, activity completion, grade average and certificate link — an at-a-glance compliance view. See [Learning Transcript](/{{route}}/{{version}}/modern-learner-dashboard/learning-transcript).

<a name="profile"></a>
## Can learners edit their own profile?

Yes — name, email, picture and editable custom fields, inline from the Profile tab. Locked and external-auth fields stay read-only, and saves respect the `moodle/user:editownprofile` capability. See [Profile Editing](/{{route}}/{{version}}/modern-learner-dashboard/profile-editing).

<a name="privacy"></a>
## How is learner data handled (GDPR)?

The block ships a **null privacy provider** — it stores **no personal data of its own** and only displays data Moodle already holds. There are no plugin database tables.

<a name="infra"></a>
## Does it need cron or an external service?

No. There are no scheduled tasks and no external service — everything is computed on demand from core Moodle data, with site-wide counts cached for five minutes for performance.

<a name="gpl"></a>
## Is it really GPL? Can we modify it?

Yes — **GNU GPL v3 or later**. You're free to modify it for your own installation.
