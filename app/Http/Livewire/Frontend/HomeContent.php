<?php

namespace App\Http\Livewire\Frontend;

use App\Models\User;
use App\Models\Slide;
use Livewire\Component;

class HomeContent extends Component
{
    public function render()
    {
        $data = User::where('roles_id',4)->get();
        $slide  = Slide::get();
        return view('livewire.frontend.home-content',compact('data','slide'))->layout('layouts.frontend.style');
    }
}
