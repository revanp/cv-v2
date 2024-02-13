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
                    <a href="{{ url('admin-cms') }}" class="text-muted">Admin</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="text-muted">Money Management</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('admin-cms/money-management/incoming-money') }}" class="text-muted">Incoming Money</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="{{ url('admin-cms/money-management/incoming-money/create') }}" class="text-muted">Create</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="d-flex flex-column-fluid">
    <div class=" container ">
        <form action="{{ url('admin-cms/money-management/incoming-money/create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Create Incoming Money</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ url('admin-cms/money-management/incoming-money') }}" class="btn btn-warning font-weight-bold"><i class="flaticon2-back"></i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Bank Account</label>
                            <select name="id_bank_account" id="" class="form-control form-control-solid">
                                <option value="" selected disabled>-- CHOOSE BANK ACCOUNT</option>
                                @foreach ($bankAccount as $key => $val)
                                    <option value="{{ $val->id }}">{{ $val->name }} ({{ $val->number }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Category</label>
                            <input type="text" class="form-control form-control-solid" name="category" placeholder="Enter category">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Amount</label>
                            <input type="text" class="form-control form-control-solid" name="amount" placeholder="Enter amount">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Remarks</label>
                            <input type="text" class="form-control form-control-solid" name="remarks" placeholder="Enter remarks">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Transaction Date</label>
                            <input type="text" class="form-control form-control-solid datepicker-transacation w-100" readonly name="transaction_date" placeholder="Enter transaction date" value="{{ date('d F Y') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Publish Time</label>
                            <input type="text" class="form-control form-control-solid timepicker-input" readonly name="transaction_time" value="{{ date('H:i') }}"/>
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

    // $( 'input[name="category"]' ).keyup(function() {
    //     var _value = $(this).val();

    //     $( 'input[name="category"]' ).typeahead({
    //         minLength: 1,
    //         source: function(request, response){
    //             var states = [];
    //             $.ajax({
    //                 url: "{{ url('admin-cms/money-management/incoming-money/get-category') }}",
    //                 type: 'GET',
    //                 dataType: 'json',
    //                 data: {
    //                     term: value
    //                 },
    //                 success: function(data){
    //                     console.log(process(data));
    //                     // response(data);
    //                 }
    //             })
    //         }
    //     });
    // });
</script>
@endsection
