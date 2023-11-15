<?php

namespace App\Http\Livewire\Components\Comments;

use Auth;
use Livewire\Component;
use App\Models\Comment;
use Illuminate\Support\Facades\Lang;

class CommentAdd extends Component
{
    public $content;
    public $book;
    public $post;
    public $parentId;
    public $likeDefault = [
        'like' => 0,
        'haha' => 0,
        'surprise' => 0,
        'angry' => 0
    ];


    public function btnComment()
    {
        // dd($this->book);
        // $this->validate();
        $postId = $this->post ? $this->post->id : null;
        $bookId = $this->book ? $this->book->id : null;
        // dd($postId);

        if (Auth::check()) {

            $newComment = Comment::create([
                'book_id' => $bookId,
                'post_id' => $postId,
                'content' => $this->parentId ? $this->contentRep : $this->content,
                'parent_id' => $this->parentId ? $this->parentId : null,
                'user_id' => Auth::user()->id,
                'like' => json_encode($this->likeDefault),
            ]);
            // $newComment->save()
            if ($newComment->save()) {
                $this->content = '';

                // dispatch emit update dom
                $this->dispatch('add-new-comment', newComment: $newComment);

                // $newComment->user = (object) array(
                //     'id' => Auth::user()->id,
                //     'name' => Auth::user()->name
                // );

                // if (!$this->parentId) {
                //     $this->comments->push($newComment);
                // }
            }
        }
    }

    public function render()
    {
        return view('livewire.components.comments.comment-add');
    }
}
