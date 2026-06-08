# Exports & Integrations *(Premium)*

---

- [Audit export](#audit)
- [xAPI / cmi5 to an LRS](#xapi)
- [LTI 1.3 publishing](#lti)

<a name="audit"></a>
## Audit export

Export learner integrity records, validated watched segments, and screen-capture-deterrence events (where enabled) for offline review or auditors.

- **Formats:** CSV, JSON, Excel (XLSX), and ODS.
- Enabled by **Enable audit export** (on by default).
- Capture-deterrence events come from the [tamper-evident audit log](/{{route}}/{{version}}/modern-video-player/content-protection).

> {info} Export the data you need to retain **before** uninstalling the plugin or deleting activities.

<a name="xapi"></a>
## xAPI / cmi5 to an LRS

The plugin can emit xAPI/cmi5-style statements to an external **Learning Record Store** for key events — *initialized*, *completed*, and *flagged*.

- **Enable xAPI** (off by default).
- **LRS endpoint**, **LRS username**, **LRS password**.
- Delivery is **asynchronous**: statements are queued and retried by a scheduled task if the LRS is temporarily unavailable — so cron must be running.

<a name="lti"></a>
## LTI 1.3 publishing

Publish an activity through Moodle's **LTI Advantage** tooling so it can be launched from an external platform, with tracking, enforcement, completion, and grade passback preserved.

- **Enable LTI publishing** (on by default).
- Built on Moodle's core LTI 1.3 / LTI Advantage tooling.
- Teachers can view the endpoints an external platform needs to consume the activity.

The consuming platform must support IMS LTI Advantage.
