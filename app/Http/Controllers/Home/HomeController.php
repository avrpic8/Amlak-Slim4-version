<?php

namespace App\Http\Controllers\Home;

use App\Http\Models\Ads;
use App\Http\Models\Post;
use App\Http\Models\Slide;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController
{
    public function index(Request $request, Response $response): Response{

        $slides = Slide::all();
        $newestAds = Ads::query()->orderBy('created_at', 'desc')->limit(6)->get();
        $bestAds = Ads::query()->orderBy('view', 'desc')->limit(4)->get();
        $posts = Post::query()
            ->where('published_at', '<=', date('Y-m-d H:i:s'))
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();
        return view($response, 'app.index', compact('slides', 'newestAds', 'bestAds', 'posts'));
    }
}