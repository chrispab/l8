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

Route::get('/', function () {
    $test = "afffafdadf";
    $test= substr($test,0,2);

    return view('welcome');
});

Route::get('/dashboard', function () {
    $test = "afffafdadf";
    $test= substr($test,0,2);
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/fetch/{NSamples}', [DataImportController::class, 'fetchLastNSamples']);
Route::get('/fetch', [DataImportController::class, 'fetchLastNSamples']);

require __DIR__.'/auth.php';
