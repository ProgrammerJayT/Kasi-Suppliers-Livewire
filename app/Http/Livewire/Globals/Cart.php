<?php

namespace App\Http\Livewire\Globals;

use App\Models\Items;
use Livewire\Component;

class Cart extends Component
{
    public $cartItems, $isLogged = false, $items, $totalPrice = 0, $quantity = array();

    public function mount()
    {
        session()->has('cart') ? $this->cartItems = session()->get('cart') : $this->cartItems = [];
        session()->has('account') && session()->has('profile') ? $this->isLogged = true : $this->isLogged = false;
        $this->items = Items::all();

        for ($i = 0; $i < count($this->cartItems); $i++) {
            $this->quantity[(int) $this->cartItems[$i]] = 1;
        }
    }

    public function removeItem($id)
    {
        $newCart = array_diff($this->cartItems, [$id]);
        session()->put('cart', array_values($newCart));

        $this->cartItems = session()->get('cart');

        $this->emitTo('partials.navbar', '$refresh');

        //Set session message
        return back()->with('item-remove', 'Item removed from cart');
    }

    public function clear()
    {
        $this->cartItems = array();
        $this->totalPrice = 0;
        $this->quantity = array();
        // $this->enterQty = null;

        session()->pull('cart');

        $this->emitTo('partials.navbar', '$refresh');
    }

    public function render()
    {
        //Get sum of all items in cart
        $this->totalPrice = 0;

        foreach ($this->items as $item) {
            if (in_array($item->id, $this->cartItems) && count($this->cartItems) > 0) {
                if ($this->quantity[$item->id] == '' || $this->quantity[$item->id] <= 0) {
                    $this->quantity[$item->id] = 1;
                }
                $this->totalPrice += (int) $item->price * (int) $this->quantity[$item->id];
            }
        }
        return view('livewire.globals.cart');
    }
}