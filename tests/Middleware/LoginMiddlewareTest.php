<?php

namespace Danish\PhpRouter\Middleware;

use Override;
use PHPUnit\Framework\TestCase;

class LoginMiddlewareTest extends TestCase
{
    private LoginMiddleware $loginMiddleware;

    #[Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->loginMiddleware = new LoginMiddleware();
        $_GET = [];
        LoginMiddleware::$headers = [];
    }

    function testUserNotLogin()
    {
        $_GET['login'] = '';
        $this->loginMiddleware->before();
        self::assertContains('Location /', LoginMiddleware::$headers);
    }

    function testUserLogin()
    {
        $_GET['login'] = true;
        $this->loginMiddleware->before();

        self::assertNotContains('Location /', LoginMiddleware::$headers);
    }
}
