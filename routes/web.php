<?php

use Slim\App;
use Slim\Routing\RouteCollectorProxy;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;


return function (App $app) {

    //// ================ Admin Dashboard Routes ================

    /// Index Route
    $app->get('/admin', [AdminController::class , 'index'])
        ->add(new AuthMiddleware($app->getResponseFactory()))
        ->setName('admin.index');

    //// Category Routes
    $app->group('/admin/category', function (RouteCollectorProxy $group){
        $group->get('', [CategoryController::class , 'index'])
            ->setName('admin.category.index');

        $group->get('/create', [CategoryController::class , 'create'])
            ->setName('admin.category.create');

        $group->post('/store', [CategoryController::class , 'store'])
            ->setName('admin.category.store');

        $group->get('/edit/{id}', [CategoryController::class , 'edit'])
            ->setName('admin.category.edit');

        $group->post('/update/{id}', [CategoryController::class , 'update'])
            ->setName('admin.category.update');

        $group->post('/delete/{id}', [CategoryController::class , 'destroy'])
            ->setName('admin.category.delete');

    })->add(new AuthMiddleware($app->getResponseFactory()));

    /// Post Routes
    $app->group('/admin/post', function (RouteCollectorProxy $group){

        $group->get('', [PostController::class , 'index'])
            ->setName('admin.post.index');

        $group->get('/create', [PostController::class , 'create'])
            ->setName('admin.post.create');

        $group->post('/store', [PostController::class , 'store'])
            ->setName('admin.post.store');

        $group->get('/edit/{id}', [PostController::class , 'edit'])
            ->setName('admin.post.edit');

        $group->post('/update/{id}', [PostController::class , 'update'])
            ->setName('admin.post.update');

        $group->post('/delete/{id}', [PostController::class , 'destroy'])
            ->setName('admin.post.delete');

    })->add(new AuthMiddleware($app->getResponseFactory()));

};