<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AuthorController; 
use Illuminate\Http\Request;
use App\Models\menu;
use Illuminate\Support\Facades\Redirect;
use App\Models\Author;


class MenuController
{
    public function index()
    {
        return view('menu.index');
    }
}
