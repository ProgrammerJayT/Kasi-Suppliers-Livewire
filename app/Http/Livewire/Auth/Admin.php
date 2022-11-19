<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Admin extends Component
{
    public $route, $name, $surname, $email, $password, $password_confirmation, $privilege;

    public function login()
    {

    }

    public function register()
    {

    }

    public function mount()
    {
        $this->name = 'Login/Register';
        $this->surname = 'Login/Register';
        $this->privilege = 'admin';
    }

    public function render()
    {
        $this->route = Request::route()->getName();
        return view('livewire.auth.admin');
    }
}