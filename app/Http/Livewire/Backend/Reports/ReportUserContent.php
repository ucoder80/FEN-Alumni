<?php

namespace App\Http\Livewire\Backend\Reports;

use App\Models\Position;
use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class ReportUserContent extends Component
{
    public $roles_id,$gender,$status;

    public function render()
    {
        $data = User::get();
        $roles = Role::get();
        if ($this->roles_id) {
            $data = $data->where('roles_id', $this->roles_id);
        }
        if ($this->gender) {
            $data = $data->where('gender', $this->gender);
        }
        if ($this->status) {
            $data = $data->where('status', $this->status);
        }
        return view('livewire.backend.reports.report-user-content', compact('data','roles'))->layout('layouts.backend.style');
    }
}
