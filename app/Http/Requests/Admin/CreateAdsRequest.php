<?php

namespace App\Http\Requests\Admin;

use Psr\Http\Message\ServerRequestInterface as Request;

class CreateAdsRequest
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
            'description' => 'required|max:1000',
            'address' => 'required|max:191',
            'amount' => 'required|max:191',
            //'image' =>  'file|mimes:jpeg,jpg,png,gif',
            'floor' => 'required|max:191',
            'year' =>  'required|number',
            'storeroom' =>  'required|number',
            'balcony' =>  'required|number',
            'room' =>  'required|number',
            'parking' =>  'required|number',
            'toilet' =>  'required|max:191',
            'tag' =>  'required|max:191',
            'cat_id' => 'required|exist:categories,id',
            'sell_status' => 'required|number',
            'type' => 'required|number',
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