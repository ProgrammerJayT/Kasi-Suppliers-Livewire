<?php

namespace App\Http\Livewire\User\Dashboard;

use App\Models\Customer as ModelsCustomer;
use Livewire\Component;

class Customer extends Component
{
    public $my;

    public function mount()
    {
        $this->my = ModelsCustomer::find(session()->get('profile')->id);
    }

    public function render()
    {
        return view('livewire.user.dashboard.customer');
    }
}
