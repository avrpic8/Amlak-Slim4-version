<?php

namespace App\Http\Controllers\Auth;

use App\Http\Models\User;
use App\Http\Requests\Auth\LoginRequest;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use System\Auth\Auth;

class LoginController
{
    public function view(Request $request, Response $response): Response{

        return view($response, 'auth.login');
    }

    public function login(Request $request, Response $response): Response{

        Auth::logOut();

        $logRequest = new LoginRequest($request);
        $validation = $logRequest->dataValidation();
        if(!$validation) back();

        $data = $logRequest->all();
        if(Auth::loginByEmail($data['email'], $data['password'])){

            $user = User::query()->where('email', $data['email'])->first();
            if($user->user_type == 'admin'){
                return $response
                    ->withHeader('Location', '/admin')
                    ->withStatus(302);
            }
            return $response
                ->withHeader('Location', '/home')
                ->withStatus(302);
        }
        return $response
            ->withHeader('Location', '/login')
            ->withStatus(302);
    }
}