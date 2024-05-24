<?php

namespace App\Http\Livewire\Frontend;

use App\Models\EducationYear;
use App\Models\Slide;
use App\Models\User;
use Livewire\Component;

class HomeContent extends Component
{
    public $education_year_id;
    public function render()
    {
        $slide = Slide::get();
        $education_year = EducationYear::all();
        $data = User::where('roles_id', 4);
        if ($this->education_year_id) {
            $data = $data->where('education_year_id', $this->education_year_id);
            dd($data);
        }
        if (!empty($data)) {
            $data = $data->paginate(20);
        } else {
            $data = [];
        }
        return view('livewire.frontend.home-content', compact('data', 'slide', 'education_year'))->layout('layouts.frontend.style');
    }
}
