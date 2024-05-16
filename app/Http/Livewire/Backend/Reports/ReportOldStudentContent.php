<?php

namespace App\Http\Livewire\Backend\Reports;

use App\Models\EducationYear;
use App\Models\User;
use Livewire\Component;
use App\Models\Position;

class ReportOldStudentContent extends Component
{
    public $education_year_id;

    public function render()
    {
        $education_year = EducationYear::all();
        $data = User::get();
        $position = Position::get();
        if ($this->education_year_id) {
            $data = $data->where('education_year_id', $this->education_year_id);
        }
        return view('livewire.backend.reports.report-old-student-content', compact('data','position','education_year'))->layout('layouts.backend.style');
    }
}
