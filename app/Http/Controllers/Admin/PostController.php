<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Category;
use App\Http\Models\Post;
use App\Http\Requests\Admin\PostCreateRequest;
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
        $postRequest = new PostCreateRequest($request);
        $data = $postRequest->all();
        $validation = $postRequest->dataValidation();

        if(!$validation) back();

        $data['user_id'] = Auth::user()->id;
        $data['status'] = 0;

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