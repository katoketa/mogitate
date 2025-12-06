<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Detail extends Component
{
    use WithFileUploads;

    public $product = [];
    public $seasons = [];
    public $product_image;

    public function render()
    {
        return view('livewire.detail');
    }
}
