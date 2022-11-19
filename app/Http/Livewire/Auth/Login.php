<?php

namespace App\Http\Livewire\Auth;

use App\Http\Controllers\DBHelpers\LoginUser;
use App\Models\Account;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Login extends Component
{
    public $email, $password, $admin = '#_admin.k@si.c0m';

    //Add rules for validations
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];

    //Process user input
    public function login()
    {
        $this->validate();

        try {

            $loginAttempt = LoginUser::read(
                [
                    'email' => $this->email,
                    'password' => $this->password
                ]
            );

            if ($loginAttempt->getStatusCode() == 200) {
                return redirect()->route('dashboard')->with('welcome', 'Welcome back ' . $loginAttempt->original['profile']->name);
            } else {
                $this->password = '';
                return back()->with('fail', $loginAttempt->original);
            }

        } catch (\Throwable $th) {
            //throw $th;
            $this->password = '';
            return back()->with('fail', $th->getMessage());
        }
    }

    public function adminPortal()
    {
        session()->put('adminTriggered', true);

        return redirect()->route('admin');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}