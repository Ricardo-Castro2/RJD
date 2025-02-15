<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Sale;
use App\Http\Requests\SaleRequest;
use App\Models\Book;
use App\Models\User;
use App\Models\Publisher;
use App\Models\Author;
use Illuminate\Support\Facades\Auth;


class AdmsaleController extends Controller
{
    public function index()
    {
        
        #$sales = Sale::orderByDesc('id')->get();
        #$sales = Sale::with(['publisher', 'author'])->orderByDesc('id')->get();
        $sales = Sale::with(['book.publisher', 'book.author'])->orderByDesc('id')->get();
        ##['sales' => $sales];
        #dd($sales);

        ##$books = Book::with(['publisher', 'author'])->get();
        ##, compact('books')

        #$books = Book::with(['publisher', 'author'])->get();
        #, compact('books')

        return view('admsale.index', compact('sales'));
    }



    public function show(Author $author)
    {
        return view('author.show', ['author' => $author]);
    }


    public function create()
    {
        $books = Book::where('amount', '>', 0)->get(); // Pegando apenas livros com estoque disponível
        $users = User::all();
        return view('admsale.create', compact('books', 'users'));
    }


    #dd($request->all());

    
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
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
        
        $userId = $request->user_id;
        // Pegando o ID do usuário logado (seja cliente ou admin)
        #$userId = auth()->id();
        
        #if (!$userId) {
            #return redirect()->back()->with('error', 'Usuário não autenticado para realizar a compra!');
        #}
        
        // Criando a venda com o ID do usuário logado
        $sale = Sale::create([
            'user_id' => $userId,  
            'book_id' => $request->book_id,
            'quantity' => $request->quantity,
            'total_value' => $totalValue,
            ]);
        
        // Atualizando o estoque do livro
        $book->amount -= $request->quantity;
        $book->save();
        
            // Redireciona para a página de vendas
        return redirect()->route('admsale.index')->with('success', 'Venda registrada com sucesso!');
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
