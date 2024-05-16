<?php

namespace App\Http\Livewire\Backend\Reports;

use Livewire\Component;
use App\Models\Position;
use App\Models\WorkPlace;

class ReportWorkPlaceContent extends Component
{
    public $position_id,$end_date,$start_date;

    public function render()
    {
        $data = WorkPlace::get();
        $end = date('Y-m-d H:i:s', strtotime($this->end_date . '23:23:59'));
        if ($this->start_date && $this->end_date) {
            $data = $data->whereBetween('created_at', [$this->start_date, $end]);
        }
        return view('livewire.backend.reports.report-work-place-content',compact('data'))->layout('layouts.backend.style');
    }
}
