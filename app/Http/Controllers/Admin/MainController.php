<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Jobs\SendTaskNotification;
use App\Jobs\TaskSeederJob;
use App\Models\Task;

class MainController extends Controller
{

    public function checkTasks()
    {
        // Get all tasks that are not completed and were created more than 2 days ago
        $tasks = Task::where('status','!=','completed')
            ->whereHas('subTasks',function ($query){
                $query->where('date','<=',now()->subDays(2));
            })
            ->get();

        return response()->json(['message' => 'Tasks checked successfully','data' => $tasks]);
    }

    public function SendTaskNotification()
    {
        SendTaskNotification::dispatch()->onQueue('task_alert');
    }
    public function TaskSeederJob()
    {
        TaskSeederJob::dispatch()->onQueue('task_alert');
    }

}//end class
