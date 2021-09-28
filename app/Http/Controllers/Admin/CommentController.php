<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Comment;
use App\Http\Requests\Admin\CommentRequest;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use System\Auth\Auth;

class CommentController
{
    public function index(Request $request, Response $response): Response
    {
        $comments = Comment::all();
        return view($response, 'admin.comment.index', compact('comments'));
    }

    public function show(Request $request, Response $response, array $args): Response
    {

        $comment = Comment::query()->find($args['id']);
        return view($response, 'admin.comment.show', compact('comment'));
    }

    public function approved(Request $request, Response $response, array $args): Response
    {
        $comment = Comment::query()->find($args['id']);
        if($comment->approved == 0){
            Comment::query()->where('id', $args['id'])->update(['approved'=>1]);
        }else{
            Comment::query()->where('id', $args['id'])->update(['approved'=>0]);
        }

        return $response
            ->withHeader('Location', '/admin/comment')
            ->withStatus(302);
    }

    public function answer(Request $request, Response $response, array $args): Response
    {
        $comment = Comment::query()->find($args['id']);
        $comRequest = new CommentRequest($request);
        $data = $comRequest->all();

        $validation = $comRequest->dataValidation();
        if(!$validation) back();;

        $data['user_id'] = Auth::user()->id;
        $data['post_id'] = $comment->post_id;
        $data['parent_id'] = $args['id'];
        $data['approved'] = 1;
        $data['status'] = 0;

        Comment::query()->create($data);
        return $response
            ->withHeader('Location', '/admin/comment')
            ->withStatus(302);
    }
}