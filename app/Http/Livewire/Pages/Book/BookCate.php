<?php

namespace App\Http\Livewire\Pages\Book;

use Livewire\Component;
use App\Models\Book;
use App\Models\Category;

class BookCate extends Component
{
    public $cate;
    public $books;
    public $perPage = 20;
    public $totalPages;
    public $page = 1;

    public function mount($slug)
    {
        $str = (explode("-", $slug));
        $id = $str[count($str) - 1];

        $this->page = request()->get('page', 1);
        $this->cate = Category::find($id);
        $books = $this->cate->books()->orderBy('created_at', 'desc')->paginate($this->perPage, ['*'], 'page', $this->page);
        // dd($books);
        $this->books = $books->getCollection();
        $this->totalPages = $books->lastPage();

        // ->orderBy('created_at', 'desc')
    }

    public function render()
    {
        return view('livewire.pages.book.book-cate');
    }
}
