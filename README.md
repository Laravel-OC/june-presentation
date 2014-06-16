june-presentation
=================

One of our presentations, June Edition™

Getting started
---------------
```bash
composer install
php artisan serve
```

Cool things
-----------
```php
Response::markdown("viewname", ["data" => "goes here"]);
```

Possible topic ideas
--------------------
- Constructing a SQL query w/ joins

- Comparing two dates

```php
// regular PHP
$then = new DateTime("july 4th, 2014");
$now  = new DateTime();

$diff = $then->diff($now, true);

echo $diff->format("%y years, %m months, %d days");
```

```php
// laravel
echo Carbon::now()->diffForHumans(Carbon::parse("July 4th, 2014"));
```

- Doing template inheritance (i.e. not repeating `<!DOCTYPE>`, `<head>`, etc.)

- Simple routing

- Loading files and classes automatically

- "Pretty" urls (without `.php`, GET params w/out `?`, etc.)

- (Reversible) database migrations

- Functional testing (simulating HTTP requests)

- Simple CRUD for simple models

- JSON responses (headers too)

- Redirecting

- CSRF tokens

- Authentication (password hashing, encryption)

- Deployment process

- Repeatable environments (Vagrant)

- Debug mode

- i8n

- Logging

- Email

- Queues

- Making CURL requests

- Maintenance mode

- Error handling
