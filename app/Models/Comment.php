<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'post_id',
        'parent_id',
        'user_id',
        'like',
        'content'
    ];

    public function books()
    {
        return $this->belongsTo(Book::class);
    }

    public function posts()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
