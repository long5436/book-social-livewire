<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class BookCard extends Component
{

    public $book;

    public function render()
    {
        return view('livewire.components.book-card');
    }

    public function getAverage()
    {
        $result = DB::table('ratings')
            ->select(DB::raw('AVG(rating) as average_rating'))
            ->where('book_id', $this->book->id)
            ->groupBy('book_id')
            ->first();

        if ($result) {

            return intval(round($result->average_rating, 0));
        }

        return 0;
    }
}
