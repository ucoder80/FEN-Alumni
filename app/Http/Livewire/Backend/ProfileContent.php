<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;

class ProfileContent extends Component
{
    public function render()
    {
        return view('livewire.backend.profile-content')->layout('layouts.backend.style');
    }
}
