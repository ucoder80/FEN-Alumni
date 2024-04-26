<?php

namespace App\Http\Livewire\Backend\Reports;

use App\Models\Position;
use App\Models\User;
use Livewire\Component;

class ReportUserContent extends Component
{
    public $position_id;

    public function render()
    {
        $data = User::get();
        $position = Position::get();
        if ($this->position_id) {
            $data = $data->where('position_id', $this->position_id);
        }
        return view('livewire.backend.reports.report-user-content', compact('data','position'))->layout('layouts.backend.style');
    }
}
