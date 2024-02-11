@extends('admin.layouts.app')

@section('content')
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
    <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                Incoming Money
            </h5>

            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item">
                    <a href="{{ url('admin') }}" class="text-muted">Admin</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="text-muted">Money Management</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="#" class="text-muted">Incoming Money</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="d-flex flex-column-fluid">
            <div class=" container ">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">List Incoming Money</h3>
                        </div>
                        <div class="card-toolbar">
                            <a href="{{ url('admin-cms/money-management/incoming-money/create') }}" class="btn btn-primary font-weight-bold"><i class="flaticon2-plus"></i> Create</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Bank</th>
                                    <th>Amount</th>
                                    <th>Remarks</th>
                                    <th>Transaction Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        var table = $('#kt_datatable');

        table.DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
			ajax: {
				url: "{{ url('admin-cms/money-management/incoming-money/datatable') }}",
				type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}"
                }
			},
            columns: [
                {data: 'category', name: 'incoming_money_category.category'},
                {data: 'bank', name: 'bank_account.name'},
                {data: 'amount'},
                {data: 'remarks'},
                {data: 'created_at'},
                {data: 'action', responsivePriority: -1, searchable: false, orderable: false, 'className': 'text-center'},
            ],
            order: [[4, 'desc']],
        });

        $(document).on('click', '.btn-delete', function(e){
            e.preventDefault();

            var action = $(this).attr('href');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: action,
                        type: 'GET',
                        success: function(data){
                            var result = data;
                            let timerInterval;

                            Swal.fire({
                                title: 'Success',
                                text: result.message,
                                icon: 'success',
                                timer: 2000,
                                timerProgressBar: true,
                                showCancelButton: false,
                                showCloseButton: false,
                                showConfirmButton: false,
                            }).then((result) => {
                                if(data.redirect != null){
                                    window.location.replace(data.redirect);
                                }
                            })
                        },
                        error: function(data){
                            var result = data.responseJSON;

                            Swal.fire({
                                title: 'Error!',
                                text: result.message,
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            })
                        }
                    })
                }
            })
        });
    })
</script>
@endsection
