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

Route::group(['prefix' => 'superadmin'], function () {
  Route::get('/login', 'SuperadminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'SuperadminAuth\LoginController@login');
  Route::post('/logout', 'SuperadminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'SuperadminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'SuperadminAuth\RegisterController@register');

  Route::post('/password/email', 'SuperadminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'SuperadminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'SuperadminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'SuperadminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'tutor'], function () {
  Route::get('/login', 'TutorAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'TutorAuth\LoginController@login');
  Route::post('/logout', 'TutorAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'TutorAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'TutorAuth\RegisterController@register');

  Route::post('/password/email', 'TutorAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'TutorAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'TutorAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'TutorAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'student'], function () {
  Route::get('/login', 'StudentAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'StudentAuth\LoginController@login');
  Route::post('/logout', 'StudentAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'StudentAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'StudentAuth\RegisterController@register');

  Route::post('/password/email', 'StudentAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'StudentAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'StudentAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'StudentAuth\ResetPasswordController@showResetForm');
});
