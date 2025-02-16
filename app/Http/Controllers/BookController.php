<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use App\Models\Book;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;
use App\Models\Publisher;
use App\Models\Author;

class BookController
{
    public function index()
    {
        #$books = Book::orderByDesc('id')->get();
        ##['books' => $books];
        $books = Book::with(['publisher', 'author'])->get();
        return view('book.index', compact('books'));
    }



    public function show(Book $book)
    {
        return view('book.show', ['book' => $book]);
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



    public function edit(Book $book)
    {
        // Passa o livro atual para a view de edição
        $publishers = Publisher::all();  // Carregar todas as editoras
        $authors = Author::all();        // Carregar todos os autores
        return view('book.edit', compact('book', 'publishers', 'authors'));
    }
    

    public function update(Request $request, Book $book)
    {
        // Validação dos dados do formulário
        $request->validate([
            'publishers_id' => 'required|exists:publishers,id',
            'authors_id' => 'required|exists:authors,id',
            'name' => 'required|string|max:255',
            'sale_price' => 'required|numeric',
            'purchase_price' => 'required|numeric',
            'amount' => 'required|integer|min:0',
        ]);
    
        // Atualiza os dados do livro
        $book->update([
            'name' => $request->name,
            'sale_price' => $request->sale_price,
            'purchase_price' => $request->purchase_price,
            'amount' => $request->amount,
            'publisher_id' => $request->publishers_id,
            'author_id' => $request->authors_id,
        ]);
    
        return redirect()->route('book.index')->with('success', 'Livro editado com sucesso!');
    }
    
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index')->with('success', 'Livro deletado com sucesso!');
    }
    

}
