<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class AboutsContent extends Component
{
    public function render()
    {
        return view('livewire.frontend.abouts-content')->layout('layouts.frontend.style');
    }
}
