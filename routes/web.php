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
    return view('admin.login');
});
Route::get('/welcome/{name}', function ($name) {
    return ("User! ".$name);
});

// Admin Route
Route::get('/admin', 'AdminController@login');

Route::match(['get','post'], '/admin','AdminController@login');


Auth::routes();

Route::get('/logout', 'AdminController@logout');
Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => ['auth']],function(){
	// Admin Route
Route::get('/admin/dashboard', 'AdminController@dashboard');
Route::get('/admin/settings', 'AdminController@settings');
Route::get('/admin/check-pwd','AdminController@chkPassword');
Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');

// Category Route
Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');
Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editCategory');
Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@deleteCategory');
Route::match(['get','post'],'/admin/view-categories','CategoryController@viewCategories');

// Product Route
Route::match(['get','post'],'/admin/add-product','ProductsController@addProduct');
Route::match(['get','post'],'/admin/edit-product/{id}','ProductsController@editProduct');
Route::get('/admin/view-products','ProductsController@viewProducts');
Route::get('/admin/delete-product/{$id}','ProductsController@deleteProduct');
Route::get('/admin/delete-product-image/{id}','ProductsController@deleteProductImage');
Route::match(['get','post'],'admin/add-attributes/{id}','ProductsController@addAttributes');
Route::match(['get','post'],'/admin/delete-attribute/{id}','ProductsController@deleteattribute');
});

Route::get('/home', 'HomeController@index')->name('home');
