<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Category;
use App\Http\Models\Post;
use App\Http\Requests\Admin\CreatePostRequest;
use App\Http\Services\ImageUpload;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use System\Auth\Auth;

class PostController
{
    public function index(Request $request, Response $response): Response{

        $posts = Post::all();
        return view($response, 'admin.post.index', compact('posts'));
    }

    public function create(Request $request, Response $response): Response
    {
        $categories = Category::all();
        return view($response, 'admin.post.create', compact('categories'));
    }

    public function store(Request $request, Response $response): Response
    {
        $postRequest = new CreatePostRequest($request);
        $data = $postRequest->all();
        $file = $postRequest->getFile('image');

        $validation = $postRequest->dataValidation();
        if(!$validation) back();

        $data['user_id'] = Auth::user()->id;
        $data['status'] = 0;

        /// store images
        $path = 'images/posts/' . date('Y/M/d');
        $name = date('Y_m_d_H_i_s_') . rand(10,99);
        $data['image'] = ImageUpload::UploadAndFitImage($file, $path, $name, 800, 499);

        /// save post to database
        Post::query()->create($data);

        return $response
            ->withHeader('Location', '/admin/post')
            ->withStatus(302);
    }

    public function edit(Request $request, Response $response, array $args): Response
    {
    }

    public function update(Request $request, Response $response, array $args): Response
    {
    }

    public function destroy(Request $request, Response $response, array $args): Response
    {
    }
}