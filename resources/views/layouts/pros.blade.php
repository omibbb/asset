<!DOCTYPE html>

<html class="light-style layout-menu-fixed" data-theme="theme-default" data-assets-path="{{ asset('/assets') . '/' }}" data-base-url="{{url('/')}}" data-framework="laravel" data-template="vertical-menu-laravel-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title')</title>
    <meta name="description" content="{{ config('variables.templateDescription') ? config('variables.templateDescription') : '' }}" />
    <meta name="keywords" content="{{ config('variables.templateKeyword') ? config('variables.templateKeyword') : '' }}">
    <!-- laravel CRUD token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Canonical SEO -->
    <link rel="canonical" href="{{ config('variables.productPage') ? config('variables.productPage') : '' }}">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <style>
        #uploadedAvatar {
            max-width: 150px;
            /* Ubah sesuai keinginan */
            height: auto;
            /* Menjaga rasio aspek */
            border-radius: 50%;
            /* Gambar bulat */
            object-fit: cover;
            /* Memastikan gambar tidak terdistorsi */
        }

        .avatar img {
            width: 40px;
            /* Atur lebar */
            height: 40px;
            /* Atur tinggi */
            border-radius: 50%;
            /* Gambar bulat */
            object-fit: cover;
            /* Mengatur cara gambar ditampilkan */
        }
    </style>


    <!-- Include Styles -->
    @include('layouts/sections/styles')

    <!-- Style pros -->
    @include('layouts/sections/pros-styles')

    <!-- Include Scripts for customizer, helper, analytics, config -->
    @include('layouts/sections/scriptsIncludes')

    <!-- Notify -->
    @notifyCss
</head>

<body>

    <!-- Layout Content -->
    @yield('layoutContent')
    <!--/ Layout Content -->


    <!-- Include Scripts -->
    @include('layouts/sections/scripts')

    <x-notify::notify />
    <!-- Notify -->
    @notifyJs


    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->
    <!--/ Layout Content -->

    <!-- Include Scripts -->
    <!-- $isFront is used to append the front layout scripts only on the front layout otherwise the variable will be blank -->
    <!-- BEGIN: Vendor JS-->

    <link rel="modulepreload" href="{{ url('https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/jquery-CbdDuLi-.js') }}" />
    <link rel="modulepreload" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/jquery-CED9k22g.js" />
    <link rel="modulepreload" href="{{ url('https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/_commonjsHelpers-BosuxZz1.js') }}" />
    <link rel="modulepreload" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/jquery-Czc5UB_B.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/popper-DNZnuk_L.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/bootstrap-B-W6M1Y3.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/perfect-scrollbar-CLUWhEAQ.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/hammer-DbFOON0O.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/typeahead-BKwBoP4T.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/menu-DAPneovL.js" />
    <script type="module" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/jquery-CbdDuLi-.js"></script>
    <script type="module" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/popper-DNZnuk_L.js"></script>
    <script type="module" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/bootstrap-B-W6M1Y3.js"></script>
    <script type="module" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/perfect-scrollbar-CLUWhEAQ.js"></script>
    <script type="module" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/hammer-DbFOON0O.js"></script>
    <script type="module" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/typeahead-BKwBoP4T.js"></script>
    <script type="module" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/menu-DAPneovL.js"></script>
    <link rel="modulepreload" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/moment-B6sIOK86.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/_commonjsHelpers-BosuxZz1.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/_commonjs-dynamic-modules-TDtrdbi3.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/datatables-bootstrap5-APQrx3vs.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/jquery-CED9k22g.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/jquery-Czc5UB_B.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/select2-Cf8QheUJ.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/popular-DxzY11pE.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/bootstrap5-DjMKukTX.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/index-D_6hAncj.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/auto-focus-BizrJr_R.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/cleave-C6wy96Im.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/cleave-phone-DRZWSJE_.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/sweetalert2-DgJszxfi.js" />
    <script type="module" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/moment-B6sIOK86.js"></script>
    <script type="module" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/datatables-bootstrap5-APQrx3vs.js"></script>
    <script type="module" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/select2-Cf8QheUJ.js"></script>
    <script type="module" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/popular-DxzY11pE.js"></script>
    <script type="module" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/bootstrap5-DjMKukTX.js"></script>
    <script type="module" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/auto-focus-BizrJr_R.js"></script>
    <script type="module" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/cleave-C6wy96Im.js"></script>
    <script type="module" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/cleave-phone-DRZWSJE_.js"></script>
    <script type="module" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/sweetalert2-DgJszxfi.js"></script><!-- END: Page Vendor JS-->
    <!-- BEGIN: Theme JS-->
    <link rel="modulepreload" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/main-Cg7dUg9J.js" />
    <script type="module" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/main-Cg7dUg9J.js"></script>
    <!-- END: Theme JS-->
    <!-- Pricing Modal JS-->
    <!-- END: Pricing Modal JS-->
    <!-- BEGIN: Page JS-->
    <link rel="modulepreload" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/laravel-user-management-DOpDMiy3.js" />
    <script type="module" src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/laravel-user-management-DOpDMiy3.js"></script><!-- END: Page JS-->

</body>

</html>