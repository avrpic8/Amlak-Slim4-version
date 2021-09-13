<?php

namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use System\DataBase\DBBuilder\DBBuilder;

class AuthController extends MainController {

    public function index(Request $request, Response $response): Response{

        $table = new DBBuilder();
        return $response;
    }

    public function create(Request $request, Response $response): Response{
        return $response;
    }
}