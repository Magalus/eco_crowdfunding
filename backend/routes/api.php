<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// user controller routes
Route::post("register", [UserController::class, "register"]);
Route::post("login", [UserController::class, "login"]);
Route::get("user", [UserController::class, "user"])->middleware('auth:api');
Route::post("logout", [UserController::class, "logout"])->middleware('auth:api');

Route::group(['prefix' => 'projects'], function () {
    Route::get("/", [ProjectController::class, "index"]);
    Route::get("/{project}", [ProjectController::class, "show"]);
    Route::post("/", [ProjectController::class, "store"])->middleware('auth:api');
    Route::patch("/{project}", [ProjectController::class, "update"])->middleware('auth:api');
    Route::delete("/{project}", [ProjectController::class, "destroy"])->middleware('auth:api');

    Route::group(['prefix' => '/{project}/comments'], function () {
        Route::get("/{comment}", [CommentController::class, "show"]);
        Route::post("/", [CommentController::class, "store"])->middleware('auth:api');
        Route::patch("/{comment}", [CommentController::class, "update"])->middleware('auth:api');
        Route::delete("/{comment}", [CommentController::class, "destroy"])->middleware('auth:api');

        Route::group(['prefix' => '/{comment}/likes'], function () {
            Route::post('/', [LikeController::class, "likeComment"])->middleware('auth:api');
        });
    });
    Route::group(['prefix' => '/{project}/likes'], function () {
        Route::post('/', [LikeController::class, "likeProject"])->middleware('auth:api');
    });

});
