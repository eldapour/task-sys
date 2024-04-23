<?php

namespace App\Repository;

use App\Interfaces\TaskInterface;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class TaskRepository implements TaskInterface
{
    public function index($request)
    {
        if ($request->ajax()) {
            $tasks = Task::query()->latest()->get();
            return DataTables::of($tasks)
                ->addColumn('action', function ($tasks) {
                    return '
                            <button type="button" data-id="' . $tasks->id . '" class="btn btn-pill btn-success-light showBtn"><i class="fa fa-eye"></i></button>
                            <button type="button" data-id="' . $tasks->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $tasks->id . '" data-title="' . $tasks->name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->addColumn('sub_task', function ($tasks) {
                    return $tasks->subTasks->count();
                })
                ->editColumn('user_id', function ($users) {
                    return $users->user->name;
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin/task/index');
        }
    }


    public function delete($request)
    {
        $task = Task::where('id', $request->id)->first();
        $task->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);

    }


    public function create()
    {
        $users = User::query()->select('id', 'name')->get();
        return view('admin/task.parts.create', compact('users'));
    }

    public function store($request)
    {
        $inputs = $request->all();
        $task_created = Task::create($inputs);
        if ($task_created) {
            $task_created->subTasks()->createMany($inputs['sub_tasks']);
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    public function show($task)
    {
        $users = User::query()->select('id', 'name')->get();
        return view('admin/task.parts.view', compact('task','users'));
    }
    public function edit($task)
    {
        $users = User::query()->select('id', 'name')->get();
        return view('admin/task.parts.edit', compact('task','users'));
    }

    public function update($request, $id)
    {
        $inputs = $request->except('id');

        $task = Task::findOrFail($id);
         $task->update($inputs);
        if ($task->update($inputs)){
            $task->subTasks()->delete();
            $task->subTasks()->createMany($inputs['sub_tasks']);
            return response()->json(['status' => 200]);
        }
        else{
            return response()->json(['status' => 405]);
        }
    }
}
