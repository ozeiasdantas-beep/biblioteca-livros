<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('livros', LivroController::class);
    
    Route::get('/home', function () {
        return redirect()->route('livros.index');
    })->name('home');
});

Route::get('/', function () {
    return redirect()->route('login');
});