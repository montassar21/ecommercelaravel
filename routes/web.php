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

Route::get('/','App\Http\Controllers\GuestController@home');
Route::get('/shop','App\Http\Controllers\GuestController@shop');
Route::get('/product-details/{id}','App\Http\Controllers\GuestController@prodDet');
Route::get('/shop-categories/{id}','App\Http\Controllers\GuestController@shopCat');
Route::get('/contact','App\Http\Controllers\GuestController@contact');
Route::get('/modifyProfile','App\Http\Controllers\GuestController@profile')->middleware('auth');
Route::get('/profile','App\Http\Controllers\AdminController@profile')->middleware('auth','admin');;
Route::post('/modifyProfile','App\Http\Controllers\GuestController@modifyProfile')->middleware('auth','admin');


Route::get('/productSearch','App\Http\Controllers\GuestController@prodSearc');
Route::post('/cart/order','App\Http\Controllers\CartController@shopCart')->middleware('auth');
Route::get('/cart','App\Http\Controllers\ClientController@cart')->middleware('auth');
Route::get('/deleteproduct/{id}','App\Http\Controllers\ClientController@deleteProduct')->middleware('auth');
Route::post('/update','App\Http\Controllers\ClientController@updateCart')->middleware('auth');
Route::post('/receivedata','App\Http\Controllers\ClientController@getData')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/dashboard', 'App\Http\Controllers\AdminController@dashboard')->middleware('auth', 'admin');
Route::get('/client/dashboard','App\Http\Controllers\ClientController@dashboard' );
//CRUD CATEGORIES
Route::get('/admin/categories','App\Http\Controllers\CategoryController@ListeCategories' )->middleware('auth', 'admin');
Route::post('/admin/AddCategory','App\Http\Controllers\CategoryController@AddCategory' )->middleware('auth', 'admin');;
Route::post('/admin/modifyCategory','App\Http\Controllers\CategoryController@ModifyCategory' )->middleware('auth', 'admin');;
Route::get('/admin/supprimerCategory/{id}/delete','App\Http\Controllers\CategoryController@SupprimerCategory' )->middleware('auth', 'admin');;
//CRUD PRODUCTS
Route::get('/admin/Products','App\Http\Controllers\ProductController@ListeProducts' );
Route::post('/admin/AddProduct','App\Http\Controllers\ProductController@AddProduct' )->middleware('auth', 'admin');
Route::post('/admin/modifyProduct','App\Http\Controllers\ProductController@ModifyProduct' )->middleware('auth', 'admin');;
Route::get('/admin/supprimerProduct/{id}/delete','App\Http\Controllers\ProductController@SupprimerProduct' )->middleware('auth', 'admin');;
