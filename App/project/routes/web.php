<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::resource('/comments', CommentController::class);

Route::middleware('auth')->group(function () {

    Route::get('/events', [\App\Http\Controllers\EventController::class, 'index'])->name('events.index');

    Route::get('/events/create', [\App\Http\Controllers\EventController::class, 'create'])->name('events.create');

});

Route::post('/events', [\App\Http\Controllers\EventController::class, 'store'])->name('events.store');

Route::get('/events/{id}', [\App\Http\Controllers\EventController::class, 'show'])->name('events.show.{id}');

Route::resource('/events', \App\Http\Controllers\EventController::class, );

Route::post('/events/intrested/{id}', [\App\Http\Controllers\IntrestedController::class, 'store'])->name('intrested.store');

Route::post('/events/participant/{id}', [\App\Http\Controllers\ParticipantController::class, 'store'])->name('participant.store');

Route::get('/events/{id}/participants', [\App\Http\Controllers\ParticipantController::class, 'show'])->name('participants.show.{id}');

Route::get('/events/{id}/interested', [\App\Http\Controllers\IntrestedController::class, 'show'])->name('intresteds.show.{id}');

Route::resource('participants', \App\Http\Controllers\ParticipantController::class);
Route::resource('intresteds', \App\Http\Controllers\IntrestedController::class);

Route::get('/search/', [\App\Http\Controllers\EventController::class, 'search'])->name('search');

Route::get('/sort/', [\App\Http\Controllers\EventController::class, 'sort'])->name('sort');
