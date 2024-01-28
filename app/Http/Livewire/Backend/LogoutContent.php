<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
class LogoutContent extends Component
{
    public function render()
    {
        return view('livewire.backend.logout-content');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        session()->flash('success', 'ອອກຈາກລະບົບສຳເລັດ!');
        return redirect(route('backend.login'));
    }
}
