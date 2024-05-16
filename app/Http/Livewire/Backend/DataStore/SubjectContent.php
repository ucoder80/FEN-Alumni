<?php

namespace App\Http\Livewire\Backend\DataStore;

use Livewire\Component;
use App\Models\Department;
use App\Models\Subject;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class SubjectContent extends Component
{
    public $name_la,$name_en, $ID, $code, $note, $search,$department_id;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $data = Subject::where(function ($q) {
            $q->where('name_la', 'like', '%' . $this->search . '%');
            $q->orwhere('name_en', 'like', '%' . $this->search . '%');
        })->paginate(5);
        $departments = Department::all();
        return view('livewire.backend.data-store.subject-content',compact('data','departments'))->layout('layouts.backend.style');
    }
    public function resetflied()
    {
        $this->ID = '';
        $this->department_id = '';
        $this->name_la = '';
        $this->name_en = '';
    }
    protected $rules = [
        'department_id' => 'required',
        'name_la' => 'required',
        'name_la' => 'required|unique:subject',
        'name_en' => 'required',
        'name_en' => 'required|unique:subject',
    ];
    protected $messages = [
        'department_id.required' => 'ກະລຸນາເລືອກຂໍ້ມູນກ່ອນ',
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
                $data = Subject::find($updateId);
                $data->department_id = $this->department_id;
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
                $data = new Subject();
                $data->department_id = $this->department_id;
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
        $data = Subject::find($ids);
        $this->ID = $data->id;
        $this->department_id = $data->department_id;
        $this->name_la = $data->name_la;
        $this->name_en = $data->name_en;
    }
    public function showdelete($ids)
    {
        $data = Subject::find($ids);
        $this->ID = $data->id;
        $this->department_id = $data->department_id;
        $this->name_la = $data->name_la;
        $this->name_en = $data->name_en;
        $this->dispatchBrowserEvent('show-modal-delete');
    }
    public function destroy($ids)
    {
        try {
            DB::beginTransaction();
            $data = Subject::find($ids);
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
