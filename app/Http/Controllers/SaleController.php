<?php

namespace App\Http\Controllers;
<<<<<<< HEAD

=======
>>>>>>> 53807d9b1dfc085c78e28b53d81ecb64b52f0ebc
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Sale;
use App\Http\Requests\SaleRequest;
use App\Models\Book;
use App\Models\User;


class SaleController
{
    public function index()
    {
        #$books = Book::orderByDesc('id')->get();
        ##['books' => $books];

        ##$books = Book::with(['publisher', 'author'])->get();
        ##, compact('books')

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

        #$publishers = Publisher::orderByDesc('id')->get();
        #$authors = Author::orderByDesc('id')->get();
        #return view('book.create',['publishers' => $publishers, 'authors' => $authors]);

        $books = Book::all();
        $users = User::all();
        return view('sale.create', compact('books', 'users'));

        $publishers = Publisher::orderByDesc('id')->get();
        $authors = Author::orderByDesc('id')->get();
        return view('book.create',['publishers' => $publishers, 'authors' => $authors]);

    }



    public function shop()
    {
        $books = Book::where('amount', '>', 0)->get(); // Pegando apenas livros com estoque disponível
        return view('sale.shop', compact('books'));
    }

    public function confirm(Request $request)
{
    $book = Book::findOrFail($request->book_id);
    $totalValue = $book->sale_price * $request->quantity;

    return view('sale.confirm', [
        'book' => $book,
        'quantity' => $request->quantity,
        'total' => $totalValue
    ]);
}
    public function store(Request $request)
    {
        #dd($request->all());
        // Validação dos dados
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
            'total_value' => 'required|numeric',
        ]);
<<<<<<< HEAD

        // Pegando o livro pelo ID
        $book = Book::findOrFail($request->book_id);

        // Verifica se há estoque suficiente
=======
    
        // Pegando o livro
        $book = Book::findOrFail($request->book_id);
    
        // Verificando se tem estoque suficiente
>>>>>>> 53807d9b1dfc085c78e28b53d81ecb64b52f0ebc
        if ($request->quantity > $book->amount) {
            return redirect()->back()->with('error', 'Estoque insuficiente para essa quantidade!');
        }
<<<<<<< HEAD

        // Calculando o valor total
        $totalValue = $book->sale_price * $request->quantity;

=======
    
>>>>>>> 53807d9b1dfc085c78e28b53d81ecb64b52f0ebc
        // Criando a venda
        Sale::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'quantity' => $request->quantity,
            'total_value' => $request->total_value
        ]);
<<<<<<< HEAD

        // Atualizando o estoque do livro
        $book->amount -= $request->quantity;
        $book->save();

        return redirect()->route('sale.index')->with('success', 'Venda criada com sucesso!');
=======
    
        // Atualizando o estoque
        $book->amount -= $request->quantity;
        $book->save();

        return redirect()->route('sale.shop')->with('success', 'Compra realizada com sucesso!');
>>>>>>> 53807d9b1dfc085c78e28b53d81ecb64b52f0ebc
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
<<<<<<< HEAD
=======


>>>>>>> 53807d9b1dfc085c78e28b53d81ecb64b52f0ebc
}
