<?php

declare(strict_types=1);
require_once '/var/www/vendor/autoload.php';

use Slim\Factory\AppFactory;
use vhub\api\infrastructure\Eloquent;

/* Initialisation de la base de données */
Eloquent::init(__DIR__ . '/db.ini');

$app = AppFactory::create();

$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

// CORS
$app->add(function ($request, $handler) {
    $response = $handler->handle($request);
    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

// Charger les routes
(require __DIR__ . '/routes.php')($app);

session_start();

$app->run();
