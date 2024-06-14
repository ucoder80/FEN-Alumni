<?php

namespace App\Http\Livewire\Backend\Reports;

use App\Models\District;
use App\Models\Province;
use App\Models\Village;
use App\Models\WorkPlace;
use Livewire\Component;

class ReportWorkPlaceContent extends Component
{
    public $position_id, $end_date, $start_date, $province_id, $district_id, $village_id;
    public $districts = [],
    $villages = [];
    public function render()
    {
        $data = WorkPlace::query();
        $province = Province::all();
        $end = date('Y-m-d H:i:s', strtotime($this->end_date . '23:23:59'));
        if ($this->start_date && $this->end_date) {
            $data = $data->whereBetween('created_at', [$this->start_date, $end]);
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
        $data = $data->get();
        return view('livewire.backend.reports.report-work-place-content', compact('data', 'province'))->layout('layouts.backend.style');
    }
}
