<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class HomeContent extends Component
{
    public function render()
    {
        return view('livewire.frontend.home-content')->layout('layouts.frontend.style');
    }
}
