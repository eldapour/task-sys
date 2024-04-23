<div class="modal-body">
    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{route('tasks.update',$task->id)}}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{$task->id}}" name="id">
        @csrf
        <div class="form-group">
            <label for="name" class="form-control-label">الاسم</label>
            <h4 type="text" >{{ $task->name }}</h4>
        </div>
        <div class="form-group">
            <label for="description" class="form-control-label">التفاصيل</label>
            <h4 id="description">{{ $task->description }}</h4>
        </div>

        <div class="form-group">
            <label for="description" class="form-control-label">المستخدم</label>
            <h4>{{ $task->user->name }}</h4>
        </div>
        <hr>
        <div class="form-group">
            <h4 for="sub_task" class="form-control-label">المهمه الفرعيه</h4>
            <div class="row sub_tasks_row">
                @foreach($task->subTasks as $key=> $sub_task)
                    <div class="col-6 badge badge-primary mt-2" style="max-width:49%; margin-left: 3px;">
                        <label for="sub_task" class="form-control-label">اسم المهمه </label>
                        <h4 >{{ $sub_task->name }}</h4>
                    </div>
                    <div class="col-6 badge badge-secondary mt-2" style="max-width:49%; margin-left: 3px;">
                        <label for="sub_tasks" class="form-control-label">تاريخ المهمه</label>
                        <h4> {{ $sub_task->date }}</h4>
                    </div>
                @endforeach
            </div>
        </div>
    </form>
</div>
