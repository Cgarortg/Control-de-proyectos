<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AdministradorMiddleware;
use App\Http\Middleware\RootMiddleware;
use App\Http\Middleware\UserNormalMiddleware;
use App\Http\Middleware\SinUserMiddleware;




return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => AdministradorMiddleware::class,
            'root' => RootMiddleware::class,
            'normal' => UserNormalMiddleware::class,
            'sinuser' => SinUserMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
