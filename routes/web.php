<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\EditUserController;
use App\Http\Controllers\NotaConsumoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StoreNoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Route::prefix('dashboard')->middleware(['auth', 'verified', 'admin'])->group(function () {
    
    Route::get('/search', [SearchController::class, 'searchTable'])->name('dashboard.search');

    Route::get('/create', [NotaConsumoController::class, 'create'])->name('dashboard.create');
    Route::get('/store-note', [StoreNoteController::class, 'returnUser'])->name('note.store');
    Route::post('/store-note', [StoreNoteController::class, 'store'])->name('note.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/register-user', [RegisteredUserController::class, 'create'])->name('create.user');
    Route::post('/register-user', [RegisteredUserController::class, 'store'])->name('dashboard.create-user');

    Route::get('/search/edit/{id}', [SearchController::class, 'showDetails'])->name('search.show');
    Route::delete('/search/edit/{id}', [SearchController::class, 'deleteNote'])->name('search.delete');
    Route::put('/search/edit/{id}', [SearchController::class, 'editNote'])->name('search.edit');

    Route::get('/search/img/{id}', [SearchController::class, 'showImage'])->name('search.image');


    Route::get('/user-index', [EditUserController::class, 'indexUsers'])->name('users.index');
    Route::get('/user-edit/{id}', [EditUserController::class, 'editUsers'])->name('user-edit');
    Route::put('/user-edit/{id}', [EditUserController::class, 'updateUsers'])->name('users.update');
    Route::delete('/user-edit/{id}', [EditUserController::class, 'deleteUsers'])->name('users.delete');

    Route::get('/report', [ReportController::class, 'userExpensesReport'])->name('dashboard.report');
});

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/create', [NotaConsumoController::class, 'create'])->name('dashboard.create');
    Route::get('/store-note', [StoreNoteController::class, 'returnUser'])->name('note.store');
    Route::post('/store-note', [StoreNoteController::class, 'store'])->name('note.store');
});
require __DIR__ . '/auth.php';
