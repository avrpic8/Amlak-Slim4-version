<?php

namespace App\Http\Requests\Auth;

use Psr\Http\Message\ServerRequestInterface as Request;

class LoginRequest
{
    protected $data;

    public function __construct(Request $request)
    {
        $this->data = $request->getParsedBody();
    }

    public function all(){

        return $this->data;
    }

    public function dataValidation(): bool{

        /// data validation
        $rules = [
            'email' => 'required|max:64|email',
            'password' => 'required',
        ];

        $validation = validator($this->data, $rules);
        if($validation->fails()) {
            $errorsArray = $validation->errors()->toArray();
            foreach ($errorsArray as $key => $message) {
                error($key, $message[0]);
            }
            return false;
        }
        return true;
    }
}