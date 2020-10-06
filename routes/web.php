<?php

use App\Http\Controllers\Client\Product\ProductController;
use App\Models\Product;
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



Route::group(['namespace' => 'Client'], function () {
    Route::group(['prefix' => 'home', 'namespace' => 'Home'], function () {
        Route::get('/', 'HomeController@index')->name('home.index');
        Route::get('about', 'HomeController@about')->name('home.about');
        Route::get('contact', 'HomeController@contact')->name('home.contact');
        Route::post('subscribe', 'HomeController@subscribe')->name('home.subscribe');
    });

    Route::group(['prefix' => 'products', 'namespace' => 'Product'], function () {
        Route::get('shop', 'ProductController@shop')->name('products.shop');
        Route::get('filter','ProductController@filter')->name('products.filter');
        Route::get('{slugproduct}.html','ProductController@detail')->name('products.detail');
    });
    Route::group(['prefix' => 'carts', 'namespace' => 'Cart'], function () {
        Route::get('/', 'CartController@cart')->name('carts.cart');
        Route::get('addCart','CartController@addCart')->name('carts.addCart');
        Route::get('update/{rowId}/{qty}','CartController@updateCart')->name('carts.updateCart');
        Route::get('delete/{rowId}','CartController@deleteCart')->name('carts.deleteCart');
        Route::get('checkout', 'CartController@checkout')->name('carts.checkout');
        Route::post('checkout','CartController@store')->name('carts.store');
        Route::get('complete/{id}', 'CartController@complete')->name('carts.complete');
    });
});

Route::group(['namespace' => 'Admin\Auth'], function () {
    Route::get('register','LoginController@create')->name('register');
    Route::post('store','LoginController@store')->name('store');
    Route::get('login', 'LoginController@login')->name('login')->middleware('CheckLogout');
    Route::post('login', 'LoginController@postlogin')->name('postlogin');
});


Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => 'CheckLogin'
], function () {
    Route::get('/', 'HomeController@index')->name('admin/index');
    Route::get('logout','HomeController@logout')->name('logout');

    Route::group(['prefix' => 'categories', 'namespace' => 'Category'], function () {
        Route::get('/', 'CategoryController@index')->name('admin.categories.index');
        Route::post('store', 'CategoryController@store')->name('admin.categories.store');
        Route::get('edit/{id}', 'CategoryController@edit')->name('admin.categories.edit');
        Route::post('update/{id}', 'CategoryController@update')->name('admin.categories.update');
        Route::get('delete/{id}', 'CategoryController@delete')->name('admin.categories.delete');
    });

    Route::group(['prefix' => 'products', 'namespace' => 'Product'], function () {
        Route::get('/', 'ProductController@index')->name('admin.products.index');
        Route::get('create', 'ProductController@create')->name('admin.products.create');
        Route::post('store', 'ProductController@store')->name('admin.products.store');
        Route::get('edit/{id}', 'ProductController@edit')->name('admin.products.edit');
        Route::post('update/{id}', 'ProductController@update')->name('admin.products.update');
        Route::get('delete/{id}', 'ProductController@delete')->name('admin.products.delete');
    });

    Route::group(['prefix' => 'orders', 'namespace' => 'Order'], function () {
        Route::get('/', 'OrderController@order')->name('admin.orders.order');
        Route::get('detail/{id}', 'OrderController@detail')->name('admin.orders.detail');
        Route::get('approve/{id}','OrderController@approve')->name('admin.orders.approve');
        Route::get('process', 'OrderController@process')->name('admin.orders.process');
    });

    Route::group(['prefix' => 'users', 'namespace' => 'User'], function () {
        Route::get('/', 'UserController@index')->name('admin.users.index');
        Route::get('create', 'UserController@create')->name('admin.users.create');
        Route::post('store', 'UserController@store')->name('admin.users.store');
        Route::get('edit/{id}', 'UserController@edit')->name('admin.users.edit');
        Route::post('update/{id}', 'UserController@update')->name('admin.users.update');
        Route::get('delete/{id}', 'UserController@delete')->name('admin.users.delete');
    });

    Route::group(['prefix' => 'roles','namespace' => 'Role'], function () {
        Route::get('/', 'RoleController@index')->name('admin.roles.index');
        Route::get('create', 'RoleController@create')->name('admin.roles.create');
        Route::post('store', 'RoleController@store')->name('admin.roles.store');
        Route::get('edit/{id}', 'RoleController@edit')->name('admin.roles.edit');
        Route::post('update/{id}', 'RoleController@update')->name('admin.roles.update');
        Route::get('delete/{id}', 'RoleController@deleteRole')->name('admin.roles.delete');

    });
    Route::group(['prefix' => 'permissions', 'namespace' => 'Permission'], function () {
        Route::get('/','PermissionController@index')->name('admin.permissions.index');
        Route::get('create', 'PermissionController@create')->name('admin.permissions.create');
        Route::post('store', 'PermissionController@store')->name('admin.permissions.store');
        Route::get('edit/{id}', 'PermissionController@edit')->name('admin.permissions.edit');
        Route::post('update/{id}', 'PermissionController@update')->name('admin.permissions.update');
        Route::get('delete/{id}', 'PermissionController@deleteRole')->name('admin.permissions.delete');

    });
});



