<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('weblog.index');
Route::get('/show/{slug}', [FrontendController::class, 'show'])->name('weblog.show');

Route::get('home', function () {
    return "home";
});
