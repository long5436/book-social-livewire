<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class NotiRating extends Component
{
    public $isShow;

    public function mount()
    {
        $this->isShow = true;
    }

    public function render()
    {
        return view('livewire.components.noti-rating');
    }

    public function closeNoti()
    {
        $this->isShow = false;
        // dd($this->isShow);
        $this->emitUp('refreshParentComponent');
        return;
    }
}
