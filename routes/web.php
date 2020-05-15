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

Route::get('/','PublicController@index')->name('index');
Route::get('post/{post}','PublicController@singlePost')->name('singlePost');
Route::get('about','PublicController@about')->name('about');
Route::get('contact','PublicController@contact')->name('contact');
Route::post('contact','PublicController@contactPost')->name('contactPost');

Auth::routes();
Route::get('dashboard', 'HomeController@index')->name('dashboard');

Route::prefix('user')->group(function(){
	Route::get('dashboard','UserController@dashboard')->name('userDashboard');
	Route::get('comments','UserController@comments')->name('userComments');
	Route::get('profile','UserController@profile')->name('userProfile');
	Route::post('profile','UserController@profilePost')->name('userprofilePost');
});

Route::prefix('author')->group(function(){
	Route::get('dashboard','AuthorController@dashboard')->name('authorDashboard');
	Route::get('posts','AuthorController@posts')->name('authorPosts');
	Route::get('comments','AuthorController@comments')->name('authorComments');
});

Route::prefix('admin')->group(function(){
	Route::get('dashboard','AdminController@dashboard')->name('adminDashboard');
	Route::get('posts','UserController@posts')->name('adminPosts');
	Route::get('comments','UserController@comments')->name('adminComments');
	Route::get('users','UserController@user')->name('adminUsers');
});