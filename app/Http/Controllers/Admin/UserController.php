<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\User;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Services\ImageUpload;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserController
{
    public function index(Request $request, Response $response): Response
    {
        $users = User::all();
        return view($response, 'admin.user.index', compact('users'));
    }

    public function edit(Request $request, Response $response, array $args): Response
    {
        $user = User::query()->find($args['id']);
        return view($response, 'admin.user.edit', compact('user'));
    }

    public function update(Request $request, Response $response, array $args): Response
    {
        $userReq = new UserRequest($request);
        $validation = $userReq->dataValidation(false);
        if(!$validation) back();

        $data = $userReq->all();
        $file = $userReq->getFile('avatar');
        $updatable = ['first_name', 'last_name'];

        $data = array_intersect_key($data, array_flip($updatable));
        $data['id'] = $args['id'];

        if(!empty($file['tmp_name'])){
            $path = 'images/avatar/' . date('Y/M/d');
            $name = date('Y_m_d_H_i_s_') . rand(10,99);
            $data['avatar'] = ImageUpload::UploadAndFitImage($file, $path, $name, 100, 100);
        }

        User::query()->where('id', $args['id'])->update($data);
        return $response
            ->withHeader('Location', '/admin/user')
            ->withStatus(302);

    }

    public function changeStatus(Request $request, Response $response, array $args): Response
    {
        $user = User::query()->find($args['id']);
        if($user->is_active == 1){
            $user->is_active = 0;
        }else{
            $user->is_active = 1;
        }
        $user->save();
        $response->getBody()->write(strval($user->is_active));
        return $response;
//        return $response
//            ->withHeader('Location', '/admin/user')
//            ->withStatus(302);
    }
}