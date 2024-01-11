@extends('admin.layouts.app')

@section('content')
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
    <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                Form Contact Me
            </h5>

            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item">
                    <a href="{{ url('admin-cms') }}" class="text-muted">Admin</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="{{ url('admin-cms/form-contact-us') }}" class="text-muted">Form Contact Me</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="d-flex flex-column-fluid">
    <div class=" container ">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">List Form</h3>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
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
				url: "{{ url('admin-cms/form-contact-us/datatable') }}",
				type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}"
                }
			},
            columns: [
                {data: 'name'},
                {data: 'email'},
                {data: 'phone_number'},
                {data: 'subject'},
                {data: 'message'},
                {data: 'created_at'},
            ],
            order: [[0, 'desc']],
        });

        $(document).on('change', '.btn-activate', function(e){
            event.preventDefault();

            var t      = $(this);
            var id     = t.attr("data-id");
            var status = t.prop('checked') ? 1 : 0;

            $.ajax({
                url: "{{ url('admin-cms/portofolio/change-status') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    _method: 'put',
                    status: status,
                    id: id,
                    "_token": "{{ csrf_token() }}"
                },
            })
            .done(function(res) {
                if(res.success == true){
                    toastr.success(res.message);
                }else{
                    toastr.error(res.message);
                }
            })
            .fail(function(err) {
                toastr.error(res.message);
            });
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
