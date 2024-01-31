<?php

namespace App\Http\Livewire\Backend;

use App\Models\FunctionAvailable;
use App\Models\Functions;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class RolesContent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name,
    $ID,
    $search, $des,
    $selected = [], $page_number;
    public function mount()
    {
        $this->page_number = 5;
    }
    public function render()
    {
        $data = Role::where(function ($q) {
            $q->where('name', 'like', '%' . $this->search . '%')
                ->orwhere('des', 'like', '%' . $this->search . '%');
        })->orderBy('id', 'desc');
        if (!empty($data)) {
            if ($this->page_number == 'all') {
                $data = $data->get();
            } else {
                $data = $data->paginate(5);
            }
        } else {
            $data = [];
        }
        $functions = Functions::whereNull('parent_id')->get();
        return view('livewire.backend.roles-content', compact('data', 'functions'))->layout('layouts.backend.style');
    }
    public function resetField()
    {
        $this->name = '';
        $this->selected = [];
        $this->ID = '';
        $this->des = '';
    }
    public function create()
    {
        $this->resetField();
        $this->dispatchBrowserEvent('show-modal-add-edit');
    }
    public function Store()
    {
        $this->validate([
            'name' => 'required|unique:roles',
        ], [
            'name.required' => 'ປ້ອນຂໍ້ມູນກ່ອນ!',
            'name.unique' => 'ຂໍ້ມູນນີ້ມີໃນລະບົບເເລ້ວ!',
        ]);
        try {
            DB::beginTransaction();
            $data = new Role();
            $data->name = $this->name;
            $data->des = $this->des;
            $data->save();
            for ($i = 0; $i < count($this->selected); $i++) {
                $check_already = FunctionAvailable::where('role_id', $data->id)->where('function_id', $this->selected[$i])->first();
                if (!$check_already) {
                    $function = new FunctionAvailable();
                    $function->role_id = $data->id;
                    $function->function_id = $this->selected[$i];
                    $function->save();
                }
            }
            DB::commit();
            $this->resetField();
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ສຳເລັດເເລ້ວ!',
                'icon' => 'success',
            ]);
            return redirect(route('backend.role'));
        } catch (\Exception $ex) {
            DB::rollBack();
            $this->dispatchBrowserEvent('something_went_wrong');
        }
    }
    public function edit($id)
    {
        $this->resetField();
        $this->ID = $id;
        $data = Role::find($id);
        if ($data) {
            $this->name = $data->name;
            $this->des = $data->des;
        }
        $selectData = FunctionAvailable::select('function_availables.*')
            ->join('functions as f', 'f.id', '=', 'function_availables.function_id')->where('function_availables.role_id', $id)->pluck('function_availables.function_id')->toArray();
        if (count($selectData) > 0) {
            $this->selected = $selectData;
        }
        $this->dispatchBrowserEvent('show-modal-add-edit');
    }
    public function update()
    {

        $this->validate([
            'name' => 'required',
        ], [
            'name.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນກ່ອນ',
        ]);
        try {
            DB::beginTransaction();
            $data = Role::find($this->ID);
            if ($this->name) {
                $data->name = $this->name;
            }
            if ($this->des) {
                $data->des = $this->des;
            }
            $data->save();
            FunctionAvailable::where('role_id', $this->ID)->delete();
            if (count($this->selected) > 0) {
                for ($i = 0; $i < count($this->selected); $i++) {
                    $check_already = FunctionAvailable::select('function_availables.*')
                        ->where('function_availables.role_id', $this->ID)
                        ->where('function_availables.function_id', $this->selected[$i])->first();
                    if (!$check_already && intval($this->selected[$i]) > 0) {
                        $function = new FunctionAvailable();
                        $function->role_id = $data->id;
                        $function->function_id = $this->selected[$i];
                        $function->save();
                    }
                }
            }
            DB::commit();
            $this->resetField();
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ສຳເລັດເເລ້ວ!',
                'icon' => 'success',
            ]);
            return redirect(route('backend.role'));
        } catch (\Error $ex) {
            DB::rollBack();
            $this->dispatchBrowserEvent('something_went_wrong');
        }
    }
    public function showDestroy($ids)
    {
        $singleData = Role::find($ids);
        $this->ID = $singleData->id;
        $this->dispatchBrowserEvent('show-modal-delete');
    }
    public function delete_parent($ids)
    {
        $check_parent = Functions::where('parent_id', $ids)->get();
        foreach ($check_parent as $parent_item) {
            $function_child = Functions::where('parent_id', $parent_item->id)->pluck('id')->map(fn($id) => (string) $id)->toArray();
            $this->selected = array_merge(array_diff($this->selected, $function_child));
        }
        $function = Functions::where('parent_id', $ids)->pluck('id')->map(fn($id) => (string) $id)->toArray();
        $this->selected = array_merge(array_diff($this->selected, $function));
    }
    public function delete_child($ids)
    {
        $function = Functions::where('parent_id', $ids)->pluck('id')->map(fn($id) => (string) $id)->toArray();
        $this->selected = array_merge(array_diff($this->selected, $function));
    }

    public function destroy($ids)
    {
        $data = Role::find($ids);
        $data->delete();
        $this->resetField();
        $this->dispatchBrowserEvent('hide-modal-delete');
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ສຳເລັດເເລ້ວ!',
            'icon' => 'success',
        ]);
    }
    // public function destroy()
    // {
    //     $ids = $this->ID;
    //     if (User::where('role_id', $ids)->first()) {
    //         $this->dispatchBrowserEvent('hide-modal-delete');
    //         $this->dispatchBrowserEvent('can_not_delete');
    //         return;
    //     }
    //     if (FunctionAvailable::where('role_id', $ids)->first()) {
    //         $this->dispatchBrowserEvent('hide-modal-delete');
    //         $this->dispatchBrowserEvent('can_not_delete');
    //         return;
    //     }
    //     try {
    //         $data = Role::find($ids);
    //         $data->delete();
    //         $this->resetField();
    //         $this->dispatchBrowserEvent('hide-modal-delete');
    //         $this->dispatchBrowserEvent('delete');
    //     } catch (\Exception $ex) {
    //         $this->dispatchBrowserEvent('something_went_wrong');
    //     }
    // }
}
