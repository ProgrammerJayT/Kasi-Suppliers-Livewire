<?php

namespace App\Http\Livewire\Globals;

use Livewire\Component;
use Illuminate\Support\Facades\Request;

class Stock extends Component
{
    public $route, $privilege, $name, $surname;

    protected $listeners = [
        'itemAddRemove' => 'render'
    ];

    public function mount()
    {
        if (session()->has('adminTriggered')) {
            $this->name = 'Login/Register';
            $this->surname = 'Login/Register';
            $this->privilege = 'admin';
        } else {
            $this->name = session()->get('profile')->name;
            $this->surname = session()->get('profile')->surname;
            $this->privilege = session()->get('account')->privilege;
        }
        $this->route = Request::route()->getName();
    }

    public function render()
    {

        return view('livewire.globals.stock');
    }
}