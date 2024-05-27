<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class SignUpContent extends Component
{
    public function render()
    {
        return view('livewire.frontend.sign-up-content')->layout('layouts.frontend.style');
    }
}
