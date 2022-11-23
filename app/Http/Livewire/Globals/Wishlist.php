<?php

namespace App\Http\Livewire\Globals;

use App\Models\Wishlists;
use Livewire\Component;
use Illuminate\Support\Facades\Request;

class Wishlist extends Component
{
    public $route, $privilege, $name, $surname, $items;

    public function render()
    {
        $this->items = Wishlists::where('account_id', session()->get('account')->id)->get();

        $this->name = session()->get('profile')->name;
        $this->surname = session()->get('profile')->surname;
        $this->privilege = session()->get('account')->privilege;

        $this->route = Request::route()->getName();

        return view('livewire.globals.wishlist');
    }
}