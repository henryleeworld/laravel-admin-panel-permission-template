<?php

use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
Route::redirect('/', '/login');
Auth::routes();
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('permissions', PermissionsController::class);
    Route::delete('permissions_mass_destroy', [PermissionsController::class, 'massDestroy'])->name('permissions.mass_destroy');
    Route::resource('roles', RolesController::class);
    Route::delete('roles_mass_destroy', [RolesController::class, 'massDestroy'])->name('roles.mass_destroy');
    Route::resource('users', UsersController::class);
    Route::delete('users_mass_destroy', [UsersController::class, 'massDestroy'])->name('users.mass_destroy');
});
