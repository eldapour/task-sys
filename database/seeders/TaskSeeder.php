<?php

namespace Database\Seeders;

use App\Jobs\TaskSeederJob;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        TaskSeederJob::dispatch()->onQueue('task_seeder');
    }
}
