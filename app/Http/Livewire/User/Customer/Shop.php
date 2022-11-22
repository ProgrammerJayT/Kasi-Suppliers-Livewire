<?php

namespace App\Http\Livewire\User\Customer;

use App\Models\Items;
use Livewire\Component;
use App\Models\Categories;

class Shop extends Component
{
    public $items, $categories;

    public function mount()
    {
        $this->items = Items::all();
        $this->categories = Categories::all();
    }

    public function render()
    {
        return view('livewire.user.customer.shop');
    }
}
