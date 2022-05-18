
<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN: Head -->

<head>
    @include('backend.layouts.partials.styles')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- END: CSS Assets-->
{{--        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">--}}


{{--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>--}}
{{--        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>--}}

</head>
<!-- END: Head -->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Top Bar -->
         @include('backend.layouts.partials.topbar')
    <!-- END: Top Bar -->
    <!-- BEGIN: Side Menu -->
        @include('backend.layouts.partials.sidebar')
    <!-- END: Side Menu -->
<!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body"><!---->

                @yield('admin-section')


            </div>
        </div>

        <!-- END: Content -->

    @include('backend.layouts.partials.footer')
    <!-- BEGIN: JS Assets-->
    @include('backend.layouts.partials.scripts')
    <!-- END: JS Assets-->
</body>

</html>
