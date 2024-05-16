<?php

namespace App\Http\Livewire\Backend\DataStore;

use App\Models\District;
use App\Models\Province;
use App\Models\Village;
use App\Models\WorkPlace;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class WorkPlaceContent extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $ID,
    $search, $page_number,
    $image,
    $name,
    $phone,
    $email,
    $facebook,
    $province_id,
    $village_id,
    $district_id,
    $districts = [],
    $villages = [];
    public $newimage;
    public function render()
    {
        $data = WorkPlace::where(function ($q) {
            $q->where('name', 'like', '%' . $this->search . '%')
                ->orwhere('phone', 'like', '%' . $this->search . '%');
        })->orderBy('id', 'desc');
        if (!empty($data)) {
            $data = $data->paginate(5);
        }
        $provinces = Province::all();
        if ($this->province_id) {
            $this->districts = District::where('province_id', $this->province_id)->get();
        }
        if ($this->district_id) {
            $this->villages = Village::where('district_id', $this->district_id)->get();
        }
        return view('livewire.backend.data-store.work-place-content', compact('data','provinces'))->layout('layouts.backend.style');
    }
    public function resetField()
    {
        $this->ID = '';
        $this->image = '';
        $this->name = '';
        $this->phone = '';
        $this->email = '';
        $this->facebook = '';
        $this->province_id = '';
        $this->village_id = '';
        $this->district_id = '';
    }
    public function create()
    {
        $this->dispatchBrowserEvent('show-modal-add-edit');
        $this->resetField();
    }
    public function Store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'unique:users',
            'phone' => 'required|min:8|max:8|unique:users',
        ], [
            'name.required' => 'ປ້ອນຂໍ້ມູນກ່ອນ!',
            'email.unique' => 'ຂໍ້ມູນນີ້ມີໃນລະບົບເເລ້ວ!',
            'phone.required' => 'ປ້ອນຂໍ້ມູນກ່ອນ!',
            'phone.min' => 'ເບີໂທ8ໂຕເລກເທົ່ານັ້ນ!',
            'phone.max' => 'ເບີໂທ8ໂຕເລກເທົ່ານັ້ນ!',
            'phone.unique' => 'ຂໍ້ມູນນີ້ມີໃນລະບົບເເລ້ວ!',
        ]);
        // try {
        //     DB::beginTransaction();
        $data = new WorkPlace();
        if (!empty($this->image)) {
            $this->validate([
                'image' => 'required|mimes:jpg,png,jpeg',
            ]);
            $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
            $this->image->storeAs('upload/workplace', $imageName);
            $data->image = 'upload/workplace' . '/' . $imageName;
        } else {
            $data->image = '';
        }
        $data->name = $this->name;
        $data->phone = $this->phone;
        $data->email = $this->email;
        $data->facebook = $this->facebook;
        $data->province_id = $this->province_id;
        $data->village_id = $this->village_id;
        $data->district_id = $this->district_id;
        $data->save();
        $this->resetField();
        $this->dispatchBrowserEvent('hide-modal-add-edit');
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ສຳເລັດເເລ້ວ!',
            'icon' => 'success',
        ]);
        DB::commit();
        return redirect(route('backend.WorkPlace'));
        // } catch (\Exception $ex) {
        //     DB::rollBack();
        //     $this->dispatchBrowserEvent('swal', [
        //         'title' => 'ມີບາງຢ່າງຜິດພາດ!',
        //         'icon' => 'warning',
        //     ]);
        // }

    }
    public function edit($ids)
    {
        $this->ID = $ids;
        $data = WorkPlace::find($ids);
        $this->name = $data->name;
        $this->phone = $data->phone;
        $this->email = $data->email;
        $this->facebook = $data->facebook;
        $this->province_id = $data->province_id;
        $this->village_id = $data->village_id;
        $this->district_id = $data->district_id;
        $this->newimage = $data->image;
        $this->dispatchBrowserEvent('show-modal-add-edit');
    }
    public function Update($ids)
    {
        // $this->validate([
        //     // 'password' => 'min:6',
        //     // 'confirm_password' => 'same:password',
        // ], [
        //     // 'password.min' => 'ລະຫັດ6ໂຕຂື້ນໄປ!',
        //     // 'confirm_password.same' => 'ລະຫັດຜ່ານບໍ່ຕົງກັນ!',
        // ]);
        $this->ID = $ids;
        $data = WorkPlace::find($ids);
        if ($this->image) {
            $this->validate([
                'image' => 'required|mimes:jpg,png,jpeg',
            ]);
            $filename_image = $this->image->getClientOriginalName();
            $this->image->storeAs('upload/workplace' . $filename_image);
            $data->image = 'upload/workplace' . $filename_image;
        }
        $data->name = $this->name;
        $data->phone = $this->phone;
        $data->email = $this->email;
        $data->facebook = $this->facebook;
        $data->province_id = $this->province_id;
        $data->village_id = $this->village_id;
        $data->district_id = $this->district_id;
        $data->save();
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ສຳເລັດເເລ້ວ!',
            'icon' => 'success',
        ]);
        return redirect(route('backend.WorkPlace'));
        $this->resetField();
        $this->dispatchBrowserEvent('hide-modal-add-edit');
    }
    public function showDestroy($ids)
    {
        $data = WorkPlace::find($ids);
        $this->ID = $data->id;
        $this->dispatchBrowserEvent('show-modal-delete');
    }
    public function destroy()
    {
        $ids = $this->ID;
        try {
            DB::beginTransaction();
            $data = WorkPlace::find($ids);
            $data->delete();
            $this->resetField();
            $this->dispatchBrowserEvent('hide-modal-delete');
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ສຳເລັດເເລ້ວ!',
                'icon' => 'success',
            ]);
            DB::commit();
            return redirect(route('backend.WorkPlace'));
        } catch (\Exception $ex) {
            DB::rollBack();
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ມີບາງຢ່າງຜິດພາດ!',
                'icon' => 'warning',
            ]);
        }
    }
    public $village_data, $province_data, $district_data;
    public function show_detail($ids)
    {
        $this->ID = $ids;
        $data = WorkPlace::find($ids);
        $this->name = $data->name;
        $this->phone = $data->phone;
        $this->email = $data->email;
        $this->facebook = $data->facebook;
        $this->village_data = $data->village->name_la ?? '';
        $this->province_data = $data->province->name_la ?? '';
        $this->district_data = $data->district->name_la ?? '';
        $this->newimage = $data->image;
        $this->dispatchBrowserEvent('show-modal-detail');
    }
}
