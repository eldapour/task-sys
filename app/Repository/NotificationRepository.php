<?php

namespace App\Repository;

use App\Interfaces\NotificationInterface;
use App\Jobs\ShowNotifyJob;
use App\Models\Notification;
use Yajra\DataTables\DataTables;

class NotificationRepository implements NotificationInterface
{
    public function index($request)
    {
        ShowNotifyJob::dispatch()->onQueue('read_notify');
        if ($request->ajax()) {
            $notifications = Notification::latest()->get();
            return DataTables::of($notifications)
                ->addColumn('action', function ($notifications) {
                    return '
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $notifications->id . '" data-title="' . $notifications->name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin/notifications/index');
        }
    }


    public function delete($request)
    {
        $notification = Notification::where('id', $request->id)->first();
        $notification->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);

    }
}
