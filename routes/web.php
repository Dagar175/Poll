<?php

use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/poll', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('poll')->middleware('auth')->group(function(){

    Route::view('create','polls.create');
    Route::post('create',  [PollController::class, 'store'])->name('poll.store');
    Route::get('history',[HistoryController::class, 'index'])->name('poll.history');
    Route::get('{poll}',[PollController::class, 'show'])->name('poll.show');
    Route::post('{poll}/vote',[PollController::class, 'vote'])->name('poll.vote');
    Route::get('{poll_id}/results', [PollController::class, 'results'])->name('poll.results');

});
