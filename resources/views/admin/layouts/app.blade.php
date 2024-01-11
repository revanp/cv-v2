<!DOCTYPE html>
<html lang="en">
    <head>
        {{-- Required meta tags --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CMS REVAN.</title>

        @include('admin.layouts.style')
        @yield('style')
    </head>
    <body  id="kt_body"  class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"  >
        @include('admin.layouts.header-mobile')
        <div class="d-flex flex-column flex-root">
            <div class="d-flex flex-row flex-column-fluid page">
                @include('admin.layouts.aside')

                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                    @include('admin.layouts.header')

                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        @include('admin.layouts.script')
        @yield('script')
    </body>
</html>
