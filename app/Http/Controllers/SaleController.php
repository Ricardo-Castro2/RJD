<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Sale;
use App\Http\Requests\SaleRequest;
use App\Models\Book;
use App\Models\User;
=======
use Illuminate\Support\Facades\Redirect;
use App\Models\Sale;
use App\Http\Requests\SaleRequest;
use Illuminate\Http\Request;
>>>>>>> 1944db98315db0b8916714091e0cbf63b9249b1c

class SaleController
{
    public function index()
    {
        #$books = Book::orderByDesc('id')->get();
        ##['books' => $books];
<<<<<<< HEAD
        ##$books = Book::with(['publisher', 'author'])->get();
        ##, compact('books')
=======
        #$books = Book::with(['publisher', 'author'])->get();
        #, compact('books')
>>>>>>> 1944db98315db0b8916714091e0cbf63b9249b1c
        return view('sale.index');
    }



    public function show(Author $author)
    {
        return view('author.show', ['author' => $author]);
    }




    public function create()
    {
<<<<<<< HEAD
        #$publishers = Publisher::orderByDesc('id')->get();
        #$authors = Author::orderByDesc('id')->get();
        #return view('book.create',['publishers' => $publishers, 'authors' => $authors]);

        $books = Book::all();
        $users = User::all();
        return view('sale.create', compact('books', 'users'));
=======
        $publishers = Publisher::orderByDesc('id')->get();
        $authors = Author::orderByDesc('id')->get();
        return view('book.create',['publishers' => $publishers, 'authors' => $authors]);
>>>>>>> 1944db98315db0b8916714091e0cbf63b9249b1c
    }


    public function store(Request $request)
    {
        #$request->validated();
<<<<<<< HEAD
        dd($request->all());

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Pegando o livro pelo ID
        $book = Book::findOrFail($request->book_id);

        // Verifica se há estoque suficiente
        if ($request->quantity > $book->amount) {
            return redirect()->back()->with('error', 'Quantidade maior que o estoque disponível!');
        }

        // Calculando o valor total
        $totalValue = $book->sale_price * $request->quantity;

        // Criando a venda
        $sale = Sale::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'quantity' => $request->quantity,
            'total_value' => $totalValue
        ]);

        // Atualizando o estoque do livro
        $book->amount -= $request->quantity;
        $book->save();

        return redirect()->route('sale.index')->with('success', 'Venda criada com sucesso!');
    }



    public function edit(Author $author)
    {
        return view('author.edit', ['author' => $author]);
    }

    public function update(SaleRequest $request, Author $author)
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
