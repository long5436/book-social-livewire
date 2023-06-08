<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class BookGrid extends Component
{
    public $books;

    public function render()
    {
        return view('livewire.components.book-grid');
    }
}