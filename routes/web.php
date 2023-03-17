<?php

use App\Http\Controllers\Admin\ChangePasswordController;
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
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
    Route::resource('permissions', 'App\Http\Controllers\Admin\PermissionsController');
    Route::delete('permissions_mass_destroy', 'App\Http\Controllers\Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');
    Route::resource('roles', 'App\Http\Controllers\Admin\RolesController');
    Route::delete('roles_mass_destroy', 'App\Http\Controllers\Admin\RolesController@massDestroy')->name('roles.mass_destroy');
    Route::resource('users', 'App\Http\Controllers\Admin\UsersController');
    Route::delete('users_mass_destroy', 'App\Http\Controllers\Admin\UsersController@massDestroy')->name('users.mass_destroy');
});
