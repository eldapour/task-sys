<div class="modal-body">
    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{route('tasks.update',$task->id)}}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{$task->id}}" name="id">
        @csrf
        <div class="form-group">
            <label for="name" class="form-control-label">الاسم<label class="text-danger">*</label></label>
            <input type="text" class="form-control" name="name" value="{{ $task->name }}" id="name">
        </div>
        <div class="form-group">
            <label for="description" class="form-control-label">التفاصيل<label class="text-danger">*</label></label>
            <textarea class="form-control" name="description" id="description">{{ $task->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="description" class="form-control-label">المستخدم<label class="text-danger">*</label></label>
            <select class="form-control" name="user_id" id="user_id">
                <option class="form-control" disabled selected>اختر المستخدم</option>
                @foreach($users as $user)
                    <option class="form-control"
                            {{ $user->id == $task->user_id ? 'selected' : '' }} value="{{$user->id}}">{{$user->name}}>
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="sub_task" class="form-control-label">المهمه الفرعيه</label><label
                class="text-danger">*</label></label>
            <div class="row sub_tasks_row">
                @foreach($task->subTasks as $key=> $sub_task)
                    <div class="col-6">
                        <label for="sub_task" class="form-control-label">اسم المهمه </label><label
                            class="text-danger">*</label></label>
                        <input type="text" class="form-control" name="sub_tasks[{{$key}}][name]"
                               value="{{ $sub_task->name }}" required>
                    </div>
                    <div class="col-6">
                        <label for="sub_tasks" class="form-control-label">تاريخ المهمه</label><label
                            class="text-danger">*</label></label>
                        <input type="datetime-local" class="form-control" name="sub_tasks[{{$key}}][date]"
                               value="{{ $sub_task->date }}" required>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            <button type="button" class="btn btn-primary" id="addSubTaskButton">اضافة مهمة فرعية</button>
            <button type="button" class="btn btn-danger" id="deleteSubTaskButton">حذف مهمة فرعية</button>
            <button type="submit" class="btn btn-success" id="updateButton">تحديث</button>
        </div>
    </form>
</div>

<script>
    $(document).ready(function () {
        let index = {{ count($task->subTasks) }}; // Start index for additional sub_tasks fields

        // Function to append a new set of sub_tasks fields
        function appendSubTaskField() {
            let html = `
            <div class="col-6">
                <label for="sub_task" class="form-control-label">اسم المهمه </label><label class="text-danger">*</label>
                <input type="text" class="form-control" name="sub_tasks[${index}][name]">
            </div>
            <div class="col-6">
                <label for="sub_task" class="form-control-label">تاريخ المهمه</label><label class="text-danger">*</label>
                <input type="datetime-local" class="form-control" name="sub_tasks[${index}][date]">
            </div>
            `;

            // Append the new fields to the form
            $('.sub_tasks_row').append(html);
            index++; // Increment the index for the next set of fields
        }

        // Event listener for the button click to add a new set of sub_tasks fields
        $('#addSubTaskButton').click(function () {
            appendSubTaskField();
        });

        $('#deleteSubTaskButton').click(function () {
            if (index > 5) {
                index--; // Decrement the index
                $('.sub_tasks_row .col-6:last-of-type').remove(); // Remove the last set of fields
                $('.sub_tasks_row .col-6:last-of-type').remove(); // Remove the corresponding date field
            } else {
                alert('لا يمكن حذف أقل من 5 مهام فرعية');
            }
        });
    });
</script>
