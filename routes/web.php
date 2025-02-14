<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Display all books
Route::get('/books', [BookController::class, 'index'])->name('books.index');

// Show the form for creating a new book
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

// Store a newly created book
Route::post('/books', [BookController::class, 'store'])->name('books.store');

// Show the form for editing a book
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');

// Update a book
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');

// Delete a book
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
