<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

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
});