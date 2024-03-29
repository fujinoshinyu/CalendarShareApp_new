<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DmController;
use App\Http\Controllers\EventController;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//HOME
Route::get('/', [PostController::class, 'index'])->name('index');

//DM

Route::controller(DmController::class)->middleware(['auth'])->group(function(){
    Route::get('/dm', 'dm')->name('dm');
    Route::post('/add', 'add')->name('add');
    Route::get('/result/ajax', 'getData');
    //画像
    Route::get('/uplopad', 'uplopad');
    Route::post('/upload', 'store')->name('store');
});

//calendar
Route::controller(EventController::class)->middleware(['auth'])->group(function(){
    Route::get('/calendar', 'show')->name('show');
    Route::post('/calendar/create','create')->name("create");
    Route::post('/calendar/get', 'get')->name("get");
    Route::put('/calendar/update','update')->name("update");
    Route::delete('/calendar/delete', 'delete')->name("delete");
});
require __DIR__.'/auth.php';
