<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/todos', [TodosController::class, 'index'])->name('todos.index');
    Route::post('/todos', [TodosController::class, 'store'])->name('todos.store');
    Route::delete('/todos/{id}', [TodosController::class, 'destroy'])->name('todos.destroy');
    Route::patch('/todos/{id}', [TodosController::class, 'update'])->name('todos.update');

    Route::get('/', function () {
        return redirect()->route('todos.index');
    });
});

require __DIR__ . '/auth.php';
