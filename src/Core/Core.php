<?php

namespace App\Core;

use App\Http\Request;
use App\Http\Response;

class Core
{
    public static function dispatch(array $routes)
    {
        $url = "/";

        isset($_GET['url']) && $url .= $_GET['url'];

        $prefixController = 'App\\Controller\\';

        $routeNotFound = false;

        foreach ($routes as $routers) {

            $pattern = '#^' . preg_replace("/{id}/", "([\w-]+)", $routers['path']) . '$#';

            if (preg_match($pattern, $url, $match)) {
                array_shift($match);

                $routeNotFound = true;

                if (Request::methodHttp() !== $routers['method']) {
                    return Response::json([
                        "error" => true,
                        "success" => false,
                        "message" => "Method not allowed"
                    ], 404);
                }

                [$controller, $action] = explode(":", $routers['action']);

                $extendsController = $prefixController . $controller;
                $objectController = new $extendsController;

                return $objectController->$action();
            }
        }

        if (!$routeNotFound) {
           $extendsController = $prefixController . 'NotFoundController';
           $objectNotFound = new $extendsController;
           $objectNotFound->index($url);
        }
    }
}
