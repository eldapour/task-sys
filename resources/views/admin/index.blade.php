@extends('admin/layouts/master')
@section('title')
    {{ 'الصفحة الرئيسية'}} | لوحة التحكم
@endsection
@section('page_name')
    الرئـيسية
@endsection
@section('content')
    @if(auth()->guard('admin')->check())
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card bg-primary-gradient img-card box-success-shadow">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white"><h2 class="mb-0 number-font">{{ \App\Models\Task::count() }}</h2>
                                <p class="text-white mb-0"> عدد المهام</p></div>
                            <div class="mr-auto">
                                <i class="fe fe-user-check text-white fs-30 ml-2 mt-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card bg-primary-gradient img-card box-success-shadow">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white"><h2 class="mb-0 number-font">{{ \App\Models\SubTask::count() }}</h2>
                                <p class="text-white mb-0"> عدد المهام الفرعية</p></div>
                            <div class="mr-auto">
                                <i class="fe fe-box text-white fs-30 ml-2 mt-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card bg-primary-gradient img-card box-success-shadow">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white"><h2 class="mb-0 number-font">{{ \App\Models\User::count() }}</h2>
                                <p class="text-white mb-0"> عدد المستخدمين</p></div>
                            <div class="mr-auto">
                                <i class="fe fe-map text-white fs-30 ml-2 mt-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card bg-primary-gradient img-card box-success-shadow">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white"><h2 class="mb-0 number-font">{{ \App\Models\Admin::count() }}</h2>
                                <p class="text-white mb-0"> عدد المشرفين</p></div>
                            <div class="mr-auto">
                                <i class="fe fe-inbox text-white fs-30 ml-2 mt-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card bg-primary-gradient img-card box-success-shadow">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white"><h2 class="mb-0 number-font">{{ \App\Models\Task::where('user_id',auth()->guard('user')->user()->id)->count() }}</h2>
                                <p class="text-white mb-0"> عدد المهام</p></div>
                            <div class="mr-auto">
                                <i class="fe fe-user-check text-white fs-30 ml-2 mt-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card bg-primary-gradient img-card box-success-shadow">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white"><h2 class="mb-0 number-font">{{ \App\Models\Task::where('user_id',auth()->guard('user')->user()->id)->where('status','completed')->count() }}</h2>
                                <p class="text-white mb-0"> عدد المهام المكتملة</p></div>
                            <div class="mr-auto">
                                <i class="fe fe-user-check text-white fs-30 ml-2 mt-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card bg-primary-gradient img-card box-success-shadow">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white"><h2 class="mb-0 number-font">{{ \App\Models\Task::where('user_id',auth()->guard('user')->user()->id)->where('status','in_progress')->count() }}</h2>
                                <p class="text-white mb-0"> عدد المهام الجديدة</p></div>
                            <div class="mr-auto">
                                <i class="fe fe-user-check text-white fs-30 ml-2 mt-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card bg-primary-gradient img-card box-success-shadow">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white"><h2 class="mb-0 number-font">{{ \App\Models\Task::where('user_id',auth()->guard('user')->user()->id)->where('status','pending')->count() }}</h2>
                                <p class="text-white mb-0"> عدد المهام قيد التنفيذ</p></div>
                            <div class="mr-auto">
                                <i class="fe fe-user-check text-white fs-30 ml-2 mt-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card bg-primary-gradient img-card box-success-shadow">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white"><h2 class="mb-0 number-font">{{ \App\Models\SubTask::whereHas('task',function($q){$q->where('user_id',auth()->guard('user')->user()->id);})->count() }}</h2>
                                <p class="text-white mb-0"> عدد المهام الفرعية</p></div>
                            <div class="mr-auto">
                                <i class="fe fe-box text-white fs-30 ml-2 mt-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


@endsection
@section('js')

@endsection

