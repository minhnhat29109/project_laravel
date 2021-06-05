<?php

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

// Route::get('/', function () {
//     return view('backend.Dashboard');
// });
Route::get('/', 'Frontend\HomeController@index')->name('backend.dashboard');


Route::group([
    'namespace' => 'Backend',
    'prefix' => 'admin'
], function (){

    // DashBoard

    Route::get('/', 'DashboardController@index')->name('backend.dashboard');

    // products

    Route::prefix('products')->group(function () {
        Route::get('/', 'ProductController@index')->name('backend.products.index');

        Route::get('/create', 'ProductController@create')->name('backend.products.create');

        Route::get('/images/{id}', 'ProductController@showImages')->name('backend.products.showImagesByProductID');

        Route::get('/showProductsByCategoryID/{id}', 'CategoryController@showProducts')->name('backend.products.showProductsByCategoryID');

        Route::get('/showProductsByUserID/{id}', 'ProductController@showProducts')->name('backend.products.showProductsByUserID');

        Route::get('/showProductsByOrderID/{id}', 'OrderController@showProducts')->name('backend.products.showProductsByOrderID');




    });

    //

    // Users

    Route::prefix('users')->group(function () {
        Route::get('/', 'UserController@index')->name('backend.users.index');

        Route::get('/create', 'UserController@create')->name('backend.users.create');
    });

    

});