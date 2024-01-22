import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/admin/assets/vendor/fonts/tabler-icons.css',
                'resources/admin/assets/vendor/css/rtl/core.css" class="template-customizer-core-css',
                'resources/admin/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css',
                'resources/admin/assets/css/demo.css',
                'resources/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css',
                'resources/admin/assets/vendor/css/pages/page-auth.css',

                'resources/admin/assets/vendor/libs/toastr/toastr.css',
                'resources/admin/assets/vendor/js/helpers.js',
                'resources/admin/assets/vendor/js/template-customizer.js',
                'resources/admin/assets/js/config.js',
  


 'resources/admin/assets/vendor/libs/jquery/jquery.js',
 'resources/admin/assets/vendor/libs/popper/popper.js',
 'resources/admin/assets/vendor/js/bootstrap.js',
 'resources/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js',
  'resources/admin/assets/vendor/js/menu.js',
 'resources/admin/assets/js/main.js',
 'resources/admin/assets/vendor/libs/toastr/toastr.js',
            ],
            refresh: true,
        }),
    ],
});
