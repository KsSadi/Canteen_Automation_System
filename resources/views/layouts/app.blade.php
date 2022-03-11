<!DOCTYPE html>
<html class="loading"  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

      <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>


      <!-- BEGIN: Vendor CSS-->
      <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
      <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/apexcharts.css">
      <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/toastr.min.css">
      <!-- END: Vendor CSS-->

      <!-- BEGIN: Theme CSS-->
      <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.min.css">
      <link rel="stylesheet" type="text/css" href="app-assets/css/colors.min.css">
      <link rel="stylesheet" type="text/css" href="app-assets/css/components.min.css">
      <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.min.css">
      <link rel="stylesheet" type="text/css" href="app-assets/css/themes/bordered-layout.min.css">
      <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.min.css">

      <!-- BEGIN: Page CSS-->
      <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.min.css">
      <link rel="stylesheet" type="text/css" href="app-assets/css/pages/dashboard-ecommerce.min.css">
      <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/charts/chart-apex.min.css">
      <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/ext-component-toastr.min.css">
      <!-- END: Page CSS-->

      <!-- BEGIN: Custom CSS-->
      <link rel="stylesheet" type="text/css" href="app-assets/css/style.css">
      <!-- END: Custom CSS-->
  </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
