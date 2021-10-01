<?php

namespace App\Http\Controllers\Auth;

use App\Http\Models\User;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Services\ImageUpload;
use App\Http\Services\MailService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class RegisterController
{
    public function view(Request $request, Response $response): Response
    {
        return view($response, 'auth.register');
    }

    public function register(Request $request, Response $response): Response
    {
        $regRequest = new RegisterRequest($request);
        $validation = $regRequest->dataValidation(true);
        if(!$validation) back();

        $data = $regRequest->all();
        $file = $regRequest->getFile('avatar');

        $path = 'images/avatar/' . date('Y/M/d');
        $name = date('Y_m_d_H_i_s_') . rand(10,99);

        $data['avatar'] = ImageUpload::UploadAndFitImage($file, $path, $name, 100, 100);
        $data['verify_token'] = generateToken();
        $data['is_active'] = 0;
        $data['user_type'] = 'user';
        $data['status'] = 0;
        $data['remember_token'] = null;
        $data['remember_token_expire'] = null;
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        User::query()->create($data);

        // send email
        $message = '
            <h2>ایمیل فعال سازی</h2>
            <p>کاربرگرامی ثبت نام شما با موفقیت صورت گرفت برای فعال سازی حساب کاربری خود روی لینک زیر کلیک کنید</p>
            <p style="text-align: center">
                <a href="'. currentDomain() . route('auth.activation', ['token' => $data['verify_token']]).'"> فعال سازی </a>
            </p>
        ';

        $mail = new MailService();
        $mail->send($data['email'], 'ایمیل فعال سازی', $message);

        return $response
            ->withHeader('Location', '/login')
            ->withStatus(302);
    }

    public function activation(Request $request, Response $response, array $args): Response
    {
        $user = User::query()->where('verify_token', $args['token'])->first();
        if(empty($user)){
            die('کد صحیح نمیباشد.');
        }
        $user->is_active = 1;
        $user->save();

        die('حساب فعال شد');
    }
}