<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class BookCard extends Component
{

    public $book;

    public function render()
    {
        return view('livewire.components.book-card');
    }
}
