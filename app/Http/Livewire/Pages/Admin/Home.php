<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Models\Book;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class Home extends Component
{

    public $countUser;
    public $countBook;
    public $countPost;
    public $countComment;

    public function mount()
    {
        $this->countUser = User::count();
        $this->countBook = Book::count();
        $this->countPost = Post::count();
        $this->countComment  = Comment::count();
    }

    public function render()
    {
        return view('livewire.pages.admin.home')->layout('layouts.admin');;
    }
}
