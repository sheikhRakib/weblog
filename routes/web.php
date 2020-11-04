<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('weblog.index');

Route::get('home', function () {
    return "home";
});
