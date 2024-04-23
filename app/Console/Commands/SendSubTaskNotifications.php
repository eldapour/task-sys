<?php

namespace App\Console\Commands;

use App\Jobs\SendSubTaskNotification;
use Illuminate\Console\Command;

class SendSubTaskNotifications extends Command
{

    protected $signature = 'subtask:send';

    protected $description = 'send subtask notifications to users when her date is coming';

    public function handle(): void
    {
        SendSubTaskNotification::dispatch()->onQueue('task_alert');
        $this->info('sub task notifications sent successfully.');
    }
}
