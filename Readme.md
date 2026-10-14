----------------------- VERSION 1.0.0 ------------------------

index.php
--------------------------------------------------------------
Database::getConnection('prod');

Router::get('/', [Controller::class, 'index']);
Router::post('/path', [Controller::class, 'postAdd']);

Router::run();
--------------------------------------------------------------

In version 1.0.0, the following are not supported:
-Midleware
-Routeparam (/path/{id})
-Route Grup By
    -Controller
    -Middleware

----------------------- VERSION 1.0.0 ------------------------