# VP Social Login

One-click social login for Joomla — **Google, Discord, GitHub and Telegram**. Social buttons drop straight into the native Joomla login form, members can link or unlink providers from their own profile, and there's a standalone module for any template position.

Free and open source under the GNU GPL. Built natively for **Joomla 5 and 6**.

![Version](https://img.shields.io/badge/version-1.1.0-2563eb)
![Joomla](https://img.shields.io/badge/Joomla-5%20%26%206-5091cd)
![PHP](https://img.shields.io/badge/PHP-8.1%2B-777bb4)
![License](https://img.shields.io/badge/license-GPL--2.0--or--later-blue)

> **Product page:** https://vpjoomla.com/extensions/social-login/vp-social-login
> **Documentation:** https://vpjoomla.com/docs · **Support:** https://vpjoomla.com/support

---

## Features

- **One-click sign-in** with Google, Discord, GitHub and Telegram.
- **Native integration** — buttons appear right inside the Joomla login form, no shortcodes or markup to add.
- **Account linking** — a *Connected accounts* panel in the user profile lets members connect or disconnect providers themselves.
- **Standalone module** — drop a social-login block into any template position or article.
- **Privacy-friendly** — no passwords stored, minimal data kept, and links are cleaned up automatically when a user is deleted.
- **No third-party services** — talks directly to each provider's OAuth endpoint.
- **Lightweight** — assets load through the Joomla WebAssetManager. No jQuery, no bloat.
- **Localized** — English, Russian and Ukrainian included.

---

## Requirements

- Joomla **5.0+** or **6.0+**
- PHP **8.1** or newer
- An **HTTPS** site (required by the providers)
- One OAuth application per provider you enable (free to create)

---

## Installation

1. Download the latest `pkg_vp_social_login-vX.Y.Z.zip` from the [**Releases**](https://github.com/vpjoomla/pkg_vp_social_login/releases) page.
2. In Joomla: **System → Install → Extensions**, then upload the package.
3. Enable the two plugins under **System → Manage → Plugins**:
   - *System - VP Social Login*
   - *User - VP Social Login (Connected accounts)*
4. Configure your providers in the **System - VP Social Login** plugin (see below).

The package installs three extensions at once and keeps them in sync:

| Extension | Element | Role |
|-----------|---------|------|
| System plugin | `plg_system_vpsociallogin` | Core OAuth logic, login-form buttons, link/unlink |
| User plugin | `plg_user_vpsociallogin` | *Connected accounts* panel in the user profile |
| Module | `mod_vp_social_login` | Standalone social-login block for any position |

---

## Provider setup

Enable a provider in the plugin, then create an OAuth app in that provider's console and paste the **Client ID** / **Client secret**. Register this exact **redirect URI** (the plugin shows it for you):

```
https://your-site.com/index.php?option=com_ajax&group=system&plugin=vpsociallogin&format=raw&vpsl=callback&provider=PROVIDER
```

Replace `PROVIDER` with `google`, `discord` or `github`.

- **Google** — [Google Cloud Console](https://console.cloud.google.com/) → Credentials → OAuth client ID (Web application).
- **Discord** — [Discord Developer Portal](https://discord.com/developers/applications) → New Application → OAuth2.
- **GitHub** — [GitHub Developer Settings](https://github.com/settings/developers) → New OAuth App.
- **Telegram** — create a bot with [@BotFather](https://t.me/BotFather), run `/setdomain` and set it to your site domain, then paste the **bot username** and **bot token**. Telegram does not share an e-mail, so Telegram accounts use a stable internal address.

> Full step-by-step guides for each provider are in the [documentation](https://vpjoomla.com/docs).

---

## Connected accounts

Logged-in members can manage their providers from the native Joomla profile page: a **Connected accounts** section shows each provider with a **Connect** / **Disconnect** button. When a user is deleted, all of their social links are removed automatically — no orphaned data is left behind.

---

## The module

`mod_vp_social_login` displays the same buttons anywhere you place it. Options:

- **Button style** — inherit from the plugin, brand colours, outline, or icon only.
- **Layout** — stacked or inline.
- **Notice when logged in** — optionally show a short notice instead of nothing.

The module requires the **System - VP Social Login** plugin to be installed and enabled.

---

## Updates

The package ships with a Joomla update server, so you'll get one-click updates in **System → Update → Extensions**. Updates are delivered as a single package — all three parts move together.

---

## Localization

User-facing strings ship in **English (en-GB)**, **Russian (ru-RU)** and **Ukrainian (uk-UA)**. Translations are welcome — see the `language/` folder in each extension.

---

## Building from source

This repository contains the full source. The installable package is assembled from the three extensions plus the package manifest, then zipped:

```
pkg_vp_social_login/
├── pkg_vp_social_login.xml      # package manifest
├── script.php                   # post-install message
├── language/                    # package language files (en-GB, ru-RU, uk-UA)
└── packages/                    # the three component ZIPs
    ├── plg_system_vpsociallogin.zip
    ├── plg_user_vpsociallogin.zip
    └── mod_vp_social_login.zip
```

Grab a ready-to-install build from [Releases](https://github.com/vpjoomla/pkg_vp_social_login/releases).

---

## Support

- **Documentation:** https://vpjoomla.com/docs
- **Issues:** please use the [GitHub issue tracker](https://github.com/vpjoomla/pkg_vp_social_login/issues)
- **Support:** https://vpjoomla.com/support

---

## License

Copyright © 2026 VPJoomla. All rights reserved.

VP Social Login is free software, released under the **GNU General Public License v2 or later**. See [LICENSE.txt](LICENSE.txt) for details.

---

Made by [Volodymyr Pershyn](https://vpjoomla.com) · **VPJoomla — Joomla 5 & 6 extensions**
