<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Comments extends Component
{
    public $chap;

    public function render()
    {
        return view('livewire.components.comments');
    }
}
