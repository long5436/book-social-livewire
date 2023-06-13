<?php

namespace App\Http\Livewire\Pages\Post;

use App\Models\Post;
use Livewire\Component;

class PostView extends Component
{

    public $post;
    public $comments;

    public function mount($slug)
    {
        $str = (explode("-", $slug));
        $id = $str[count($str) - 1];

        // dd($id);
        $this->post = Post::find($id);
        $comments = $this->post->comments->whereNull('parent_id')->whereNull('is_deleted', true);
        $this->comments = $comments;
    }

    public function render()
    {
        return view('livewire.pages.post.post-view');
    }
}
