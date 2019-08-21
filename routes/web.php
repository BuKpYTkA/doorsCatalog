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

Route::get(md5('set_pagination_cookie').'/{val}', 'Admin\Cookie\PaginationController')->name('set.pag');

Route::get('/test', 'BaseController');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin-panel')->group(function () {
        Route::get('', 'Admin\AdminController')->name('admin');
        Route::prefix('main_products')->group(function () {
            Route::get('/', 'Admin\MainProduct\MainProducts')->name('admin.show.main.products');
            Route::match(['get', 'post'],'/axio', 'Admin\MainProduct\MainProductsAxio')->name('admin.show.main.products.axio');
            Route::get('filter', 'Admin\MainProduct\GetFiltered\GetFilteredMainProducts')->name('admin.show.filtered.main.products');
            Route::match(['get', 'post'],'delete', 'Admin\MainProduct\Delete\DeleteMainProduct')->name('admin.delete.main.product');
            Route::match(['get', 'post'],'create', 'Admin\MainProduct\Create\CreateMainProduct')->name('admin.create.main.product');
            Route::match(['get', 'post'],'edit/{id}', 'Admin\MainProduct\Edit\EditMainProduct')->name('admin.edit.main.product');
            Route::post('create_brand', 'Admin\Brand\Create\CreateBrand')->name('admin.create.brand');
        });
        Route::prefix('additional_products')->group(function () {
            Route::get('/', 'Admin\AdditionalProduct\AdditionalProducts')->name('admin.show.additional.products');
            Route::get('delete/{id}', 'Admin\AdditionalProduct\Delete\DeleteAdditionalProduct')->name('admin.delete.additional.product');
            Route::match(['get', 'post'],'create', 'Admin\AdditionalProduct\Create\CreateAdditionalProduct')->name('admin.create.additional.product');
            Route::match(['get', 'post'],'edit/{id}', 'Admin\AdditionalProduct\Edit\EditAdditionalProduct')->name('admin.edit.additional.product');
        });
    });
});

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
