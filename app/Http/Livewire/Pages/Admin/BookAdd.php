<?php

namespace App\Http\Livewire\Pages\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Support\Str;

class BookAdd extends Component
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

    public function mount()
    {
        // $this->book = Book::find($id);
        $this->cates = Category::all();
        // $this->photoName = $this->book->photo;

        // $this->selectedValue =  $this->book->categories[0]->id;
        // $this->name = $this->book->name;
        // $this->desc = $this->book->description;

        // if ($this->book->chaps->count() > 0) {
        // dd($this->book->chaps->where('order_by', 1)->first()->id);
        // $this->startChapId = $this->book->chaps->where('order_by', 1)->first()->id;
        // }
    }

    public function render()
    {
        return view('livewire.pages.admin.book-add')->layout('layouts.admin');
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
            'photo' => 'required',
            'selectedValue' => 'required'
        ]);

        if (isset($this->photo)) {

            $filename = time() . '.' . $this->photo->getClientOriginalExtension();
            $pathFile = 'public/images/books';

            $this->photo->storeAs($pathFile, $filename);

            $book = Book::create([
                'name' => $this->name,
                'slug' => Str::of($this->name)->slug('-'),
                'description' => $this->desc,
                'photo' =>  $filename,
                'read_count' => 0,
                'price' => $this->price,
            ]);

            $book->categories()->attach([$this->selectedValue]);

            if ($book->save()) {
                redirect()->route('admin.book.edit', $book->id);
            }
        }
    }
}
