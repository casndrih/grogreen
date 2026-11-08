# Grogreen

A small multi-vendor grocery e-commerce platform built with **Laravel 12** and Tailwind CSS. It gives local Micro, Small, and Medium Enterprises (MSMEs) a place to showcase and sell their products online.

Originally developed for the 2023 APEC App Challenge. This repository has been professionally maintained and hardened with security and modernization fixes.

## Features

- **User accounts** — buyers register, log in, manage profile & address.
- **Vendor management** — MSMEs register as vendors, manage products and orders.
- **Product catalog** — create & manage listings (image, description, price).
- **Shopping cart** — add/remove items, then check out.
- **Order management** — buyers track orders; vendors manage fulfillment.
- **PayPal integration** — secure checkout via `srmklive/paypal`.
- **Search & filtering** — find products quickly.
- **Responsive UI** — Tailwind CSS across devices.

## Security hardening applied

| Area | Fix |
|------|-----|
| Auth middleware | user, vendor and admin routes use their corresponding authentication guards |
| Login throttling | `/login` limited to 5 attempts/minute |
| Logout | switched from `GET` to `POST` (CSRF-safe) |
| Mass assignment | removed `$guarded = []` from `User`/`Vendor`/`Admin`; explicit `$fillable` including `role` |
| Leaked secret | hardcoded Unsplash API key removed; now read from `UNSPLASH_ACCESS_KEY` |
| Dependency audit | `composer audit` clean after upgrade |

## Requirements

- PHP `^8.4.1` (the committed dependency lock includes Symfony 8 packages)
- Composer 2
- MySQL 8 / MariaDB
- Node.js 18+ (for asset build)

## Installation

```bash
git clone https://github.com/casndrih/grogreen.git
cd grogreen
composer install
npm install && npm run build

cp .env.example .env
# edit DB + UNSPLASH_ACCESS_KEY in .env
php artisan key:generate
php artisan migrate
php artisan serve
```

Visit `http://localhost:8000`.

## CI & Maintenance

- GitHub Actions runs `composer audit`, Laravel Pint style check, and the test suite on every push/PR.
- Dependabot keeps Composer, npm, and GitHub Actions dependencies up to date weekly.

## Contributing

Pull requests and issues are welcome on the [GitHub repository](https://github.com/casndrih/grogreen).
