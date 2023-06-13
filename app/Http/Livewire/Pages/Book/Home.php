<?php

namespace App\Http\Livewire\Pages\Book;

use Livewire\Component;
use App\Models\Book;

class Home extends Component
{
    public $booksNew;
    public $perPage = 20;
    public $totalPages;
    public $page = 1;

    public function mount()
    {
        $this->page = request()->get('page', 1);
        $books = Book::orderBy('created_at', 'desc')
            ->where('is_deleted', false)
            ->orWhereNull('is_deleted')
            ->paginate($this->perPage, ['*'], 'page', $this->page);

        $this->booksNew = $books->getCollection();
        $this->totalPages = $books->lastPage();
    }

    public function render()
    {
        return view('livewire.pages.book.home');
    }
}
