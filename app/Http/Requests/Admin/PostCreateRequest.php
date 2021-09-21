<?php

namespace App\Http\Requests\Admin;

use Psr\Http\Message\ServerRequestInterface as Request;
use function MongoDB\BSON\toJSON;

class PostCreateRequest
{
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function all(){

        return $this->request->getParsedBody();
    }

    public function dataValidation(){

        $data = $this->request->getParsedBody();
        $uploadFile = $_FILES;
        //$uploadFile = $this->request->getUploadedFiles();
        //$uploadFile = $uploadFile['image'];

        $rules = [
            'image' => 'required|image|mimes:jpeg,jpg,png,gif',
            'title' => 'required|max:191',
            'body' => 'required',
            'cat_id' => 'required|exists:categories,id',
            'published_at' => 'required|date',
        ];
        //dd(array_merge($data, $uploadFile));
        //dd($uploadFile);
        $validation = validator(array_merge($data, $uploadFile), $rules);
        if($validation->fails()){
            dd($validation->messages()->first());
            error('name', $validation->messages()->first());
            return false;
        }

        return true;
    }
}