<?php

namespace App\Http\Controllers\Admin;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Models\Category;

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
        $catRequest = new CategoryRequest($request);
        $data = $catRequest->all();
        $validation = $catRequest->dataValidation();

        if(!$validation) back();

        if(empty($data['parent_id'])) unset($data['parent_id']);
        Category::query()->create($data);

        return $response
            ->withHeader('Location', '/admin/category')
            ->withStatus(302);
    }

    public function edit(Request $request, Response $response, array $args): Response
    {
        $id = $args['id'];
        $category = Category::query()->find($id);
        $categories = Category::all();
        return view($response, 'admin.category.edit', compact('category','categories'));
    }

    public function update(Request $request, Response $response, array $args): Response
    {
        $id = $args['id'];
        $catRequest = new CategoryRequest($request);
        $data = $catRequest->all();
        $validation = $catRequest->dataValidation();

        if(!$validation) back();

        if(empty($data['parent_id'])) $data['parent_id'] = null;
        Category::query()->where('id', $id)->update($data);

        return $response
            ->withHeader('Location', '/admin/category')
            ->withStatus(302);

    }

    public function destroy(Request $request, Response $response, array $args): Response
    {
        //$id = $request->getAttribute('id');
        $id = $args['id'];
        Category::query()->where('id', $id)->delete();

        return $response
            ->withHeader('Location', '/admin/category')
            ->withStatus(302);
    }
}