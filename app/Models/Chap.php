<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chap extends Model
{
    use HasFactory;

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    public function chapContent()
    {
        return $this->hasMany(ChapContent::class);
    }
}
