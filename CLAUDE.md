# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Overview

Laravel 12 (PHP 8.2) multi-panel e-commerce platform for the Bangladesh market (BDT, Bangla UI strings/comments, local payment gateways and couriers). One codebase serves five audiences: storefront customers, admin/staff, vendors, resellers (with their own landing-page storefronts, optionally on custom domains), and a mobile app API.

## Commands

Runs under XAMPP (Apache + MySQL) on Windows; there is no Node/Vite step in the actual UI.

```bash
composer install
php artisan migrate                      # MySQL; DB name set in .env
php artisan serve                        # or open via Apache at /laravel/martmama
php artisan optimize:clear               # after config/route/view changes
php artisan schedule:run                 # runs courier status sync (see below)
php artisan courier:check-status --limit=50 [--force]
vendor/bin/pint                          # code style
php artisan test                         # tests/ only contains Laravel example tests
php artisan test --filter=SomeTest       # single test
```

`phpunit.xml` uses the real `.env` database (sqlite lines are commented out) — tests will hit the dev MySQL DB.

## Deployment layout quirks

- The project root is the web root: `index.php` and `.htaccess` live at the root (not only in `public/`). Consequently views reference assets as `asset('public/backEnd/...')`, `asset('public/frontEnd/...')`, `asset('public/uploads/...')`. Keep that `public/` prefix when adding assets.
- Static CSS/JS is served directly from `public/backEnd`, `public/frontEnd`, `public/assets`; `vite.config.js`/`resources/js` are unused by the Blade views.
- `app/helpers.php` is autoloaded (composer `files`) and also `require`d in `bootstrap/app.php`.

## Architecture

### Bootstrapping & middleware
Laravel 12 style config in `bootstrap/app.php` (an old `app/Http/Kernel.php` also exists but `bootstrap/app.php` is authoritative for middleware). Notable pieces:
- **Global** `AppSessionHandler`: license check — on any host other than `localhost`/`127.0.0.1` it calls a remote verify-license endpoint with `LICENSE_KEY` and hard-redirects/exits if invalid. Local dev is exempt; be aware when testing on other hostnames.
- **Web prepend** `ResellerCustomDomain`: if the request host matches an active `ResellerLandingPage.custom_domain`, it dispatches directly to `Reseller\PublicLandingController` / `LandingOrderController` etc. by regex-matching the path, bypassing `routes/web.php`. New reseller-landing routes must be added both in `web.php` (under `/r/{slug}`) and in this middleware. Use the `landing_url($slug, $path)` helper to generate links that work in both modes.
- Aliases: `admin`, `vendor`, `reseller`, `customer`, `lock`, `ipcheck` (IP blocklist), `check_refer`, `reseller_public_enabled`, `demo_mode`, plus Spatie `role`/`permission`.
- `demo_mode` (`DEMO_MODE=true` in .env) blocks all non-GET requests and a list of destructive GET paths in admin/vendor/reseller panels. Add new destructive GET routes to its list.

### Auth model
- Guards (`config/auth.php`): `admin` and `web` → `users` table (`User`); `customer` → `customers` table (`Customer`).
- Admins, staff, vendors and resellers are **all `User` rows on the `admin` guard**, distinguished by Spatie roles (and a legacy `role` column). `AdminMiddleware` allows user id 1, any Spatie role except `vendor`/`reseller` (those get redirected to their own dashboards). `VendorMiddleware`/`ResellerMiddleware` also check `GeneralSetting.vendor_enabled` / `reseller_enabled`.
- Storefront customers use the separate `customer` guard / `customer` middleware.
- Mobile API (`routes/api.php`, `v1/mobile/*`) uses Sanctum; `updates/*` routes serve the script self-update system (`UpdateController`, `UpdateServerController`, `Version` model).
- `AppServiceProvider::boot` replaces the `users` provider driver with a custom `hidden_admin` provider, and registers CSRF exceptions for payment-gateway callbacks — add new gateway callback URLs there.

### Code organization
- `routes/web.php` (~1100 lines) holds every panel; routes are grouped by prefix (`admin`, `vendor`, `reseller`, `customer`, `r/{slug}`) and middleware stacks like `['auth:admin','admin','lock','check_refer','demo_mode']`. Many admin routes are declared individually with their own middleware arrays rather than inside a group.
- Controllers are split by panel: `Admin/`, `Frontend/`, `Vendor/`, `Reseller/`, `Api/` (+ `Api/Mobile`). Views mirror this: `resources/views/backEnd`, `frontEnd`, `vendor`, `reseller`.
- Logic largely lives in fat controllers; shared domain helpers are in `app/Helpers` (`OrderHelper`, `ResellerOrderHelper`, `FundHelper`) and integrations in `app/Services` (`RedXService` courier, `FacebookCapiService`, `FacebookPagePostService`, `Services/Ads/*` for Facebook/Google/TikTok ads reporting).
- Settings are DB-driven singletons read as `GeneralSetting::orderBy('id','desc')->first()` (and similar models: `PaymentGateway`, `SmsGateway`, `Courierapi`, `EcomPixel`, `TiktokPixel`, `GoogleTagManager`, `FacebookCapiSetting`, `CronJobSetting`, ...), configured from the admin panel rather than `.env`.
- `TrackingComposer` (registered in `EventServiceProvider`) injects pixel/GTM data into `frontEnd.layouts.master`. `ProductObserver` hooks product changes.
- Cart uses `hardevine/shoppingcart`; flash messages use `brian2694/laravel-toastr`; images via Intervention Image v2.

### Payments, couriers, scheduling
- Gateways: bKash, AamarPay, ShurjoPay, UddoktaPay (controllers in `Frontend/`).
- Courier: RedX (service + `Admin\RedXWebhookController`), plus fraud/duplicate-order checks in `Admin\OrderController`.
- `app/Console/Kernel.php` schedules `courier:check-status`; its frequency/limit/enabled flag come from the `CronJobSetting` row `courier_status_sync` (admin-editable), defaulting to every 10 minutes / 50 orders.
- Vendor and reseller money flows: `VendorWallet*`, `VendorWithdrawal`, `ResellerWalletTransaction`, `ResellerDeposit`, `ResellerWithdrawal`, `FundTransaction*`. `php artisan vendor:wallets:init` backfills missing vendor wallets.

## Conventions

- Comments and user-facing messages are frequently in Bangla; keep the surrounding language when editing.
- Migrations are additive and dated (latest 2026-03); add new columns via new migrations rather than editing old ones.
