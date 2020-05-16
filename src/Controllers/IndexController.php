<?php

namespace App\Controllers;

use App\Helpers\Controller;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class IndexController extends Controller
{
    public function index(Request $request, Response $response, $args) {

        $view = $this->view;
        $view->setAttributes(['title' => 'Главная страница']);
        return $view->render($response,'index/index.php');
    }

    public function tree(Request $request, Response $response, $args) {

        $view = $this->view;
        $tree = $this->services['tree'];
        $view->setAttributes(['title' => 'Работа с иерархическими структурами']);
        return $view->render($response,'index/tree.php',['tree' => $tree->buildTree($tree->getAll())]);
    }

    public function test(Request $request, Response $response, $args) {
        $response->getBody()->write("Тестовая");
        return $response;
    }
}