<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" enctype="multipart/form-data" action="{{route('users.store')}}" >
    @csrf
    <div class="form-group">
        <label for="name" class="form-control-label">الاسم</label>
        <input type="text" class="form-control" name="name" id="name">
    </div>
    <div class="form-group">
        <label for="email" class="form-control-label">الايميل</label>
        <input type="text" class="form-control" name="email" id="email">
    </div>
    <div class="form-group">
        <label for="password" class="form-control-label">كلمة المرور</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            <button type="submit" class="btn btn-primary" id="addButton">اضافة</button>
        </div>
    </form>
</div>

<script>
    $('.dropify').dropify()
</script>
