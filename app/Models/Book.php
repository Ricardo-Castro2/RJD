<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Publisher;
use App\Models\Author;
class Book extends Model
{
    use HasFactory;

    // Campos que podem ser preenchidos via mass assignment
    protected $fillable = [
        'name', 
        'sale_price', 
        'purchase_price', 
        'amount',
        'publisher_id',
        'author_id'
    ];
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

}
