<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Task;

class DeleteOldTasks extends Command
{
    protected $signature = 'tasks:delete-old';

    protected $description = 'Delete tasks and their subtasks if they are finished and 2 days have passed since creation';
    public function handle()
    {
        $tasks = Task::where('status', 'completed')
            ->whereHas('subTasks', function ($query) {
                $query->where('date', '<', Carbon::now()->subDays(2)->toDateTimeString());
            })
            ->get();

        foreach ($tasks as $task) {
            $task->subtasks()->delete();
            $task->delete();
        }

        $this->info('Old tasks and their subtasks deleted successfully.');
    }
}
