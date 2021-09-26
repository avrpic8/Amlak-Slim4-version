<?php


namespace App\Http\Requests\Admin;

use Psr\Http\Message\ServerRequestInterface as Request;

class SlideRequest
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

        $uploadFile = $_FILES['image'];

        /// data validation
        $rules = [
            'title' => 'required|max:191',
            'url' => 'required|max:191',
            'amount' => 'required|numeric',
            'address' => 'required|max:191',
            'body' => 'required',
        ];

        $validation = validator($this->data, $rules);
        if($validation->fails()) {
            $errorsArray = $validation->errors()->toArray();
            foreach ($errorsArray as $key => $message) {
                error($key, $message[0]);
            }
            return false;
        }

        $file = $this->getFile('image');
        if(empty($file['name']) and $fileRequire){
            error('image', 'image is required.');
            return false;
        }
        return true;
    }
}