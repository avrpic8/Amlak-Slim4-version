<?php

namespace App\Http\Controllers\Admin;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AdminController
{
    public function index(Request $request, Response $response, array $args): Response
    {
        return view($response, "admin.index");
    }
}