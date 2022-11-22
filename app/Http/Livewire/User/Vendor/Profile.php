<?php

namespace App\Http\Livewire\User\Vendor;

use App\Http\Controllers\DBHelpers\UpdatePassword;
use Illuminate\Http\Request;
use Livewire\Component;

class Profile extends Component
{
    public $name, $surname, $email, $newPassword, $newPasswordConfirm, $currentPassword, $address;

    public function mount()
    {
        $this->name = session()->get('profile')->name;
        $this->surname = session()->get('profile')->surname;
        $this->email = session()->get('profile')->email;
    }

    public function updatePassword()
    {
        $this->validate([
            'newPassword' => 'required|min:8',
            'newPasswordConfirm' => 'required|same:newPassword',
            'currentPassword' => 'required'
        ]);

        $updatePassword = UpdatePassword::update(
            session()->get('profile')->id,
            $this->newPassword,
            $this->currentPassword
        );

        return back()->with($updatePassword->getStatusCode() == 200 ? 'success-password' : 'fail-password', $updatePassword->original);
    }

    public function addAddress()
    {
        
    }

    public function render()
    {
        return view('livewire.user.vendor.profile');
    }
}