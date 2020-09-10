<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// Route::group(['middleware' => 'auth:sanctum'], function () {
//     /* index method*/
//     Route::get('/products',[ProductController::class,'index'])->middleware('auth:sanctum')->name('products.index');
//    /* create method*/
//     // Route::view('/products/create', 'product/create');
//      /* show method*/
//     Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
//      /* store method*/
//     Route::get('/products/{product}',[ProductController::class,'show'])->middleware('auth:sanctum')->name('products.show');

//     Route::post('/products',[ProductController::class,'store'])->middleware('auth:sanctum')->name('products.store');
//     /* edit method*/
//     Route::get('/products/{product}/edit',[ProductController::class,'edit'])->middleware('auth:sanctum')->name('products.edit');
//     /* update method*/
//     Route::put('/products/{product}',[ProductController::class,'update'])->middleware('auth:sanctum')->name('products.update');
//     /* destroy method*/
//     Route::delete('/products/{product}',[ProductController::class,'destroy'])->middleware('auth:sanctum')->name('products.destroy');
    
// });    
Route::group(['middleware' => 'auth:sanctum','namespace'=>'App\Http\Controllers'], function () {
    /* index method*/
    Route::get('/products','ProductController@index')->middleware('auth:sanctum')->name('products.index');
   /* create method*/ 
    Route::get('/products/create','ProductController@create')->name('products.create');
    /* show method*/
    Route::get('/products/{product}','ProductController@show')->middleware('auth:sanctum')->name('products.show');
    /* store method*/
    Route::post('/products','ProductController@store')->middleware('auth:sanctum')->name('products.store');
    /* edit method*/
    Route::get('/products/{product}/edit','ProductController@edit')->middleware('auth:sanctum')->name('products.edit');
    /* update method*/
    Route::put('/products/{product}','ProductController@update')->middleware('auth:sanctum')->name('products.update');
    /* destroy method*/
    Route::delete('/products/{product}','ProductController@destroy')->middleware('auth:sanctum')->name('products.destroy');
    
});    
