<?php

namespace App\Http\Controllers\Admin;

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
    }

    public function update(Request $request, Response $response, array $args): Response
    {

    }

    public function destroy(Request $request, Response $response, array $args): Response
    {

    }
}