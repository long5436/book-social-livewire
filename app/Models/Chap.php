<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chap extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'book_id', 'order_by'
    ];


    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    public function chapContent()
    {
        return $this->hasMany(ChapContent::class);
    }
}
