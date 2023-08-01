<?php

use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/**Comments API*/
Route::controller(PostCommentController::class)->
prefix('comments')->
group(function () {
    Route::get('/index/{id}', 'index');
    Route::post('/create', 'create');
    Route::get('/show/{id}', 'show');
    Route::get('/delete/{id}', 'delete');
    Route::get('/user/{data}', 'findUser');
    Route::post('/update', 'update');
});

/**Post API*/
Route::controller(PostController::class)->
prefix('post')->
group(function () {
    Route::get('/index','index');
    Route::get('/own','ownPost');
    Route::post('/create', 'create');
    Route::get('/show/{id}', 'show');
    Route::get('/delete/{id}', 'delete');
    Route::post('/update', 'update');
    Route::post('/photo-delete', 'postPhotoDelete');
});

/**Post Like API*/
Route::controller(PostLikeController::class)->
prefix('post-react')->
group(function () {
    Route::get('/index/{id}', 'index');
    Route::get('/give/{id}', 'giveLike');
    Route::get('/remove/{id}', 'removeLike');
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
