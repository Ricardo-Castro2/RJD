<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Stock_itemsController
{
    public function index()
    {
        #$books = Book::orderByDesc('id')->get();
        ##['books' => $books];
        #$books = Book::with(['publisher', 'author'])->get();
        #, compact('books')
        return view('stock_item.index');
    }



    public function show(Author $author)
    {
        return view('author.show', ['author' => $author]);
    }




    public function create()
    {
        $Books = Book::orderByDesc('id')->get();
        return view('book.create',['books' => $books]);
    }


    public function store(Request $request)
    {
        #$request->validated();
        #dd($request->all());
        $request->validate([
            'books_id' => 'required|exists:books,id',   // Garante que a editora exista
        ]);
        
        Stock_items::create([
            'name' => $request->name,
            'sale_price' => $request->sale_price,
            'purchase_price' => $request->purchase_price,
            'amount' => $request->amount,
         
            'book_id' => $request->books_id, 
        ]);
        return redirect()->route('book.index')->with('success', 'livro criado com sucesso!');
    }



    public function edit(Author $author)
    {
        return view('author.edit', ['author' => $author]);
    }

    public function update(AuthorRequest $request, Author $author)
    {
        $request->validated();
        $author->update([
            'name' => $request->name,
        ]);

        return redirect()->route('author.index', ['author' => $author->id])->with('success', 'Autor editado com sucesso!');
    }




    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('author.index')->with('success', 'Autor deletado com sucesso!');
    }
}
