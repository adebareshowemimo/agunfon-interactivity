# Requirements

---

- [Supported Moodle versions](#moodle)
- [Server requirements](#server)
- [Optional external services](#external)
- [Licensing](#licensing)

<a name="moodle"></a>
## Supported Moodle versions

| Item | Value |
|---|---|
| Supported Moodle | **4.5 – 5.2** |
| Minimum Moodle requirement | 2024100700 |
| Plugin type | Activity module (`mod_modernvideoplayer`) |
| Current release | 1.18.2 |
| Maturity | Stable |
| License | GNU GPL v3 or later |

<a name="server"></a>
## Server requirements

Modern Video Player runs on a standard Moodle server. No special PHP extensions are required for core playback and tracking.

- **Cron must be running.** Premium scheduled features — instructor digests and asynchronous xAPI delivery — depend on Moodle cron. See your site's *Site administration → Server → Tasks*.
- For uploaded video, ensure your `maxbytes` / upload limits and web server timeouts allow your largest files.

<a name="external"></a>
## Optional external services

These are only needed if you enable the matching Premium feature:

| Feature | What you need |
|---|---|
| **S3-compatible cloud sources** | An AWS S3 / Cloudflare R2 / Wasabi / DigitalOcean Spaces / MinIO bucket, region, access key & secret. |
| **Azure Blob sources** | An Azure storage account, container, and account key. |
| **YouTube / Vimeo sources** | Public or appropriately shared provider videos. Provider tracking is limited by each provider's API. |
| **xAPI / cmi5** | An external Learning Record Store (LRS) endpoint and credentials. |
| **LTI 1.3 publishing** | A consuming platform that supports IMS LTI Advantage. |

> {warning} Cloud credentials and LRS passwords are stored in Moodle site configuration. Use least-privilege keys (read-only where possible) and rotate them periodically.

<a name="licensing"></a>
## Licensing

The Premium build is distributed privately to licensed customers. It is GPL v3 — you may modify it for your own installation. See the [pricing on the product page](https://www.agunfoninteractivity.com/plugins/modern-video-player) or contact support@agunfoninteractivity.com.
