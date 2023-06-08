<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Pagination extends Component
{

    public $currentPage;
    public $totalPage;

    public function render()
    {
        return view('livewire.components.pagination');
    }
}
