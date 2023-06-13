<?php

namespace App\Http\Livewire\Components;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Carbon;

class SidebarPost extends Component
{

    public $posts;

    public function mount()
    {
        $this->posts = Post::orderBy('created_at', 'desc')->limit(10)->get();
        // dd($this->posts[0]->user);
    }

    public function render()
    {
        return view('livewire.components.sidebar-post');
    }

    public function timeAgo($post)
    {

        $createdAt = Carbon::parse($post->created_at);
        $timeAgo = $createdAt->locale('vi')->diffForHumans();

        return  $timeAgo;
    }
}
