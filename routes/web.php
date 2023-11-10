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

Route::get('/dashboard', function () {
   // return view('dashboard');
   return redirect('/news');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::namespace('App\Http\Controllers\AdminPanel')->middleware('auth')->group(function () {
    Route::post('/upload-avatar/{user_id}', 'AvatarController@store');

    Route::prefix('news')->group(function () {
        Route::get('/', 'NewsController@index');

        Route::get('/create', 'NewsController@create');
        Route::post('/store', 'NewsController@store');

        Route::get('/edit/{id}', 'NewsController@edit');
        Route::post('/edit/{id}', 'NewsController@update')->name('update');

        Route::get('/regenerate-image/{id}', 'NewsController@regenerateImage');
        Route::get('/delete/{id}', 'NewsController@destroy');
    });
});

require __DIR__.'/auth.php';
