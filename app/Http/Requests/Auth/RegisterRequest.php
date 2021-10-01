<?php

namespace App\Http\Requests\Auth;

use Psr\Http\Message\ServerRequestInterface as Request;

class RegisterRequest
{

    protected $data;

    public function __construct(Request $request)
    {
        $this->data = $request->getParsedBody();
    }

    public function all(){

        return $this->data;
    }

    public function getFile($name): array
    {
        return $_FILES[$name];
    }

    public function dataValidation(bool $fileRequire = false): bool{

        /// data validation
        $rules = [
            'email' => 'required|max:64|email|unique:users,email',
            'password' => 'required|min:8',
            'first_name' => 'required',
            'last_name' => 'required',
        ];

        $validation = validator($this->data, $rules);
        if($validation->fails()) {
            $errorsArray = $validation->errors()->toArray();
            foreach ($errorsArray as $key => $message) {
                error($key, $message[0]);
            }
            return false;
        }

        $file = $this->getFile('avatar');
        if(empty($file['name']) and $fileRequire){
            error('image', 'image is required.');
            return false;
        }
        return true;
    }
}