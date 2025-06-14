<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImmoController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Auth\LoginController;
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

/** GET Route **/

Auth::routes();

Route::get('/', [ImmoController::class,'home'])->name('home');

Route::get('publishSuccessful/{idProperty}', function($idProperty){
    return view('welcome',['idProperty' => $idProperty, 'message' => 'publishSuccessful']);
});

Route::get('/deleteProperty/{n}',[ImmoController::class,'deleteProperty']);

Route::get('/getMyListingProperties',[ImmoController::class,'getMyListingProperties']);

Route::get('/getProperty/{n}', [ImmoController::class,'getProperty']);

Route::get('/getListProperty', [ImmoController::class, 'researchInList']);

Route::get('/home', [ImmoController::class,'home']);

Route::get('/isUserConnected',[LoginController::class, 'isUserConnected']);

Route::get('/language/{lang}', function($lang){
    App::setlocale($lang);
    session()->put('locale', $lang);
    return redirect()->back();
});

Route::get('logout', [LoginController::class, 'logout']);

Route::get('/logout', [LogoutController::class,'perform'])->name('logout.perform');

Route::get('/toggleFavoris', [ImmoController::class,'toggleFavoris']);

Route::get('/moreFilter', [ImmoController::class,'addMoreFilter']);

Route::get('/paymentSuccess',[App\Http\Controllers\PaymentController::class,'paymentSuccess']);

Route::get('/paymentCancel',[App\Http\Controllers\PaymentController::class,'paymentCancel']);

Route::get('/publish',[ImmoController::class,'getPublishForm']);

Route::get('/research',[ImmoController::class,'loadResearch']);

Route::get('/saveRouteForLogin', [LoginController::class, 'saveRouteForLogin']);

Route::get('/sign-in/google',[LoginController::class, 'google']);

Route::get('sign-in/facebook', [LoginController::class, 'facebook']);

Route::get('/sign-in/google/redirect',[LoginController::class, 'googleRedirect']);

Route::get('/sign-in/facebook/redirect',[LoginController::class, 'facebookRedirect']);


/** POST Route**/


Route::post('/addMoreFilter',[ImmoController::class,'addMoreFilter']);

Route::post('/getNumberPropertiesMoreFilter',[ImmoController::class,'getNumberPropertiesMoreFilter']);

Route::post('/postPayment',[App\Http\Controllers\PaymentController::class,'postPayment']);

Route::post('/publish',[ImmoController::class,'publish']);

Route::post('/researchByMoreFilter',[ImmoController::class,'researchByMoreFilter']);

Route::post('/researchInList',[ImmoController::class,'researchInList']);