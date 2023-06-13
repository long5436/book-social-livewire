<?php

namespace App\Http\Livewire\Pages\Admin;

use Livewire\Component;
use App\Models\Book;
use App\Models\Category;
use Livewire\WithFileUploads;

class BookEdit extends Component
{
    use WithFileUploads;

    public $book;
    public $cates;
    public $selectedValue;
    public $name;
    public $desc;
    public $startChapId;
    public $tempPhoto;
    public $photoName;
    public $photo;
    public $price;

    public function mount($id)
    {
        $this->book = Book::find($id);
        $this->cates = Category::all();
        $this->photoName = $this->book->photo;

        $this->selectedValue =  $this->book->categories[0]->id;
        $this->name = $this->book->name;
        $this->desc = $this->book->description;
        $this->price = $this->book->price;

        // dd($this->book->chaps);

        if ($this->book->chaps->count() > 0) {
            // dd($this->book->chaps->where('order_by', 1)->first()->id);
            $this->startChapId = $this->book->chaps->where('order_by', 1)->first()->id;
        }
    }

    public function render()
    {
        return view('livewire.pages.admin.book-edit')->layout('layouts.admin');
    }

    public function updatedPhoto()
    {
        $this->tempPhoto = $this->photo->temporaryUrl();
        $this->photoName = '';
    }

    public function updBook()
    {
        $this->validate([
            'name' => 'required',
            'desc' => 'required',
            // 'name' => 'required',
        ]);

        if (isset($this->photo)) {

            $filename = time() . '.' . $this->photo->getClientOriginalExtension();
            $pathFile = 'public/images/books';

            $this->photo->storeAs($pathFile, $filename);
            $this->book->photo = $filename;
        }

        $this->book->name = $this->name;
        $this->book->description = $this->desc;
        $this->book->categories()->sync([$this->selectedValue]);

        if ($this->book->save()) {
            redirect(request()->header('Referer'));
        }
    }
}
