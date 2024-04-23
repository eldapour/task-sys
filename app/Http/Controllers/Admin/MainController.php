<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Jobs\SendTaskNotification;
use App\Jobs\TaskSeederJob;
use App\Models\Notification;
use App\Models\Task;

class MainController extends Controller
{

    public function checkTasks()
    {
        // Get all tasks that are not completed and were created more than 2 days ago
        $tasks = Notification::where('read', 0)->count();
        return response()->json(['message' => 'Tasks checked successfully','data' => $tasks]);
    }

    public function sendNotifications()
    {
        SendTaskNotification::dispatch()->onQueue('task_alert');
    }

}//end class
