<?php

declare(strict_types=1);

use Slim\App;
use vhub\api\app\actions\GetDefaultAction;

return function (App $app) {

    $app->get('/', GetDefaultAction::class)->setName('home');

    return $app;
};
