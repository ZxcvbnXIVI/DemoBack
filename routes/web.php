<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\VideoLinkCategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SessionController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);

// Subject Routes
Route::get('/allsubjects', [SubjectController::class, 'index'])->name('allsubjects.index');
Route::get('/subjects/create', [SubjectController::class, 'create'])->name('subjects.create');
Route::post('/subjects', [SubjectController::class, 'store'])->name('subjects.store');
Route::get('/allsubjects/{subjectID}/videos', [VideoController::class, 'showVideosBySubject'])->name('subject.videos');

// Video Routes
Route::get('/videos/create', [VideoController::class, 'create'])->name('videos.create');
Route::post('/videos', [VideoController::class, 'store'])->name('videos.store');

// VideoLinkCategory Routes
Route::get('/videoLinkCategory/create', [VideoLinkCategoryController::class, 'create'])->name('videoLinkCategory.create');
Route::post('/videoLinkCategory/store', [VideoLinkCategoryController::class, 'store'])->name('videoLinkCategory.store');

// Other Routes
Route::get('/getCategoriesForDropdown', [CategoryController::class, 'getCategoriesForDropdown']);
Route::get('/subjects/{subjectID}/edit', [SubjectController::class, 'edit'])->name('subject.edit');
Route::delete('/subjects/{subjectID}', [SubjectController::class, 'destroy'])->name('subjects.destroy');

// Session Routes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/sessions', [SessionController::class, 'index'])->name('sessions.index');
});




