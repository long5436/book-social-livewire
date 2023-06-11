<?php

namespace App\Http\Livewire\Pages\Book;

use Livewire\Component;

class Postblog extends Component
{
    public $title;
    public $content;

    public function submit()
    {
        $this->title = '';
        $this->content = '';

        session()->flash('message', 'Bài viết đã được đăng thành công.');
    }
    public function render()
    {
        return view('livewire.pages.book.postblog');
    }
}
