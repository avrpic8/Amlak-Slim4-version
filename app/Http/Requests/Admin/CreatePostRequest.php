<?php

namespace App\Http\Requests\Admin;

use Psr\Http\Message\ServerRequestInterface as Request;

class CreatePostRequest
{

    private $data;

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

    public function dataValidation(): bool{

        $uploadFile = $_FILES['image'];

        /// data validation
        $rules = [
            'title' => 'required|max:191',
            'body' => 'required',
            'cat_id' => 'required|exists:categories,id',
            'published_at' => 'required|date'
        ];

        $validation = validator($this->data, $rules);
        if($validation->fails()) {
            $errorsArray = $validation->errors()->toArray();
            foreach ($errorsArray as $key => $message) {
                error($key, $message[0]);
            }
            return false;
        }

//        /// file validation
//        $rules = [
//            'image' => 'file|mimes:png,jpg'
//        ];
//
//        $validation = validator($uploadFile, $rules);
//        if($validation->fails()){
//            error('image', $validation->messages()->first());
//            return false;
//        }
        return true;
    }
}