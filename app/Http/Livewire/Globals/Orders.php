<?php

namespace App\Http\Livewire\Globals;

use App\Models\Orders as ModelsOrders;
use Livewire\Component;
use Illuminate\Support\Facades\Request;

class Orders extends Component
{
    public $route, $privilege, $name, $surname, $orders, $email, $search = null, $sort='date', $level='desc';

    public function mount()
    {
        $this->route = Request::route()->getName();
        $this->privilege = session()->get('account')->privilege;
        $this->name = session()->get('profile')->name;
        $this->surname = session()->get('profile')->surname;
        $this->email = session()->get('account')->email;

        $this->orders = ModelsOrders::where('account_id', session()->get('account')->id)->get();
    }
    public function render()
    {
        if ($this->privilege == 'admin') {
            $this->orders = ModelsOrders::all();
        } else {

            if ($this->search != null) {
                $this->orders = ModelsOrders::where('id', $this->search);
            } else {
                $this->orders = ModelsOrders::where('account_id', session()->get('account')->id);
            }
        }

        $this->orders = $this->orders->orderBy($this->sort, $this->level)->get();

        return view('livewire.globals.orders');
    }
}