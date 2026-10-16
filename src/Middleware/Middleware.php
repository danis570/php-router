<?php

namespace Danish\PhpRouter\Middleware;

interface Middleware
{
    function before(): void;
}
