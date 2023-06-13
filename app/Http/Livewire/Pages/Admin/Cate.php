<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class Cate extends Component
{

    public $categories;
    public $inputAddCate;
    public $isShowModal;
    public $cateSelected;
    public $cateEdit;

    public function mount()
    {
        $this->categories =  Category::all();
    }


    public function render()
    {
        return view('livewire.pages.admin.cate')->layout('layouts.admin');
    }

    public function addCate()
    {
        $this->validate([
            'inputAddCate' => 'required'
        ]);

        $cate = Category::create([
            'name' => $this->inputAddCate,
            'slug' => Str::of($this->inputAddCate)->slug('-'),
        ]);

        if ($cate->save()) {
            $this->categories->push($cate);
            // $this->categories =  Category::all();
            // dd($this->categories);
            $this->inputAddCate = '';
        }
    }

    public function selectCate($cate)
    {
        $this->cateSelected = $cate;
        $this->cateEdit = $cate['name'];
        $this->isShowModal = true;
    }

    public function closeModal()
    {
        $this->cateSelected = null;
        $this->isShowModal = false;
    }

    public function updateCate()
    {
        $this->validate([
            'cateEdit' => 'required'
        ]);

        $cate = Category::find($this->cateSelected['id']);
        $cate->name = $this->cateEdit;

        if ($cate->save()) {
            $this->categories =  Category::all();
            $this->closeModal();
        }
    }

    public function deleteCate($index)
    {
        $cate = Category::find($this->categories[$index]->id);
        $cate->is_deleted = true;

        if ($cate->save()) {
            $this->categories[$index] = $cate;
        }
    }

    public function restoreCate($index)
    {
        $cate = Category::find($this->categories[$index]->id);
        $cate->is_deleted = false;

        if ($cate->save()) {
            $this->categories[$index] = $cate;
        }
    }
}
