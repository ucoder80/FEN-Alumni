<?php

namespace App\Http\Livewire\Backend\DataStore;

use App\Models\EducationYear;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class EducationYearContent extends Component
{
    public $genderation, $start_year, $end_year, $ID, $search;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function mount()
    {
        $this->start_year = date('Y');
        $this->end_year = date('Y') + 1;
    }
    public function render()
    {
        $data = EducationYear::where(function ($q) {
            $q->where('genderation', 'like', '%' . $this->search . '%');
            $q->orwhere('genderation', 'like', '%' . $this->search . '%');
        })->paginate(5);
        return view('livewire.backend.data-store.education-year-content', compact('data'))->layout('layouts.backend.style');
    }
    public function resetflied()
    {
        $this->ID = '';
        $this->genderation = '';
        // $this->start_year = '';
        // $this->end_year = '';
    }
    protected $rules = [
        'genderation' => 'required',
        'genderation' => 'required|unique:education_year',
        'start_year' => 'required',
        'start_year' => 'required|unique:education_year',
        'end_year' => 'required',
        'end_year' => 'required|unique:education_year',
    ];
    protected $messages = [
        'genderation.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນກ່ອນ',
        'genderation.unique' => 'ຂໍ້ມູນນີ້ມີໃນລະບົບເເລ້ວ',
        'start_year.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນກ່ອນ',
        'start_year.unique' => 'ຂໍ້ມູນນີ້ມີໃນລະບົບເເລ້ວ',
        'end_year.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນກ່ອນ',
        'end_year.unique' => 'ຂໍ້ມູນນີ້ມີໃນລະບົບເເລ້ວ',
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
                $data = EducationYear::find($updateId);
                $data->genderation = $this->genderation;
                $data->start_year = $this->start_year;
                $data->end_year = $this->end_year;
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
            $data = new EducationYear();
            $data->genderation = $this->genderation;
            $data->start_year = $this->start_year;
            $data->end_year = $this->end_year;
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
        $data = EducationYear::find($ids);
        $this->ID = $data->id;
        $this->genderation = $data->genderation;
        $this->start_year = $data->start_year;
        $this->end_year = $data->end_year;
    }
    public function showdelete($ids)
    {
        $data = EducationYear::find($ids);
        $this->ID = $data->id;
        $this->genderation = $data->genderation;
        $this->start_year = $data->start_year;
        $this->end_year = $data->end_year;
        $this->dispatchBrowserEvent('show-modal-delete');
    }
    public function destroy($ids)
    {
        try {
            DB::beginTransaction();
            $data = EducationYear::find($ids);
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
