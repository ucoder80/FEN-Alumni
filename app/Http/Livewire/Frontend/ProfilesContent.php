<?php

namespace App\Http\Livewire\Frontend;

use App\Models\User;
use App\Models\Village;
use Livewire\Component;
use App\Models\District;
use App\Models\Province;
use Illuminate\Support\Facades\Hash;

class ProfilesContent extends Component
{
    public 
    $name_lastname,
    $name_lastname_en,
    $phone,
    $email,
    $gender,
    $province_id,
    $village_id,
    $district_id,
    $districts = [],
    $villages = [],
    $password;
    public $old_password, $confirmpassword;
    
    public function mount()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $this->name_lastname = $user->name_lastname;
        $this->name_lastname_en = $user->name_lastname_en;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->gender = $user->gender;
        $this->province_id = $user->province_id;
        $this->district_id = $user->district_id;
        $this->village_id = $user->village_id;
    }
    public function render()
    {
        $province = Province::all();
        if ($this->province_id) {
            $this->districts = District::where('province_id', $this->province_id)->get();
        }
        if ($this->district_id) {
            $this->villages = Village::where('district_id', $this->district_id)->get();
        }
        return view('livewire.frontend.profiles-content')->layout('layouts.frontend.style');
    }
    public function updateProfile()
    {
        $data = User::find(auth()->user()->id);
        $data->name_lastname = $this->name_lastname;
        $data->phone = $this->phone;
        $data->email = $this->email;
        $data->gender = $this->gender;
        $data->province_id = $this->province_id;
        $data->district_id = $this->district_id;
        $data->village_id = $this->village_id;
        $data->save();
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ແກ້ໄຂສຳເລັດເເລ້ວ!',
            'icon' => 'success',
        ]);
        return redirect(route('frontend.profiles'));
        // return redirect(route('frontend.profile', auth()->user()->id));
    }
    public $currentPassword, $newPassword, $confirmPassword;
    public function changePassword()
    {
        $this->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|same:newPassword',
        ], [
            'currentPassword.required' => 'ປ້ອນລະຫັດເກົ່າກ່ອນ!',
            'newPassword.required' => 'ປ້ອນລະຫັດໃຫມ່ກ່ອນ!',
            'newPassword.min' => 'ລະຫັດ6ຕົວຂື້ນໄປ!',
            'confirmPassword.required' => 'ປ້ອນຍືນຍັນລະຫັດໃຫມ່ກ່ອນ!',
            'confirmPassword.same' => 'ລະຫັດໃຫມ່ ເເລະ ລະຫັດຍືນຍັນບໍ່ຕົງກັນ!',
        ]);

        // Check if the current password is correct
        if (!Hash::check($this->currentPassword, auth()->user()->password)) {
            $this->addError('currentPassword', 'ລະຫັດຜ່ານເກົ່າບໍ່ຖືກຕ້ອງ.');
            return;
        }

        // Update the password
        auth()->user()->update([
            'password' => Hash::make($this->newPassword),
        ]);

        // Reset form fields
        $this->currentPassword = '';
        $this->newPassword = '';
        $this->confirmPassword = '';

        // Show a success message
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ປ່ຽນລະຫັດຜາ່ນສຳເລັດເເລ້ວ!',
            'icon' => 'success',
        ]);
        return redirect(route('frontend.profiles'));
    }
}
