<?php

namespace App\Http\Livewire\Frontend;

use App\Models\User;
use Livewire\Component;

class HomeContent extends Component
{
    public function render()
    {
        $data = User::where('roles_id',4)->get();
        return view('livewire.frontend.home-content',compact('data'))->layout('layouts.frontend.style');
    }
}
