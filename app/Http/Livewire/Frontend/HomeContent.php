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

class HomeContent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $education_year_id,$search,$subject_id,$work_place_id,$education_system_id;
    public function render()
    {
        $slide = Slide::get();
        $education_year = EducationYear::all();
        $subject = Subject::all();
        $work_place = WorkPlace::all();
        $education_system = EducationSystem::all();
        $data = User::where('roles_id', 4);
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
}
