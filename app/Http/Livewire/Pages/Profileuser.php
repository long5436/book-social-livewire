<?php

namespace App\Http\Livewire\Pages;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profileuser extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $avatar;
    public $joinedTime;

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',

        ]);
    

        $this->joinedTime = "Thời gian tham gia: " . now()->format('d/m/Y H:i:s');
        // Lưu thông tin người dùng
        User::where('id', auth()->user()->id)->update([
            'name' => $this->name,
            'email' => $this->email,

        ]);

        session()->flash('success', 'Thông tin đã được cập nhật thành công!');
    }
    public function render()
    {
        return view('livewire.pages.profileuser');
    }
}
