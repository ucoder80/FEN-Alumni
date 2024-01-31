<?php

namespace App\Http\Livewire\Backend;

use App\Models\District;
use App\Models\Province;
use App\Models\Village;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class VillageContent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name_la, $name_en, $name_cn, $ID, $search, $page_number, $province_id,$district_id,$districts = [];
    public function render()
    {
        $province = Province::all();
        if($this->province_id){
            $this->districts = District::where('province_id',$this->province_id)->get();
        }
        $data = Village::orderBy('id', 'desc')
            ->where(function ($q) {
                $q->where('name_la', 'like', '%' . $this->search . '%')
                    ->orwhere('name_en', 'like', '%' . $this->search . '%')
                    ->orwhere('name_cn', 'like', '%' . $this->search . '%');
            })->paginate(5);
        return view('livewire.backend.village-content',compact('data','province'))->layout('layouts.backend.style');
    }
    public function resetform()
    {
        $this->district_id = '';
        $this->name_la = '';
        $this->name_en = '';
        $this->name_cn = '';
        $this->ID = '';
    }
    protected $rules = [
        'name_la' => 'required',
    ];
    protected $messages = [
        'name_la.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນກ່ອນ!',
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
            $data = Village::find($updateId);
            $data->district_id = $this->district_id;
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
                $data = new Village();
                $data->district_id = $this->district_id;
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
        $data = Village::find($ids);
        $this->district_id = $data->district_id;
        $this->name_la = $data->name_la;
        $this->name_en = $data->name_en;
        $this->name_cn = $data->name_cn;
        $this->ID = $data->id;
    }
    public function showDestroy($ids)
    {
        $this->dispatchBrowserEvent('show-modal-delete');
        $data = Village::find($ids);
        $this->ID = $data->id;
        $this->name_la = $data->name_la;
    }
    public function destroy($ids)
    {
        $ids = $this->ID;
        $data = Village::find($ids);
        $data->delete();
        $this->dispatchBrowserEvent('hide-modal-delete');
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ສຳເລັດເເລ້ວ!',
            'icon' => 'success',
        ]);
        $this->resetform();
    }
}
