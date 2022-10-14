<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordingController;

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

Route::get('/', function () {
    return view('top');
})->name('top');

Route::get('/1', function () {
    return view('welcome');
});

Route::get('/search', function() {
    return view('search');
})->name('search');

Route::get('/mypage', function() {
    return view('mypage');
})->middleware(['auth', 'verified'])->name('mypage');

Route::get('/contact', function() {
    return view('contact');
})->name('contact');

Route::get('recordings/timeline', [RecordingController::class, 'timeline'])->name('timeline');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
