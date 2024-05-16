<?php

namespace App\Http\Livewire\Backend\DataStore;

use App\Models\EducationSystem;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class EducationSystemContent extends Component
{
    public $name, $ID, $code, $note, $search;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $data = EducationSystem::where(function ($q) {
            $q->orwhere('name', 'like', '%' . $this->search . '%');
        })->paginate(5);
        return view('livewire.backend.data-store.education-system-content', compact('data'))->layout('layouts.backend.style');
    }
    public function resetflied()
    {
        $this->ID = '';
        $this->name = '';
    }
    protected $rules = [
        'name' => 'required',
        'name' => 'required|unique:education_system',
    ];
    protected $messages = [
        'name.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນກ່ອນ',
        'name.unique' => 'ຂໍ້ມູນນີ້ມີໃນລະບົບເເລ້ວ',
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
                $data = EducationSystem::find($updateId);
                $data->name = $this->name;
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
            $data = new EducationSystem();
            $data->name = $this->name;
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
        $data = EducationSystem::find($ids);
        $this->ID = $data->id;
        $this->name = $data->name;
    }
    public function showdelete($ids)
    {
        $data = EducationSystem::find($ids);
        $this->ID = $data->id;
        $this->name = $data->name;
        $this->dispatchBrowserEvent('show-modal-delete');
    }
    public function destroy($ids)
    {
        try {
            DB::beginTransaction();
            $data = EducationSystem::find($ids);
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
