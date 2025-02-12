<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use App\Models\Sale;
use App\Http\Requests\SaleRequest;
use Illuminate\Http\Request;

class SaleController
{
    public function index()
    {
        #$books = Book::orderByDesc('id')->get();
        ##['books' => $books];
        #$books = Book::with(['publisher', 'author'])->get();
        #, compact('books')
        return view('sale.index');
    }



    public function show(Author $author)
    {
        return view('author.show', ['author' => $author]);
    }




    public function create()
    {
        $publishers = Publisher::orderByDesc('id')->get();
        $authors = Author::orderByDesc('id')->get();
        return view('book.create',['publishers' => $publishers, 'authors' => $authors]);
    }


    public function store(Request $request)
    {
        #$request->validated();
        #dd($request->all());
        $request->validate([
            'publishers_id' => 'required|exists:publishers,id', 
            'authors_id' => 'required|exists:authors,id',   // Garante que a editora exista
        ]);
        
        Book::create([
            'name' => $request->name,
            'sale_price' => $request->sale_price,
            'purchase_price' => $request->purchase_price,
            'amount' => $request->amount,
            'publisher_id' => $request->publishers_id,  // Garante que publisher_id seja passado
            'author_id' => $request->authors_id, 
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
