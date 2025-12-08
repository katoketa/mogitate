<?php

namespace App\Livewire;

use Livewire\Component;

class Products extends Component
{
    public $products =[];
    public $sort_status = "";
    public $keyword;

    public function boot()
    {
        if ($this->sort_status == null) {
            $this->sort_status = "";
        }
        $this->sort();
    }

    public function resetSortStatus()
    {
        $this->sort_status = "";
        $this->sort();
    }

    public function updatedSortStatus()
    {
        $this->sort();
    }

    public function sort()
    {
        if ($this->sort_status === "ascending-order") {
            array_multisort(array_column($this->products, 'price'), SORT_ASC, $this->products);
        } elseif ($this->sort_status === "descending-order") {
            array_multisort(array_column($this->products, 'price'), SORT_DESC, $this->products);
        } else {
            array_multisort(array_column($this->products, 'id'), SORT_ASC, $this->products);
        }
    }

    public function render()
    {
        return view('livewire.products');
    }
}
