<?php

namespace App\Http\Livewire\Components;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Category::where('is_deleted', false)
            ->orWhereNull('is_deleted')->get();
    }

    public function render()
    {
        return view('livewire.components.categories');
    }
}
