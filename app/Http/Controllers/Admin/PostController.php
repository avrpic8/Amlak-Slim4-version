<?php

namespace App\Http\Controllers\Admin;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PostController
{
    public function index(Request $request, Response $response): Response{

        return view($response, 'admin.post.index');
    }
}