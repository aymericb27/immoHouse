<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImmoController;
use App\Http\Controllers\LogoutController;
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
})->name('home');



Route::get('publishSuccessful/{idProperty}', function($idProperty){
    return view('welcome',['idProperty' => $idProperty, 'message' => 'publishSuccessful']);
});
Route::get('/deleteProperty/{n}',[ImmoController::class,'deleteProperty']);
Route::get('/publish',[ImmoController::class,'getPublishForm']);
Route::post('/publish',[ImmoController::class,'publish']);
Route::get('/getMyListingProperties',[ImmoController::class,'getMyListingProperties']);
Route::get('/getProperty/{n}', [App\Http\Controllers\ImmoController::class,'getProperty']);

Route::post('/postPayment',[App\Http\Controllers\PaymentController::class,'postPayment']);
Route::get('/paymentSuccess',[App\Http\Controllers\PaymentController::class,'paymentSuccess']);
Route::get('/paymentCancel',[App\Http\Controllers\PaymentController::class,'paymentCancel']);

Auth::routes();
Route::get('/logout', [LogoutController::class,'perform'])->name('logout.perform');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/language/{lang}', function($lang){
    App::setlocale($lang);
    session()->put('locale', $lang);
    return redirect()->back();
});
