# Requirements

---

- [Supported Moodle versions](#moodle)
- [Server requirements](#server)
- [Optional: Course Certificate](#certificates)
- [Privacy & data](#privacy)
- [Licensing](#licensing)

<a name="moodle"></a>
## Supported Moodle versions

| Item | Value |
|---|---|
| Supported Moodle | **4.5 – 5.2** |
| Minimum Moodle requirement | 2024100700 (Moodle 4.5) |
| Plugin type | Block (`block_modernlearnerdashboard`) |
| Current release | 1.4.17 |
| Maturity | Stable |
| License | GNU GPL v3 or later |

CI-tested on Moodle 4.5, 5.1 and 5.2 with PHP 8.3.

<a name="server"></a>
## Server requirements

Modern Learner Dashboard runs on a standard Moodle server. No special PHP extensions, Composer, or npm build step is required after installing the packaged plugin — the JavaScript is shipped pre-built.

- **No cron dependency.** The block computes everything on demand; there are no scheduled tasks to configure.
- **JavaScript enabled** in the browser — tabs other than the overview load over AJAX.

<a name="certificates"></a>
## Optional: Course Certificate

The **Certificates** tab and the certificate column in the [Learning Transcript](/{{route}}/{{version}}/modern-learner-dashboard/learning-transcript) require the **Course Certificate** activity (`mod_coursecertificate`) and the Certificate manager (`tool_certificate`).

> {info} If Course Certificate is not installed, the dashboard **degrades gracefully** — the Certificates tab and certificate stats are simply hidden, and an admin-only notice explains why. Every other feature works normally.

<a name="privacy"></a>
## Privacy & data

The block ships a **null privacy provider**: it stores **no personal data of its own** and only displays data Moodle already holds about the learner. There are no plugin database tables. Profile edits made from the dashboard are written through Moodle's standard user APIs.

<a name="licensing"></a>
## Licensing

The plugin is distributed privately to licensed customers and is GPL v3 — you may modify it for your own installation. See the [product page](https://agunfoninteractivity.com/plugins/modern-learner-dashboard) or contact support@agunfoninteractivity.com.
