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
    return view('welcome');
});

Route::get('/sample', [\App\Http\Controllers\Sample\IndexController::class,'show']);
Route::get('/sample/{id}', [\App\Http\Controllers\Sample\IndexController::class,'showId']);

// Tweet
Route::get('/tweet', \App\Http\Controllers\Tweet\IndexController::class)->name('tweet.index');
Route::middleware('auth')->group(function(){
    // つぶやき投稿
    Route::post('/tweet/create', \App\Http\Controllers\Tweet\CreateController::class)->name('tweet.create');
    // つぶやき編集ページ
    Route::get('/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\Update\IndexController::class)->name('tweet.update.index');
    // 更新処理
    Route::put('/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\Update\PutController::class)->name('tweet.update.put');
    // 削除処理
    Route::delete('/tweet/delete/{tweetId}', \App\Http\Controllers\Tweet\DeleteController::class)->name('tweet.delete');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
