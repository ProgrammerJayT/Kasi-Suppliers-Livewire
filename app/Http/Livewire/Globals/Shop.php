<?php

namespace App\Http\Livewire\Globals;

use App\Models\Items;
use Livewire\Component;
use App\Models\Categories;
use App\Http\Controllers\CartControl;
use Illuminate\Support\Facades\Request;

class Shop extends Component
{

    public $items, $categories, $itemCategory, $itemDescription, $itemName, $itemQuantity, $itemPrice, $itemImage;

    public $newName, $newCategory, $newImage, $newDescription, $newPrice, $newQuantity, $search = '', $sort = 'price', $level = 'asc';
    public $route, $privilege, $name, $surname;

    public function mount()
    {

        $this->privilege = session()->get('account')->privilege;

        $this->items = Items::all();
        $this->categories = Categories::all();
    }

    public function addToCart($id)
    {

        $addItem = CartControl::add($id);

        $this->emitTo('partials.navbar', '$refresh');

        if ($addItem->status() == 200) {
            return back()->with('add-success', $addItem->content());
        } else {
            return back()->with('add-fail', $addItem->content());
        }
    }

    public function render()
    {
        $this->categories = Categories::all();

        if ($this->privilege == 'vendor') {
            $this->items = Items::where('vendor_id', '!=', session()->get('profile')->id)
                ->where('name', 'like', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->level)
                ->get();
        } else {
            $this->items = Items::where('name', 'like', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->level)
                ->get();
        }

        return view('livewire.globals.shop');
    }
}