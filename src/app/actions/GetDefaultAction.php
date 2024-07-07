<?php

namespace vhub\api\app\actions;

use vhub\api\app\actions\AbstractAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class GetDefaultAction extends AbstractAction{
    public function __invoke(Request $request, Response $response, array $args): Response{
        $data = [
            'api_name' => 'Vhub API',
            'links' => [
                'home' => '/',
            ]
        ];
       $json = json_encode($data);
         $response->getBody()->write($json);
         return $response->withHeader('Content-Type', 'application/json');
    }
}