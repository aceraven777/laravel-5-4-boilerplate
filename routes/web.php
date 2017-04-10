<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('user-only', 'UserOnlyController@index');
});

Route::group(['prefix' => 'backend'], function () {
    // Authentication Routes...
    $this->get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    $this->post('login', 'Admin\Auth\LoginController@login');
    $this->post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');

    // Registration Routes...
    $this->get('register', 'Admin\Auth\RegisterController@showRegistrationForm')->name('admin.register');
    $this->post('register', 'Admin\Auth\RegisterController@register');

    // Password Reset Routes...
    $this->get('password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    $this->post('password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    $this->get('password/reset/{token?}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
    $this->post('password/reset', 'Admin\Auth\ResetPasswordController@reset');
    
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/', 'Admin\DashboardController@index');
    });
});
