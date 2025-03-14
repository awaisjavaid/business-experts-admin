<?php

use Illuminate\Support\Facades\Auth;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//Route::get('register', function () {
//    return redirect('/login');
//});

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('client-queries', [App\Http\Controllers\Admin\ClientQueriesController::class, 'client_queries'])->name('client-queries');
Route::get('visitors', [App\Http\Controllers\Admin\VisitorsController::class, 'visitors'])->name('visitors');
