<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileEditController;
use App\Http\Controllers\RolesAndPermissionsController;
use App\Http\Controllers\ShoutBoxController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [FrontendController::class, 'index'])->name('weblog.index');
Route::get('/show/{slug}', [FrontendController::class, 'show'])->name('weblog.show');
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
    Route::group(['prefix' => 'edit', 'as'=>'edit.', 'middleware'=>['can:edit profile'] ], function () {
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
Route::group(['prefix' => 'article', 'middleware'=>['auth', 'can:access articles'], 'as'=>'article.'], function () {
    Route::group(['middleware' => ['can:view own articles']], function () {
        Route::get('/drafted', [ArticleController::class, 'showDraftedArticles'])->name('drafted');
        Route::get('/published', [ArticleController::class, 'showPublishedArticles'])->name('published');
    });

    Route::get('/manage', [ArticleController::class, 'manageArticles'])->name('manage')->middleware('can:manage articles');
    

    Route::get('/create', [ArticleController::class, 'create'])->name('create')->middleware('can:write articles');
    Route::post('/create', [ArticleController::class, 'store'])->name('store');
    
    Route::get('/edit/{article}', [ArticleController::class, 'edit'])->name('edit')->middleware('can:edit articles');
    Route::put('/edit/{article}', [ArticleController::class, 'update'])->name('update');

    Route::delete('/{article}', [ArticleController::class, 'destroy'])->name('destroy');
});


Route::get('/r&p', [RolesAndPermissionsController::class, 'rolesAndPermissions'])
->name('rolesAndPermissions')
->middleware('can:access roles & permissions');


Route::get('/usermanagement', [UserManagementController::class, 'index'])
->name('usermanagement')
->middleware('can:access user section');



Route::group(['prefix' => 'ajax', 'as'=>'ajax.'], function () {
    Route::post('/getUserPermissions', [RolesAndPermissionsController::class, 'getUserPermissions'])->name('getUserPermissions');
    Route::post('/modifyRoleOrPermission', [RolesAndPermissionsController::class, 'modifyRoleOrPermission'])->name('modifyRoleOrPermission');
    
    Route::post('/getArticle', [ArticleController::class, 'getArticle'])->name('getArticle');
    
    Route::post('/sendShouts', [ShoutBoxController::class, 'sendShouts'])->name('sendShouts');
    Route::post('/getShouts', [ShoutBoxController::class, 'getShouts'])->name('getShouts');

});







// Undefined Routes
Route::get('/{url}', function(){ 
    abort(404);
});