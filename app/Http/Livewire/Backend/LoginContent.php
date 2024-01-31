<?php

namespace App\Http\Livewire\Backend;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginContent extends Component
{
    public $phone, $password, $remember;
    public function mount()
    {
        config('auth.defaults.backend.guard');
    }
    public function render()
    {
        return view('livewire.backend.login-content')->layout('layouts.backend.login');
    }
    public function login()
    {
        $this->validate([
            'phone' => 'required',
            'password' => 'required',
        ], [
            'phone.required' => 'ກະລຸນາປ້ອນເບີໂທກ່ອນ!',
            'password.required' => 'ກະລຸນາປ້ອນລະຫັດຜ່ານກ່ອນ!',
        ]);
        if (Auth::guard('admin')->attempt([
            'phone' => $this->phone,
            'password' => $this->password],
            $this->remember)) {
            session()->flash('success', 'ເຂົ້າສູ່ລະບົບສຳເລັດເເລ້ວ');
            return redirect(route('backend.dashboard'));
        } else {
            $this->emit('alert', ['type' => 'warning', 'message' => 'ເບີໂທ ຫລື ລະຫັດຜ່ານ ບໍ່ຖືກຕ້ອງ!ກະລຸນາລອງໃໝ່']);
            // return redirect(route('backend.login'));
        }
    }
}
