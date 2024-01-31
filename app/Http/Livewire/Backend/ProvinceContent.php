<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Province;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ProvinceContent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name_la,$name_en,$name_cn,$ID,$search,$page_number;
    public function render()
    {
        $data = Province::orderBy('id', 'desc')
        ->where(function ($q) {
            $q->where('name_la', 'like', '%' . $this->search . '%')
                ->orwhere('name_en', 'like', '%' . $this->search . '%')
                ->orwhere('name_cn', 'like', '%' . $this->search . '%');
        })->paginate(5);
        return view('livewire.backend.province-content',compact('data'))->layout('layouts.backend.style');
    }
    public function resetform()
    {
        $this->name_la = '';
        $this->name_en = '';
        $this->name_cn = '';
        $this->ID = '';
    }
    protected $rules = [
        'name_la' => 'required|unique:provinces',
    ];
    protected $messages = [
        'name_la.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນກ່ອນ!',
        'name_la.unique' => 'ຂໍ້ມູນນີ້ມີໃນລະບົບເເລ້ວ!',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function store()
    {
        $updateId = $this->ID;
        if ($updateId > 0) {
            $this->validate([
                'name_la' => 'required',
            ], [
                'name_la.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນກ່ອນ!',
            ]);
            $data = Province::find($updateId);
            $data->name_la = $this->name_la;
            $data->name_en = $this->name_en;
            $data->name_cn = $this->name_cn;
            $data->save();
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ສຳເລັດເເລ້ວ!',
                'icon' => 'success',
            ]);
            $this->resetform();
        } else //ເພີ່ມໃໝ່
        {
            $this->validate([
                'name_la' => 'required',
            ], [
                'name_la.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນກ່ອນ!',
            ]);
            try {
                DB::beginTransaction();
                $data = new Province();
                $data->name_la = $this->name_la;
                $data->name_en = $this->name_en;
                $data->name_cn = $this->name_cn;
                $data->save();
                $this->dispatchBrowserEvent('swal', [
                    'title' => 'ສຳເລັດເເລ້ວ!',
                    'icon' => 'success',
                ]);
                $this->resetform();
                DB::commit();
            } catch (\Exception $ex) {
                DB::rollBack();
                $this->dispatchBrowserEvent('something_went_wrong');
            }
        }
    }
    public function edit($ids)
    {
        $data = Province::find($ids);
        $this->name_la = $data->name_la;
        $this->name_en = $data->name_en;
        $this->name_cn = $data->name_cn;
        $this->ID = $data->id;
    }
    public function showDestroy($ids)
    {
        $this->dispatchBrowserEvent('show-modal-delete');
        $data = Province::find($ids);
        $this->ID = $data->id;
        $this->name_la = $data->name_la;
    }
    public function destroy($ids)
    {
        $ids = $this->ID;
        $data = Province::find($ids);
        $data->delete();
        $this->dispatchBrowserEvent('hide-modal-delete');
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ສຳເລັດເເລ້ວ!',
            'icon' => 'success',
        ]);
        $this->resetform();
    }
}
