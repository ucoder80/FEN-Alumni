<?php

namespace App\Http\Livewire\Backend\DataStore;

use Livewire\Component;
use App\Models\Department;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class DepartmentContent extends Component
{
    public $name_la,$name_en, $ID, $code, $note, $search;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $data = Department::where(function ($q) {
            $q->where('name_la', 'like', '%' . $this->search . '%');
            $q->orwhere('name_en', 'like', '%' . $this->search . '%');
        })->paginate(5);
        return view('livewire.backend.data-store.department-content',compact('data'))->layout('layouts.backend.style');
    }
    public function resetflied()
    {
        $this->ID = '';
        $this->name_la = '';
        $this->name_en = '';
    }
    protected $rules = [
        'name_la' => 'required',
        'name_la' => 'required|unique:department',
        'name_en' => 'required',
        'name_en' => 'required|unique:department',
    ];
    protected $messages = [
        'name_la.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນກ່ອນ',
        'name_la.unique' => 'ຂໍ້ມູນນີ້ມີໃນລະບົບເເລ້ວ',
        'name_en.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນກ່ອນ',
        'name_en.unique' => 'ຂໍ້ມູນນີ້ມີໃນລະບົບເເລ້ວ',
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
                $data = Department::find($updateId);
                $data->name_la = $this->name_la;
                $data->name_en = $this->name_en;
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
                $data = new Department();
                $data->name_la = $this->name_la;
                $data->name_en = $this->name_en;
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
        $data = Department::find($ids);
        $this->ID = $data->id;
        $this->name_la = $data->name_la;
        $this->name_en = $data->name_en;
    }
    public function showdelete($ids)
    {
        $data = Department::find($ids);
        $this->ID = $data->id;
        $this->name_la = $data->name_la;
        $this->name_en = $data->name_en;
        $this->dispatchBrowserEvent('show-modal-delete');
    }
    public function destroy($ids)
    {
        try {
            DB::beginTransaction();
            $data = Department::find($ids);
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
