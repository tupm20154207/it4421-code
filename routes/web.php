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

// Các route của người dùng
Route::get('/', 'CustomerController@index');
Route::get('/menu', 'CustomerController@load_menu')->name('menu');
Route::get('/about', 'CustomerController@about')->name('about');
Route::get('/contact', 'CustomerController@contact')->name('contact');
Route::get('/history', 'CustomerController@history')->name('history');

Route::get('/menu/search', 'CustomerController@menu_search')->name('menu.search');
Route::get('/menu/{category}', 'CustomerController@menu_browse');
Route::post('/menu/like', 'CustomerController@item_like')->name('item.like');
Route::post('/menu/unlike', 'CustomerController@item_unlike')->name('item.unlike');
Route::post('/menu/show', 'CustomerController@item_show')->name('item.show');
Route::post('/menu/add', 'CustomerController@item_add')->name('item.add');
Route::post('/menu/cart', 'CustomerController@cart_show')->name('cart.show');
Route::post('/menu/cart/save', 'CustomerController@cart_save')->name('cart.save');

Route::post('/order', 'CustomerController@order')->name('cart.order');
Route::post('/order/cancel', 'CustomerController@order_cancel')->name('cart.order_cancel');
Route::post('/history', 'CustomerController@history_render')->name('history.order');

// Các route của admin

Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::post('/admin/delete', 'AdminController@user_delete')->name('admin.delete');
Route::post('/admin/lock', 'AdminController@user_lock')->name('admin.lock');
Route::post('/admin/unlock', 'AdminController@user_unlock')->name('admin.unlock');
Route::post('/admin/update_role', 'AdminController@user_updateRole')->name('admin.update_role');

// Các routes của người quản lý cửa hàng
Route::get('/manager', 'RestaurantManagerController@index')->name('restaurant_manager');

Route::get('/manager/category', 'RestaurantManagerController@category')->name('category');
Route::post('/manager/category/details', 'RestaurantManagerController@category_details')->name('category.details');
Route::post('/manager/category/add', 'RestaurantManagerController@category_add')->name('category.add');
Route::post('/manager/category/update', 'RestaurantManagerController@category_update')->name('category.update');
Route::post('/manager/category/delete', 'RestaurantManagerController@category_delete')->name('category.delete');

Route::get('/manager/product', 'RestaurantManagerController@product')->name('product');
Route::post('/manager/product/details', 'RestaurantManagerController@product_details')->name('product.details');
Route::post('/manager/product/add', 'RestaurantManagerController@product_add')->name('product.add');
Route::post('/manager/product/update', 'RestaurantManagerController@product_update')->name('product.update');
Route::post('/manager/product/delete', 'RestaurantManagerController@product_delete')->name('product.delete');

Route::get('/manager/sale', 'RestaurantManagerController@sale')->name('sale');
Route::post('/manager/sale/order', 'RestaurantManagerController@order_details')->name('sale.details');

Route::get('/info', 'UserController@info')->name('info');
Route::post('/info/update', 'UserController@info_update')->name('info.update');

Route::get('/password', 'UserController@password')->name('password');
Route::post('/password/update_', 'UserController@password_update')->name('password.update_');


Route::get('/order_manager', 'OrderManagerController@index')->name('order_manager');
Route::get('/order_manager/load_table', 'OrderManagerController@load_table')->name('order_manager.load_table');
Route::post('/order_manager/details', 'OrderManagerController@details')->name('order_manager.details');
Route::post('/order_manager/cancel', 'OrderManagerController@cancel')->name('order_manager.cancel');
Route::post('/order_manager/finish', 'OrderManagerController@finish')->name('order_manager.finish');
Route::post('/order_manager/deliver', 'OrderManagerController@deliver')->name('order_manager.deliver');


Auth::routes();