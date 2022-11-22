<?php

namespace App\Http\Livewire\User\Dashboard;

use App\Models\Vendor as ModelsVendor;
use Livewire\Component;

class Vendor extends Component
{
    public $my;

    public function mount()
    {
        $this->my = ModelsVendor::find(session()->get('profile')->id);
    }

    public function render()
    {
        return view('livewire.user.dashboard.vendor');
    }
}
