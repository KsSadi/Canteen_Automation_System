<!DOCTYPE html>

<html lang="en">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Canteen Automation System">
    <meta name="keywords" content="Canteen Automation System">
    <meta name="author" content="CAS">
    <title>@yield('auth-title', 'Authentication') - Panel</title>
    @include('backend.layouts.partials.styles')
</head>
<!-- END: Head -->
<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>

        <div class="content-body">

            <div class="auth-wrapper auth-basic px-2">
                <div class="auth-inner my-2">


                    <!-- END: Login Info -->
                    <!-- BEGIN: Login Form -->
                @yield('auth-content')
                <!-- END: Login Form -->


                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->
@include('backend.layouts.partials.scripts')
</body>
</html>
