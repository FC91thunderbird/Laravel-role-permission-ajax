<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\subCategoryController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('user.pages.home');
// });

Auth::routes();

Route::group(['prefix'=> '/'], function(){
    Route::get('/', [HomeController::class,'index']);
    Route::get('/subcategory/{id}', [HomeController::class, 'subcategory']);
    Route::get('/products/{subcat}', [HomeController::class, 'SubcategoryWiseproducts']);
    Route::get('single_product/{product}', [HomeController::class,'singleProduct']);
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/admin', [HomeController::class, 'admin'])->name('admin.home');
// Route::get('/manager', [HomeController::class, 'manager'])->name('manager.home');
// Route::get('/user', [HomeController::class, 'user'])->name('user.home');

// Route::resource('/users',UsersController::class);

Route::group(['prefix'=> '/admin', 'middleware'=> 'auth'], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/dashboard', [UsersController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/manager', [UsersController::class, 'managerDashboard'])->name('manager.dashboard');
    Route::get('/user', [UsersController::class, 'managerDashboard'])->name('user.dashboard');
    
    Route::resource('/users',UsersController::class);
    Route::resource('/roles', RolesController::class);
    Route::resource('/permissions', PermissionController::class);
    Route::post('/setting', [UsersController::class,'setting'])->name('setting.update');

    Route::get('/setting', function(){
        return view('admin.pages.users.setting');
    })->name('user.setting');

    Route::resource('/category', CategoryController::class);
    Route::resource('/subcategory', subCategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::get('/get-subcategories/{category}', [ProductController::class, 'getSubcategories']);

    Route::resource('/banner', BannerController::class);
});