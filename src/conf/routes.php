<?php

declare(strict_types=1);

use Slim\App;
use vhub\api\app\actions\GetDefaultAction;
use vhub\api\app\actions\GetGunplasAction;

return function (App $app) {

    $app->get('/', GetDefaultAction::class)->setName('home');

    $app->get('/gunplas', GetGunplasAction::class)->setName('gunplas');

    return $app;
};
