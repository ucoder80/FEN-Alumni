<?php

namespace App\Http\Livewire\Backend\Reports;

use App\Models\User;
use App\Models\Village;
use Livewire\Component;
use App\Models\District;
use App\Models\Position;
use App\Models\Province;
use App\Models\EducationYear;
use App\Models\EducationSystem;
use App\Models\Subject;

class ReportOldStudentContent extends Component
{
    public $ID,
    $search, $page_number,
    $name_lastname,
    $name_lastname_en,
    $phone,
    $code,
    $email,
    $password, $roles_id,
    $confirm_password,
    $branch_id,
    $gender,
    $status,
    $birtday_date,
    $province_id,
    $village_id,
    $district_id,
    $districts = [],
    $villages = [];
    public $education_year_id, $subject_id, $work_place_id, $image, $nationality, $religion, $newimage,$education_system_id;
    public function render()
    {
        $province = Province::all();
        $subject = Subject::all();
        $education_system = EducationSystem::all();
        $education_year = EducationYear::all();
        $data = User::where('roles_id',4);
        $position = Position::get();
        if ($this->education_year_id) {
            $data = $data->where('education_year_id', $this->education_year_id);
        }
        if ($this->subject_id) {
            $data->where('subject_id', $this->subject_id);
        }
        if ($this->education_system_id) {
            $data->where('education_system_id', $this->education_system_id);
        }
        if ($this->province_id) {
            $this->districts = District::where('province_id', $this->province_id)->get();
            $data->where('province_id', $this->province_id);
        }

        if ($this->district_id) {
            $this->villages = Village::where('district_id', $this->district_id)->get();
            $data->where('district_id', $this->district_id);
        }

        if ($this->village_id) {
            $data->where('village_id', $this->village_id);
        }
        if ($this->gender) {
            $data->where('gender', $this->gender);
        }
        if ($this->status) {
            $data->where('status', $this->status);
        }
        if(!empty($data))
        {
            $data = $data->get();
        }else{
            $data = [];
        }
        return view('livewire.backend.reports.report-old-student-content', compact('data','subject','education_system','position','education_year','province'))->layout('layouts.backend.style');
    }
    public $village_data, $province_data, $district_data, $roles_data;
    public $education_start_year_data, $education_end_year_data, $subject_data,$education_system_data, $work_place_data;
    public function show_detail($ids)
    {
        $this->ID = $ids;
        $data = User::find($ids);
        $this->code = $data->code;
        $this->name_lastname = $data->name_lastname;
        $this->name_lastname_en = $data->name_lastname_en;
        $this->phone = $data->phone;
        $this->email = $data->email;
        $this->gender = $data->gender;
        $this->status = $data->status;
        $this->birtday_date = $data->birtday_date;
        $this->roles_data = $data->roles->name ?? '';
        $this->village_data = $data->village->name_la ?? '';
        $this->province_data = $data->province->name_la ?? '';
        $this->district_data = $data->district->name_la ?? '';
        $this->education_start_year_data = $data->education_year->start_year ?? '';
        $this->education_end_year_data = $data->education_year->end_year ?? '';
        $this->subject_data = $data->subject->name_la ?? '';
        $this->education_system_data = $data->education_system->name ?? '';
        $this->work_place_data = $data->work_place->name ?? '';
        $this->newimage = $data->image;
        $this->nationality = $data->nationality;
        $this->religion = $data->religion;
        $this->dispatchBrowserEvent('show-modal-detail');
    }
}
