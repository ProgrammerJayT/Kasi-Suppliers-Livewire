<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Login extends Component
{
    public $email, $password;

    //Add rules for validations
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];

    //Process user input
    public function login()
    {
        $this->validate();

        //Do something with user input
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}