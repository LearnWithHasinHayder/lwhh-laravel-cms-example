<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
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

Route::get( '/', function () {
    return view( 'welcome' );
} );

Auth::routes();

Route::get( '/home', 'HomeController@index' )->name( 'home' );
Route::get( '/shout', [HomeController::class,'shoutHome'])->name('shout');
Route::post( '/savestatus', [HomeController::class,'saveStatus'])->name('shout.save');
Route::get( '/profile', [HomeController::class,'profile'])->name('shout.profile');
