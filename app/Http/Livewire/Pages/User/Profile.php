<?php

namespace App\Http\Livewire\Pages\User;

use Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $primaryColor;
    public $name;
    public $email;
    public $photo;
    public $showNoti;
    public $pass;
    public $showVerifyPass;
    public $tempPhoto;
    public $photoName;


    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->photoName = $user->photo;
        $this->primaryColor = $user->primary_color;
    }

    public function updatedPhoto()
    {
        $this->tempPhoto = $this->photo->temporaryUrl();
        $this->photoName = '';
    }

    public function render()
    {
        return view('livewire.pages.user.profile');
    }

    public function inputClick()
    {
        if ($this->showNoti) {
            $this->showNoti = false;
        }
    }

    public function selectColor($color)
    {
        $this->primaryColor = $color;
    }

    public function toggleShowPassVerify()
    {
        $this->showVerifyPass = !$this->showVerifyPass;
    }

    public function btnSavePup()
    {

        if (Hash::check($this->pass, Auth::user()->password)) {



            $user = Auth::user();
            $user->email = $this->email;
            $user->name = $this->name;
            $user->primary_color = $this->primaryColor;

            if (isset($this->photo)) {

                $filename = time() . '.' . $this->photo->getClientOriginalExtension();
                $pathFile = 'public/images/user';

                $this->photo->storeAs($pathFile, $filename);
                $user->photo = $filename;
            }

            if ($user->save()) {
                redirect(request()->header('Referer'));
            }
        } else {
            $this->showNoti = true;
        }
    }
}
