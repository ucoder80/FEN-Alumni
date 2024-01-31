<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class LogoutContent extends Component
{
    public function render()
    {
        return view('livewire.backend.logout-content');
    }

    public function logout()
    {
        Auth::logout();
        session()->flash('success', 'ອອກຈາກລະບົບສຳເລັດ!');
        return redirect(route('backend.login'));
    }
}
