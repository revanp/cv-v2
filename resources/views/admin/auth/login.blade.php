<!DOCTYPE html>
<html lang="en">
    <head>
        {{-- Required meta tags --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CMS REVAN.</title>

        @include('admin.layouts.style')
        <link href="{{ asset('public/backend/css/pages/login/login-4.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>
    </head>
    <body  id="kt_body"  class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"  >
        <div class="d-flex flex-column flex-root">
            <div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid">
                <div class="login-container order-2 order-lg-1 d-flex flex-center flex-row-fluid px-7 pt-lg-0 pb-lg-0 pt-4 pb-6 bg-white">
                    <div class="login-content d-flex flex-column pt-lg-0 pt-12">
                        <a href="{{ url('admin-cms') }}" class="mb-20" style="display: block; color: #0d1013; text-transform: uppercase; letter-spacing: 6px; font-size: 14px; font-weight: 700; text-decoration: none;">
                            REVAN.
                        </a>

                        <div class="login-form">
                            <form class="form" id="kt_login_singin_form" action="{{ url('admin-cms/login') }}" method="POST">
                                @csrf
                                <div class="pb-5 pb-lg-15">
                                    <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Sign In</h3>
                                </div>

                                <div class="form-group">
                                    <label class="font-size-h6 font-weight-bolder text-dark">Your Email</label>
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0" type="email" name="email" autocomplete="off" placeholder="your@email.com"/>
                                </div>

                                <div class="form-group">
                                    <label class="font-size-h6 font-weight-bolder text-dark pt-5">Your Password</label>
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0" type="password" name="password" autocomplete="off" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;" />
                                </div>

                                <div class="pb-lg-0 pb-5">
                                    <button type="submit" id="kt_login_singin_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.layouts.script')
        <script>
            $('form').submit(function(e){
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
                        var result = data;
                        let timerInterval;

                        toastr.success(result.message, null, {
                            onHidden: function () {
                                if(data.redirect != null){
                                    window.location.replace(result.redirect);
                                }
                            }
                        });
                    },
                    error: function(data){
                        var result = data.responseJSON;

                        if(result.code == 422){
                            $.each(result.data, function(key, value){
                                toastr.error(value[0]);
                            })
                        }else{
                            toastr.error(result.message);
                        }
                    }
                })
            })
        </script>
    </body>
</html>
