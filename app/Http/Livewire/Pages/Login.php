<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    use AuthorizesRequests;

    public $email;
    public $password;
    public $remember;
    public $showNoti;
    // public $btnDisable = true;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:3',
    ];

    // public function updated($propertyName)
    // {
    //     if ($this->validate()) {
    //         $this->btnDisable = false;
    //     } else {
    //         $this->btnDisable = true;
    //     }
    // }



    public function mount()
    {
        if (Auth::check()) {
            redirect('/');
        }
    }


    public function render()
    {
        return view('livewire.pages.login')->layout('layouts.empty');
    }

    public function inputClick()
    {
        if ($this->showNoti) {
            $this->showNoti = false;
        }
    }

    public function btnClick()
    {

        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {

            if (Auth::user()->hasRole('user')) {
                // Người dùng đã xác thực thành công
                session()->regenerate();
                redirect('/');
            } else {
                $this->showNoti = true;
                Auth::logout();
            }


            // test
            // $user = Auth::user();
            // $this->emit($user->hasRole('admin'));
        } else {
            $this->showNoti = true;
        }
    }
}
