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

Route::get('/recordings/search', function() {
    return view('search');
})->name('search');

Route::get('/recordings/mypage', function() {
    return view('mypage');
})->middleware(['auth', 'verified'])->name('mypage');

Route::get('/recordings/contact', function() {
    return view('contact');
})->name('contact');

Route::get('/recordings/search', [RecordingController::class, 'search'])->name('search');

Route::get('/recordings/timeline', [RecordingController::class, 'timeline'])->name('timeline');

Route::post('/recordings/confirm', [RecordingController::class, 'confirm']);
Route::post('/recordings/process', [RecordingController::class, 'process']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
