<?php
namespace App\Http\Controllers;
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> 53807d9b1dfc085c78e28b53d81ecb64b52f0ebc
=======

>>>>>>> 7c78f0a0f74e89f478a264d7678514ec9da9b949
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Sale;
use App\Http\Requests\SaleRequest;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;




class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Aplica o middleware 'auth' a todas as rotas desse controlador
    }


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
<<<<<<< HEAD
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
=======
        $book = Book::findOrFail($request->book_id);
        $totalValue = $book->sale_price * $request->quantity;

        return view('sale.confirm', [
            'book' => $book,
            'quantity' => $request->quantity,
            'total' => $totalValue
        ]);
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
        
            // Verificando se o usuário está logado
            $userId = auth()->check() ? auth()->id() : null; // Se não estiver logado, user_id será null
        
            // Criando a venda
            $sale = Sale::create([
                'user_id' => $userId,  // Pode ser null se o usuário não estiver logado
                'book_id' => $request->book_id,
                'quantity' => $request->quantity,
                'total_value' => $totalValue,
            ]);
        
            // Atualizando o estoque do livro
            $book->amount -= $request->quantity;
            $book->save();
        
            // Redireciona para a página Pix com o id da venda
            return redirect()->route('sale.pix', ['sale' => $sale->id])->with('success', 'Venda registrada com sucesso!');
        }
        







    public function gerarPix($saleId)
    {
        $sale = Sale::findOrFail($saleId);

        // Gerar número aleatório para a chave Pix
        $pixKey = rand(1000000000000000, 9999999999999999);

        return view('sale.pix', compact('sale', 'pixKey'));
>>>>>>> 7c78f0a0f74e89f478a264d7678514ec9da9b949
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


<<<<<<< HEAD
>>>>>>> 53807d9b1dfc085c78e28b53d81ecb64b52f0ebc
=======


>>>>>>> 7c78f0a0f74e89f478a264d7678514ec9da9b949
}
