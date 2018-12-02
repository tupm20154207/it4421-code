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

Route::get('/menu', 'CustomerController@load_menu')->name('menu');
Route::get('/menu/search', 'CustomerController@menu_search')->name('menu.search');
Route::get('/menu/categories/{category}', 'CustomerController@menu_browse');

Route::post('/menu/like', 'CustomerController@item_like')->name('item.like');
Route::post('/menu/unlike', 'CustomerController@item_unlike')->name('item.unlike');
Route::post('/menu/show', 'CustomerController@item_show')->name('item.show');
Route::post('/menu/add', 'CustomerController@item_add')->name('item.add');
Route::post('/menu/save', 'CustomerController@cart_save')->name('cart.save');



Route::get('/about', function () {
  return view('customer.about');
});

Route::get('/contact', function () {
  return view('customer.contact');
});

Route::get('/info', function () {
  return '';
});

Route::get('/admin', function () {
  return view('admin.admin');
});

Route::get('/order_manager', function () {
  return view('order_manager.order_manager');
});

Route::get('/restaurant_manager', function () {
  return view('restaurant_manager.sales');
});
Route::get('/restaurant_manager/categories', function () {
  return view('restaurant_manager.categories');
});
Route::get('/restaurant_manager/products', function () {
  return view('restaurant_manager.products');
});

Route::get('/menu/order', 'PagesController@order')->middleware('customer');

Auth::routes();