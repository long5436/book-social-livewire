<?php

namespace App\Http\Livewire\Components\Admin\Partials;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public function render()
    {
        return view('livewire.components.admin.partials.navbar');
    }

    public function logout()
    {
        Auth::logout();
        redirect()->route('admin.home');
    }
}
