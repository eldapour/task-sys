<?php

namespace App\Jobs;

use App\Models\Notification;
use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendSubTaskNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        $sub_tasks_time = Task::where('status', '!=', 'completed')
            ->whereHas('subTasks', function ($query) {
                $query->whereDay('date', now());
            })->get();
        foreach ($sub_tasks_time as $task) {
            foreach ($task->subTasks as $sub) {
                Notification::updateOrCreate([
                    'user_id' => $task->user_id,
                    'sub_task_id'=> $sub->id,
                    'task_id' => $task->id
                ],[
                    'title' => 'اشعار هام',
                    'body' => ' هناك مهمة فرعية الان وهي : ' . $sub->name . ' الخاصة بـ' . $task->user->name,
                    'user_id' => $task->user_id,
                    'sub_task_id'=> $sub->id,
                    'task_id' => $task->id
                ]);
            }
        }
    }
}

// php artisan queue:work --queue=task_alert
