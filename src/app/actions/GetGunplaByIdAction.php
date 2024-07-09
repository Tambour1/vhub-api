<?php

namespace vhub\api\app\actions;

use vhub\api\app\actions\AbstractAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use vhub\api\core\services\gunplaData\GunplaDataService;

class GetGunplaByIdAction extends AbstractAction{
    public function __invoke(Request $request, Response $response, array $args): Response{
        $gunplaId = $args['id'];
        $data = (new GunplaDataService())->getGunplaById($gunplaId);

        $json = json_encode($data);
        $response->getBody()->write($json);
        return $response->withHeader('Content-Type', 'application/json');
       
    }
}