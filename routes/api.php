<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\VisitorsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/countries', function () {
    $response = Http::get('https://restcountries.com/v3.1/all?fields=name,cca2');

    if ($response->failed()) {
        return response()->json(['error' => 'Failed to fetch countries'], 500);
    }

    return response()->json($response->json());
});

Route::post('contact-us', [ContactUsController::class, 'submit_contact_us_form']);
Route::post('track-visitor', [VisitorsController::class, 'store']);
