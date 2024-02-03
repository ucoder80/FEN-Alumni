<?php

namespace App\Http\Livewire\Backend;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileContent extends Component
{
    use WithFileUploads;
    public $roles_id,
    $village_id,
    $district_id,
    $province_id,
    $image,
    $name_lastname,
    $email,
    $gender,
    $status,
    $phone,
    $birtday_date,
    $password,
    $created_at,
        $updated_at;
    public $old_password, $confirmpassword;
    public $villages = [];
    public $districts = [];
    public function mount()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $this->roles_id = $user->roles_id;
        $this->village_id = $user->village_id;
        $this->district_id = $user->district_id;
        $this->province_id = $user->province_id;
        $this->image = $user->image;
        $this->name_lastname = $user->name_lastname;
        $this->phone = $user->phone;
        $this->birtday_date = $user->birtday_date;
        $this->email = $user->email;
        $this->gender = $user->gender;
        $this->status = $user->status;
    }
    public function render()
    {
        return view('livewire.backend.profile-content')->layout('layouts.backend.style');
    }
    public function updateProfile()
    {
        $data = User::find(auth()->user()->id);
        $data->name_lastname = $this->name_lastname;
        $data->phone = $this->phone;
        $data->birtday_date = $this->birtday_date;
        $data->email = $this->email;
        $data->gender = $this->gender;
        $data->status = $this->status;
        // if ($this->image) {
        //     $this->validate([
        //         'image' => 'required|mimes:png,jpg,jpeg',
        //     ]);
        //     if ($this->image) {
        //         $this->validate([
        //             'image' => 'required|mimes:png,jpg,jpeg',
        //         ]);
        //         if ($this->image != $data->image) {
        //             if ($data->image) {
        //                 unlink('profile' . '/' . $data->image);
        //             }
        //             if ($data->images) {
        //                 $images = explode(",", $data->images);
        //                 foreach ($images as $image) {
        //                     unlink('profile' . '/' . $data->image);
        //                 }
        //                 $data->delete();
        //             }
        //         }
        //         $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        //         $this->image->storeAs('profile', $imageName);
        //         $data->image = $imageName;
        //     }
        // }
        $data->save();
        $this->emit('alert', ['type' => 'success', 'message' => 'ແກ້ໄຂໂປຣຟາຍສຳເລັດເເລ້ວ!']);
        return redirect(route('backend.profile', auth()->user()->id));
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
        $this->emit('alert', ['type' => 'success', 'message' => 'ປ່ຽນລະຫັດຜ່ານສຳເລັດ!']);
        return redirect(route('backend.profile', auth()->user()->id));
    }
}
