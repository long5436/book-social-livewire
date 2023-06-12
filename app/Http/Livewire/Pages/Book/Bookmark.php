<?php

namespace App\Http\Livewire\Pages\Book;

use Auth;
use Livewire\Component;
use App\Models\Bookmark as BookMarkModel;

class Bookmark extends Component
{
    public $bookmarks;
    public $perPage = 20;
    public $totalPages;
    public $page = 1;

    public function mount()
    {
        if (Auth::check()) {
            $this->page = request()->get('page', 1);

            $bookmarks = Auth::user()->bookmarks()->orderBy('created_at', 'desc')->paginate($this->perPage, ['*'], 'page', $this->page);
            $this->bookmarks = $bookmarks->getCollection();
            $this->totalPages = $bookmarks->lastPage();

            // dd($this->bookmarks);
        }
    }

    public function render()
    {
        return view('livewire.pages.book.bookmark');
    }

    public function deleteBookmark($id, $index)
    {
        $bookmark = BookMarkModel::find($id);

        if ($bookmark) {
            if ($bookmark->delete()) {
                $this->bookmarks->forget($index);
            }
        }
    }
}
