<?php

namespace App\Http\Livewire\Backend;

use App\Models\About;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginContent extends Component
{
    public $phone, $password, $remember;
    public function mount()
    {
        config('auth.defaults.backend.guard');
    }
    public function render()
    {
        $about  = About::first();
        return view('livewire.backend.login-content',compact('about'))->layout('layouts.backend.login');
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
            $this->emit('alert', ['type' => 'error', 'message' => 'ເບີໂທ ຫລື ລະຫັດບໍ່ຖືກກະລຸນາລອງໃຫມ່!']);
            // return redirect(route('backend.login'));
        }
    }
}
