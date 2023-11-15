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
    public $parentComment;
    public $likeDefault = [
        'like' => 0,
        'haha' => 0,
        'surprise' => 0,
        'angry' => 0
    ];

    public function btnComment()
    {

        // dd($this->parentComment);

        // dd($this->book);
        // $this->validate();
        $postId = null;
        $bookId = null;

        if ($this->parentComment) {
            $postId = $this->parentComment->post_id;
            $bookId = $this->parentComment->book_id;
            $this->parentId = $this->parentComment->id;
        } else {
            $postId = $this->post ? $this->post->id : null;
            $bookId = $this->book ? $this->book->id : null;
        }

        // dd($postId);

        if (Auth::check()) {

            $newComment = Comment::create([
                'book_id' => $bookId,
                'post_id' => $postId,
                'content' =>  $this->content,
                'parent_id' => $this->parentId ? $this->parentId : null,
                'user_id' => Auth::user()->id,
                'like' => json_encode($this->likeDefault),
            ]);
            // $newComment->save()
            if ($newComment->save()) {
                $this->content = '';

                // dispatch emit update dom
                if ($this->parentComment) {
                    $this->dispatch('add-new-comment-sub', newComment: $newComment);
                } else {
                    $this->dispatch('add-new-comment', newComment: $newComment);
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.components.comments.comment-add');
    }
}
