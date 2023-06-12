<?php

namespace App\Http\Livewire\Components;

use Hamcrest\Core\HasToString;
use Livewire\Component;
use Illuminate\Support\Facades\URL;

class Meta extends Component
{
    public $data;
    public $siteName = 'Diễn đàn sách đỉnh cao';
    public $title = '';
    public $description = '';
    public $image = '';
    // public $keywords = 'công nghệ, khoa học, kĩ thuật, mẹo vặt, cộng đồng, thảo luận, hỏi đáp, sửa lỗi, máy tính, sự cố, camera, lỗi điện thoại, lỗi máy tính';

    // default
    public $titleDefault = 'Diễn đàn sách đỉnh cao';
    public $descriptionDefault = 'Diễn đàn sách đỉnh cao';
    public $imageDefault;

    public function mount()
    {
        // dd($this->data->name);
        $this->imageDefault = URL::asset('images/logo.png');

        $this->title = $this->titleDefault;
        $this->description = $this->descriptionDefault;
        $this->image = $this->imageDefault;

        if ($this->data) {
            if (isset($this->data->name)) {
                $this->title = $this->data->name;
            }

            if (isset($this->data->description)) {
                $this->description =  $this->data->description;
            }

            if (isset($this->data->photo)) {
                $this->image = URL::asset('imgs/books/' . $this->data->photo);
            }
        }
    }

    public function render()
    {
        return view('livewire.components.meta');
    }
}
