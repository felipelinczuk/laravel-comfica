<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;


Route::get('/books', [BooksController::class, 'index']);

Route::post('/books/new', [BooksController::class, 'store']);

Route::post('/book/editfav  ', [BooksController::class, 'updateFav']);  