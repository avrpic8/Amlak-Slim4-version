<?php

namespace App\Http\Requests\Admin;

use Psr\Http\Message\ServerRequestInterface as Request;

class UserRequest
{
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
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
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