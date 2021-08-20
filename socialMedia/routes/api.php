<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('users/{id}', [UserController::class, 'show']);
Route::post('users', [UserController::class, 'store']);
Route::get('users', [UserController::class, 'getAll']);
Route::delete('users/{id}', [UserController::class, 'deleteUser']);


Route::get('posts/{id}', [PostController::class, 'getAllPostsForUser']);
Route::post('posts/{id}', [PostController::class, 'createPostForUser']);
Route::get('posts', [PostController::class, 'getAll']);
Route::put('posts/{userID}/{id}',[PostController::class, 'updatePostOfAUser']);//empty checker fixed
Route::delete('posts/{post_id}/{user_id}', [PostController::class, 'deletePostOfUser']);
//Route::get('posts/title/{title}',[PostController::class,'getPostByTitle']);
//Route::get('posts/{limit}',[PostController::class,'getRecentPosts']);


Route::get('comments/{id}', [CommentController::class, 'getAllCommentsForAPost']);
Route::post('comments/{id}', [CommentController::class, 'createCommentForPost']);
Route::put('comments/{postID}/{id}',[CommentController::class, 'updateCommentOfAPost']);
Route::delete("comments/{comment_id}/{post_id}",[CommentController::class,'deleteCommentOfPost']);

