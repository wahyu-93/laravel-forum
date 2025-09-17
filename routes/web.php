<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/profile/{id}/edit', function () {
    return view('pages.profile.edit');
})->name('profile.edit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/discussion', [DiscussionController::class, 'index'])->name('discussion.index');
Route::get('/discussion/p/{slug}', [DiscussionController::class, 'show'])->name('discussion.show');
Route::get('/discussion/category/{slug}', [DiscussionController::class, 'byCategory'])->name('discussion.category');

// profile
Route::get('/profile/{username}', [ProfileController::class, 'index'])->name('profile.index');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // discussions
    Route::resource('discussion', DiscussionController::class)->only(['create','store','edit','update','destroy']);

    // like discussion
    Route::post('/discussion/{slug}/like', [LikeController::class, 'discussionLike'])->name('discussion.like');
    Route::post('/discussion/{slug}/unlike', [LikeController::class, 'discussionUnLike'])->name('discussion.unlike');

    // answer
    Route::post('/discussion/{discussion}/answer', [AnswerController::class, 'store'])->name('discussion.answer');

    Route::resource('answer', AnswerController::class)->only(['edit','update','destroy']);

    // like answer
    Route::post('/answer/{answer}/like', [LikeController::class, 'answerLike'])->name('answer.like');
    Route::post('/answer/{answer}/unlike', [LikeController::class, 'answerUnLike'])->name('answer.unlike');

});

require __DIR__.'/auth.php';
