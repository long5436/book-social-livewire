<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'chap_id',
        'parent_id',
        'user_id',
        'like_count',
        'content'
    ];

    public function chaps()
    {
        return $this->belongsTo(Chap::class);
    }
}
