<?php

namespace App\Http\Livewire\Backend\PaySalary;

use App\Models\PaySalary;
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
    $search, $page_number, $month, $years, $salary, $type = 2, $total_salary, $employee,$status, $note, $end_date, $start_date, $employee_id;
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
        return view('livewire.backend.pay-salary.pay-salary-content', compact('data', 'employees', 'sum_total_salary'))->layout('layouts.backend.style');
    }
    public function resetField()
    {
        $this->note = '';
    }
    public function ShowCreateSalary()
    {
        $this->resetField();
        $this->dispatchBrowserEvent('show-modal-add-edit');
    }
    public function PaySalary()
    {
        $this->validate([
            'month' => 'required',
            'years' => 'required',
        ]);
        // $employees = Employee::where('status', 1)->where('salary_id', '!=', '')->get();
        $employees = User::all();
        foreach ($employees as $item) {
            $check_paysalary = PaySalary::where('employee_id', $item->id)->where('month', $this->month)->where('years', $this->years)->first();
            if (empty($check_paysalary->id)) {
                $pay_salary = new PaySalary();
                $pay_salary->employee_id = $item->id;
                $pay_salary->month = $this->month;
                $pay_salary->years = $this->years;
                if (!empty($item->salary->salary)) {
                    $pay_salary->salary = $item->salary->salary;
                    $pay_salary->total_salary = $item->salary->salary;
                }
                $pay_salary->creator_id = auth()->user()->id;
                $pay_salary->status = 1; // 1 = ຄ້າງຈ່າຍ 2 = ຖອນເເລ້ວ
                // $pay_salary->type = '';
                // $pay_salary->note = '';
                $pay_salary->save();
                $this->resetField();
                $this->dispatchBrowserEvent('hide-modal-add-edit');
                $this->dispatchBrowserEvent('swal', [
                    'title' => 'ສຳເລັດເເລ້ວ!',
                    'icon' => 'success',
                ]);
            } else {
                $this->dispatchBrowserEvent('swal', [
                    'title' => 'ບໍ່ສາມາດສ້າງໄດ້ເພາະວ່າໃນເດືອນ ' . $this->month . ' ປີ ' . $this->years . ' ມີໃນລະບົບແລ້ວ',
                    'icon' => 'warning',
                ]);
                // session()->flash('no_message', 'ບໍ່ສາມາດເບີກໄດ້ ເພາະວ່າການເບີກໃນ ເດືອນ' . $this->month . ' ປີ' . $this->years . ' ມີໃນລະບົບແລ້ວ');
                $this->dispatchBrowserEvent('hide-modal-add-edit');
            }
        }
    }

    public function showDestroy($ids)
    {
        $this->ID = $ids;
        $data = PaySalary::find($ids);
        // $this->name = $data->name;
        $this->dispatchBrowserEvent('show-modal-delete');
    }
    public function destroy()
    {
        $data = PaySalary::find($this->ID);
        $data->delete();
        $this->resetField();
        $this->dispatchBrowserEvent('hide-modal-delete');
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ສຳເລັດເເລ້ວ!',
            'icon' => 'success',
        ]);
    }

    public function ShowSalary($ids)
    {
        $this->ID = $ids;
        $data = PaySalary::find($ids);
        $this->salary = $data->salary;
        $this->total_salary = $data->total_salary;
        $this->employee = $data->employee->name_lastname;
        $this->dispatchBrowserEvent('show-modal-paymoney');
    }
    public function ConfirmSalary()
    {
        $this->validate([
            'type' => 'required',
        ],[
            'type.required' => 'ເລືອກປະເພດຊຳລະກ່ອນ!',
        ]);
        $data = PaySalary::find($this->ID);
        $data->status = 2;
        $data->type = $this->type;
        $data->note = $this->note;
        $data->date_pay = now();
        $data->save();
        $this->resetField();
        $this->dispatchBrowserEvent('hide-modal-paymoney');
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ສຳເລັດເເລ້ວ!',
            'icon' => 'success',
        ]);
    }
    public function edit($ids)
    {
        $this->ID = $ids;
        $data = PaySalary::find($ids);
        $this->month = $data->month;
        $this->years = $data->years;
        $this->type = $data->type;
        $this->note = $data->note;
        $this->status = $data->status;
        $this->dispatchBrowserEvent('show-modal-update');
    }
    public function update()
    {
        $data = PaySalary::find($this->ID);
        $data->month = $this->month;
        $data->years = $this->years;
        $data->type = $this->type;
        $data->note = $this->note;
        $data->save();
        $this->resetField();
        $this->dispatchBrowserEvent('hide-modal-update');
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ສຳເລັດເເລ້ວ!',
            'icon' => 'success',
        ]);
    }
}
