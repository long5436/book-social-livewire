<?php

namespace App\Http\Livewire\Pages\Book;

use Livewire\Component;
use App\Models\Book;

class Home extends Component
{

    public $booksNew;

    public function mount()
    {
        $perPage = 20;
        $page = request()->get('page', 1);
        $this->booksNew = Book::orderBy('created_at', 'desc')
            ->paginate($perPage, ['*'], 'page', $page)
            ->getCollection();
    }

    public function render()
    {
        return view('livewire.pages.book.home');
    }
}
