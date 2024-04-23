<?php

namespace App\Jobs;

use App\Models\Notification;
use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendTaskNotification implements ShouldQueue
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
    public function handle()
    {
        $tasks_not_completed = Task::where('status','!=','completed')
            ->whereHas('subTasks',function ($query){
                $query->where('date','<=',now()->subDays(2));
            })->get();
        foreach ($tasks_not_completed as $not){
            Notification::updateOrCreate([
                'user_id' => $not->user_id,
                'task_id' => $not->id
            ],[
                'title' => 'تحذير',
                'body' => 'تحذير لم تكتمل المهمة :  '.$not->name . ' الخاصة بـ' . $not->user->name,
                'user_id' => $not->user_id,
                'task_id' => $not->id
            ]);
        }

        $tasks_completed = Task::where('status','completed')->get();
        foreach ($tasks_completed as $com){
            Notification::updateOrCreate([
                'user_id' => $com->user_id,
                'task_id' => $com->id
            ],[
                'title' => 'اشعار',
                'body' => ' اكتملت المهمة :  '.$com->name . 'بنجاح الخاصة بـ' . $com->user->name,
                'user_id' => $com->user_id,
                'task_id' => $com->id
            ]);
        }
    }
}

