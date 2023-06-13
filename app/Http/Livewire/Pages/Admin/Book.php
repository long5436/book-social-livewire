<?php

namespace App\Http\Livewire\Pages\Admin;

use Livewire\Component;
use App\Models\Book as BookModel;

class Book extends Component
{
    public $books = [];
    public $perPage = 20;
    public $totalPages;
    public $page = 1;

    public function mount()
    {
        $this->page = request()->get('page', 1);
        $books = BookModel::orderBy('created_at', 'desc')
            ->paginate($this->perPage, ['*'], 'page', $this->page);

        $this->books = $books->getCollection();
        $this->totalPages = $books->lastPage();
    }

    public function render()
    {
        return view('livewire.pages.admin.book')->layout('layouts.admin');
    }

    public function deleteCate($index)
    {
        $cate = BookModel::find($this->books[$index]->id);
        $cate->is_deleted = true;

        if ($cate->save()) {
            $this->books[$index] = $cate;
        }
    }

    public function restoreCate($index)
    {
        $cate = BookModel::find($this->books[$index]->id);
        $cate->is_deleted = false;

        if ($cate->save()) {
            $this->books[$index] = $cate;
        }
    }
}
