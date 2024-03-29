<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'is_deleted',
        'description',
        'price',
        'read_count',
        'photo'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function chaps()
    {
        return $this->belongsToMany(Chap::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
