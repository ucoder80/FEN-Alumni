<?php

namespace App\Http\Livewire\Frontend;

use App\Models\District;
use App\Models\EducationSystem;
use App\Models\EducationYear;
use App\Models\Province;
use App\Models\Subject;
use App\Models\User;
use App\Models\WorkPlace;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfilesContent extends Component
{
    public $province_id,
        $village_id;
    public $old_password, $confirmpassword;
    use WithFileUploads;
    public $name_lastname, $phone, $new_image_work, $password, $new_image, $districts = [], $villages = [], $ID, $name_lastname_en;
    public $name_work, $phone_work, $email_work, $facebook_work, $village_id_work, $district_id_work, $province_id_work, $image_work;
    public $email, $district_id, $code, $status, $gender, $birtday_date, $education_year_id, $subject_id, $work_place_id, $image, $nationality, $religion;
    public $education_system_id,$system,$scholarship,$final_report,$advisor,$co_advisor,$grade,$performance;
    public function mount()
    {
        $user = User::where('id', auth()->user()->id)->first();
        if (!empty($user)) {
        $this->name_lastname = $user->name_lastname;
        $this->name_lastname_en = $user->name_lastname_en;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->gender = $user->gender;
        $this->province_id = $user->province_id;
        $this->district_id = $user->district_id;
        $this->village_id = $user->village_id;
        $this->code = $user->code;
        $this->subject_id = $user->subject_id;
        $this->education_year_id = $user->education_year_id;
        $this->education_system_id = $user->education_system_id;
        $this->work_place_id = $user->work_place_id;
        $this->nationality = $user->nationality;
        $this->religion = $user->religion;
        $this->phone = $user->phone;
        $this->gender = $user->gender;
        $this->email = $user->email;
        $this->status = $user->status;
        $this->birtday_date = $user->birtday_date;
        $this->new_image = $user->image;
        $this->system = $user->system;
        $this->scholarship = $user->scholarship;
        $this->final_report = $user->final_report;
        $this->advisor = $user->advisor;
        $this->co_advisor = $user->co_advisor;
        $this->grade = $user->grade;
        $this->performance = $user->performance;

        }
        $work_place = WorkPlace::find($user->work_place_id);
        if (!empty($work_place)) {
            $this->new_image_work = $work_place->image;
            $this->name_work = $work_place->name;
            $this->phone_work = $work_place->phone;
            $this->email_work = $work_place->email;
            $this->facebook_work = $work_place->facebook;
            $this->village_id_work = $work_place->village_id;
            $this->district_id_work = $work_place->district_id;
            $this->province_id_work = $work_place->province_id;
        }
    }
    public function render()
    {
        $provinces = Province::all();
        if ($this->province_id) {
            $this->districts = District::where('province_id', $this->province_id)->get();
        }
        if ($this->province_id_work) {
            $this->districts = District::where('province_id', $this->province_id_work)->get();
        }
        // if ($this->district_id) {
        //     $this->villages = Village::where('district_id', $this->district_id)->get();
        // }
        $EducationYears = EducationYear::all();
        $Subjects = Subject::all();
        $WorkPlaces = WorkPlace::all();
        $EducationSystem = EducationSystem::all();
        return view('livewire.frontend.profiles-content', compact('provinces', 'EducationYears', 'Subjects', 'WorkPlaces', 'EducationSystem'))->layout('layouts.frontend.style');
    }
    public function updateProfile()
    {
        $data = User::find(auth()->user()->id);
        if ($this->image) {
            $this->validate([
                'image' => 'required|mimes:jpg,png,jpeg',
            ]);
            $filename_image = $this->image->getClientOriginalName();
            $this->image->storeAs('upload/user' . $filename_image);
            $data->image = 'upload/user' . $filename_image;
        }
        $data->code = $this->code;
        $data->village_id = $this->village_id;
        $data->district_id = $this->district_id;
        $data->province_id = $this->province_id;
        $data->subject_id = $this->subject_id;
        $data->education_year_id = $this->education_year_id;
        $data->education_system_id = $this->education_system_id;
        $data->name_lastname = $this->name_lastname;
        $data->name_lastname_en = $this->name_lastname_en;
        $data->nationality = $this->nationality;
        $data->religion = $this->religion;
        $data->phone = $this->phone;
        $data->gender = $this->gender;
        $data->email = $this->email;
        $data->status = $this->status;
        $data->birtday_date = $this->birtday_date;
        $data->roles_id = 4;
        $data->system = $this->system;
        $data->scholarship = $this->scholarship;
        $data->final_report = $this->final_report;
        $data->advisor = $this->advisor;
        $data->co_advisor = $this->co_advisor;
        $data->grade = $this->grade;
        $data->performance = $this->performance;
        $data->save();
        $work_place = WorkPlace::find($data->work_place_id);
        if ($this->image_work) {
            $this->validate([
                'image' => 'required|mimes:jpg,png,jpeg',
            ]);
            $filename_image = $this->image_work->getClientOriginalName();
            $this->image_work->storeAs('upload/workplace' . $filename_image);
            $work_place->image = 'upload/workplace' . $filename_image;
        }
        $work_place->name = $this->name_work;
        $work_place->phone = $this->phone_work;
        $work_place->email = $this->email_work;
        $work_place->facebook = $this->facebook_work;
        $work_place->village_id = $this->village_id_work;
        $work_place->district_id = $this->district_id_work;
        $work_place->province_id = $this->province_id_work;
        $work_place->save();
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ແກ້ໄຂສຳເລັດເເລ້ວ!',
            'icon' => 'success',
        ]);
        // return redirect(route('frontend.Profiles'));
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
        // return redirect(route('frontend.Profiles'));
    }
}
