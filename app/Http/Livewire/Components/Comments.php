<?php

namespace App\Http\Livewire\Components;

use Auth;
use Livewire\Component;
use App\Models\Comment;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Lang;

class Comments extends Component
{
    public $book;
    public $post;
    public $content;
    public $contentRep;
    public $comments;


    protected $rules = [
        'content' => 'required',
    ];

    public function mount()
    {
        Lang::setLocale('vi');

        if (isset($this->book)) {
            $this->comments = $this->book->comments->whereNull('parent_id')->whereNull('is_deleted', true);
        }

        // $d = $this->comments[0];
        // dd(Comment::where('parent_id', 2)->orderBy('created_at', 'desc')->get());
    }

    public function render()
    {
        return view('livewire.components.comments');
    }

    #[On('add-new-comment')]
    public function postAdded($newComment)
    {
        $newComment = (object) $newComment;
        // $newComment->user = (object) array(
        //     'id' => Auth::user()->id,
        //     'name' => Auth::user()->name
        // );

        $d = Comment::find($newComment->id);
        $this->comments->add($d);
    }


    public function loadSubComments($id, $index)
    {
        $subComment = Comment::where('parent_id', $id)
            ->where(function ($query) {
                $query->where('is_deleted', false)
                    ->orWhereNull('is_deleted');
            })
            ->orderBy('created_at', 'desc')
            ->get();
        // dd($subComment);
        $this->comments[$index]->sub =  $subComment;
    }
}
