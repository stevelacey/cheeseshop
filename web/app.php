<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

$loader = require_once __DIR__.'/../app/bootstrap.php.cache';
Debug::enable();

require_once __DIR__.'/../app/AppKernel.php';

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$request = Request::createFromGlobals();

require_once __DIR__.'/../vendor/wordpress/wordpress/wp-load.php';

$app = function () use ($kernel, $request) {
    $response = $kernel->handle($request);

    $response->send();
    $kernel->terminate($request, $response);
};

$app();
