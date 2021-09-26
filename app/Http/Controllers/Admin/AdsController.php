<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Gallery;
use App\Http\Requests\Admin\CreateAdsRequest;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Http\Models\Ads;
use App\Http\Models\Category;
use App\Http\Models\Post;
use App\Http\Services\ImageUpload;
use System\Auth\Auth;

class AdsController
{

    public function index(Request $request, Response $response): Response{

        $ads = Ads::all();
        return view($response, 'admin.ads.index', compact('ads'));
    }

    public function create(Request $request, Response $response): Response
    {
        $categories = Category::all();
        return view($response, 'admin.ads.create', compact('categories'));
    }

    public function store(Request $request, Response $response): Response
    {
        $adsRequest = new CreateAdsRequest($request);
        $data = $adsRequest->all();
        $file = $adsRequest->getFile('image');

        $validation = $adsRequest->dataValidation();
        if (!$validation) back();

        $data['user_id'] = Auth::user()->id;
        $data['status'] = 0;
        $data['view'] = 0;

        /// store images
        $path = 'images/ads/' . date('Y/M/d');
        $name = date('Y_m_d_H_i_s_') . rand(10, 99);
        $data['image'] = ImageUpload::UploadAndFitImage($file, $path, $name, 800, 532);

        /// save ads to database
        Ads::query()->create($data);

        return $response
            ->withHeader('Location', '/admin/ads')
            ->withStatus(302);
    }

    public function edit(Request $request, Response $response, array $args): Response
    {
        $advertise = Ads::query()->find($args['id']);
        $categories = Category::all();
        return view($response, 'admin.ads.edit', compact('advertise', 'categories'));
    }

    public function update(Request $request, Response $response, array $args): Response
    {
        $adsRequest = new CreateAdsRequest($request);
        $data = $adsRequest->all();
        $file = $adsRequest->getFile('image');

        $validation = $adsRequest->dataValidation();
        if(!$validation) back();

        $data['user_id'] = Auth::user()->id;
        $data['status'] = 0;
        $data['view'] = 0;

        /// store image
        if(!empty($file['tmp_name'])) {
            $path = 'images/ads/' . date('Y/M/d');
            $name = date('Y_m_d_H_i_s_') . rand(10, 99);
            $data['image'] = ImageUpload::UploadAndFitImage($file, $path, $name, 800, 499);
        }

        /// save to database
        Ads::query()->where('id', $args['id'])->update($data);

        return $response
            ->withHeader('Location', '/admin/ads')
            ->withStatus(302);
    }

    public function destroy(Request $request, Response $response, array $args): Response
    {
        Ads::query()->where('id', $args['id'])->delete();
        return $response
            ->withHeader('Location', '/admin/ads')
            ->withStatus(302);
    }

    public function gallery(Request $request, Response $response, array $args): Response
    {
        $advertise = Ads::query()->find($args['id']);
        $galleries = Gallery::query()->where('advertise_id', $args['id'])->get();
        return view($response, 'admin.ads.gallery', compact('advertise', 'galleries'));
    }

    public function storeGalleryImage(Request $request, Response $response, array $args){

        if(empty($_FILES['image']['name'])) {
            error('image', 'image must be set');
            back();
        }


        $inputs = [];
        $inputs['advertise_id'] = $args['id'];

        $path = 'images/gallery/' . date('Y/M/d');
        $name = date('Y_m_d_H_i_s_') . rand(10, 99);
        $inputs['image'] = ImageUpload::UploadAndFitImage($_FILES['image'], $path, $name, 700, 400);

        Gallery::query()->create($inputs);
        back();
    }

    public function destroyGalleryImage(Request $request, Response $response, array $args){

        Gallery::query()->where('id', $args['id'])->delete();
        back();
    }
}