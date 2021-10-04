<?php

namespace App\Http\Controllers\Auth;

use App\Http\Models\User;
use App\Http\Requests\Auth\ForgotRequest;
use App\Http\Services\MailService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use System\Session\Session;

class ForgotController
{
    public function view(Request $request, Response $response): Response{

        return view($response, 'auth.forgot');
    }

    public function forgot(Request $request, Response $response): Response{

        if(Session::get('forgot.time') != false and Session::get('forgot.time') > time()){

            error('forgot', 'please wait 2 min and try again!');
            return $response
                ->withHeader('Location', '/login')
                ->withStatus(302);
        }

        /// limit for send forgot email (2 Min)
        Session::set('forgot.time', time() + 120);

        $forgotRequest = new ForgotRequest($request);
        $validation = $forgotRequest->dataValidation();
        if(!$validation) back();

        $data = $forgotRequest->all();
        $user = User::query()->where('email', $data['email'])->first();
        if(empty($user)){
            error('forgot', 'کاربر وجود ندارد');
            return $response
                ->withHeader('Location', '/login')
                ->withStatus(302);
        }

        $user->remember_token = generateToken();
        $user->remember_token_expire = date('Y-m-d H:m:s', strtotime(' + 10 min'));
        $user->save();

        // send email
        $message = '
        <h2>ایمیل بازیابی رمز عبور </h2>
        <p>کاربرگرامی برای بازیابی رمز عبور از لینک زیر استفاده کنید</p>
        <p style="text-align: center">
            <a href="'. currentDomain() . route('auth.reset-pass.view', ['rememberToken' => $user['remember_token']])
            .'"> بازیابی رمز عبور </a>
        </p>
    ';

        $mail = new MailService();
        $mail->send($data['email'], 'ایمیل بازیابی رمزعبور ', $message);
        flash('forgot', 'ایمیل بازیابی با موفقیت ارسال شد');

        return $response
            ->withHeader('Location', '/home')
            ->withStatus(302);

    }
}