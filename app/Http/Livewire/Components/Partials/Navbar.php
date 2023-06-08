<?php

namespace App\Http\Livewire\Components\Partials;

use Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $isNavMobile;

    public function render()
    {
        return view('livewire.components.partials.navbar');
    }

    public function toggleMobileNav()
    {
        $this->isNavMobile = $this->isNavMobile ? false : true;
    }

    public function btnLogout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        redirect('/');
    }
}
