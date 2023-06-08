<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $rePassword;
    public $remember;
    public $showNoti;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:3',
        'rePassword' => ['required', 'same:password']
    ];

    public function render()
    {
        return view('livewire.pages.register');
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

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ])->roles()
            ->attach(Role::where('name', 'user')->first());

        event(new Registered($user));

        redirect()->route('login');
    }
}
