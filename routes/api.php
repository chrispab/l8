<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\SensorReading;
use App\Http\Controllers\SensorReadingController;

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

// Route::get('/readings', 'SensorReadingController@index');

// Route::get('readings', function() {
//     // If the Content-Type and Accept headers are set to 'application/json',
//     // this will return a JSON structure. This will be cleaned up later.
//     return SensorReading::all();
// });


// Route::get('/readings', [SensorReadingController::class, 'index']);
Route::get('/read/lastnhours/{nHours}', [SensorReadingController::class, 'nHours']);
Route::get('/read/lastnreadings/{nReadings}', [SensorReadingController::class, 'nReadings']);

Route::get('/readings/{sensorReading}', [SensorReadingController::class, 'show']);

// Route::post('readings', 'SensorReadingController@store');
// Route::put('readings/{id}', 'SensorReadingController@update');
// Route::delete('readings/{id}', 'SensorReadingController@delete');

// Route::get('/users/{user}', [UserController::class, 'show']);


Route::apiResource('readings', SensorReadingController::class);
