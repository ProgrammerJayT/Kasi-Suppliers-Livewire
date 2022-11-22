<?php

namespace App\Http\Livewire\Partials;

use Livewire\Component;

class Navbar extends Component
{
    public $route, $privilege, $name, $surname, $cartItems = 0, $orders = 0, $wishlistItems = 0, $isLogged = false;

    protected $listeners = ['$refresh' => 'mount'];

    public function mount()
    {
        $this->route = request()->route()->getName();
        session()->has('cart') ? $this->cartItems = count(session()->get('cart')) : $this->cartItems = 0;

        if (!session()->has('account') && !session()->has('profile')) {

            $this->privilege = 'Guest';
            $this->name = 'Guest';
            $this->surname = ' view';
        } else {

            $this->isLogged = true;
            $this->privilege = session()->get('account')->privilege;
            $this->name = session()->get('profile')->name;
            $this->surname = session()->get('profile')->surname;
        }
    }

    public function render()
    {
        return view('livewire.partials.navbar');
    }
}