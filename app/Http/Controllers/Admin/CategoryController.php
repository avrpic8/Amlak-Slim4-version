<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CategoryController{

    public function index(Request $request, Response $response): Response
    {
        $categories = Category::all();
        return view($response, 'admin.category.index', compact('categories'));
    }

    public function create(Request $request, Response $response): Response
    {
        $categories = Category::query()->whereNull('parent_id')->get();
        return view($response, 'admin.category.create', compact('categories'));
    }

    public function store(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();
        if(empty($data['parent_id'])) unset($data['parent_id']);
        Category::query()->create($data);
        return $response
            ->withHeader('Location', '/admin/category')
            ->withStatus(302);
    }

    public function edit(Request $request, Response $response)
    {
        return $response;
    }

    public function update(Request $request, Response $response)
    {

    }

    public function destroy(Request $request, Response $response)
    {
        return $response;
    }

}