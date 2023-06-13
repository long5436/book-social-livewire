<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Pagination extends Component
{

    public $currentPage;
    public $totalPage;

    // public function mount()
    // {
    //     $testpagi = $this->generatePaginationArray(4, 40);
    //     dd($testpagi);
    // }

    public function render()
    {
        return view('livewire.components.pagination');
    }

    // https://anonystick.com/blog-developer/phan-trang-dinh-cao-nhu-stackoverflow-voi-es6-2021041785964287
    public function generatePaginationArray($current, $last)
    {
        $delta = 2;
        $left = $current - $delta;
        $right = $current + $delta + 1;
        $range = [];
        $rangeWithDots = [];
        $l = null;

        for ($i = 1; $i <= $last; $i++) {
            if ($i == 1 || $i == $last || ($i >= $left && $i < $right)) {
                $range[] = $i;
            }
        }

        foreach ($range as $i) {
            if ($l) {
                if ($i - $l === 2) {
                    $rangeWithDots[] = $l + 1;
                } else if ($i - $l !== 1) {
                    $rangeWithDots[] = '...';
                }
            }
            $rangeWithDots[] = $i;
            $l = $i;
        }

        return $rangeWithDots;
    }
}