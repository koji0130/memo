<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TopController;
use App\Http\Livewire\BookIndex;

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
    return redirect()->route('loginView');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['middleware' => ['guest']], function(){
    Route::namespace('Auth')->group(function(){
        Route::get('/login', [LoginController::class, 'loginView'])->name('loginView');
        Route::post('/login/post', [LoginController::class,'loginPost'])->name('loginPost');
        Route::get('/register', [RegisterController::class,'registerView'])->name('registerView');
        Route::post('/register/post', [RegisterController::class, 'registerPost'])->name('registerPost');
    });
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', [LoginController::class,'logout'])->name('logout');
    Route::get('/dashboard', [TopController::class,'show'])->name('dashboard');
    Route::get('/test', [TopController::class,'test'])->name('test');
    Route::get('/top', [TopController::class,'top'])->name('top');

    Route::get('/books',BookIndex::class)->name('books.index');
});
