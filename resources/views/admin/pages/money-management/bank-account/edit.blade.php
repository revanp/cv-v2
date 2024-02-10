@extends('admin.layouts.app')

@section('content')
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
    <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                Bank Account
            </h5>

            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item">
                    <a href="{{ url('admin-cms') }}" class="text-muted">Admin</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="text-muted">Money Management</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('admin-cms/money-management/bank-account') }}" class="text-muted">Bank Account</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="{{ url('admin-cms/money-management/bank-account/edit/'.$data->id) }}" class="text-muted">Edit</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="d-flex flex-column-fluid">
    <div class=" container ">
        <form action="{{ url('admin-cms/money-management/bank-account/edit/'.$data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Edit Bank Account</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ url('admin-cms/money-management/bank-account') }}" class="btn btn-warning font-weight-bold"><i class="flaticon2-back"></i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Bank Account Name</label>
                            <input type="text" class="form-control form-control-solid" name="name" placeholder="Enter bank account name" value="{{ $data->name }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Bank Account Number</label>
                            <input type="text" class="form-control form-control-solid" name="number" placeholder="Enter bank account number" value="{{ $data->number }}">
                        </div>
                        <div class="form-group col-md-6">
                            <div class="col-12 col-form-label">
                                <div class="checkbox-inline">
                                    <label class="checkbox checkbox-success">
                                        <input type="checkbox" name="is_active" {{ $data->is_active ? 'checked' : '' }}/>
                                        <span></span>
                                        Active
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('backend/plugins/custom/ckeditor/ckeditor-classic.bundle.js?v=7.0.6') }}"></script>
<script>
    $('form').submit(function(e){
        var buttonSubmit = $(this).find('button[type="submit"]');
        buttonSubmit.attr('disabled', true);
        e.preventDefault();

        var action = $(this).attr('action');

        var formData = new FormData(this);

        $.ajax({
            url: action,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function(data){
                if(data.redirect != null){
                    window.location.replace(data.redirect);
                }
            },
            error: function(data){
                var result = data.responseJSON;

                $.each(result.data, function(key, value){
                    toastr.error(value[0]);
                })

                buttonSubmit.attr('disabled', false);
            }
        })
    });
</script>
@endsection
