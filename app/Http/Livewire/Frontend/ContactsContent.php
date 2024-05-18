<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class ContactsContent extends Component
{
    public function render()
    {
        return view('livewire.frontend.contacts-content')->layout('layouts.frontend.style');
    }
}
