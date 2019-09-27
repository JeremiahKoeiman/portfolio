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

use Illuminate\Support\Facades\Route;

//use Illuminate\Routing\Route;

Route::get('laravel60/public/products/{product}/delete', 'ProductsController@delete')->name('products.delete');
Route::resource('/products', 'ProductsController');

Route::group(['middleware'=>['role:owner|customer|moderator']], function (){
    Route::get('laravel60/public/reviews/{review}/delete', 'ReviewsController@delete')
        ->name('reviews.delete');
    Route::resource('/reviews', 'ReviewsController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
