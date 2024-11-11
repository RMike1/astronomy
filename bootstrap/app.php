<?php

use App\Models\Subscriber;
use App\Models\HomePageSection;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Application;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendUpdatesNotification;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withSchedule(function(Schedule $schedule){
        // $schedule->command('send-updates')->everyMinute();

        $schedule->call(function(){
            $subscribers=Subscriber::select('email')->get();
            $latestContent=HomePageSection::latest('id')->first();
            $link=route('explore',$latestContent->slug);
            foreach($subscribers as $subscriber){
                Notification::send($subscriber, new SendUpdatesNotification($link));
                // Log::info($subscribers);
            };

        })->everyMinute();


    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
