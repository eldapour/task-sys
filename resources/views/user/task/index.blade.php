@extends('admin/layouts/master')

@section('title')
    {{ ''}} | المهام
@endsection
@section('page_name') المهام @endsection
@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> مهامي </h3>
                    <div class="">
                        <label class="form-label">فلترة المهام </label>
                        <select id="status-filter">
                            <option value="all">الكل</option>
                            <option value="pending">جديدة</option>
                            <option value="in_progress">قيد التنفيذ</option>
                            <option value="completed">مكتملة</option>
                        </select>
                    </div>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered text-nowrap w-100" id="dataTable">

                            <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th class="min-w-25px">#</th>
                                <th class="min-w-50px">الاسم</th>
                                <th class="min-w-50px">الحالة</th>
                                <th class="min-w-125px"> عدد المهام الفرعية</th>
                                <th class="min-w-50px rounded-end">العمليات</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Create Or Edit Modal -->
        <div class="modal fade" id="editOrCreate" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="example-Modal3">بيانات المهمه</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body">

                    </div>
                </div>
            </div>
        </div>
        <!-- Create Or Edit Modal -->
    </div>
    @include('admin/layouts/myAjaxHelper')
@endsection
@section('ajaxCalls')
    <script>
        var columns = [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'status', name: 'status'},
            {data: 'sub_task', name: 'sub_task'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]

        let ajax = {
            url: '{{route('user.tasks.index')}}',
                data: function (d) {
                d.status = $('#status-filter').val(); // Assuming you have a select input with the id 'status-filter'
            }
        };
        showData(ajax, columns);

        $('#status-filter').on('change', function () {
            $('#dataTable').DataTable().destroy();
            ajax.data = function (d) {
                d.status = $('#status-filter').val(); // Assuming you have a select input with the id 'status-filter'
            }
            showData(ajax, columns)
        })

        showEditModal('{{route('user.tasks.edit',':id')}}');
        editScript();
        function showObjModal(routeOfEdit){
            $(document).on('click', '.showBtn', function () {
                var id = $(this).data('id')
                var url = routeOfEdit;
                url = url.replace(':id', id)
                $('#modal-body').html(loader)
                $('#editOrCreate').modal('show')

                setTimeout(function () {
                    $('#modal-body').load(url)
                }, 500)
            })
        }

        showObjModal('{{ route('user.tasks.show',':id') }}');


    </script>
@endsection


