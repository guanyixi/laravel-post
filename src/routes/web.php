<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('post/{post:slug}', [PostController::class, 'show'])->name('post');

Route::post('post/{post:slug}/comments', [CommentController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Admin

Route::middleware('can:admin')->group(function () {

    Route::get('dashboard/post/create', [AdminPostController::class, 'create']);

    Route::post('dashboard/post', [AdminPostController::class, 'store']);

    Route::get('dashboard/posts', [AdminPostController::class, 'index']);

    Route::get('dashboard/post/{post}/edit', [AdminPostController::class, 'edit']);

    Route::patch('dashboard/post/{post}', [AdminPostController::class, 'update']);

    Route::delete('dashboard/post/{post}', [AdminPostController::class, 'destroy']);
});



require __DIR__ . '/auth.php';

require __DIR__ . '/socialite.php';
