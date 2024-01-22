<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Analytics | Vuexy - Bootstrap Admin Template</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://demos.pixinvent.com/vuexy-html-admin-template/assets/img/favicon/favicon.ico" />

    @vite(['resources/admin/assets/vendor/fonts/tabler-icons.css','resources/admin/assets/vendor/css/rtl/core.css" class="template-customizer-core-css',
                'resources/admin/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css',
                'resources/admin/assets/css/demo.css',
                'resources/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css',
                'resources/admin/assets/vendor/js/helpers.js',
                'resources/admin/assets/vendor/js/template-customizer.js',
                'resources/admin/assets/js/config.js','resources/admin/assets/vendor/libs/toastr/toastr.css',])

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


  

    @vite(['resources/admin/assets/vendor/libs/jquery/jquery.js',
 'resources/admin/assets/vendor/libs/popper/popper.js',
 'resources/admin/assets/vendor/js/bootstrap.js',
 'resources/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js',
  'resources/admin/assets/vendor/js/menu.js',
 'resources/admin/assets/js/main.js',
 'resources/admin/assets/vendor/libs/toastr/toastr.js'])

</body>

</html>