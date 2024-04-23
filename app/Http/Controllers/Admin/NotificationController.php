<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Interfaces\NotificationInterface;
use App\Interfaces\TaskInterface;
use App\Models\Task;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    private NotificationInterface $notificationInterface;

    public function __construct(NotificationInterface $notificationInterface)
    {
        $this->notificationInterface = $notificationInterface;
    }
    public function index(Request $request)
    {
        return $this->notificationInterface->index($request);
    }

    public function delete(Request $request)
    {
        return $this->notificationInterface->delete($request);
    }
}//end class
