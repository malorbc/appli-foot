<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartJsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\StatistiqueController;
use App\Models\User;
use App\Http\Controllers\Admin\StatistiqueController as AdminStatistiqueController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\ClubController as AdminClubController;
use App\Http\Controllers\Auth\RegisteredUserController;

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
    $events = auth()->user()->events;
    return view('dashboard', compact('club', 'events'));
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('statistiques', StatistiqueController::class);
    Route::resource('agenda', EventController::class);
    Route::get('/dashboard/accept/{id}', 'App\Http\Controllers\DashboardController@accept')->name('dashboard.accept');
    Route::resource('profil', RegisteredUserController::class, [
        'only' => ['index', 'edit', 'store', 'update']
    ]);

    Route::middleware(['admin'])->name('admin.')->prefix('admin')->group(function () {
        Route::resource('statistiques', AdminStatistiqueController::class);
        Route::resource('agenda', AdminEventController::class);
        Route::resource('clubs', AdminClubController::class)->except(('index'));
        Route::get('statistiques/create/{id}', 'App\Http\Controllers\Admin\StatistiqueController@create')->name('statistiques.create.user');
    });
});



require __DIR__ . '/auth.php';
