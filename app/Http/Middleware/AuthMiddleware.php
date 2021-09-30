<?php

namespace App\Http\Middleware;

use App\Http\Models\User;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Routing\RouteContext;
use System\Auth\Auth;


class AuthMiddleware implements MiddlewareInterface {

    private $responseFactory;

    public function __construct(ResponseFactoryInterface $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        Auth::loginById(1);
        Auth::check();
        if(Auth::user()->user_type != 'admin'){

            // Redirect to login route
            $routeParser = RouteContext::fromRequest($request)->getRouteParser();
            $url = $routeParser->urlFor('login');
            return $this->responseFactory->createResponse()->withHeader('Location', $url)->withStatus(302);
        }

        return $handler->handle($request);
    }
}