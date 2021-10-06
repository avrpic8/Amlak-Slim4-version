<?php

namespace App\Http\Controllers\Auth;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use System\Auth\Auth;

class LogoutController
{
    public function logout(Request $request, Response $response): Response{

        Auth::logOut();
        return $response
            ->withHeader('Location', '/home')
            ->withStatus(302);
    }
}