<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Models\Chap;
use App\Models\ChapContent;
use Livewire\Component;
use Illuminate\Support\Str;

class BookChapAdd extends Component
{
    public $chaps;
    public $chap;
    public $content;
    public $book;
    public $chapContent;
    public $chapName;
    public $bookId;
    public $chapId;

    public function mount($book_id)
    {
        $this->bookId = $book_id;
    }

    public function render()
    {
        return view('livewire.pages.admin.book-chap-add')->layout('layouts.admin');
    }

    public function updChap()
    {
        $this->validate([
            'chapName' => 'required',
            'content' => 'required'
        ]);

        // dd($this->bookId);

        $chap = Chap::create([
            'name' => $this->chapName,
            'slug' => Str::of($this->chapName)->slug('-'),
            'book_id' => $this->bookId,
            'order_by' => 1
        ]);

        $chap->books()->attach([$this->bookId]);

        if ($chap->save()) {
            $chContent = ChapContent::create([
                'chap_id' => $chap->id,
                'content' => $this->content
            ]);

            if ($chContent->save()) {
                redirect()->route('admin.book.chap.edit',  $chContent->id);
            }
        }
    }
}
