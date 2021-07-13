<?php

use GuzzleHttp\Middleware;
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
Route::get('/', 'Frontend\HomeController@index')->name('frontend.home');

Route::get('/show/{id}', 'Frontend\HomeController@show')->name('frontend.home.product-detail');

Route::get('search/name', 'Frontend\HomeController@getSearchAjax')->name('search');

Route::get('products/view-all', 'Frontend\ProductController@index')->name('frontend.product.viewAll');

Route::get('products/filter-products', 'Frontend\ProductController@filterProduct')->name('frontend.product.filter');


Route::get('products/cart/list', 'Frontend\CartController@index')->name('frontend.cart.index');

Route::get('products/cart/add/{id}', 'Frontend\CartController@add')->name('frontend.cart.add');

Route::get('products/cart/delete/{id}', 'Frontend\CartController@remove')->name('frontend.cart.remove');

Route::get('products/cart/increase/{id}', 'Frontend\CartController@increase')->name('frontend.cart.increase');

Route::get('products/cart/decrease/{id}', 'Frontend\CartController@decrease')->name('frontend.cart.decrease');


Route::post('order/store', 'Frontend\OrderController@store')->name('frontend.order.store');





Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login.form');

Route::post('/login', 'Auth\LoginController@login')->name('login.store');

Route::get('/logout', 'Auth\LogoutController@logout')->name('logout')->middleware('auth');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register.form');

Route::post('/register', 'Auth\RegisterController@register')->name('register.post');



Route::group([
    'namespace' => 'Backend',
    'prefix' => 'admin',
    'middleware' => ['auth', 'check_admin', 'preventBackHistory'],
], function (){
    // DashBoard

    Route::get('/', 'DashboardController@index')->name('backend.dashboard');

    // products

    Route::prefix('products')->group(function () {
        Route::get('/show', 'ProductController@index')->name('backend.products.index');
        Route::get('/create', 'ProductController@create')->name('backend.products.create');
        Route::get('/edit/{product}', 'ProductController@edit')->name('backend.products.edit');
        Route::post('/create', 'ProductController@store')->name('backend.products.store');
        Route::post('/update/{id}', 'ProductController@update')->name('backend.products.update');
        Route::get('/delete/{id}', 'ProductController@destroy')->name('backend.products.delete');
    });


    //category
    Route::prefix('categoies')->group(function(){

        Route::get('/show', 'CategoryController@index')->name('backend.category.index');
        Route::get('/create', 'CategoryController@create')->name('backend.category.create');
        Route::post('/store', 'CategoryController@store')->name('backend.category.store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('backend.category.edit');
        Route::post('/update/{id}', 'CategoryController@update')->name('backend.category.update');
        Route::get('/delete/{id}', 'CategoryController@destroy')->name('backend.category.delete');
    });    
    //Users
    Route::prefix('users')->group(function(){
        Route::get('/show', 'UserController@index')->name('backend.user.index');
        Route::get('/create', 'UserController@create')->name('backend.user.create');
        Route::post('/store', 'UserController@store')->name('backend.user.store');
        Route::get('/edit/{id}', 'UserController@edit')->name('backend.user.edit');
        Route::post('/update/{id}', 'UserController@update')->name('backend.user.update');
        Route::get('/delete/{id}', 'UserController@destroy')->name('backend.user.delete');




    });  

    //Orders
    Route::prefix('orders')->group(function(){
        Route::get('/show', 'OrderController@index')->name('backend.order.index');
        Route::get('/edit/{id}', 'OrderController@edit')->name('backend.order.edit');
        Route::get('/update-confirm/{id}', 'OrderController@updateStatusConfirm')->name('backend.order.update-confirm');
        Route::get('/update-transport/{id}', 'OrderController@updateStatusTranSport')->name('backend.order.update-transport');
        Route::get('/update-cancer/{id}', 'OrderController@updateStatusCancer')->name('backend.order.update-cancer');


    });
      //Brands
    Route::prefix('brands')->group(function(){
        Route::get('/', 'BrandController@index')->name('backend.brands.index');
        Route::get('/create', 'BrandController@create')->name('backend.brands.create');
        Route::get('/delete/{id}', 'BrandController@destroy')->name('backend.brands.delete');
        Route::get('/edit/{slug}', 'BrandController@edit')->name('backend.brands.edit');
        Route::post('/store', 'BrandController@store')->name('backend.brands.store');
        Route::post('/update/{slug}', 'BrandController@update')->name('backend.brands.update');

    });

        


        Route::get('/images/{id}', 'ProductController@showImages')->name('backend.products.showImagesByProductID');
        Route::get('/showProductsByCategoryID/{id}', 'CategoryController@showProducts')->name('backend.products.showProductsByCategoryID');
        Route::get('/showProductsByUserID/{id}', 'ProductController@showProducts')->name('backend.products.showProductsByUserID');
        Route::get('/showProductsByOrderID/{id}', 'OrderController@showProducts')->name('backend.products.showProductsByOrderID');

});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
