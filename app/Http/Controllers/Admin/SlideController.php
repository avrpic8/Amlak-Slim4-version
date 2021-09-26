<?php


namespace App\Http\Controllers\Admin;

use App\Http\Models\Slide;
use App\Http\Requests\Admin\SlideRequest;
use App\Http\Services\ImageUpload;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class SlideController
{
    public function index(Request $request, Response $response): Response
    {
        $slides = Slide::all();
        return view($response, 'admin.slide.index', compact('slides'));
    }

    public function create(Request $request, Response $response): Response
    {
        return view($response, 'admin.slide.create');
    }

    public function store(Request $request, Response $response, array $args): Response
    {
        $slideRequest = new SlideRequest($request);
        $data = $slideRequest->all();
        $file = $slideRequest->getFile('image');

        $validation = $slideRequest->dataValidation(true);
        if(!$validation) back();

        /// store slider
        $path = 'images/slides/' . date('Y/M/d');
        $name = date('Y_m_d_H_i_s_') . rand(10,99);
        $data['image'] = ImageUpload::UploadAndFitImage($file, $path, $name, 1500, 904);

        Slide::query()->create($data);

        return $response
            ->withHeader('Location', '/admin/slide')
            ->withStatus(302);
    }

    public function edit(Request $request, Response $response, array $args): Response
    {
        $slide = Slide::query()->find($args['id']);
        return view($response, 'admin.slide.edit', compact('slide'));
    }

    public function update(Request $request, Response $response, array $args): Response
    {
        $slideRequest = new SlideRequest($request);
        $data = $slideRequest->all();
        $file = $slideRequest->getFile('image');

        $validation = $slideRequest->dataValidation();
        if(!$validation) back();

        if(!empty($file['tmp_name'])){
            $path = 'images/slides/' . date('Y/M/d');
            $name = date('Y_m_d_H_i_s_') . rand(10,99);
            $data['image'] = ImageUpload::UploadAndFitImage($file, $path, $name, 1500, 904);
        }

        Slide::query()->where('id', $args['id'])->update($data);
        return $response
            ->withHeader('Location', '/admin/slide')
            ->withStatus(302);
    }

    public function destroy(Request $request, Response $response, array $args): Response
    {
        Slide::query()->where('id', $args['id'])->delete();
        return $response
            ->withHeader('Location', '/admin/slide')
            ->withStatus(302);
    }
}