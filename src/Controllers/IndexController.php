<?php

namespace App\Controllers;

use App\General\Controller;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class IndexController extends Controller
{
    public function index(Request $request, Response $response, $args) {
        $response->getBody()->write("Главная");
        var_dump($this->container->get('configurations')['mariadb']['connection']);
        return $response;
    }

    public function test(Request $request, Response $response, $args) {
        $response->getBody()->write("Тестовая");
        return $response;
    }
}