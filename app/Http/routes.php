<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// if(Auth::guard('admin')->check()){
//   Route::get('/', function () {
//       return view('admin.index');
//   });
// }
// elseif(Auth::guard('user')->check()){
//   Route::get('/', function () {
//       return view('users.index');
//   });
// }
// else{
  Route::get('/', function () {
      return view('welcome');
  });
// }

//User routes below
Route::get('index', 'UserController@index');
Route::post('store', 'UserController@store');
Route::get('auth/login', 'AdminAuth\AdminAuthController@showLoginForm');
Route::post('auth/login', 'AdminAuth\AdminAuthController@login');

//Admin routes below
Route::get('admin/login', 'AdminAuth\AdminAuthController@showLoginForm');
Route::post('admin/login', 'AdminAuth\AdminAuthController@login');
Route::get('admin/register', 'AdminAuth\AdminAuthController@showRegistrationForm');
Route::post('admin/register', 'AdminAuth\AdminAuthController@register');

Route::group(['middleware'=>['admin']],function(){
  Route::get('admin/index', 'Admin\AdminController@index');
  Route::get('admin/logout', 'AdminAuth\AdminAuthController@logout');
});
