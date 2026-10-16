<?php

namespace Danish\PhpRouter\Middleware;

use Override;

class LoginMiddleware implements Middleware
{
    public static array $headers = [];
    #[Override]
    public function before(): void
    {
        if (($_GET['login'] ?? null) !== true) {
            self::$headers[] = 'Location /';
            header('Location: /');
        }
    }
}