<div class="modal-body">
    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{route('user.tasks.update',$task->id)}}">
        <input type="hidden" value="{{$task->id}}" name="id">
        @csrf
        <div class="form-group">
            <label for="description" class="form-control-label">تغيير الحالة</label>
            <select class="form-control" name="status" id="status">
                <option class="form-control" value="pending" @if($task->status == 'pending') selected @endif>جديدة</option>
                <option class="form-control" value="in_progress" @if($task->status == 'in_progress') selected @endif>قيد التنفيذ</option>
                <option class="form-control" value="completed" @if($task->status == 'completed') selected @endif>مكتملة</option>
            </select>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            <button type="submit" class="btn btn-success" id="updateButton">تحديث</button>
        </div>
    </form>
</div>
