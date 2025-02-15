<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AuthorController; 
use Illuminate\Http\Request;
use App\Models\menu;
use Illuminate\Support\Facades\Redirect;
use App\Models\Author;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:adm'); // Especifica que é para admins
    }
    
    public function inicio()
    {
        return view('menu.inicio');
    }
}
