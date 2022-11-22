<?php

namespace App\Http\Livewire\User\Vendor;

use App\Models\Categories;
use App\Models\Items;
use Livewire\Component;

class Shop extends Component
{
    public $items, $categories;

    public function mount()
    {
        $this->items = Items::where('vendor_id', '!=', session()->get('profile')->id)->get();
        $this->categories = Categories::all();
    }

    public function render()
    {
        return view('livewire.user.vendor.shop');
    }
}