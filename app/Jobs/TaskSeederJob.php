<?php

namespace App\Jobs;

use App\Models\SubTask;
use App\Models\Task;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TaskSeederJob implements ShouldQueue
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
        // Create 10000 tasks with 5 subtasks each
        Task::factory()->count(10000)->create()->each(function ($task) {
            // For each task, create 5 subtasks
            $task->subTasks()->createMany(
                SubTask::factory()->count(5)->make()->toArray()
            );
        });
    }
}
