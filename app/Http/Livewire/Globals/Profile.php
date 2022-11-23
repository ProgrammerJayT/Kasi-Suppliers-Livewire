<?php

namespace App\Http\Livewire\Globals;

use Livewire\Component;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\DBHelpers\UpdatePassword;
use App\Http\Controllers\Stripe;

class Profile extends Component
{
    public $name, $surname, $email, $newPassword, $newPasswordConfirm, $currentPassword, $address = '', $coords;
    public $cardNumber, $cardExpiry, $cardCVC;

    protected $listeners = ['getLatLng', 'getAddress'];

    public function getLatLng($val)
    {
        $this->coords = $val['lat'] . ',' . $val['lng'];
    }

    public function getAddress($val)
    {
        $this->address = $val['name'];
    }

    public function mount()
    {
        $this->name = session()->get('profile')->name;
        $this->surname = session()->get('profile')->surname;
        $this->email = session()->get('profile')->email;
    }

    public function addCard()
    {
        $this->validate([
            'cardNumber' => 'required|numeric|digits:16',
            'cardExpiry' => 'required|date',
            'cardCVC' => 'required|numeric|digits:3',
        ]);

        $cardExpiryDate = explode('-', $this->cardExpiry);
        $cardExpiryYear = $cardExpiryDate[0];
        $cardExpiryMonth = $cardExpiryDate[1];

        $checkCard = Stripe::checkCard($this->cardNumber, $cardExpiryYear, $cardExpiryMonth, $this->cardCVC);
    }

    public function addAddress()
    {
        dd($this->coords);
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

    public function logout()
    {
        session()->flush();
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.globals.profile');
    }
}