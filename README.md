# SONOPRO

Slovak, almost-static website based on the supplied screenshots. A single Blade view, local fonts and logo, plain CSS, and a small JavaScript mobile menu. Laravel handles routing, CSRF, validation, throttling and contact email. No database, Node, Vite, queue worker or build step is required.

## Local development

PHP 8.4+ and Composer are required (the committed dependency lock targets PHP 8.4).

```sh
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

Open http://127.0.0.1:8000. On PowerShell use `Copy-Item .env.example .env` in place of `cp`.

## Laravel Forge

Create a PHP 8.4+ Laravel site, connect this repository and set the web directory to `/public`. Set these environment values in Forge:

```dotenv
APP_NAME=SONOPRO
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.sk
APP_LOCALE=sk
APP_FALLBACK_LOCALE=sk
SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
CONTACT_TO_ADDRESS=your-real-inbox@example.com
BOOKING_URL=https://your-booking-provider.example.com
MAIL_MAILER=smtp
MAIL_SCHEME=smtps
MAIL_HOST=your-smtp-host
MAIL_PORT=465
MAIL_USERNAME=your-smtp-username
MAIL_PASSWORD=your-smtp-password
MAIL_FROM_ADDRESS=your-verified-sender@example.com
MAIL_FROM_NAME=SONOPRO
```

Use the scheme, port and credentials supplied by your email provider. Generate `APP_KEY` once with `php artisan key:generate --force`, preserving it on later deployments. Enable HTTPS in Forge. Ensure `storage/` and `bootstrap/cache/` are writable by the web process.

Suggested deployment commands, after Forge updates the checkout:

```sh
composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader
php artisan optimize
```

Keep Forge's default PHP-FPM reload step. No migrations or npm commands are needed.

## Editing

- `resources/views/home.blade.php`: content and layout.
- `public/assets/site.css`: styling and responsive breakpoints.
- `public/assets/site.js`: mobile menu.
- `routes/web.php`: contact form endpoint.
- `config/sonopro.php`: booking URL and contact inbox from environment.

If `BOOKING_URL` is empty, booking buttons lead to the contact form. Messages are only reported as sent after a configured delivery mailer accepts them. With no recipient, or the local `log` / `array` mailer, the form displays an unavailable message and preserves input.

The reference only supplies preparation text for the first accordion. The other two show a short message that preparation will be confirmed on booking. No clinic address or telephone number was invented.

## Languages and placeholders

The SK / EN header switch changes the language using `?lang=sk` or `?lang=en`, and remembers the choice in the session. Slovak is the default. All page text, form labels, status messages and validation messages are translated.

Edit the values in `lang/sk.json` and `lang/en.json` to replace the provisional text. The original Slovak strings are stable translation keys; leave those keys unchanged. Validation messages are in `lang/sk/validation.php` and `lang/en/validation.php`.

The section before the contact form uses a local SVG placeholder illustration (`public/assets/clinic-placeholder.svg`). Replace its image path and alt text in the Blade view when the clinic photograph is ready. Footer contact details and hours are explicitly marked as placeholders. Replace these translations with real information later.

Poppins is distributed under the SIL Open Font License; see `public/assets/OFL.txt`. The logo was supplied by the project owner.
