<?php

namespace App\Http\Livewire\Backend\Reports;

use App\Models\User;
use Livewire\Component;
use App\Models\PaySalary;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class ReportPaySalaryContent extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $ID,
    $search, $page_number, $month, $years, $salary, $type = 2, $total_salary, $employee, $note, $end_date, $start_date, $employee_id;
    public function mount()
    {
        // $this->month = date('m');
        $this->years = date('Y');
    }
    public function render()
    {
        $end = date('Y-m-d H:i:s', strtotime($this->end_date . '23:23:59'));
        $employees = User::get();
        $data = PaySalary::get();
        if ($this->start_date && $this->end_date) {
            $data = $data->whereBetween('created_at', [$this->start_date, $end]);
            $sum_total_salary = $data->whereBetween('created_at', [$this->start_date, $end])->sum('total_salary');
        }
        if ($this->years) {
            $data = $data->where('years', $this->years);
            $sum_total_salary = $data->where('years', $this->years)->sum('total_salary');
        }
        if ($this->month) {
            $data = $data->where('month', $this->month);
            $sum_total_salary = $data->where('month', $this->month)->sum('total_salary');
        }
        if ($this->employee_id) {
            $data = $data->where('employee_id', $this->employee_id);
            $sum_total_salary = $data->where('employee_id', $this->employee_id)->sum('total_salary');
        }
        return view('livewire.backend.reports.report-pay-salary-content', compact('data', 'employees','sum_total_salary'))->layout('layouts.backend.style');
    }
}
