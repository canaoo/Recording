<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordingController;
use App\Http\Controllers\SaveController;

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

/*Route::get('/recordings/search', function() {
    return view('search');
})->name('search');*/
Route::get('/create', [SaveController::class, 'add']);
Route::post('/create', [SaveController::class, 'create']);

Route::get('/recordings/mypage', [RecordingController::class, 'mypage'])->middleware(['auth', 'verified'])->name('mypage');

Route::get('/recordings/contact', function() {
    return view('contact');
})->name('contact');
Route::post('/recordings/contact', function() {
    return view('contaact/confirm');
});

Route::get('/recordings/search', [RecordingController::class, 'search'])->name('search');

Route::get('/recordings/timeline', [RecordingController::class, 'timeline'])->name('timeline');


Route::post('/recordings/process', [SaveController::class, 'create'])->middleware(['auth', 'verified']);
Route::post('/recordings/edit', [SaveController::class, 'edit'])->middleware(['auth', 'verified']);
Route::post('/recordings/update', [SaveController::class, 'update'])->middleware(['auth', 'verified']);

Route::post('/recordings/delete', [SaveController::class, 'delete'])->middleware(['auth', 'verified']);

Route::get('/recordings/admin/inquiry', function() {
    return view('admin/inquiry');
})->name('inquiry');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
