<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; 


Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[UserController::class,'index'])->name('user.index');
Route::get('show-user/{user}',[UserController::class,'show'])->name('user.show');

Route::get('/create-user',[UserController::class,'create'])->name('user.create');
Route::post('/store-user',[UserController::class,'store'])->name('user-store');
Route::get('/edit-user/{user}',[UserController::class,'edit'])->name('user.edit');
Route::put('/update-user/{user}',[UserController::class, 'update'])->name('user-update');
Route::get('/destroi-user/{user}',[UserController::class,'destroy'])->name('user.destroy');
#new
Route::get('/perfil',[UserController::class,'perfil'])->name('user.perfil');


Route::get('/cliente', [UserController::class, 'cliente'])->name('user.cliente');
Route::get('/adm', [UserController::class, 'adm'])->name('user.adm');
Route::get('/cliente', [UserController::class, 'clienteview'])->name('user.cliente');
Route::get('/adm', [UserController::class, 'admview'])->name('user.adm');

Route::get('/user-store-login',[UserController::class,'loginStore'])->name('user-store-login');
Route::post('/user-store-login',[UserController::class,'loginStore'])->name('user-store-login');
