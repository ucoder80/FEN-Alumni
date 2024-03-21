<?php

namespace App\Http\Livewire\Backend;

use App\Models\IncomeExpend;
use Livewire\Component;
use Livewire\WithPagination;

class IncomeExpendContent extends Component
{
    public $search, $total_price, $select_type, $end_date, $start_date,
    $dated, $ID, $name, $currentDate,$type = 2;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function mount()
    {
        $this->currentDate = now();
    }
    public function render()
    {
        $end = date('Y/m/d H:i:s', strtotime($this->end_date . '23:23:59'));
        $data = IncomeExpend::orderBy('id', 'desc')
            ->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orwhere('total_price', 'like', '%' . $this->search . '%');
            });

        if ($this->start_date && $this->end_date) {
            $data = $data->whereBetween('date', [$this->start_date, $end]);
        }
        if ($this->select_type) {
            $data = $data->where('type', $this->select_type);
        }

        if (!empty($data)) {
            $data = $data->paginate(6);
        } else {
            $data = [];
        }
        return view('livewire.backend.income-expend-content', compact('data'))->layout('layouts.backend.style');
    }
    public function resetFiled()
    {
        $this->name = '';
        $this->total_price = '';
        $this->dated = '';
        $this->ID = '';
    }
    protected $rules = [
        'name' => 'required',
        'type' => 'required',
        'total_price' => 'required',
    ];
    protected $messages = [
        'name.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນກ່ອນ',
        'type.required' => 'ເລືອກຂໍ້ມູນກ່ອນ!',
        'total_price.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນກ່ອນ',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function Create()
    {
        $updateId = $this->ID;
        if ($updateId > 0) {
            try {
                $data = IncomeExpend::find($updateId);
                $data->name = $this->name;
                if ($this->type) {
                    $data->type = $this->type;
                }
                $data->total_price = str_replace(',', '', $this->total_price);
                $data->dated = $this->dated;
                $data->save();
                $this->resetFiled();
                $this->dispatchBrowserEvent('swal', [
                    'title' => 'ສຳເລັດເເລ້ວ!',
                    'icon' => 'success',
                ]);
            } catch (\Exception $ex) {
                $this->dispatch('something_went_wrong');
            }
        } else {
            $this->validate();
            try {
                $data = new IncomeExpend();
                $data->name = $this->name;
                $data->type = $this->type;
                $data->total_price = str_replace(',', '', $this->total_price);
                if ($this->dated) {
                    $data->dated = $this->dated;
                } else {
                    $data->dated = $this->currentDate;
                }
                $data->save();
                $this->resetFiled();
                $this->dispatchBrowserEvent('swal', [
                    'title' => 'ສຳເລັດເເລ້ວ!',
                    'icon' => 'success',
                ]);
            } catch (\Exception $ex) {
                $this->dispatchBrowserEvent('something_went_wrong');
            }
        }
    }
    public function edit($ids)
    {
        $data = IncomeExpend::find($ids);
        $this->ID = $data->id;
        $this->type = $data->type;
        $this->name = $data->name;
        $this->total_price = $data->total_price;
        $this->dated = $data->dated;
    }
    public function showDelete($ids)
    {
        $data = IncomeExpend::find($ids);
        $this->ID = $data->id;
        $this->name = $data->name;
        $this->dispatchBrowserEvent('show-modal-Delete');
    }
    public function Delete($ids)
    {
        try {
            $data = IncomeExpend::find($ids);
            $data->delete();
            $this->resetFiled();
            $this->dispatchBrowserEvent('hide-modal-Delete');
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ສຳເລັດເເລ້ວ!',
                'icon' => 'success',
            ]);
        } catch (\Exception $ex) {
            $this->dispatchBrowserEvent('something_went_wrong');
        }
    }
}
