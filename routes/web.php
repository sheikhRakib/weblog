<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileEditController;
use App\Http\Controllers\RolesAndPermissionsController;
use App\Http\Controllers\ShoutBoxController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [FrontendController::class, 'index'])->name('weblog.index');
Route::get('/show/{article}', [FrontendController::class, 'show'])->name('weblog.show');
Route::get('/query/{query}', [FrontendController::class, 'query'])->name('weblog.query');

// Add Comments on Articles
Route::post('/addcomment', [CommentController::class, 'store'])->name('weblog.comment');


/*
* Backend Routes
*/

// Profile Section
Route::group(['prefix'=>'profile', 'middleware'=>'auth', 'as'=>'profile.'], function () {
    Route::get('/', [ProfileController::class, 'index'])->name('index');

    // Profile edit section
    Route::group(['prefix' => 'edit', 'as'=>'edit.'], function () {
        Route::get('/', [ProfileEditController::class, 'index'])->name('index');
        Route::get('/info', [ProfileEditController::class, 'showEditInfo'])->name('info');
        Route::get('/email', [ProfileEditController::class, 'showEditEmail'])->name('email');
        Route::get('/password', [ProfileEditController::class, 'showEditPassword'])->name('password');

        Route::put('/info', [ProfileEditController::class, 'updateInfo'])->name('info.update');
        Route::put('/email', [ProfileEditController::class, 'updateEmail'])->name('email.update');
        Route::put('/password', [ProfileEditController::class, 'updatePassword'])->name('password.update');
    });
});

// Article Section
Route::group(['prefix' => 'article', 'middleware'=>'auth', 'as'=>'article.'], function () {
    Route::get('/drafted', [ArticleController::class, 'showDraftedArticles'])->name('drafted');
    Route::get('/published', [ArticleController::class, 'showPublishedArticles'])->name('published');
    
    Route::get('/create', [ArticleController::class, 'create'])->name('create');
    Route::post('/create', [ArticleController::class, 'store'])->name('store');
    
    Route::get('/edit/{article}', [ArticleController::class, 'edit'])->name('edit');
    Route::put('/edit/{article}', [ArticleController::class, 'update'])->name('update');

    Route::delete('/{article}', [ArticleController::class, 'destroy'])->name('destroy');
});


Route::get('/r&p', [RolesAndPermissionsController::class, 'rolesAndPermissions'])->name('rolesAndPermissions');

// Route::group(['prefix' => 'r&p', 'as'=>'r&p.'], function () {
//     Route::get('/permissions', [RolesAndPermissionsController::class, 'permissions'])->name('permissions');
//     Route::get('/assign', [RolesAndPermissionsController::class, 'assignPermissions'])->name('assignPermissions');


// });



Route::group(['prefix' => 'ajax', 'as'=>'ajax.'], function () {
    Route::post('/getUserPermissions', [RolesAndPermissionsController::class, 'getUserPermissions'])->name('getUserPermissions');
    Route::post('/sendShouts', [ShoutBoxController::class, 'sendShouts'])->name('sendShouts');
    Route::post('/getShouts', [ShoutBoxController::class, 'getShouts'])->name('getShouts');
});







// Undefined Routes
Route::get('/{url}', function(){ 
    abort(404);
});