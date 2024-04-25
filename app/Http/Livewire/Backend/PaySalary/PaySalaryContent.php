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
    $search, $page_number, $month, $years;
    public function mount()
    {
        $this->month = date('m');
        $this->years = date('Y');
    }
    public function render()
    {
        // $data = PaySalary::where(function ($q) {
        //     $q->where('name_lastname', 'like', '%' . $this->search . '%')
        //         ->orwhere('phone', 'like', '%' . $this->search . '%');
        // })->orderBy('id', 'desc');
        $data = PaySalary::all();
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
}
