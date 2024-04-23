<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Interfaces\TaskInterface;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private TaskInterface $taskInterface;

    public function __construct(TaskInterface $taskInterface)
    {
        $this->taskInterface = $taskInterface;
    }
    public function index(Request $request)
    {
        return $this->taskInterface->index($request);
    }

    public function delete(Request $request)
    {
        return $this->taskInterface->delete($request);
    }

    public function create()
    {
        return $this->taskInterface->create();
    }

    public function store(TaskRequest $request)
    {
        return $this->taskInterface->store($request);
    }

    public function show(Task $task)
    {
        return $this->taskInterface->show($task);
    }
    public function edit(Task $task)
    {
        return $this->taskInterface->edit($task);
    }

    public function update(TaskRequest $request, $id)
    {
        return $this->taskInterface->update($request, $id);
    }
}//end class
