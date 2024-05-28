<?php

namespace App\Http\Livewire\Frontend;

use App\Models\District;
use App\Models\EducationSystem;
use App\Models\EducationYear;
use App\Models\Province;
use App\Models\Subject;
use App\Models\User;
use App\Models\WorkPlace;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class SignUpContent extends Component
{
    use WithFileUploads;
    public $name_lastname, $phone, $password, $confirmPassword, $districts = [], $villages = [], $ID, $name_lastname_en;
    public $name_work, $phone_work, $email_work, $facebook_work, $village_id_work, $district_id_work, $province_id_work, $image_work;
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
        return view('livewire.frontend.sign-up-content', compact('provinces', 'EducationYears', 'Subjects', 'WorkPlaces', 'EducationSystem'))->layout('layouts.frontend.style');
    }
    public $province_id, $village_id, $email, $district_id, $code, $status, $gender, $birtday_date, $education_year_id, $subject_id, $work_place_id, $image, $nationality, $religion;
    public $education_system_id;
    public function resetField()
    {
        $this->name_work = '';
        $this->phone_work = '';
        $this->email_work = '';
        $this->facebook_work = '';
        $this->village_id_work = '';
        $this->district_id_work = '';
        $this->province_id_work = '';
        $this->image_work = '';
        $this->ID = '';
        $this->name_lastname = '';
        $this->phone = '';
        $this->email = '';
        $this->password = '';
        $this->confirmPassword = '';
        $this->province_id = '';
        $this->village_id = '';
        $this->district_id = '';
        $this->status = '';
        $this->gender = '';
        $this->birtday_date = '';
        $this->education_year_id = '';
        $this->subject_id = '';
        $this->work_place_id = '';
        $this->image = '';
        $this->nationality = '';
        $this->religion = '';
        $this->code = '';

    }
    public function SignUp()
    {
        $this->validate([
            'name_work' => 'required',
            'phone_work' => 'required',
            // 'email_work' => 'required',
            // 'facebook_work' => 'required',
            'village_id_work' => 'required',
            'district_id_work' => 'required',
            'province_id_work' => 'required',
            // 'image_work' => 'required',

            'education_year_id' => 'required',
            'subject_id' => 'required',
            'education_system_id' => 'required',

            'code' => 'required',
            'village_id' => 'required',
            'district_id' => 'required',
            'province_id' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'name_lastname' => 'required',
            'name_lastname_en' => 'required',
            'phone' => 'required|min:8|unique:users',
            'password' => 'required|min:6',
            'confirmPassword' => 'required|same:password',
        ], [
            'code.required' => 'ປ້ອນຂໍ້ມູນກ່ອນ!',
            'name_work.required' => 'ປ້ອນຂໍ້ມູນກ່ອນ!',
            'phone_work.required' => 'ປ້ອນຂໍ້ມູນກ່ອນ!',
            'village_id_work.required' => 'ປ້ອນຂໍ້ມູນກ່ອນ!',
            'district_id_work.required' => 'ເລືອກຂໍ້ມູນກ່ອນ!',
            'province_id_work.required' => 'ເລືອກຂໍ້ມູນກ່ອນ!',

            'education_year_id.required' => 'ເລືອກຂໍ້ມູນກ່ອນ!',
            'subject_id.required' => 'ເລືອກຂໍ້ມູນກ່ອນ!',
            'education_system_id.required' => 'ເລືອກຂໍ້ມູນກ່ອນ!',
            'village_id.required' => 'ປ້ອນຂໍ້ມູນກ່ອນ!',
            'district_id.required' => 'ເລືອກຂໍ້ມູນກ່ອນ!',
            'province_id.required' => 'ເລືອກຂໍ້ມູນກ່ອນ!',
            'gender.required' => 'ເລືອກຂໍ້ມູນກ່ອນ!',
            'status.required' => 'ເລືອກຂໍ້ມູນກ່ອນ!',
            'name_lastname.required' => 'ປ້ອນຂໍ້ມູນກ່ອນ!',
            'name_lastname_en.required' => 'ປ້ອນຂໍ້ມູນກ່ອນ!',
            'phone.required' => 'ປ້ອນເບີໂທກ່ອນ!',
            'phone.unique' => 'ເບີໂທນີ້ມີໃນລະບົບເເລ້ວ!',
            'phone.min' => 'ເບີໂທ8ໂຕເລກຂື້ນໄປ!',
            'password.required' => 'ປ້ອນລະຫັດຜ່ານກ່ອນ!',
            'password.min' => 'ລະຫັດ6ຕົວຂື້ນໄປ!',
            'confirmPassword.required' => 'ປ້ອນຍືນຍັນລະຫັດກ່ອນ!',
            'confirmPassword.same' => 'ລະຫັດຜ່ານ ເເລະ ຍືນຍັນລະຫັດບໍ່ຕົງກັນ!',
        ]);
        $work_place = new WorkPlace();
        if (!empty($this->image_work)) {
            $this->validate([
                'image' => 'required|mimes:jpg,png,jpeg',
            ]);
            $imageName = Carbon::now()->timestamp . '.' . $this->image_work->extension();
            $this->image_work->storeAs('upload/workplace', $imageName);
            $work_place->image = 'upload/workplace' . '/' . $imageName;
        } else {
            $work_place->image = '';
        }
        $work_place->name = $this->name_work;
        $work_place->phone = $this->phone_work;
        $work_place->email = $this->email_work;
        $work_place->facebook = $this->facebook_work;
        $work_place->village_id = $this->village_id_work;
        $work_place->district_id = $this->district_id_work;
        $work_place->province_id = $this->province_id_work;
        $work_place->save();
        $data = new User();
        if (!empty($this->image)) {
            $this->validate([
                'image' => 'required|mimes:jpg,png,jpeg',
            ]);
            $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
            $this->image->storeAs('upload/user', $imageName);
            $data->image = 'upload/user' . '/' . $imageName;
        } else {
            $data->image = '';
        }
        $data->code = $this->code;
        $data->village_id = $this->village_id;
        $data->district_id = $this->district_id;
        $data->province_id = $this->province_id;
        $data->subject_id = $this->subject_id;
        $data->education_year_id = $this->education_year_id;
        $data->education_system_id = $this->education_system_id;
        $data->work_place_id = $work_place->id;
        $data->name_lastname = $this->name_lastname;
        $data->name_lastname_en = $this->name_lastname_en;
        $data->nationality = $this->nationality;
        $data->religion = $this->religion;
        $data->phone = $this->phone;
        $data->password = Hash::make($this->password);
        $data->gender = $this->gender;
        if ($this->email) {
            $data->email = $this->email;
        } else {
            $data->email = 'example@gmail.com';
        }
        $data->status = $this->status;
        $data->birtday_date = $this->birtday_date;
        $data->roles_id = 4;
        $data->save();
        Auth::guard('admin')->login($data);
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ສະໝັກສະມາສິກສຳເລັດເເລ້ວ!',
            'icon' => 'success',
        ]);
        return redirect(route('frontend.Home'));
    }
}
