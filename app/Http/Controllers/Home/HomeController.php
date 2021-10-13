<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\MainController;
use App\Http\Models\Ads;
use App\Http\Models\Category;
use App\Http\Models\Comment;
use App\Http\Models\Post;
use App\Http\Models\Slide;
use App\Http\Requests\UserCommentRequest;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use System\Auth\Auth;

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

    function category(Request $request, Response $response, array $args): Response
    {
        $category = Category::query()->find($args['id']);
        $ads = $category->ads()->get();
        $posts = $category->posts()->get();
        return view($response, 'app.category', compact('category', 'ads', 'posts'));
    }

    function allPosts(Request $request, Response $response): Response
    {
        $posts = Post::all();
        return view($response, 'app.all-posts', compact('posts'));
    }

    function post(Request $request, Response $response, array $args): Response
    {
        $post = Post::query()->find($args['id']);
        $posts = Post::query()
            ->where('published_at', '<=', date('Y-m-d H:i:s'))
            ->orderBy('created_at', 'desc')->take(4)->get();
        $categories = Category::all();
        $comments = Comment::query()
            ->where('approved', 1)
            ->whereNull('parent_id')
            ->where('post_id', $args['id'])->get();

        return view($response, 'app.post',
            compact('post', 'posts', 'categories', 'comments'));
    }

    function comment(Request $request, Response $response, array $args): Response
    {
        $comRequest = new UserCommentRequest($request);
        if(!$comRequest->dataValidation()) back();

        $data = $comRequest->all();
        $data['post_id'] = $args['id'];
        $data['approved'] = 0;
        $data['status'] = 0;
        $data['user_id'] = Auth::user()->id;

        Comment::query()->create($data);
        return $response
            ->withHeader('Location', '/post/'.$args['id'])
            ->withStatus(302);
    }

    function search(Request $request, Response $response, array $args): Response
    {
        if(isset($_GET['search'])) {
            $search = '%' . $_GET['search'] . '%';
            $ads = Ads::query()
                ->where('title', 'LIKE', $search)
                ->orWhere('tag', 'LIKE', $search)
                ->get();

            $posts = Post::query()->where('title', 'LIKE', $search)->get();

            return view($response, 'app.search', compact('ads', 'posts'));
        } else{
            return $response
                ->withHeader('Location', '/')
                ->withStatus(302);
        }
    }

}