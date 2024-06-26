<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'admin'],function (){
    Route::get('login', [AuthController::class,'index'])->name('admin.login');
    Route::POST('login', [AuthController::class,'login'])->name('admin.login');
});

Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function (){


    Route::get('/', [AdminController::class,'adminHome'])->name('adminHome');
    Route::get('checkTasks', [MainController::class,'checkTasks'])->name('checkTasks');
    Route::resource('admins', AdminController::class);
    Route::POST('delete_admin',[AdminController::class,'delete'])->name('delete_admin');
    Route::get('my_profile',[AdminController::class,'myProfile'])->name('myProfile');
    Route::get('logout', [AuthController::class,'logout'])->name('admin.logout');



    Route::resource('users', UserController::class);
    Route::POST('delete_user',[UserController::class,'delete'])->name('delete_user');

    Route::resource('tasks', TaskController::class);
    Route::POST('delete_task',[TaskController::class,'delete'])->name('delete_task');

    Route::resource('notifications', NotificationController::class);
    Route::POST('delete_notification',[NotificationController::class,'delete'])->name('delete_notification');

});




#=======================================================================
#============================ ROOT =====================================
#=======================================================================
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('key:generate');
    Artisan::call('config:clear');
    Artisan::call('optimize:clear');
    return response()->json(['status' => 'success','code' =>1000000000]);
});









