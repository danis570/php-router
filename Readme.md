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

----------------------- VERSION 1.0.0 ------------------------