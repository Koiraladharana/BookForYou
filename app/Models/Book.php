<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'author', 'category', 'photo', 'location', 'price', 
        'email', 'phone', 'have_book', 'want_book', 'status', 'user_id', 'isbn', 'publication'
    ];

    // Relationship: A book belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
