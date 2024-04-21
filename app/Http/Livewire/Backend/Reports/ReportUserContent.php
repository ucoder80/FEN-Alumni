<?php

namespace App\Http\Livewire\Backend\Reports;

use App\Models\User;
use Livewire\Component;

class ReportUserContent extends Component
{
    public $roles_id;

    public function render()
    {
        $data = User::whereIn('roles_id', [2,4])->get();
        if ($this->roles_id) {
            $data = $data->where('roles_id', $this->roles_id);
        }
        return view('livewire.backend.reports.report-user-content', compact('data'))->layout('layouts.backend.style');
    }
}
