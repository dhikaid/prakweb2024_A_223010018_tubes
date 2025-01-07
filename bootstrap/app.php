<?php

use App\Console\Commands\UpdateExpiredQueues;
use App\Http\Middleware\EventActive;
use App\Http\Middleware\Queue;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsEoAdmin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\War;
use App\Http\Middleware\WarOpen;
use Illuminate\Console\Scheduling\Schedule;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
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
            'eventActive' => EventActive::class,
        ]);
        $middleware->validateCsrfTokens(except: [
            '/callbackmidtrans*',
            '/service/api/descai*',
            '/service/api/findeventai*',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->withSchedule(function (Schedule $schedule) {
        $schedule->call(new UpdateExpiredQueues)->everyMinute();
    })->create();
