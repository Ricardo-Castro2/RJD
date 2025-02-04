<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        //recuperar o registro do banco de dados
        $users= User::orderByDesc('id')->get();

        return view('users.index',['users' => $users]);
    }
    public function show(User $user)
    {
        return view('users.show', ['user'=>$user]);
    }


    public function create()
    {
        return view('users.create');
    }     

    #new
    public function perfil()
    {
        return view('users.perfil');
    }    

    public function cliente()
    {
        return redirect()->route('user.cliente');
    }

    public function adm()
    {
        return redirect()->route('user.adm');
    }

    public function clienteview()
    {
        return view('users.cliente');
    }

    public function admview()
    {
        return view('users.adm');
    }

    public function loginStore(UserRequest $request)
    {
        //cadastrar banco de dados no registro
        User::adm([
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect()->route('user.index')->with('success','usuario logado com sucesso');
    }

    public function store(UserRequest $request)
    {
        $request->validated();
        //cadastrar banco de dados no registro
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect()->route('user.index')->with('success','usuario cadastrado com sucesso');
      
    }
    public function edit(User $user)
    {
        return view('users.edit',['user'=>$user]);
        

    }
    public function update(UserRequest $request, User $user)
    {
        $request-> validated();
       
        //editar informações banco de dados
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,

        ]);
        
        return redirect()-> route('user.show',['user' => $user->id])->with('success','usuario editado com sucesso!');


    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success','usuario deletado com sucesso');
    }
    
}
