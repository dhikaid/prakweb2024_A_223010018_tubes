<?php

use App\Http\Middleware\War;
use App\Http\Middleware\Queue;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\WarOpen;
use App\Models\Queue as QueueWar;
use App\Http\Middleware\IsEoAdmin;
use App\Http\Middleware\EventActive;
use Illuminate\Foundation\Application;
use App\Http\Controllers\QueueController;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

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
        $schedule->call(function () {
            $duration = ceil(env('WAR_TICKET_DURATION', 60));
            $cutoffTime = now()->subSeconds($duration);

            $expiredQueues = QueueWar::where('status', 'in_progress')
                ->where('joined_at', '<=', $cutoffTime)
                ->get();

            if ($expiredQueues) {
                $queueEvent = new QueueController();
                foreach ($expiredQueues as $queue) {
                    $queue->update(['status' => 'completed']);
                    $queueEvent->completeQueue($queue->uuid, $queue->event->uuid);
                }
            }
        })->everyMinute();
    })->create();
