<?php

namespace App\Plugin;

class ResRoutes
{
    protected $app;

    // 构造方法
    public function __construct($router = '')
    {
        // 给属性 app赋值
        $this->app = $router;
    }

    //
    function apiResource($uri, $controller)
    {
        $this->app->get('api/' . $uri,  $controller . '@index');
        $this->app->post('api/' . $uri, $controller . '@store');
        $this->app->get('api/' . $uri . '/{id}', $controller . '@show');
        $this->app->put('api/' . $uri . '/{id}', $controller . '@update');
        $this->app->delete('api/' . $uri . '/{id}', $controller . '@destroy');
    }
}
