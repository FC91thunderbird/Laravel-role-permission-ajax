<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Analytics | Vuexy - Bootstrap Admin Template</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://demos.pixinvent.com/vuexy-html-admin-template/assets/img/favicon/favicon.ico" />

    @vite(['resources/assets/admin/vendor/fonts/tabler-icons.css',
    'resources/assets/admin/vendor/css/rtl/core.css" class="template-customizer-core-css',
    'resources/assets/admin/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css',
    'resources/assets/admin/css/demo.css',
    'resources/assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.css',
    'resources/assets/admin/vendor/js/helpers.js',
    'resources/assets/admin/vendor/js/template-customizer.js',
    'resources/assets/admin/js/config.js','resources/assets/admin/vendor/libs/toastr/toastr.css','resources/assets/admin/js/app.js'])

</head>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">

            <!-- Menu -->
            @include('admin.layouts.sidebar')
            <!-- / Menu -->



            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->
               @include('admin.layouts.topbar')

                <!-- / Navbar -->



                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <div class="container-xxl flex-grow-1 container-p-y">

                        <div class="row">
                            
                        @yield('content')
                           

                        </div>
                    </div>
                    <!-- / Content -->




                    <!-- Footer -->
                  @include('admin.layouts.footer')
                    <!-- / Footer -->


                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>





    </div>
    <!-- / Layout wrapper -->


  

    @vite(['resources/assets/admin/vendor/libs/jquery/jquery.js',
 'resources/assets/admin/vendor/libs/popper/popper.js',
 'resources/assets/admin/vendor/js/bootstrap.js',
 'resources/assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js',
  'resources/assets/admin/vendor/js/menu.js',
 'resources/assets/admin/js/main.js',
 'resources/assets/admin/vendor/libs/toastr/toastr.js'])
</body>

</html>