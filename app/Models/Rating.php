<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'user_id',
        'rating',
    ];

    public function book()
    {
        $this->belongsTo(Book::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
