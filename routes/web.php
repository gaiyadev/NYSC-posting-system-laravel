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
//landing page
Route::get('/', 'LandingPageController@index')->name('welcome');
Route::post('checkList', 'LandingPageController@checkSenateList')->name('checkList');

//route for user authentication
Auth::routes();

//users dashboard
Route::get('/home', 'HomeController@index')->name('home');

//routes for admin
Route::get('admin/home', 'AdminController@index')->name('admin.h');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('Admin');
Route::POST('slogin', 'Admin\LoginController@login')->name('admin.login');

//done
Route::POST('admin-password/email', 'Admin\ResetPasswordController@sendRequestLinkEmail')->name('admin.password.email');


Route::get('admin-password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
//next
Route::POST('admin-password/reset', 'Admin\ResetPasswordController@reset')->name('admin.password.update');

Route::get('admin-password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
       

//admin route for PCM
Route::get('senate', 'AdminController@senateList')->name('senate.list');
Route::Post('senate/add', 'AdminController@senateListStore')->name('senate.add');
Route::get('senate/view', 'AdminController@senateViewList')->name('senate.view');
Route::get('update/{id}', 'AdminController@updateSenate');
Route::POST('/saveSanate/{id}', 'AdminController@saveSenate')->name('saveSenate');

Route::get('delete/{id}', 'AdminController@destroy' )->name('delete');




       //PCM dashboard routes
// Route::get('pcm/update', 'HomeController@updateProfile')->name('update');
Route::get('pcm/update/{id}', 'HomeController@updateProfile');
Route::POST('/saveProfile/{id}', 'HomeController@saveProfile')->name('saveProfile');
Route::get('pcm/greenCard', 'HomeController@greenCard')->name('greenCard');


//pcm change password
Route::post('pcm/changePass', 'PcmPasswordChangeController@changePassword')->name('passSave');

//admin change password
Route::get('changePass', 'AdminController@showChangePasswordForm')->name('changePass');
Route::post('admin/changePass', 'AdminChangePassword@changePassword')->name('adminSave');


//saving in the databsae
Route::POST('/save', 'HomeController@store')->name('store');

Route::get('/callUpLetter', 'CallUpLetterController@callUpLetter')->name('callUpLetter');


