<?php

namespace App\Http\Livewire\Frontend;

use App\Models\User;
use Livewire\Component;

class SearchContent extends Component
{
    public $search, $datas;
    public function mount()
    {
        $this->datas = 'Allprojects';
        $this->fill(request()->only('search'));
    }
    public function render()
    {
        $data = User::orderBy('users.id', 'desc')
            ->where('roles_id', 4)
            ->join('provinces', 'users.province_id', '=', 'provinces.id')
            ->join('districts', 'users.district_id', '=', 'districts.id')
            ->join('villages', 'users.village_id', '=', 'villages.id')
            ->join('education_year', 'users.education_year_id', '=', 'education_year.id')
            ->join('subject', 'users.subject_id', '=', 'subject.id')
            ->join('work_place', 'users.work_place_id', '=', 'work_place.id')
            ->join('education_system', 'users.education_system_id', '=', 'education_system.id')
            ->where(function ($q) {
                $q->where('users.name_lastname', 'like', '%' . $this->search . '%')
                    ->orWhere('users.gender', 'like', '%' . $this->search . '%')
                    ->orWhere('users.phone', 'like', '%' . $this->search . '%')
                    ->orWhere('users.email', 'like', '%' . $this->search . '%')
                    ->orWhere('users.status', 'like', '%' . $this->search . '%')
                    ->orWhere('users.nationality', 'like', '%' . $this->search . '%')
                    ->orWhere('users.image', 'like', '%' . $this->search . '%')
                    ->orWhere('users.religion', 'like', '%' . $this->search . '%')
                    ->orWhere('provinces.name_la', 'like', '%' . $this->search . '%')
                    ->orWhere('districts.name_la', 'like', '%' . $this->search . '%')
                    ->orWhere('villages.name_la', 'like', '%' . $this->search . '%')
                    ->orWhere('education_year.start_year', 'like', '%' . $this->search . '%')
                    ->orWhere('subject.name_la', 'like', '%' . $this->search . '%')
                    ->orWhere('work_place.name', 'like', '%' . $this->search . '%')
                    ->orWhere('education_system.name', 'like', '%' . $this->search . '%');
            })
            ->select('users.*', 'provinces.name_la as province_name', 'districts.name_la as district_name', 'villages.name_la as village_name', 'education_year.start_year', 'subject.name_la as subject_name', 'work_place.name as work_place_name', 'education_system.name as education_system_name')
            ->get();

        return view('livewire.frontend.search-content', compact('data'))->layout('layouts.frontend.style');
    }
}
