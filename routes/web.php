<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Web\MainController;
use App\Http\Controllers\Web\UserTaskController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/','welcome')->name('welcome');


#============================ Web ====================================
Route::group(['prefix'=>'user'], function () {
    Route::get('/login',[AuthController::class,'index'])->name('user.login');
    Route::post('/doLogin',[AuthController::class,'loginUser'])->name('user.dologin');

    Route::group(['middleware'=>'auth:user'],function(){

        Route::get('home', [MainController::class,'index'])->name('user.home');
        Route::get('tasks', [UserTaskController::class,'tasks'])->name('user.tasks.index');
        Route::get('task/show/{task}', [UserTaskController::class,'taskShow'])->name('user.tasks.show');
        Route::get('task/edit/{task}', [UserTaskController::class,'taskEdit'])->name('user.tasks.edit');
        Route::post('taskUpdate/{id}', [UserTaskController::class,'taskUpdate'])->name('user.tasks.update');
        Route::get('logoutUser', [AuthController::class,'logoutUser'])->name('user.logout');
    });
});
