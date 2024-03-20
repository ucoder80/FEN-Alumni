<?php

namespace App\Http\Livewire\Backend\Reports;

use Livewire\Component;

class OrdersReportsContent extends Component
{
    public function render()
    {
        return view('livewire.backend.reports.orders-reports-content')->layout('layouts.backend.style');
    }
}
