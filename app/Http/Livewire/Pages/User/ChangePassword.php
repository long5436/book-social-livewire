<?php

namespace App\Http\Livewire\Pages\User;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ChangePassword extends Component
{
    // public $email;
    public $password;
    public $newPass;
    public $reNewPass;
    // public $remember;
    public $showNoti;
    public $message;


    protected $rules = [
        'password' => 'required',
        'newPass' => 'required',
        'reNewPass' => ['required', 'same:newPass']

    ];

    public function render()
    {
        return view('livewire.pages.user.change-password');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
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

        if (Hash::check($this->password, Auth::user()->password)) {

            $user = Auth::user();
            $user->password = Hash::make($this->newPass);

            if ($user->save()) {
                redirect()->route('user.profile');
            }
        } else {
            $this->showNoti = true;
        }
    }
}
