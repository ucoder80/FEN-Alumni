<?php

namespace App\Http\Livewire\Backend\Orders;

use Livewire\Component;

class OrdersContent extends Component
{
    public function render()
    {
        return view('livewire.backend.orders.orders-content')->layout('layouts.backend.style');
    }
}
