<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileEditController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [FrontendController::class, 'index'])->name('weblog.index');
Route::get('/show/{slug}', [FrontendController::class, 'show'])->name('weblog.show');
Route::get('/query/{query}', [FrontendController::class, 'query'])->name('weblog.query');

// Add Comments on Articles
Route::post('/addcomment', [CommentController::class, 'store'])->name('weblog.comment');


// Backend Routes
Route::group(['prefix'=>'profile', 'middleware'=>'auth', 'as'=>'profile.'], function () {
    Route::get('/', [ProfileController::class, 'index'])->name('index');

    // Profile edit section
    Route::group(['prefix' => 'edit', 'as'=>'edit.'], function () {
        Route::get('/', [ProfileEditController::class, 'index'])->name('index');
        Route::get('/info', [ProfileEditController::class, 'info'])->name('info');
        Route::get('/email', [ProfileEditController::class, 'email'])->name('email');
        Route::get('/password', [ProfileEditController::class, 'password'])->name('password');

        Route::put('/info', [ProfileEditController::class, 'update_info'])->name('info.update');
        Route::put('/email', [ProfileEditController::class, 'update_email'])->name('email.update');
        Route::put('/password', [ProfileEditController::class, 'update_password'])->name('password.update');
    });

    // Route::get('/info', [ProfileUpdateController::class, 'info'])->name('info');
    // Route::get('/email', [ProfileUpdateController::class, 'email'])->name('email');
    // Route::get('/password', [ProfileUpdateController::class, 'password'])->name('password');

    // Route::put('/info', [ProfileUpdateController::class, 'info_update'])->name('info.update');
    // Route::put('/email', [ProfileUpdateController::class, 'email_update'])->name('email.update');
    // Route::put('/password', [ProfileUpdateController::class, 'password_update'])->name('password.update');    
});



// Undefined Routes
Route::get('/{url}', function(){ 
    return redirect()->route('weblog.index');
});