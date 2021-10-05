<?php

namespace App\Http\Controllers\Auth;

use App\Http\Models\User;
use App\Http\Requests\Auth\ResetPassRequest;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ResetPassController
{
    public function view(Request $request, Response $response, array $args): Response
    {
        $token = $args['token'];
        $user = User::query()
            ->where('remember_token', $token)
            ->where('remember_token_expire', '>=' ,date('Y-m-d H:i:s'))->first();
        if(empty($user)){
            die('لینک بازیابی اعتبار ندارد');
        }

        return view($response, 'auth.reset-password', compact('token'));
    }

    public function resetPassword(Request $request, Response $response, array $args):Response
    {
        $resetRequest = new ResetPassRequest($request);
        $validation = $resetRequest->dataValidation();
        if (!$validation) back();

        $token = $args['token'];
        $data = $resetRequest->all();
        $user = User::query()
            ->where('remember_token', $token)
            ->where('remember_token_expire', '>=' ,date('Y-m-d H:i:s'))->first();

        if(empty($user)){
            error('resetPass', 'کاربر وجود ندارد');
            return $response
                ->withHeader('Location', '/login')
                ->withStatus(302);
        }

        if($data['password'] !== $data['new_password']){
            error('resetPass', 'مطابقت ندارد');
            return $response
                ->withHeader('Location', '/login')
                ->withStatus(302);
        }

        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
        $user->save();

        return $response
            ->withHeader('Location', '/login')
            ->withStatus(302);
    }
}