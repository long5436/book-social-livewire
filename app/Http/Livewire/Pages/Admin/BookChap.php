<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Models\Chap;
use App\Models\ChapContent;
use Livewire\Component;
use App\Models\Book;

class BookChap extends Component
{

    public $chaps;
    public $chap;
    public $content;
    public $book;
    public $chapContent;
    public $chapName;

    public function mount($id)
    {
        $chap = Chap::find($id);
        $this->chap = $chap;
        $this->chapName = $chap->name;
        $this->chapContent = $chap->chapContent->first();
        if ($this->chapContent) {
            $this->content = $this->chapContent->content;
        }

        // $this->chaps = Book::find($chap->book_id)->chaps()->orderBy('order_by')->get();
    }

    public function render()
    {
        return view('livewire.pages.admin.book-chap')->layout('layouts.admin');
    }

    public function updChap()
    {

        $this->validate([
            'content' => 'required',
            'chapName' => 'required',
        ]);

        if ($this->chapName != $this->chap->name) {
            $this->chap->name = $this->chapName;
            $this->chap->save();
        }

        if ($this->chapContent) {
            $this->chapContent->content = $this->content;

            if ($this->chapContent->save()) {
                redirect(request()->header('Referer'));
            }
        } else {
            $chContent = ChapContent::create([
                'chap_id' => $this->chap->id,
                'content' => $this->content
            ]);

            if ($chContent->save()) {
                redirect(request()->header('Referer'));
            }
        }
    }
}
