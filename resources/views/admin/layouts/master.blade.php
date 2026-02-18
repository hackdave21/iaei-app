<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="keyword" content="" />
    <meta name="author" content="flexilecode" />
    <!--! The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags !-->
    <!--! BEGIN: Apps Title-->
    <title>@yield('title','AIAE Administration')</title>
    <!--! END:  Apps Title-->
    <!--! BEGIN: Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin-assets/assets/images/Logos/Symbole_AIAE_FINAL_Clr.png') }}" />
    <!--! END: Favicon-->
    <!--! BEGIN: Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/assets/css/bootstrap.min.css') }}" />
    <!--! END: Bootstrap CSS-->
    <!--! BEGIN: Vendors CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/assets/vendors/css/vendors.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/assets/vendors/css/daterangepicker.min.css') }}" />
    <!--! END: Vendors CSS-->
    <!--! BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/assets/css/theme.min.css') }}" />
    <style>
        :root {
            --bs-primary: #162064;
            --bs-primary-rgb: 22, 32, 100;
            --primary-color: #162064;
        }

        body, h1, h2, h3, h4, h5, h6, .nxl-mtext, .btn, .form-control {
            font-family: 'Futura', 'Inter', sans-serif !important;
        }

        .bg-primary {
            background-color: #162064 !important;
        }

        .text-primary {
            color: #162064 !important;
        }

        .btn-primary {
            background-color: #162064 !important;
            border-color: #162064 !important;
        }

        .btn-primary:hover {
            background-color: #0d1540 !important;
            border-color: #0d1540 !important;
        }

        /* Secondary & Accent Colors */
        .badge.bg-soft-success {
            background-color: rgba(5, 72, 44, 0.1) !important;
            color: #05482C !important;
        }
        
        .badge.bg-soft-warning {
            background-color: rgba(255, 132, 0, 0.1) !important;
            color: #FF8400 !important;
        }

        .nxl-navigation .navbar-content .nxl-navbar .nxl-item.active > .nxl-link, 
        .nxl-navigation .navbar-content .nxl-navbar .nxl-item.nxl-hasmenu.active > .nxl-link {
            background-color: rgba(22, 32, 100, 0.08) !important;
            color: #162064 !important;
        }
        
        .nxl-navigation .navbar-content .nxl-navbar .nxl-item.active > .nxl-link .nxl-micon,
        .nxl-navigation .navbar-content .nxl-navbar .nxl-item.nxl-hasmenu.active > .nxl-link .nxl-micon {
            color: #162064 !important;
        }
        .nxl-navigation .m-header .logo-lg {
            max-height: 50px !important;
            width: auto !important;
        }

        .nxl-navigation .m-header .logo-sm {
            max-height: 40px !important;
            width: auto !important;
        }

        .b-brand {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            height: 100% !important;
        }
    </style>
    <!--! END: Custom CSS-->
    <!--! HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries !-->
    <!--! WARNING: Respond.js doesn"t work if you view the page via file: !-->
    <!--[if lt IE 9]>
			<script src="https:oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https:oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>

<body>
    <!--! ================================================================ !-->
    <!--! [Start] Navigation Manu !-->
    <!--! ================================================================ !-->
     @include('admin.layouts.navbar')
    <!--! ================================================================ !-->
    <!--! [End]  Navigation Manu !-->
    <!--! ================================================================ !-->
    <!--! ================================================================ !-->
    <!--! [Start] Header !-->
    <!--! ================================================================ !-->
     @include('admin.layouts.header')
    <!--! ================================================================ !-->
    <!--! [End] Header !-->
    <!--! ================================================================ !-->
    <!--! ================================================================ !-->
    <!--! [Start] Main Content !-->
    <!--! ================================================================ !-->
    <main class="nxl-container">
       @yield('content')
        <!-- [ Footer ] start -->
         @include('admin.layouts.footer')
        <!-- [ Footer ] end -->
    </main>
    <!--! ================================================================ !-->
    <!--! [End] Main Content !-->
    <!--! ================================================================ !-->
    <!--! ================================================================ !-->
    <!--! BEGIN: Theme Customizer !-->
    <!--! ================================================================ !-->
     @include('admin.layouts.theme')
    <!--! ================================================================ !-->
    <!--! [End] Theme Customizer !-->
    <!--! ================================================================ !-->
    <!--! ================================================================ !-->
    <!--! Footer Script !-->
    <!--! ================================================================ !-->
    @stack('modals')
    <!--! BEGIN: Vendors JS !-->
    <script src="{{ asset('admin-assets/assets/vendors/js/vendors.min.js') }}"></script>
    <!-- vendors.min.js {always must need to be top} -->
    <script src="{{ asset('admin-assets/assets/vendors/js/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/vendors/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/vendors/js/circle-progress.min.js') }}"></script>
    <!--! END: Vendors JS !-->
    <!--! BEGIN: Apps Init  !-->
    <script src="{{ asset('admin-assets/assets/js/common-init.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/js/dashboard-init.min.js') }}"></script>
    <!--! END: Apps Init !-->
    <!--! BEGIN: Theme Customizer  !-->
    <script src="{{ asset('admin-assets/assets/js/theme-customizer-init.min.js') }}"></script>
    <!--! END: Theme Customizer !-->
</body>

</html>
