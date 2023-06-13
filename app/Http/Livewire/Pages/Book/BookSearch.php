<?php

namespace App\Http\Livewire\Pages\Book;

use Livewire\Component;
use App\Models\Book;

class BookSearch extends Component
{
    public $books;
    public $perPage = 20;
    public $totalPages;
    public $page = 1;
    public $keyword;


    public function mount()
    {
        $this->page = request()->get('page', 1);
        $this->keyword = request()->get('name', '');

        $books = Book::query()
            ->where('name', 'LIKE', '%' . $this->keyword . '%')
            ->orderBy('created_at', 'desc')
            ->where('is_deleted', false)
            ->orWhereNull('is_deleted')
            ->paginate($this->perPage, ['*'], 'page', $this->page);

        // dd($books);

        $this->books = $books->getCollection();
        $this->totalPages = $books->lastPage();
    }


    public function render()
    {
        return view('livewire.pages.book.book-search');
    }
}
