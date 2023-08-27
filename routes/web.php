<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RecordingsController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\WebinarController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::middleware(['verified'])->group(function () {
    Route::get('/events', [EventController::class, 'index']);
    Route::post('/events', [EventController::class, 'store']);
    Route::get('/playback/{eventId}', [RecordingsController::class, 'playback']);
    Route::get('/analytics/{eventId}', [AnalyticsController::class, 'show'])->name('analytics.show');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/playback/{eventId}', [RecordingsController::class, 'playback'])->name('recordings.playback');

    // Other routes that need email verification
    // For example:
    Route::resource('events', EventController::class);
    Route::post('/events/{event}/register', [EventController::class, 'storeRegistration'])->name('events.storeRegistration');
    Route::get('/events/{event}/webinar', [EventController::class, 'webinar'])->name('events.webinar');
    
    // Routes for the WebinarController
    Route::resource('webinars', WebinarController::class);
});

// Routes that are accessible to all users, including guests
Route::get('/', [EventController::class, 'index'])->name('home');
Route::post('/conferences', [ConferenceController::class, 'create'])->name('conferences.create');
