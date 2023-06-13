<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Book;

class ChapControlAdmin extends Component
{

    public $chap;
    public $chaps;
    public $selectedValue;
    public $bookSlug;
    public $currentUrl;

    public function mount()
    {
        // $this->currentUrl = url()->current();
        // $this->bookSlug = Str::between($this->currentUrl, 'sach/', '/');

        // dd($this->chap);

        if ($this->chap) {

            $book = Book::find($this->chap->book_id);
            $this->chaps = $book->chaps()->orderBy('order_by')->get();
            $this->selectedValue = $this->chap->id;
            // dd($this->chap->book_id);
        }
    }

    public function render()
    {
        return view('livewire.components.chap-control-admin');
    }


    public function selectChap()
    {


        // $chapSlug = $this->chaps->firstWhere('id', $this->selectedValue)->slug;
        // dd($this->bookSlug);

        // $redirectUrl = route('book.chap', [$this->bookSlug, $chapSlug . '-' . $this->selectedValue]);

        // dd($redirectUrl);
        redirect()->route('admin.book.chap.edit', $this->selectedValue);
    }
}
