<?php

namespace App\Console\Commands;

use App\Jobs\SendTaskNotification;
use Illuminate\Console\Command;

class SendTaskNotifications extends Command
{

    protected $signature = 'task:send';

    protected $description = 'send subtask notifications to users when her date is coming';

    public function handle(): void
    {
        SendTaskNotification::dispatch()->onQueue('task_alert');
        $this->info('task notifications sent successfully.');
    }
}
