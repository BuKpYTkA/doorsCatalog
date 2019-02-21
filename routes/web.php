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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('lol', 'SiteController@getDescription')->name('userSearchForm');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin-panel')->group(function () {
        Route::prefix('main_products')->group(function () {
            Route::get('/', 'Admin\Views\AdminMainProductsView')->name('admin.show.main.products');
            Route::match(['get', 'post'],'edit/{id}', 'Admin\EditMainProduct\view\AdminEditMainProductView')->name('admin.edit.main.product.view');
        });
    });
});

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
