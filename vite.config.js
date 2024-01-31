import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // user
                'resources/assets/user/css/bootstrap.min.css',
                'resources/assets/user/css/font-awesome.min.css',
                'resources/assets/user/css/fontawesome-stars.css',
                'resources/assets/user/css/ionicons.min.css',
                'resources/assets/user/css/slick.min.css',
                'resources/assets/user/css/animate.min.css',
                'resources/assets/user/css/jquery-ui.min.css',
                'resources/assets/user/css/nice-select.min.css',
                'resources/assets/user/css/timecircles.min.css',
                'resources/assets/user/css/style.css',

                'resources/assets/user/js/vendor/jquery-3.6.0.min.js',
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
                 


                // Admin
                'resources/assets/admin/vendor/fonts/tabler-icons.css',
                'resources/assets/admin/vendor/css/rtl/core.css" class="template-customizer-core-css',
                'resources/assets/admin/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css',
                'resources/assets/admin/css/demo.css',
                'resources/assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.css',
                'resources/assets/admin/vendor/css/pages/page-auth.css',

                'resources/assets/admin/vendor/libs/toastr/toastr.css',
                'resources/assets/admin/vendor/js/helpers.js',
                'resources/assets/admin/vendor/js/template-customizer.js',
                'resources/assets/admin/js/config.js',


                'resources/assets/admin/vendor/libs/jquery/jquery.js',
                'resources/assets/admin/vendor/libs/popper/popper.js',
                'resources/assets/admin/vendor/js/bootstrap.js',
                'resources/assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js',
                'resources/assets/admin/vendor/js/menu.js',
                'resources/assets/admin/js/main.js',
                'resources/assets/admin/vendor/libs/toastr/toastr.js',
                'resources/assets/admin/js/ui-toasts.js',
            ],
            refresh: true,
            debug: true,
        }),
    ],
});
