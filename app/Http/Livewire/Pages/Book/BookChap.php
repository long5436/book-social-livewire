<?php

namespace App\Http\Livewire\Pages\Book;

use Livewire\Component;
use App\Models\ChapContent;
use App\Models\Book;
use App\Models\Category;
use App\Models\Chap;
use Auth;

class BookChap extends Component
{

    public $chap;
    public $chapContent;
    public $book;
    public $cateBooks;
    // public $chaps;
    public $comments;

    public function mount($bookSlug, $slug)
    {
        // kiem tra dang nhap
        if (!Auth::check()) {
            redirect()->route('login');
            return;
        }

        $str = (explode("-", $bookSlug));
        $bookId = $str[count($str) - 1];

        $str = (explode("-", $slug));
        $id = $str[count($str) - 1];
        $book = Book::find($bookId);
        $this->book = $book;
        $this->chap = Chap::find($id);
        $this->chapContent = ChapContent::find($id);
        // $this->chaps = $book->chaps()->orderBy('order_by')->get();
        $comments = $book->comments->whereNull('parent_id')->whereNull('is_deleted', true);

        // foreach ($comments as $comment) {
        //     $user = User::find($comment->user_id);
        //     // dd($user->name);
        //     // $comment->user->id = $comment->user_id;
        //     $comment->user = (object) array(
        //         'id' => $comment->user_id,
        //         'name' => $user->name
        //     );
        // }

        $this->comments = $comments;
        // dd($comments);

        // tang luot doc nhanh chong bang cach tang sau moi lan load "chap page"
        $book->read_count = $book->read_count + 1;
        $book->save();

        $category = $book->categories[0];
        $randomBooks = $category->books()
            ->inRandomOrder()
            ->limit(12)
            ->get();
        $this->cateBooks = $randomBooks;
    }

    public function render()
    {
        return view('livewire.pages.book.book-chap');
    }
}
