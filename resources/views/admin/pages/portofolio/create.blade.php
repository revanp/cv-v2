@extends('admin.layouts.app')

@section('content')
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
    <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                Portofolio
            </h5>

            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item">
                    <a href="{{ url('admin-cms') }}" class="text-muted">Admin</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('admin-cms/portofolio') }}" class="text-muted">Portofolio</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="{{ url('admin-cms/portofolio/create') }}" class="text-muted">Create</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="d-flex flex-column-fluid">
    <div class=" container ">
        <form action="{{ url('admin-cms/portofolio/create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Create Portofolio</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ url('admin-cms/portofolio') }}" class="btn btn-warning font-weight-bold"><i class="flaticon2-back"></i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group picture_upload col-md-6">
                            <label>Image</label>
                            <div class="form-group__file">
                                <div class="file-wrapper">
                                    <input type="file" name="image" class="file-input"/>
                                    <div class="file-preview-background">+</div>
                                    <img src="" width="240px" class="file-preview"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control form-control-solid" name="name" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <input type="text" class="form-control form-control-solid" name="category" placeholder="Enter category">
                            </div>
                            <div class="form-group">
                                <label>URL</label>
                                <input type="text" class="form-control form-control-solid" name="url" placeholder="Enter URL">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" id="" rows="3" class="form-control form-control-solid" placeholder="Enter description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Sort</label>
                                <select name="sort" id="" class="form-control form-control-solid">
                                    <option value="">-- LAST ORDER --</option>
                                    @for($i = 1; $i <= $sort; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="col-12 col-form-label">
                                    <div class="checkbox-inline">
                                        <label class="checkbox checkbox-success">
                                            <input type="checkbox" name="is_active"/>
                                            <span></span>
                                            Active
                                        </label>
                                    </div>
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
