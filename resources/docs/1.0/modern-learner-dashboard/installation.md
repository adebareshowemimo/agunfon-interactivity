# Installation & Upgrade

---

- [Install the plugin](#install)
- [Add the block to the Dashboard](#add)
- [Make it the default for everyone](#default)
- [Upgrading](#upgrade)
- [Uninstalling](#uninstall)

<a name="install"></a>
## Install the plugin

Install like any Moodle block — either method works:

- **From a ZIP:** *Site administration → Plugins → Install plugins*, upload the ZIP, and complete the upgrade.
- **Manually:** unzip into `blocks/modernlearnerdashboard/` in your Moodle root, then visit *Site administration → Notifications* to finish the database upgrade.

> {info} The block installs into `/blocks/` (the web-root is `/public` on Moodle 5.x). No extra build step is needed — the AMD JavaScript is shipped pre-built.

<a name="add"></a>
## Add the block to the Dashboard

1. Go to the **Dashboard** (`/my/`).
2. Turn **editing on**.
3. Open **Add a block** and choose **Modern Learner Dashboard**.

The block reads core Moodle data and personalizes itself for whoever is viewing it — there is no per-learner configuration.

<a name="default"></a>
## Make it the default for everyone

To give every learner the dashboard automatically, add the block to the **default Dashboard** and lock it:

1. On the Dashboard, choose **Reset Dashboard for all users** after placing the block, or
2. Add it to the default `/my` page via *Site administration → Appearance → Default Dashboard page*, then position and (optionally) lock it.

For an immersive home, enable **Hide dashboard page header** in the block's settings so the block stands alone. See [Admin Settings](/{{route}}/{{version}}/modern-learner-dashboard/admin-settings).

<a name="upgrade"></a>
## Upgrading

Install the new version over the old one (upload the ZIP or replace the folder) and run *Site administration → Notifications*. Instance settings — recent-course limit, date format, loader, custom CSS — are preserved across upgrades.

<a name="uninstall"></a>
## Uninstalling

Uninstall from *Site administration → Plugins → Plugins overview → Uninstall*. Because the block keeps **no database tables of its own**, removing it leaves no orphaned data — the Dashboard simply returns to its previous state.
