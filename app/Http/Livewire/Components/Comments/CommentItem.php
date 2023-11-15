<?php

namespace App\Http\Livewire\Components\Comments;

use Livewire\Component;
use Illuminate\Support\Carbon;
use App\Models\Comment;
use App\Models\React;
use Auth;

class CommentItem extends Component
{
    public $commentItem;

    function mount()
    {
        // dd($this->commentItem);
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

    public function btnLike($key)
    {

        $comment = $this->commentItem;

        if ($comment) {


            $like = $comment->like  ? json_decode($comment->like) : (object) $this->likeDefault;
            // dd($like->{$key});
            // dd($like);

            // $like->{$key} = $like->{$key} + 1;
            // $comment->like = json_encode($like);
            // dd($comment->reacts);

            // $react = React::create([
            //     'user_id' => Auth::user()->id,
            //     'comment_id' => $this->commentItem->id,
            //     'key' => $key,
            // ]);

            $react  = React::where(['comment_id' => $this->commentItem->id, 'user_id' => Auth::user()->id])->first();

            // dd($react);

            if ($react) {
                if ($react->key == $key) {
                    $react->delete();
                    $like->{$key} =  $like->{$key} - 1;
                } else {
                    $like->{$key} = $like->{$key} + 1;
                    $like->{$react->key} =  $like->{$react->key} - 1;
                    $react->key = $key;
                    $react->save();
                }
            } else {
                React::create([
                    'user_id' => Auth::user()->id,
                    'comment_id' => $this->commentItem->id,
                    'key' => $key,
                ])->save();

                $like->{$key} = $like->{$key} + 1;
            }

            $comment->like = json_encode($like);

            if ($comment->save()) {
                $this->commentItem->like = json_encode($like);
            }


            // $react->save();
        }
    }

    public function btnDelete()
    {

        $this->commentItem->is_deleted = true;
        if ($this->commentItem->save()) {
            // $this->comments->forget($index);
        }
    }

    public function timeAgo($comment)
    {
        $createdAt = Carbon::parse($comment->created_at);
        $timeAgo = $createdAt->locale('vi')->diffForHumans();

        return  $timeAgo;
    }

    public function render()
    {


        // return <<<'HTML'
        // <div>
        //     {{$commentItem->id}}
        // </div>
        // HTML;

        if ($this->commentItem->is_deleted) {
            return  <<<'HTML'
             <div class="bg-primary/20 py-1 px-3 rounded-full text-primary my-2">
                  Đã xoá
             </div>
             HTML;
        }

        return view('livewire.components.comments.comment-item');
    }
}
