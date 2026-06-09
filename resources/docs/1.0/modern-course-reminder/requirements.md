# Requirements

---

- [Supported Moodle versions](#moodle)
- [Server requirements](#server)
- [Optional: AI template drafting](#ai)
- [Licensing](#licensing)

<a name="moodle"></a>
## Supported Moodle versions

| Item | Value |
|---|---|
| Supported Moodle | **4.5 – 5.2** |
| Minimum Moodle requirement | 2024100700 (Moodle 4.5) |
| Plugin type | Local plugin (`local_moderncoursereminder`) |
| Current release | 1.0.3 |
| Maturity | Stable |
| License | GNU GPL v3 or later |

<a name="server"></a>
## Server requirements

Modern Course Reminder runs on a standard Moodle server. No special PHP extensions, Composer, or npm build step is required after installing the packaged plugin.

- **Cron must be running.** The entire reminder engine — evaluating rules, building the queue, sending, retrying, digests, and cleanup — runs on Moodle scheduled tasks. Nothing is sent until cron runs. See *Site administration → Server → Tasks*.
- **Email and/or notifications must be enabled** site-wide for the matching channel to deliver. The built-in [Health check](/{{route}}/{{version}}/modern-course-reminder/reports-and-analytics) flags this.

<a name="ai"></a>
## Optional: AI template drafting

AI-assisted template drafting is **optional and off by default**. When enabled, it uses Moodle's **own AI subsystem** — the provider, API key, and model are configured centrally in *Site administration → AI → AI providers*.

> {info} Modern Course Reminder **does not store any AI provider keys** of its own. It only needs a Moodle-configured provider that supports text generation. With AI disabled, every other feature works normally.

<a name="licensing"></a>
## Licensing

The plugin is distributed privately to licensed customers and is GPL v3 — you may modify it for your own installation. See the [product page](https://www.agunfoninteractivity.com/plugins/modern-course-reminder) or contact support@agunfoninteractivity.com.
