<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartJsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\StatistiqueController;
use App\Models\User;
use App\Http\Controllers\Admin\StatistiqueController as AdminStatistiqueController;

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

Route::middleware(['auth'])->group(function () {
    Route::resource('statistiques', StatistiqueController::class);
    Route::resource('clubs', ClubController::class)->except(('index'));
    Route::resource('agenda', EventController::class);

    Route::get('/profil', function () {
        return view('profil.index');
    })->name('profil');

    Route::get('/profil/update/', function () {
        return view('profil.update');
    })->name('profil.update');

    Route::middleware(['admin'])->name('admin.')->prefix('admin')->group(function () {
        Route::resource('statistiques', AdminStatistiqueController::class);
        Route::get('statistiques/create/{id}', 'App\Http\Controllers\Admin\StatistiqueController@create')->name('statistiques.create.user');
    });
});



require __DIR__ . '/auth.php';
