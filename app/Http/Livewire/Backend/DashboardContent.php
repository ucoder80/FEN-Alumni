<?php

namespace App\Http\Livewire\Backend;

use App\Models\Department;
use App\Models\Orders;
use App\Models\PaySalary;
use App\Models\Position;
use App\Models\Product;
use App\Models\Sales;
use App\Models\User;
use App\Models\WorkPlace;
use Livewire\Component;
use Livewire\WithPagination;

class DashboardContent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $count_user,$work_place,$department,$old_student;
    public function render()
    {
        $this->count_user = User::select('id')->count();
        $this->old_student = User::select('id')->where('roles_id',4)->count();
        $this->work_place = WorkPlace::select('id')->count();
        $this->department = Department::select('id')->count();
        return view('livewire.backend.dashboard-content',)->layout('layouts.backend.style');
    }
}
