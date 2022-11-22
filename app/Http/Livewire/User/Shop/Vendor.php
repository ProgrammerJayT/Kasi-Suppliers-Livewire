<?php

namespace App\Http\Livewire\User\Shop;

use App\Models\Items;
use Livewire\Component;
use App\Models\Categories;

class Vendor extends Component
{
    public $items, $categories, $itemCategory, $itemDescription, $itemName, $itemQuantity, $itemPrice, $itemImage;

    public $newName, $newCategory, $newImage, $newDescription, $newPrice, $newQuantity, $search = '', $sort = 'price', $level = 'asc';
    public $route, $privilege, $name, $surname;

    public function mount()
    {
        $this->items = Items::all();
        $this->categories = Categories::all();
    }

    public function render()
    {
        $this->categories = Categories::all();
        $this->items = Items::where('vendor_id', '!=', session()->get('profile')->id)
            ->where('name', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->level)
            ->get();

        return view('livewire.user.shop.vendor');
    }
}