<?php

namespace App\Http\Livewire\Backend\PaySalary;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class PaySalaryContent extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $ID,
    $search, $page_number, $month, $year;
    public function mount()
    {
        $this->month = date('m');
        $this->year = date('Y');
    }
    public function render()
    {
        $data = User::where(function ($q) {
            $q->where('name_lastname', 'like', '%' . $this->search . '%')
                ->orwhere('phone', 'like', '%' . $this->search . '%');
        })->orderBy('id', 'desc');
        return view('livewire.backend.pay-salary.pay-salary-content', compact('data'))->layout('layouts.backend.style');
    }
    public function resetField()
    {

    }
    public function ShowCreateSalary()
    {
        $this->resetField();
        $this->dispatchBrowserEvent('show-modal-add-edit');
    }
    // public function payroll()
    // {
    //     $this->validate([
    //         'month' => 'required',
    //         'year' => 'required',
    //     ]);
    //     $employees = Employee::where('status', 1)->where('salary_id', '!=', '')->get();
    //     $check_rate = CalculateFundLog::orderBy('id', 'desc')->whereMonth('created_at', Carbon::today()->month)->first();
    //     if ($check_rate) {
    //         foreach ($employees as $item) {
    //             $check_salarylog = SalaryLog::where('emp_id', $item->id)->where('month', $this->month)->where('year', $this->year)->first();
    //             $sum_commission = Commission::where('emp_id', $item->id)->whereMonth('date', $this->month)->whereYear('date', $this->year)->sum('total');
    //             $track_miss_employee = TrackMissEmployee::where('emp_id', $item->id)->whereMonth('date', $this->month)->whereYear('date', $this->year)->sum('total_salary');
    //             // if($sum_commission > 0){
    //             if (empty($check_salarylog->id)) {
    //                 $salary_logs = new SalaryLog();
    //                 $salary_logs->month = $this->month;
    //                 $salary_logs->year = $this->year;
    //                 $salary_logs->emp_id = $item->id;
    //                 if (!empty($item->salaryamount->salary)) {
    //                     $salary_logs->salary = $item->salaryamount->salary;
    //                 }
    //                 $salary_logs->commission_total = $sum_commission;
    //                 $salary_logs->miss_total = $track_miss_employee;
    //                 $salary_logs->amount_fund = 0;
    //                 if (!empty($item->salaryamount->salary)) {
    //                     $salary_logs->total_salary = ($sum_commission + $item->salaryamount->salary) - $track_miss_employee;
    //                 }
    //                 $salary_logs->user_id = Auth::user()->id;
    //                 $salary_logs->save();
    //             } else {
    //                 session()->flash('no_message', 'ບໍ່ສາມາດເບີກໄດ້ ເພາະວ່າການເບີກໃນ ເດືອນ' . $this->month . ' ປີ' . $this->year . ' ມີໃນລະບົບແລ້ວ');
    //                 return redirect()->to('/payroll-of-employee');
    //             }
    //         }
    //         $this->createData = false;
    //         $this->selectData = true;
    //         $this->updateData = false;
    //         $this->resetField();
    //         session()->flash('message', 'ເພີ່ມຂໍ້ມູນສຳແລັດແລ້ວ');
    //         return redirect()->to('/payroll-of-employee');
    //     } else {
    //         session()->flash('no_message', 'ກະລຸນາໄປຄິດໄລ່ດອກເບ້ຍກ່ອນ');
    //         return;
    //     }
    // }
}
