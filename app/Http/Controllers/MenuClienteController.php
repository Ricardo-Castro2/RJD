<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class MenuClienteController extends Controller
{
    // Método para login

    public function index()
    {
        #$books = Book::orderByDesc('id')->get();
        ##['books' => $books];

        ##$books = Book::with(['publisher', 'author'])->get();
        ##, compact('books')

        #$books = Book::with(['publisher', 'author'])->get();
        #, compact('books')

        return view('menucliente.index');
    }
}