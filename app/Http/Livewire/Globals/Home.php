<?php

namespace App\Http\Livewire\Globals;

use App\Http\Controllers\CartControl;
use App\Models\Items;
use Livewire\Component;
use App\Models\Categories;
use Illuminate\Support\Facades\Request;

class Home extends Component
{

    public $items, $categories, $itemCategory, $itemDescription, $itemName, $itemQuantity, $itemPrice, $itemImage;

    public $newName, $newCategory, $newImage, $newDescription, $newPrice, $newQuantity, $search = '', $sort = 'price', $level = 'asc';
    public $route, $privilege, $name, $surname;

    public function mount()
    {
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
        $this->items = Items::where('name', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->level)
            ->get();

        return view('livewire.globals.home');
    }
}