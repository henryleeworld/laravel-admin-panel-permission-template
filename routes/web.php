<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/admin/home');

Auth::routes(['register' => false]);

// Change Password Routes...
Route::get('change_password', 'App\Http\Controllers\Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'App\Http\Controllers\Auth\ChangePasswordController@changePassword')->name('auth.change_password');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
    Route::resource('permissions', 'App\Http\Controllers\Admin\PermissionsController');
    Route::delete('permissions_mass_destroy', 'App\Http\Controllers\Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');
    Route::resource('roles', 'App\Http\Controllers\Admin\RolesController');
    Route::delete('roles_mass_destroy', 'App\Http\Controllers\Admin\RolesController@massDestroy')->name('roles.mass_destroy');
    Route::resource('users', 'App\Http\Controllers\Admin\UsersController');
    Route::delete('users_mass_destroy', 'App\Http\Controllers\Admin\UsersController@massDestroy')->name('users.mass_destroy');
});
