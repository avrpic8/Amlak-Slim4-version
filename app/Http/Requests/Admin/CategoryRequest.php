<?php


namespace App\Http\Requests\Admin;

use Psr\Http\Message\ServerRequestInterface as Request;

class CategoryRequest
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
        $rules = [
            'name' =>"required|max:191",
            'parent_id'=>"exists:categories,id"
        ];

        $validation = validator($data, $rules);

        if($validation->fails()){
            error('name', $validation->messages()->first());
            return false;
        }

        return true;
    }
}