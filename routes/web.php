<?php

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

// Route::get('/login', function () {
//     return view('pages.auth.login');
// })->name('login');

// Route::get('/sign-up', function () {
//     return view('pages.auth.register');
// })->name('sign-up');

Route::get('/discussions', function () {
    return view('pages.discussions.index');
})->name('discussions.index');

Route::get('/discussions/create', function () {
    return view('pages.discussions.create');
})->name('discussions.create');

Route::get('/discussions/{slug}', function () {
    return view('pages.discussions.show');
})->name('discussions.show');

Route::get('/answers/{slug}', function () {
    return view('pages.answers.create');
})->name('answers.create');

Route::get('/profile/{id}', function () {
    return view('pages.profile.index');
})->name('profile.index');

Route::get('/profile/{id}/edit', function () {
    return view('pages.profile.edit');
})->name('profile.edit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
