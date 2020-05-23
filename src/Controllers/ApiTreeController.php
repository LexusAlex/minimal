<?php

namespace App\Controllers;

use App\Helpers\Controller;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class ApiTreeController extends Controller
{
    public function list(Request $request, Response $response, $args)
    {
        $tree = $this->services['tree'];
        $result = json_encode($tree->buildTree($tree->getAll()), JSON_UNESCAPED_UNICODE);
        $response->getBody()->write($result);
        $response = $response->withHeader('Content-type', 'application/json');
        return $response;
    }

    public function create(Request $request, Response $response, $args)
    {
        //var_dump($args);
        $response->getBody()->write('ок');
        //$response = $response->withHeader('Content-type', 'application/json');
        return $response;
    }
}
