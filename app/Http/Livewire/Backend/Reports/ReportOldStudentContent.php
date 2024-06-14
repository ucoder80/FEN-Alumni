<?php

namespace App\Http\Livewire\Backend\Reports;

use App\Models\EducationYear;
use App\Models\User;
use Livewire\Component;
use App\Models\Position;

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
        $education_year = EducationYear::all();
        $data = User::where('roles_id',4)->get();
        $position = Position::get();
        if ($this->education_year_id) {
            $data = $data->where('education_year_id', $this->education_year_id);
        }
        return view('livewire.backend.reports.report-old-student-content', compact('data','position','education_year'))->layout('layouts.backend.style');
    }
    public $village_data, $province_data, $district_data, $roles_data;
    public $education_start_year_data, $education_end_year_data, $subject_data, $work_place_data;
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
        $this->work_place_data = $data->work_place->name ?? '';
        $this->newimage = $data->image;
        $this->nationality = $data->nationality;
        $this->religion = $data->religion;
        $this->dispatchBrowserEvent('show-modal-detail');
    }
}
