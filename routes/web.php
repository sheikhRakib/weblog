<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('weblog.index');
Route::get('/show/{slug}', [FrontendController::class, 'show'])->name('weblog.show');

Route::post('/addcomment', [CommentController::class, 'store'])->name('weblog.comment');

Route::get('home', function () {
    return "home";
});
