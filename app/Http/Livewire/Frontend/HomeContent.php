<?php

namespace App\Http\Livewire\Frontend;

use App\Models\User;
use App\Models\Slide;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\EducationYear;

class HomeContent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $education_year_id,$search;
    public function render()
    {
        $slide = Slide::get();
        $education_year = EducationYear::all();
        $data = User::where('roles_id', 4);
        if ($this->education_year_id) {
            $data = $data->where('education_year_id', $this->education_year_id);
        }
        $data = $data->paginate(20);
        return view('livewire.frontend.home-content', compact('data', 'slide', 'education_year'))->layout('layouts.frontend.style');
    }
}
