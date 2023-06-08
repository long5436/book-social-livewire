<?php

namespace App\Http\Livewire\Pages\Book;

use App\Models\Book;
use Livewire\Component;

class BookAbout extends Component
{
    public $book;
    public $perPage = 20;
    public $page = 1;
    public $chaps;
    public $totalPages;
    public $totalChaps;
    public $chapFirst;

    public function mount($slug)
    {
        $this->page = request()->get('page', 1);
        $str = (explode("-", $slug));
        $id = $str[count($str) - 1];

        $book = Book::find($id);
        $chaps = $book->chaps()
            ->orderBy('order_by')
            ->paginate($this->perPage, ['*'], 'page', $this->page);
        $this->chaps = $chaps->getCollection();

        $this->book = $book;
        $this->totalPages = $chaps->lastPage();
        $this->totalChaps = $book->chaps()->count();
        $this->chapFirst = $book->chaps()->where('order_by', 1)->first();
    }

    public function render()
    {
        return view('livewire.pages.book.book-about');
    }
}
