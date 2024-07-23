<?php

namespace App\Http\Livewire\Frontend;

use App\Models\EducationSystem;
use App\Models\User;
use App\Models\Slide;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\EducationYear;
use App\Models\Subject;
use App\Models\WorkPlace;
// use App\Models\OldStudent;

class HomeContent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $education_year_id,$search,$subject_id,$work_place_id,$education_system_id,$old_student_id;
    public function render()
    {
        // $this->count_user = User::select('id')->count();
        $this->old_student = User::select('id')->where('roles_id',4)->count();
        // $this->work_place = WorkPlace::select('id')->count();
        // $this->department = Department::select('id')->count();

        $slide = Slide::get();
        $education_year = EducationYear::all();
        $subject = Subject::all();
        $work_place = WorkPlace::all();
        $education_system = EducationSystem::all();
        $data = User::where(function ($q) {
            $q->where('name_lastname', 'like', '%' . $this->search . '%')
                ->orwhere('name_lastname_en', 'like', '%' . $this->search . '%')
                ->orwhere('phone', 'like', '%' . $this->search . '%')
                ->orwhere('code', 'like', '%' . $this->search . '%');
        })->where('roles_id', 4)->orderBy('id', 'desc');
        if ($this->education_year_id) {
            $data = $data->where('education_year_id', $this->education_year_id);
        }
        if ($this->subject_id) {
            $data = $data->where('subject_id', $this->subject_id);
        }
        if ($this->work_place_id) {
            $data = $data->where('work_place_id', $this->work_place_id);
        }
        if ($this->education_system_id) {
            $data = $data->where('education_system_id', $this->education_system_id);
        }
        $data = $data->paginate(20);
        return view('livewire.frontend.home-content', compact('data', 'slide', 'education_year','subject','work_place','education_system'))->layout('layouts.frontend.style');
    }
    // public function countstudent()
    // {
    //     $this->count_user = User::select('id')->count();
    //     $this->old_student = User::select('id')->where('roles_id',4)->count();
    //     $this->work_place = WorkPlace::select('id')->count();
    //     $this->department = Department::select('id')->count();
    //     return view('livewire.backend.dashboard-content',)->layout('layouts.backend.style');
    // }
}
