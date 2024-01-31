<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login E-commerce</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://demos.pixinvent.com/vuexy-html-admin-template/assets/img/favicon/favicon.ico" />

    @vite(['resources/assets/admin/vendor/fonts/tabler-icons.css','resources/assets/admin/vendor/css/rtl/core.css" class="template-customizer-core-css',
    'resources/assets/admin/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css',
    'resources/assets/admin/css/demo.css',
    'resources/assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.css',
    'resources/assets/admin/vendor/js/helpers.js',
    'resources/assets/admin/vendor/js/template-customizer.js',
    'resources/assets/admin/js/config.js','resources/assets/admin/vendor/libs/toastr/toastr.css','resources/assets/admin/vendor/css/pages/page-auth.css',])

</head>
<body>

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">
                <!-- Login -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center mb-4 mt-2">
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo"></span>
                                <span class="app-brand-text demo text-body fw-bold ms-1">Ecommerce</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-1 pt-2">Welcome to Ecommerce</h4>
                        <p class="mb-4">Please sign-in to your account and start the adventure</p>

                        <form method="POST" action="{{ route('login') }}" class="mb-3" >
                        @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email or Username</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter your email or username" value="{{ old('email') }}" required autofocus >
                                @error('email')
                                <span class="text-danger" role="alert"> {{ $message }}</span>
                                @enderror
                              
                            </div>
                            <div class="mb-3 form-password-toggle">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" class="form-control @error('password) is-invalid @enderror" name="password" required />
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror                               
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                Remember Me
                                </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @vite(['resources/assets/admin/vendor/libs/jquery/jquery.js',
    'resources/assets/admin/vendor/libs/popper/popper.js',
    'resources/assets/admin/vendor/js/bootstrap.js',
    'resources/assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js',
    'resources/assets/admin/vendor/js/menu.js',
    'resources/assets/admin/js/main.js',
    'resources/assets/admin/vendor/libs/toastr/toastr.js'])

</body>

</html>