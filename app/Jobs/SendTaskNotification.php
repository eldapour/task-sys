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
            })
            ->get();
        foreach ($tasks_not_completed as $not){
            Notification::query()->create([
                'title' => 'تحذير',
                'body' => 'تحذير لم تكتمل المهمة '.$not->title . ' الخاصة بـ' . $not->user->name,
            ]);
        }

        $tasks_completed = Task::where('status','completed')
            ->whereHas('subTasks',function ($query){
                $query->where('date','<=',now()->subDays(2));
            })
        ->get();
        foreach ($tasks_completed as $com){
            Notification::query()->create([
                'title' => 'اشعار',
                'body' => ' اكتملت المهمة  '.$com->title . 'بنجاح الخاصة بـ' . $com->user->name,
            ]);
        }
    }
}

// php artisan queue:work --queue=task_alert
