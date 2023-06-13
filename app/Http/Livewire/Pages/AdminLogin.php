<?php

namespace App\Http\Livewire\Pages;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminLogin extends Component
{
    use AuthorizesRequests;

    public $email;
    public $password;
    public $showNoti;

    public function mount()
    {
        if (Auth::check() && Auth::user()->hasRole('admin')) {
            redirect()->route('admin.home');
        }
    }

    public function render()
    {
        return view('livewire.pages.admin-login')->layout('layouts.empty');
    }


    public function inputClick()
    {
        if ($this->showNoti) {
            $this->showNoti = false;
        }
    }

    public function btnClick()
    {
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            // Người dùng đã xác thực thành công

            if (Auth::user()->hasRole('admin')) {
                session()->regenerate();
                redirect()->route('admin.home');
            } else {
                Auth::logout();
                $this->showNoti = true;
            }


            // test
            // $user = Auth::user();
            // $this->emit($user->hasRole('admin'));
        } else {
            $this->showNoti = true;
        }
    }
}
