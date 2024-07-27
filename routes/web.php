<?php

use App\Http\Controllers\admin\MovieController;
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


Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });

    Route::prefix('movies')->as('movies.')->group(function () {
        Route::get('/', [MovieController::class, 'index'])->name('index');
        // Route::get('/test', [MovieController::class, 'test'])->name('test');
        Route::get('/changeStatus', [MovieController::class, 'changeStatus'])->name('changeStatus');
        Route::get('/show/{movie}', [MovieController::class, 'show'])->name('show');
        Route::get('/create', [MovieController::class, 'create'])->name('create');
        Route::post('/store', [MovieController::class, 'store'])->name('store');
        Route::get('/edit/{movie}', [MovieController::class, 'edit'])->name('edit');
        Route::put('/update/{movie}', [MovieController::class, 'update'])->name('update');
        Route::delete('/delete/{movie}', [MovieController::class, 'destroy'])->name('destroy');
    });
});
