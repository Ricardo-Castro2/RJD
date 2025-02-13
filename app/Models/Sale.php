<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Book;

class Sale extends Model
{
    use HasFactory;

    // Campos que podem ser preenchidos via mass assignment
    protected $fillable = [
        'name', 
        'total_value',
        'quantity', 
        'book_id',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
=======

class Sale extends Model
{
    //
>>>>>>> 1944db98315db0b8916714091e0cbf63b9249b1c
}
