# Profile Editing

---

- [What it is](#what)
- [What can be edited](#fields)
- [Profile picture](#picture)
- [Email changes](#email)
- [Permissions & locked fields](#permissions)

<a name="what"></a>
## What it is

The **Profile** tab shows the learner's details and lets them update their own profile **inline**, without leaving the dashboard. Edits are made in a modal and saved through Moodle's standard user APIs.

<a name="fields"></a>
## What can be edited

The profile view shows name, email, city, country, department, institution and any custom profile fields. In the edit modal, learners can update:

- First name, last name and email
- Country and city
- Department and institution
- **Editable custom profile fields** — text, text area, menu, checkbox and date/time fields all render with the right control.

<a name="picture"></a>
## Profile picture

A camera control on the avatar opens an upload modal where learners can **upload**, **change** or **remove** their profile picture. Uploads are validated as images and saved to the user's standard picture area.

<a name="email"></a>
## Email changes

When a learner changes their email, Moodle's **email-change confirmation** flow applies: the dashboard reports that a confirmation message has been sent, and the new address takes effect once confirmed.

<a name="permissions"></a>
## Permissions & locked fields

Profile editing is **permission-aware**:

- Fields the site locks (or that an **external authentication** provider manages) stay read-only.
- If the account can't be edited inline, the dashboard shows a clear message and a link to **open the full profile editor**.
- Editing respects the `moodle/user:editownprofile` capability and is protected by sesskey on save.
