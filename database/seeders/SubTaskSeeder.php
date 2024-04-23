<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\SubTask;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SubTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($task = 0; $task < 10000; $task++) {
            SubTask::create([
                'name' => 'subTask#' . $task+1,
                'date'=> Carbon::now(),
                'task_id' => $task+1
            ]);
            SubTask::create([
                'name' => 'subTask#' . $task+2,
                'date'=> Carbon::now(),
                'task_id' => $task+1
            ]);
            SubTask::create([
                'name' => 'subTask#' . $task+3,
                'date'=> Carbon::now(),
                'task_id' => $task+1
            ]);
            SubTask::create([
                'name' => 'subTask#' . $task+4,
                'date'=> Carbon::now(),
                'task_id' => $task+1
            ]);
            SubTask::create([
                'name' => 'subTask#' . $task+5,
                'date'=> Carbon::now(),
                'task_id' => $task+1
            ]);
        }
    }
}
