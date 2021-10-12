<?php

namespace App\Http\Requests;

use Psr\Http\Message\ServerRequestInterface as Request;

class UserCommentRequest
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
            'comment' => 'required|max:500',
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