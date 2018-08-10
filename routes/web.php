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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'PagesController@root')->name('root');

//默认生成的，等价于下面的路由
//Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//resource 等同于下面三个路由,是 隐性路由模型绑定
//路由声明时必须使用 Eloquent 模型的单数小写格式来作为 路由片段参数,User 对应 {user}
//控制器方法传参中必须包含对应的 Eloquent 模型类型 提示，并且是有序的
//当请求 http://larabbs.test/users/1 并且满足以上两个条件时，Laravel 将会自动查找 ID 为 1 的用户并赋值到变量 $user 中
Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);
//Route::get('/users/{user}', 'UsersController@show')->name('users.show');
//Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
//Route::patch('/users/{user}', 'UsersController@update')->name('users.update');
Route::resource('topics', 'TopicsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);


Route::resource('categories', 'CategoriesController', ['only' => ['show']]);

//上传图片
Route::post('upload_image', 'TopicsController@uploadImage')->name('topics.upload_image');