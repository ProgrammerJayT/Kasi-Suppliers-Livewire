<?php

namespace App\Http\Livewire\Auth;

use App\Http\Controllers\DBHelpers\RegisterUser;
use App\Models\Admin;
use App\Models\Vendor;
use App\Models\Account;
use Livewire\Component;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $name, $surname, $email, $privilege, $password, $password_confirmation;

    protected $rules = [
        'name' => 'required|alpha',
        'surname' => 'required|alpha',
        'email' => 'required|email|unique:account',
        'password' => 'required|min:8',
        'password_confirmation' => 'required|same:password',
        'privilege' => 'required',
    ];

    public function register()
    {

        $this->validate();

        $createResponse = RegisterUser::register(
            [
                'name' => $this->name,
                'surname' => $this->surname,
                'email' => $this->email,
                'password' => $this->password,
                'privilege' => $this->privilege,
            ]
        );

        if ($createResponse->getStatusCode() == 201) {
            
            session()->put('profile', $createResponse->original['profile']);
            session()->put('account', $createResponse->original['account']);

            return redirect()->route('dashboard');
        } else {
            return back()->with('error', $createResponse->original);
        }
    }

    public function mount()
    {

    }

    public function render()
    {
        //print_r all values
        return view('livewire.auth.register');
    }
}