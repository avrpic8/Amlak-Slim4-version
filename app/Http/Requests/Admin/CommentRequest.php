<?php

namespace App\Http\Requests\Admin;

use Psr\Http\Message\ServerRequestInterface as Request;

class CommentRequest
{
    private $data;

    public function __construct(Request $request)
    {
        $this->data = $request->getParsedBody();
    }

    public function all(){
        return $this->data;
    }

    public function dataValidation(): bool{

        $rules = [
            'comment' => 'required|max:500',
        ];

        $validation = validator($this->data, $rules);
        if($validation->fails()) {
                error('comment', $validation->messages()->first());
            return false;
        }
        return true;
    }
}