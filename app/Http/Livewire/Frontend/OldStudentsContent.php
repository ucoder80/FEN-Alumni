<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class OldStudentsContent extends Component
{
    public function render()
    {
        return view('livewire.frontend.old-students-content')->layout('layouts.frontend.style');
    }
}
