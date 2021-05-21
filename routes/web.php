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

Route::get('/', function () {
    return view('welcome');
});

Route::get('publishSuccessful/{idProperty}', function($idProperty){
    return view('welcome',['idProperty' => $idProperty, 'message' => 'publishSuccessful']);
});

Route::get('/publish',[App\Http\Controllers\ImmoController::class,'publish']);
Route::post('/postInfoGeneral',[App\Http\Controllers\ImmoController::class,'postInfoGeneral']);
Route::post('/publishDetailed',[App\Http\Controllers\ImmoController::class,'publishDetailed']);
Route::get('/getMyListingProperties',[App\Http\Controllers\ImmoController::class,'getMyListingProperties']);
Route::get('/getProperty/{n}', [App\Http\Controllers\ImmoController::class,'getProperty']);

Route::post('/postPayment',[App\Http\Controllers\PaymentController::class,'postPayment']);
Route::get('/paymentSuccess',[App\Http\Controllers\PaymentController::class,'paymentSuccess']);
Route::get('/paymentCancel',[App\Http\Controllers\PaymentController::class,'paymentCancel']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
