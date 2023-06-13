<?php

namespace App\Http\Livewire\Pages\Book;

use App\Models\Book;
use App\Models\Bookmark;
use App\Models\Rating;
use Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class BookAbout extends Component
{
    public $book;
    public $perPage = 20;
    public $page = 1;
    public $chaps;
    public $totalPages;
    public $totalChaps;
    public $chapFirst;
    public $myRating = [];
    public $isShowNoti;
    public $comments;
    public $isHasBookmark;
    public $cateBooks;

    public function mount($slug)
    {
        $this->page = request()->get('page', 1);
        $str = (explode("-", $slug));
        $id = $str[count($str) - 1];

        $book = Book::find($id);
        $chaps = $book->chaps()
            ->orderBy('order_by')
            ->paginate($this->perPage, ['*'], 'page', $this->page);
        $this->chaps = $chaps->getCollection();
        $this->book = $book;
        $this->totalPages = $chaps->lastPage();
        $this->totalChaps = $book->chaps()->count();
        $this->chapFirst = $book->chaps()->where('order_by', 1)->first();
        $this->comments = $this->book->comments->whereNull('parent_id')->whereNull('delete', true);

        if (Auth::check()) {
            $this->myRating = $book->ratings->where('user_id', Auth::user()->id);
            // dd($book->ratings->where('user_id', 1));
            $bookmark = Auth::user()->bookmarks()->where('book_id', $this->book->id)->get();
            if ($bookmark->count() > 0) {
                $this->isHasBookmark = true;
            }
        }

        $category = $book->categories[0];
        $randomBooks = $category->books()
            ->inRandomOrder()
            ->limit(12)
            ->get();
        $this->cateBooks = $randomBooks;
    }

    public function render()
    {
        return view('livewire.pages.book.book-about');
    }

    public function getAverage()
    {
        $result = DB::table('ratings')
            ->select(DB::raw('AVG(rating) as average_rating'))
            ->where('book_id', $this->book->id)
            ->groupBy('book_id')
            ->first();

        if ($result) {
            return intval(round($result->average_rating, 0));
        }

        return 0;
    }

    public function rating($value)
    {
        if (Auth::check()) {

            if (count($this->myRating) > 0) {

                // dd($this->myRating[0]);

                $rt = Rating::find($this->myRating[0]['id']);
                if ($rt) {
                    $rt->rating = $value;

                    if ($rt->save()) {
                        $this->myRating = array($rt);
                    }
                }
            } else {

                $newRating = Rating::create([
                    'book_id' => $this->book->id,
                    'user_id' => Auth::user()->id,
                    'rating' => $value,
                ]);

                if ($newRating->save()) {
                    $this->myRating = array($newRating);
                }
            }

            $this->isShowNoti = true;
        } else {
            redirect()->route('login');
        }
    }

    public function bookmark()
    {
        // dd('clicked');
        if (Auth::check()) {
            $bookmark = Bookmark::create([
                'book_id' => $this->book->id,
                'user_id' => Auth::user()->id
            ]);

            if ($bookmark->save()) {
                $this->isHasBookmark = true;
            }
        } else {
            redirect()->route('login');
        }
    }

    public function deleteBookmark()
    {
        $bookmark = Auth::user()->bookmarks()->where('book_id', $this->book->id)->get();

        if ($bookmark->count() > 0) {
            if ($bookmark[0]->delete()) {
                $this->isHasBookmark = false;
            }
        }
    }
}
