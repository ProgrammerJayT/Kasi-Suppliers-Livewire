<?php

namespace App\Http\Livewire\Partials;

use Livewire\Component;

class Navbar extends Component
{
    public $route, $privilege, $name, $surname;

    public function mount()
    {
        $this->route = request()->route()->getName();

        if (!session()->has('account') && !session()->has('profile')) {

            $this->privilege = 'Guest';
            $this->name = 'Guest';
            $this->surname = ' view';
        } else {

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