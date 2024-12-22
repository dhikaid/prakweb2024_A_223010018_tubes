<?php

use App\Http\Middleware\Queue;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsEoAdmin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\War;
use App\Http\Middleware\WarOpen;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        channels: __DIR__ . '/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'war' => War::class,
            'queue' => Queue::class,
            'waropen' => WarOpen::class,
            'isEOAdmin' => IsEoAdmin::class,
            'isAdmin' => IsAdmin::class,
        ]);
        $middleware->validateCsrfTokens(except: [
            '/callbackmidtrans*'
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
