<?php

namespace Danish\PhpRouter\App;

use Override;
use PHPUnit\Framework\TestCase;

class DumpRouter
{
    function testGet()
    {
        echo 'testGet';
    }

    function testPost()
    {
        echo 'testPost';
    }
}

class RouterTest extends TestCase
{
    #[Override]
    function setUp(): void
    {
        Router::$routes = [];
    }
    function testRouteGet()
    {
        Router::get('/test', [DumpRouter::class, 'testGet']);

        self::assertEquals('GET', Router::$routes[0]['method']);
        self::assertEquals('/test', Router::$routes[0]['path']);
        self::assertEquals('Danish\PhpRouter\App\DumpRouter', Router::$routes[0]['controller'][0]);
        self::assertEquals('testGet', Router::$routes[0]['controller'][1]);

    }

    function testRoutePost()
    {
        Router::post('/test', [DumpRouter::class, 'testPost']);

        self::assertEquals('POST', Router::$routes[0]['method']);
        self::assertEquals('/test', Router::$routes[0]['path']);
        self::assertEquals('Danish\PhpRouter\App\DumpRouter', Router::$routes[0]['controller'][0]);
        self::assertEquals('testPost', Router::$routes[0]['controller'][1]);

        self::assertTrue(true);
    }
}
