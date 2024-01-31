<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Jewellery eCommerce </title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

   @vite(['resources/assets/user/css/bootstrap.min.css',
                'resources/assets/user/css/font-awesome.min.css',
                'resources/assets/user/css/fontawesome-stars.css',
                'resources/assets/user/css/ionicons.min.css',
                'resources/assets/user/css/slick.min.css',
                'resources/assets/user/css/animate.min.css',
                'resources/assets/user/css/jquery-ui.min.css',
                'resources/assets/user/css/nice-select.min.css',
                'resources/assets/user/css/timecircles.min.css',
                'resources/assets/user/css/style.css'])
</head>

<body class="template-color-3">

    <div class="main-wrapper">

       @include('user.layouts.header')

        @yield('content')

        @include('user.layouts.footer')
        @include('user.layouts.modal')

    </div>

  @vite(['resources/assets/user/js/vendor/jquery-3.6.0.min.js',
    'resources/assets/user/js/vendor/jquery-migrate-3.3.2.min.js',
    'resources/assets/user/js/vendor/modernizr-3.11.2.min.js',
    'resources/assets/user/js/vendor/bootstrap.bundle.min.js',
    'resources/assets/user/js/plugins/slick.min.js',
    'resources/assets/user/js/plugins/countdown.min.js',
    'resources/assets/user/js/plugins/jquery.barrating.min.js',
    'resources/assets/user/js/plugins/jquery.counterup.min.js',
    'resources/assets/user/js/plugins/waypoints.min.js',
    'resources/assets/user/js/plugins/jquery.nice-select.min.js',
    'resources/assets/user/js/plugins/jquery.sticky-sidebar.js',
    'resources/assets/user/js/plugins/jquery-ui.min.js',
    'resources/assets/user/js/plugins/scroll-top.min.js',
    'resources/assets/user/js/plugins/theia-sticky-sidebar.min.js',
    'resources/assets/user/js/plugins/jquery.elevateZoom-3.0.8.min.js',
    'resources/assets/user/js/plugins/timecircles.min.js',
    'resources/assets/user/js/plugins/mailchimp-ajax.js',
    ])

</body>
</html>