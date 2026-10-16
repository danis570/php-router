----------------------- VERSION 1.0.0 ------------------------

-------------------------------------------------------
### index.php
```php
Database::getConnection('prod');

Router::get('/', [Controller::class, 'index']);
Router::post('/path', [Controller::class, 'postAdd']);

Router::run();
```
-------------------------------------------------------

In version 1.0.0, the following are not supported:

* Middleware
* Route Parameters (`/path/{id}`)
* Route Group By
    * Controller
    * Middleware

----------------------- VERSION 1.1.0 ------------------------

New Features

* Added optional middleware support for GET routes.
* Added optional middleware support for POST routes.
* Middleware can execute before the route controller.

### index.php
```php

Router::get('/', [Controller::class, 'index']);
Router::post('/path', [Controller::class, 'postAdd']);
Router::get(
    '/dashboard',
    [DashboardController::class, 'index'],
    [LoginMiddleware::class]
);
Router::get(
    '/dashboard',
    [DashboardController::class, 'index'],
    [LoginMiddleware::class, AdminMiddleware::class]
);

Router::run();
```