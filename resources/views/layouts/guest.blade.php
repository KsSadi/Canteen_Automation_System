<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
        <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css') }}">
        <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-extended.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/colors.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/themes/dark-layout.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/themes/bordered-layout.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/themes/semi-dark-layout.min.css') }}">

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" href="{{ asset('css/core/menu/menu-types/vertical-menu.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/pages/dashboard-ecommerce.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/plugins/charts/chart-apex.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/plugins/extensions/ext-component-toastr.min.css') }}">

        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- END: Custom CSS-->

        <!-- Scripts -->

        -----------------------



        <!-- BEGIN: Vendor JS-->
        <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}" defer></script>

        <!-- BEGIN Vendor JS-->

        <!-- BEGIN: Page Vendor JS-->
        <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}" defer></script>
        <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}" defer></script>
        <!-- END: Page Vendor JS-->

        <!-- BEGIN: Theme JS-->
        <script src="{{ asset('js/core/app-menu.min.js') }}" defer></script>
        <script src="{{ asset('js/core/app.min.js') }}" defer></script>
        <script src="{{ asset('js/scripts/customizer.min.js') }}" defer></script>
        <!-- END: Theme JS-->

        <!-- BEGIN: Page JS-->
        <script src="{{ asset('js/scripts/pages/dashboard-ecommerce.min.js') }}" defer></script>
        <!-- END: Page JS-->

        <script>
            $(window).on('load',  function(){
                if (feather) {
                    feather.replace({ width: 14, height: 14 });
                }
            })
        </script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
