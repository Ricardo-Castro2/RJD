<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController; 
use App\Http\Controllers\MenuController; 
use App\Http\Controllers\PublisherController; 
use App\Http\Controllers\BookController; 
use App\Http\Controllers\Stock_itemsController; 
#Menu
Route::get('/', [MenuController::class, 'index'])->name('menu.index');

#Autores
Route::get('/author', [AuthorController::class, 'index'])->name('author.index');
Route::get('/create-author',[AuthorController::class,'create'])->name('author.create');
Route::post('/store-author',[AuthorController::class,'store'])->name('author-store');
Route::get('show-autor/{author}',[AuthorController::class,'show'])->name('author.show');
Route::get('/destroi-author/{author}',[AuthorController::class,'destroy'])->name('author.destroy');
Route::get('/edit-author/{author}',[AuthorController::class,'edit'])->name('author.edit');
Route::put('/update-author/{author}',[AuthorController::class, 'update'])->name('author-update');


#Publisher
Route::get('/publisher', [PublisherController::class, 'index'])->name('publisher.index');
Route::get('/create-publisher',[PublisherController::class,'create'])->name('publisher.create');
Route::post('/store-publisher',[PublisherController::class,'store'])->name('publisher-store');
Route::get('show-publisher/{publisher}',[PublisherController::class,'show'])->name('publisher.show');
Route::get('/edit-publisher/{publisher}',[PublisherController::class,'edit'])->name('publisher.edit');
Route::put('/update-publisher/{publisher}',[PublisherController::class, 'update'])->name('publisher-update');
Route::get('/destroi-publisher/{publisher}',[PublisherController::class,'destroy'])->name('publisher.destroy');
#livros
Route::get('/book', [BookController::class, 'index'])->name('book.index');
Route::get('/create-book',[BookController::class,'create'])->name('book.create');
Route::post('/store-book',[BookController::class,'store'])->name('book-store');

Route::get('/estoque', [Stock_itemsController::class, 'index'])->name('stock_item.index');
#Route::get('/create-book',[BookController::class,'create'])->name('book.create');
#Route::post('/store-book',[BookController::class,'store'])->name('book-store');