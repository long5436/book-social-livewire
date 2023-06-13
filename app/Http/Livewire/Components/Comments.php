<?php

namespace App\Http\Livewire\Components;

use Auth;
use Livewire\Component;
use App\Models\Comment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Lang;

class Comments extends Component
{
    public $book;
    public $post;
    public $content;
    public $contentRep;
    public $comments;
    public $likeDefault = [
        'like' => 0,
        'haha' => 0,
        'surprise' => 0,
        'angry' => 0
    ];

    protected $rules = [
        'content' => 'required',
    ];

    public function mount()
    {
        Lang::setLocale('vi');

        // $d = $this->comments[0];
        // dd(Comment::where('parent_id', 2)->orderBy('created_at', 'desc')->get());
    }

    public function render()
    {
        return view('livewire.components.comments');
    }

    public function timeAgo($comment)
    {

        $createdAt = Carbon::parse($comment->created_at);
        $timeAgo = $createdAt->locale('vi')->diffForHumans();

        return  $timeAgo;
    }

    public function getSubCommentCount($id)
    {
        return Comment::where('parent_id', $id)
            ->where(function ($query) {
                $query->where('is_deleted', false)
                    ->orWhereNull('is_deleted');
            })
            ->count();
    }

    public function btnComment($parentId)
    {
        // dd($this->content);
        // $this->validate();
        $postId = $this->post ? $this->post->id : null;
        $bookId = $this->book ? $this->book->id : null;
        // dd($postId);

        if (Auth::check()) {

            $newComment = Comment::create([
                'book_id' => $bookId,
                'post_id' => $postId,
                'content' => $parentId ? $this->contentRep : $this->content,
                'parent_id' => $parentId ? $parentId : null,
                'user_id' => Auth::user()->id,
                'like' => json_encode($this->likeDefault),
            ]);
            // $newComment->save()
            if ($newComment->save()) {
                $this->content = '';
                // $newComment->user = (object) array(
                //     'id' => Auth::user()->id,
                //     'name' => Auth::user()->name
                // );

                if (!$parentId) {
                    $this->comments->push($newComment);
                }
            }
        }
    }


    public function btnLike($id, $key, $index)
    {
        $comment = Comment::find($id);
        if ($comment) {

            $like = $comment->like  ? json_decode($comment->like) : (object) $this->likeDefault;
            // dd($like->{$key});
            // dd($like);
            $like->{$key} = $like->{$key} + 1;
            $comment->like = json_encode($like);

            if ($comment->save()) {

                $this->comments[$index]->like = json_encode($like);
            }
        }
    }

    public function btnDelete($id, $index)
    {
        $comment = Comment::find($id);
        if ($comment) {
            $comment->is_deleted = true;

            if ($comment->save()) {
                $this->comments->forget($index);
            }
        }
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
