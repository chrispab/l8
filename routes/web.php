<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataImportController;

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

// Route::get('/', function () {
//     // $test = "afffafdadf";
//     // $test= substr($test,0,2);
//     $data = ["name" => "Sanjay", "email" => "sanjay@mail.com"];

//     return view('welcome', $data); // /resources/views/welcome.blade.php
//     // return view('welcome');
// });

// # Route for welcome page
// Route::view("/", "welcome");

// # Route with parameters
// Route::view("/", "welcome", ["name" => "Sanjay", "email" => "sanjay@mail.com"]);

# Import controller here
use App\Http\Controllers\Student;

Route::get("/", [Student::class, "welcome"]);


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/co2', function () {
    return view('co2');
})->name('co2');

Route::get('/home', [HomeController::class, 'index']);


Route::get('/fetch/{NSamples}', [DataImportController::class, 'fetchLastNSamples']);
Route::get('/fetch', [DataImportController::class, 'fetchLastNSamples']);
Route::get('/fetchLatestSample', [DataImportController::class, 'fetchLatestSample']);
// fetchLatestSample
require __DIR__.'/auth.php';
