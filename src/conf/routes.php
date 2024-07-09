<?php

declare(strict_types=1);

use Slim\App;
use vhub\api\app\actions\GetDefaultAction;
use vhub\api\app\actions\GetGunplasAction;
use vhub\api\app\actions\GetGunplaByIdAction;
use vhub\api\app\actions\GetGunplaPosesAction;

return function (App $app) {

    $app->get('/', GetDefaultAction::class)->setName('home');

    $app->get('/gunplas', GetGunplasAction::class)->setName('gunplas');

    $app->get('/gunplas/{id}', GetGunplaByIdAction::class)->setName('gunpla');

    $app->get('/gunplas/{id}/poses', GetGunplaPosesAction::class)->setName('gunplaPoses');

    return $app;
};
