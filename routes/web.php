<?php

use Slim\App;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Middleware\AuthMiddleware;


return function (App $app) {

    //// ================ Admin Dashboard Routes ================

    /// Index Route
    $app->get('/admin', [AdminController::class , 'index'])
        ->add(new AuthMiddleware($app->getResponseFactory()))
        ->setName('admin.index');

    //// Category Routes
    $app->get('/admin/category', [CategoryController::class , 'index'])
        ->add(new AuthMiddleware($app->getResponseFactory()))
        ->setName('admin.category.index');

    $app->get('/admin/category/create', [CategoryController::class , 'create'])
        ->add(new AuthMiddleware($app->getResponseFactory()))
        ->setName('admin.category.create');

    $app->post('/admin/category/store', [CategoryController::class , 'store'])
        ->add(new AuthMiddleware($app->getResponseFactory()))
        ->setName('admin.category.store');

    $app->get('/admin/category/edit/{id}', [CategoryController::class , 'edit'])
        ->add(new AuthMiddleware($app->getResponseFactory()))
        ->setName('admin.category.edit');

    $app->put('/admin/category/update/{id}', [CategoryController::class , 'update'])
        ->add(new AuthMiddleware($app->getResponseFactory()))
        ->setName('admin.category.update');

    $app->post('/admin/category/delete/{id}', [CategoryController::class , 'destroy'])
        ->add(new AuthMiddleware($app->getResponseFactory()))
        ->setName('admin.category.delete');
};