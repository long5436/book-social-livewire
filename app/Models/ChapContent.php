<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapContent extends Model
{
    use HasFactory;

    public function Chap()
    {
        return $this->belongsTo(Chap::class);
    }
}
