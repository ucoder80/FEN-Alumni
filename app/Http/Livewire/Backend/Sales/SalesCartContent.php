<?php

namespace App\Http\Livewire\Backend\Sales;

use Livewire\Component;

class SalesCartContent extends Component
{
    public function render()
    {
        return view('livewire.backend.sales.sales-cart-content')->layout('layouts.backend.style');
    }
}
