<?php

use Slim\App;
use Slim\Routing\RouteCollectorProxy;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\AdsController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\RegisterController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

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

        $group->post('/status/{id}', [PostController::class , 'changeState'])
            ->setName('admin.post.status');

    })->add(new AuthMiddleware($app->getResponseFactory()));

    /// Ads Routes
    $app->group('/admin/ads', function (RouteCollectorProxy $group){

        $group->get('', [AdsController::class , 'index'])
            ->setName('admin.ads.index');

        $group->get('/create', [AdsController::class , 'create'])
            ->setName('admin.ads.create');

        $group->post('/store', [AdsController::class , 'store'])
            ->setName('admin.ads.store');

        $group->get('/edit/{id}', [AdsController::class , 'edit'])
            ->setName('admin.ads.edit');

        $group->post('/update/{id}', [AdsController::class , 'update'])
            ->setName('admin.ads.update');

        $group->post('/delete/{id}', [AdsController::class , 'destroy'])
            ->setName('admin.ads.delete');

        $group->get('/gallery/{id}', [AdsController::class , 'gallery'])
            ->setName('admin.ads.gallery');

        $group->post('/store-gallery-image/{id}', [AdsController::class , 'storeGalleryImage'])
            ->setName('admin.ads.store.gallery.image');

        $group->get('/delete-gallery-image/{id}', [AdsController::class , 'destroyGalleryImage'])
            ->setName('admin.ads.delete.gallery.image');

    })->add(new AuthMiddleware($app->getResponseFactory()));

    /// Slider Routes
    $app->group('/admin/slide', function (RouteCollectorProxy $group){

        $group->get('', [SlideController::class , 'index'])
            ->setName('admin.slide.index');

        $group->get('/create', [SlideController::class , 'create'])
            ->setName('admin.slide.create');

        $group->post('/store', [SlideController::class , 'store'])
            ->setName('admin.slide.store');

        $group->get('/edit/{id}', [SlideController::class , 'edit'])
            ->setName('admin.slide.edit');

        $group->post('/update/{id}', [SlideController::class , 'update'])
            ->setName('admin.slide.update');

        $group->post('/delete/{id}', [SlideController::class , 'destroy'])
            ->setName('admin.slide.delete');

    })->add(new AuthMiddleware($app->getResponseFactory()));

    /// Comment Routes
    $app->group('/admin/comment', function (RouteCollectorProxy $group){

        $group->get('', [CommentController::class , 'index'])
            ->setName('admin.comment.index');

        $group->get('/show/{id}', [CommentController::class , 'show'])
            ->setName('admin.comment.show');

        $group->get('/approved/{id}', [CommentController::class , 'approved'])
            ->setName('admin.comment.approved');

        $group->post('/answer/{id}', [CommentController::class , 'answer'])
            ->setName('admin.comment.answer');

    })->add(new AuthMiddleware($app->getResponseFactory()));

    /// User Routes
    $app->group('/admin/user', function (RouteCollectorProxy $group){

        $group->get('', [UserController::class , 'index'])
            ->setName('admin.user.index');

        $group->get('/edit/{id}', [UserController::class , 'edit'])
            ->setName('admin.user.edit');

        $group->post('/update/{id}', [UserController::class , 'update'])
            ->setName('admin.user.update');

        $group->get('/change-status/{id}', [UserController::class , 'changeStatus'])
            ->setName('admin.user.change.status');

    })->add(new AuthMiddleware($app->getResponseFactory()));



    //// ================ Auth Routes ================

    $app->group('/register', function (RouteCollectorProxy $group){

        $group->get('', [RegisterController::class , 'view'])
            ->setName('auth.register.view');

        $group->post('', [RegisterController::class , 'register'])
            ->setName('auth.register');

        $group->get('/activation/{token}', [RegisterController::class , 'activation'])
            ->setName('auth.activation');
    });


    //// ================ NotFound Route ================
//    $app->get('{route:.*}', function (Request $request, Response $response){
//        return view($response, 'error.404');
//    });


};