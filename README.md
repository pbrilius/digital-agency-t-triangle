# Web solution application & setup

**MVC** approach is regular order integrade & inorporated into core application
mechanics so as the end user is *easily associated* to the **EU** &* **NATO**
coding paradigms by default.

Act accordingly & setup `composer.php` project by its own `Laravel` *metrics &
measurements* - providing the folder w\ the correct database credentials, its
own scheming facilities & correct `log` folder premissions etc.

## Composer project

```shell
composer install
cp -v .env.example .env
chmod -Rv o+rw storage/
mkdir -vp bootstrap/cache
chmod -v o+rw bootstrap/cache
php artisan key:generate
```

## **RDBMS** Migrations

```shell
php artisan migrate:fresh
```

## **CLI** runaway - runtime command

Find `data-expansion` `jsonlint` linted **JSON** data source & import it to the
database:

```shell
php artisan command:collect-json-fields
```

## Web solution **URL**

Navigate **GUI** browser to `/web-solution` and see the detailed view of
the result filtered **PDO** persistent storage data array. Don't forget to
prefix w\ `index.php`.

## **TDD** on **QE** & **QA**

```shell
php artisan test
```
