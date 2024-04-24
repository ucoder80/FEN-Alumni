<?php

namespace App\Http\Livewire\Backend\DataStore;

use App\Models\Salary;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class SalaryContent extends Component
{
    public $salary, $ID, $search;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $data = Salary::where(function ($q) {
            $q->orwhere('salary', 'like', '%' . $this->search . '%');
        })->paginate(5);
        return view('livewire.backend.data-store.salary-content', compact('data'))->layout('layouts.backend.style');
    }
    public function resetflied()
    {
        $this->ID = '';
        $this->salary = '';
    }
    protected $rules = [
        'salary' => 'required',
        'salary' => 'required|unique:salary',
    ];
    protected $messages = [
        'salary.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນກ່ອນ',
        'salary.unique' => 'ຂໍ້ມູນນີ້ມີໃນລະບົບເເລ້ວ',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function store()
    {
        $updateId = $this->ID;
        if ($updateId > 0) {
            try {
            DB::beginTransaction();
                $data = Salary::find($updateId);
                $data->salary = str_replace(',', '', $this->salary);
                $data->save();
                $this->resetflied();
                $this->dispatchBrowserEvent('hide-modal-add-edit');
                $this->dispatchBrowserEvent('swal', [
                    'title' => 'ສຳເລັດເເລ້ວ!',
                    'icon' => 'success',
                ]);
            DB::commit();
            } catch (\Exception $ex) {
                $this->dispatchBrowserEvent('swal', [
                    'title' => 'ມີບາງຢ່າງຜິດພາດ!',
                    'icon' => 'error',
                ]);
            }
        } else {
            $this->validate();
            // try {
            DB::beginTransaction();
                $data = new Salary();
                $data->salary = str_replace(',', '', $this->salary);
                $data->save();
                $this->resetflied();
                $this->dispatchBrowserEvent('hide-modal-add-edit');
                $this->dispatchBrowserEvent('swal', [
                    'title' => 'ສຳເລັດເເລ້ວ!',
                    'icon' => 'success',
                ]);
            DB::commit();
            // } catch (\Exception $ex) {
            //     $this->dispatchBrowserEvent('swal', [
            //         'title' => 'ມີບາງຢ່າງຜິດພາດ!',
            //         'icon' => 'error',
            //     ]);
            // }
        }
    }
    public function edit($ids)
    {
        $data = Salary::find($ids);
        $this->ID = $data->id;
        $this->salary = $data->salary;
    }
    public function showdelete($ids)
    {
        $data = Salary::find($ids);
        $this->ID = $data->id;
        $this->salary = $data->salary;
        $this->dispatchBrowserEvent('show-modal-delete');
    }
    public function destroy($ids)
    {
        try {
            DB::beginTransaction();
            $data = Salary::find($ids);
            $data->delete();
            $this->resetflied();
            $this->dispatchBrowserEvent('hide-modal-delete');
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ສຳເລັດເເລ້ວ!',
                'icon' => 'success',
            ]);
            DB::commit();
        } catch (\Exception $ex) {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ມີບາງຢ່າງຜິດພາດ!',
                'icon' => 'error',
            ]);
        }
    }
}
