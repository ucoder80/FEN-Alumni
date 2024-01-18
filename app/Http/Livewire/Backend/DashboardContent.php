<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;

class DashboardContent extends Component
{
    public function render()
    {
        return view('livewire.backend.dashboard-content')->layout('layouts.backend.style');
    }
}
