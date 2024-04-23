<?php

namespace App\Http\Controllers\Web;

use App\Events\NewMessage;
use App\Http\Controllers\Admin\VisionController;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\ClientRate;
use App\Models\CompanyVision;
use App\Models\Contact;
use App\Models\newsletter;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Task;
use App\Models\Team;
use App\Models\User;
use App\Models\Works;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserTaskController extends Controller
{
    public function tasks(Request $request)
    {
        $tasks = Task::whereUserId(auth()->user()->id);
        if ($request->has('status') && $request->status != 'all') {
            $tasks->where('status', $request->status);
        }
        if ($request->ajax()) {


            $tasks = $tasks->latest()->get();
            return DataTables::of($tasks)
                ->addColumn('action', function ($tasks) {
                    return '
                            <button type="button" data-id="' . $tasks->id . '" class="btn btn-pill btn-success-light showBtn"><i class="fa fa-eye"></i></button>
                            <button type="button" data-id="' . $tasks->id . '" class="btn btn-pill btn-info-light editBtn">تغيير الحالة<i class="fa fa-edit"></i></button>
                       ';
                })
                ->addColumn('sub_task', function ($tasks) {
                    return $tasks->subTasks->count();
                })
                ->editColumn('status', function ($tasks) {
                    if ($tasks->status == 'in_progress') {
                        return '<span class="badge badge-info">قيد التنفيذ</span>';
                    } elseif ($tasks->status == 'completed') {
                        return '<span class="badge badge-success">مكتملة</span>';
                    } else {
                        return '<span class="badge badge-warning">جديدة</span>';
                    }
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('user/task/index');
        }
    }

    public function taskShow(Task $task)
    {
        return view('user.task.parts.view', compact('task'));
    }

    public function taskEdit(Task $task)
    {
        return view('user.task.parts.edit', compact('task'));
    }

    public function taskUpdate(Request $request, $id)
    {
        $status = $request->status;

        $task = Task::findOrFail($id);
        $task->update(['status' => $status]);
        if ($task->update(['status' => $status])) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


}
