<?php

namespace App\Http\Livewire\Pages\Book;

use Livewire\Component;
use App\Models\ChapContent;
use App\Models\Book;
use App\Models\User;
use App\Models\Chap;

class BookChap extends Component
{

    public $chap;
    public $chapContent;
    public $book;
    // public $chaps;
    public $comments;

    public function mount($bookSlug, $slug)
    {
        $str = (explode("-", $bookSlug));
        $bookId = $str[count($str) - 1];

        $str = (explode("-", $slug));
        $id = $str[count($str) - 1];
        $this->chap = Chap::find($id);
        $this->chapContent = ChapContent::find($id);
        $this->book = Book::find($bookId);
        // $this->chaps = $book->chaps()->orderBy('order_by')->get();
        // $comments = $chap->comments;

        // foreach ($comments as $comment) {
        //     $comment->user = User::find($comment->user_id);
        // }
    }

    public function render()
    {
        return view('livewire.pages.book.book-chap');
    }
}
