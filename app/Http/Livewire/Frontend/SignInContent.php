<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SignInContent extends Component
{
    public $code, $password, $remember;
    public function render()
    {
        return view('livewire.frontend.sign-in-content')->layout('layouts.frontend.style');
    }
    public function Signin()
    {
        $this->validate([
            'code' => 'required',
            'password' => 'required',
        ], [
            'code.required' => 'ກະລຸນາປ້ອນເບີໂທກ່ອນ!',
            'password.required' => 'ກະລຸນາປ້ອນລະຫັດຜ່ານກ່ອນ!',
        ]);
        if (Auth::guard('admin')->attempt([
            'code' => $this->code,
            'password' => $this->password],
            $this->remember)) {
                $this->dispatchBrowserEvent('swal', [
                    'title' => 'ເຂົ້າສູ່ລະບົບສຳເລັດ!',
                    'icon' => 'success',
                ]);
                // $this->dispatchBrowserEvent('swal:login', [
                //     'type' => 'success',  
                //     'message' => 'ຍິນດີຕ້ອນຮັບ! (' . Auth::guard('admin')->user()->name_lastname . ')',
                //     // 'message' => 'ຍິນດີຕ້ອນຮັບ!', 
                //     'text' => 'ເຂົ້າສູ່ລະບົບສຳເລັດເເລ້ວ'
                // ]);
            return redirect(route('frontend.Home'));
        } else {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ລະຫັດນັກສຶກສາ ຫລື ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງລອງໃຫມ່!',
                'icon' => 'warning',
            ]);
            // return redirect(route('frontend.signin'));
        }
    }
}
