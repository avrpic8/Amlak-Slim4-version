<?php

namespace App\Http\Requests\Admin;

use Psr\Http\Message\ServerRequestInterface as Request;

class CreatePostRequest
{
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function all(){

        return $this->request->getParsedBody();
    }

    public function getFile($name): array
    {
        return $_FILES[$name];
    }

    public function dataValidation(): bool{

        $data = $this->request->getParsedBody();
        $uploadFile = $_FILES['image'];

        /// data validation
        $rules = [
            'title' => 'required|max:191',
            'body' => 'required',
            'cat_id' => 'required|exists:categories,id',
            'published_at' => 'required|date'
        ];
        $validation = validator(array_merge($uploadFile,$data), $rules);
        if($validation->fails()){
            error('name', $validation->messages()->first());
            return false;
        }

        /// file validation
        $rules = [
            'image.*' => 'required|image|mimes:jpeg,jpg,png,gif',
        ];
        $validation = validator($uploadFile, $rules);
        if($validation->fails()){
            error('name', $validation->messages()->first());
            return false;
        }

        return true;
    }
}