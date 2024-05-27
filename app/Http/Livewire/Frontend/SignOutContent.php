<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SignOutContent extends Component
{
    public function render()
    {
        return view('livewire.frontend.sign-out-content')->layout('layouts.frontend.style');
    }
    public function SignOut()
    {
        Auth::logout();
        // session()->flash('success', 'ອອກຈາກລະບົບສຳເລັດ!');
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ອອກຈາກລະບົບສຳເລັດ!',
            'icon' => 'success',
        ]);
        return redirect(route('frontend.Home'));
    }
}
