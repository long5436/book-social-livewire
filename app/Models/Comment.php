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

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function react()
    {
        return $this->belongsTo(React::class);
    }
}
