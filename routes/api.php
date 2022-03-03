<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController;
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

Route::post('/posts', [PostsController::class, 'store']);
Route::get('/posts/{categoryId}', [PostsController::class, 'showByCategoryId']);
Route::get('/post/{post}', [PostsController::class, 'showPost']);
Route::put('/post', [PostsController::class, 'updatePost']);

Route::get('categories', [CategoriesController::class, 'index']);
Route::post('category', [CategoriesController::class, 'store']);
Route::delete('/category/{id}', [CategoriesController::class, 'destroy']);
