<?php

namespace App\Console\Commands;

use App\Models\Subscriber;
use App\Models\HomePageSection;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendUpdatesNotification;
use Illuminate\Contracts\Database\Eloquent\Builder;

class SendUpdates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-updates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
    }
}
