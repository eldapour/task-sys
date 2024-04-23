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

class MainController extends Controller
{
    public function index()
    {
        return view('admin.index');
    } //



}
