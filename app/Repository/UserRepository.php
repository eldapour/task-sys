<?php

namespace App\Repository;

use App\Interfaces\UserInterface;
use App\Models\User;
use App\Traits\PhotoTrait;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserRepository implements UserInterface
{
    use PhotoTrait;

    public function index($request)
    {
        if ($request->ajax()) {
            $users = User::latest()->get();
            return DataTables::of($users)
                ->addColumn('action', function ($users) {
                    return '
                            <button type="button" data-id="' . $users->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $users->id . '" data-title="' . $users->name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->addColumn('tasks', function ($users) {
                    return $users->tasks->count();
                })
                ->addColumn('tasks_complete', function ($users) {
                    return $users->tasks()->where('status', 'completed')->count();
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin/user/index');
        }
    }


    public function delete($request)
    {
        $user = User::where('id', $request->id)->first();
        if ($user == auth()->guard('user')->user()) {
            $user->delete();
            return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
        }
    }


    public function create()
    {
        return view('admin/user.parts.create');
    }

    public function store($request)
    {
        $inputs = $request->all();
        $inputs['password'] = Hash::make($request->password);
        if (User::create($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }

    public function edit($user)
    {
        return view('admin/user.parts.edit', compact('user'));
    }

    public function update($request, $id)
    {
        $inputs = $request->except('id');

        $user = User::findOrFail($id);

        if ($request->has('password') && $request->password != null)
            $inputs['password'] = Hash::make($request->password);
        else
            unset($inputs['password']);

        if ($user->update($inputs))
            return response()->json(['status' => 200]);
        else
            return response()->json(['status' => 405]);
    }
}
