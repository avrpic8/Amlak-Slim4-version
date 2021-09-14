<?php

use Slim\App;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Middleware\AuthMiddleware;


return function (App $app) {

    //// Admin Routes
    $app->get('/admin', [AdminController::class , 'index'])
        ->add(new AuthMiddleware($app->getResponseFactory()))
        ->setName('admin.index');
};