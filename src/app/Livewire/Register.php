<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Register extends Component
{
    use WithFileUploads;

    public $seasons;
    public $upload_image;

    public function render()
    {
        return view('livewire.register');
    }
}
