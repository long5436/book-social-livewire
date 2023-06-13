<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\Book;

class MostReadBooks extends Component
{

    public $books = [];

    public function mount()
    {
        $mostReadBooks = Book::orderByDesc('read_count')
            ->limit(12)
            ->get();

        $this->books = $mostReadBooks;
    }

    public function render()
    {
        return view('livewire.components.most-read-books');
    }
}