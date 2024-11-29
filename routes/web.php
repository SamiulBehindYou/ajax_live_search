<?php

use App\Http\Controllers\SearchController;
use App\Livewire\SearchTodo;
use Illuminate\Support\Facades\Route;
use App\Livewire\Todo;

Route::get('/todo', Todo::class);
Route::get('/search-todo', SearchTodo::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/search', [SearchController::class, 'view'])->name('search');
Route::get('/searching', [SearchController::class, 'searching'])->name('searching');


