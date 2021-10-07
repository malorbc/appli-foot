<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartJsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\StatistiqueController;

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

Route::get('/dashboard', function () {
    $club = auth()->user()->club;
    return view('dashboard', compact('club'));
})->middleware(['auth'])->name('dashboard');

Route::resource('statistiques', StatistiqueController::class);
Route::resource('clubs', ClubController::class)->except(('index'));
Route::resource('agenda', EventController::class);

require __DIR__ . '/auth.php';
