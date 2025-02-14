<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController; 
use App\Http\Controllers\MenuController; 
use App\Http\Controllers\PublisherController; 
use App\Http\Controllers\BookController; 
use App\Http\Controllers\UserController; 
use App\Http\Controllers\SaleController; 
use App\Http\Controllers\AuthController; 

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


#usuario
Route::get('/user',[UserController::class,'index'])->name('user.index');
Route::get('show-/{user}',[UserController::class,'show'])->name('user.show');
Route::get('/create-user',[UserController::class,'create'])->name('user.create');
Route::post('/store-user',[UserController::class,'store'])->name('user-store');
Route::get('/edit-user/{user}',[UserController::class,'edit'])->name('user.edit');
Route::put('/update-user/{user}',[UserController::class, 'update'])->name('user-update');
Route::get('/destroi-user/{user}',[UserController::class,'destroy'])->name('user.destroy');



#Route::get('/estoque', [SaleController::class, 'index'])->name('sale.index');
#Route::get('/create-book',[BookController::class,'create'])->name('book.create');
#Route::post('/store-book',[BookController::class,'store'])->name('book-store');
// Rota para exibir o formulário de login


Route::get('/login',[AuthController::class,'login'])->name('user.login');

// Rota para processar o login
Route::post('/login/logar', [AuthController::class, 'login_logar'])->name('login_logar');

// Rota de logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/comprar', [SaleController::class, 'shop'])->name('sale.shop')->middleware('auth'); // Apenas a rota de compras precisa do middleware 'auth'
Route::get('/comprar/confirm', [SaleController::class, 'confirm'])->name('sale.confirm');
Route::post('/comprar-finalizar', [SaleController::class, 'store'])->name('sale-store');
Route::get('/compra/{sale}/pix', [SaleController::class, 'gerarPix'])->name('sale.pix');




