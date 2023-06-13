<?php

namespace App\Http\Livewire\Pages\Post;

use Livewire\Component;
use App\Models\Book;
use App\Models\Post;
use Auth;

class CreatePost extends Component
{
    public $books;
    public $bookSelected;
    public $name;
    public $search;
    public $content;

    protected $rules = [
        'name' => 'required',
        'bookSelected' => 'required',
        'content' => 'required',
    ];

    public function render()
    {
        return view('livewire.pages.post.create-post',)->layout('layouts.editor');
    }

    public function updatedSearch()
    {
        // dd(empty($this->search));
        if (empty($this->search)) {
            $this->books = null;
        } else {


            $books = Book::query()
                ->where('name', 'LIKE', '%' . $this->search . '%')
                ->orderBy('created_at', 'desc')->limit(6)->get();

            // dd($books);
            $this->books = $books;
        }
    }

    public function updatedContent()
    {
        // dd($this->content);
    }

    public function selectBook($book)
    {
        $this->bookSelected = $book;
        // dd($this->bookSelected);
        $this->books = null;
    }

    public function resetSelect()
    {
        $this->bookSelected = null;
        $this->search = '';
    }

    public function btnClick()
    {

        $this->validate();

        $post = Post::create([
            'user_id' => Auth::user()->id,
            'book_id' => $this->bookSelected['id'],
            'name' => $this->name,
            'content' => $this->content,
        ]);

        if ($post->save()) {
            redirect('/');
        }
    }

    // public function test()
    // {
    //     dd($this->content);
    // }
}
