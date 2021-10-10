<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\MainController;
use App\Http\Models\Ads;
use App\Http\Models\Category;
use App\Http\Models\Post;
use App\Http\Models\Slide;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController extends MainController
{
    public function index(Request $request, Response $response): Response{

        $slides = Slide::all();
        $newestAds = Ads::query()->orderBy('created_at', 'desc')->take(6)->get();
        $bestAds = Ads::query()->orderBy('view', 'desc')->limit(4)->get();
        $posts = Post::query()
            ->where('published_at', '<=', date('Y-m-d H:i:s'))
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        $sumArea = $this->sumArea;
        $usersCount = $this->usersCount;
        $postsCount = $this->postsCount;
        $adsCount = $this->adsCount;

        return view($response, 'app.index',
            compact(
                'slides',
                'newestAds',
                'bestAds',
                'posts',
                'sumArea', 'usersCount', 'postsCount', 'adsCount'));
    }

    public function about(Request $request, Response $response): Response
    {
        return view($response, 'app.about');
    }

    public function allAds(Request $request, Response $response): Response
    {
        $ads = Ads::all();
        return view($response, 'app.all-ads', compact('ads'));
    }

    public function ads(Request $request, Response $response, array $args): Response
    {
        $advertise = Ads::query()->find($args['id']);
        $galleries = $advertise->gallery()->get();
        $posts = Post::query()
            ->where('published_at', '<=', date('Y-m-d H:i:s'))
            ->orderBy('created_at', 'desc')->take(4)->get();

        $relatedAds = Ads::query()
            ->where('cat_id', $advertise->cat_id)
            ->where('id', '!=', $args['id'])
            ->orderBy('created_at', 'desc')->take(2)->get();

        $categories = Category::all();

        return view($response, 'app.ads',
            compact('advertise', 'galleries', 'posts', 'relatedAds', 'categories'));
    }

    function allPosts(Request $request, Response $response): Response
    {
        $posts = Post::all();
        return view($response, 'app.all-posts', compact('posts'));
    }

}