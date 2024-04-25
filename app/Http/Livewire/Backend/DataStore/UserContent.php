<?php

namespace App\Http\Livewire\Backend\DataStore;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Salary;
use App\Models\Village;
use Livewire\Component;
use App\Models\District;
use App\Models\Position;
use App\Models\Province;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class UserContent extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $ID,
    $search, $page_number,
    $name_lastname,
    $phone,
    $email,
    $password, $roles_id,
    $confirm_password,
    $branch_id,
    $gender,
    $status,
    $birtday_date,
    $province_id,
    $village_id,
    $district_id,
    $districts = [],
    $villages = [];
    public $salary_id,$position_id,$image,$nationality,$religion,$newimage;
    public function render()
    {
        $data = User::where(function ($q) {
            $q->where('name_lastname', 'like', '%' . $this->search . '%')
                ->orwhere('phone', 'like', '%' . $this->search . '%');
        })->orderBy('id', 'desc');
        if ($this->roles_id) {
            $data = $data->where('roles_id', $this->roles_id);
        }
        if (!empty($data)) {
            $data = $data->paginate(8);
        }
        $provinces = Province::all();
        if ($this->province_id) {
            $this->districts = District::where('province_id', $this->province_id)->get();
        }
        if ($this->district_id) {
            $this->villages = Village::where('district_id', $this->district_id)->get();
        }
        $roles = Role::all();
        $salary = Salary::all();
        $position = Position::all();
        return view('livewire.backend.data-store.user-content', compact('data', 'provinces', 'roles','salary','position'))->layout('layouts.backend.style');
    }
    public function resetField()
    {
        $this->ID = '';
        $this->name_lastname = '';
        $this->phone = '';
        $this->email = '';
        $this->password = '';
        $this->confirm_password = '';
        $this->roles_id = '';
        $this->province_id = '';
        $this->village_id = '';
        $this->district_id = '';
        $this->status = '';
        $this->gender = '';
        $this->birtday_date = '';
        $this->salary_id = '';
        $this->position_id = '';
        $this->image = '';
        $this->nationality = '';
        $this->religion = '';

    }
    public function create()
    {
        $this->dispatchBrowserEvent('show-modal-add-edit');
        $this->resetField();
    }
    public function Store()
    {
        $this->validate([
            'name_lastname' => 'required',
            'email' => 'unique:users',
            'gender' => 'required',
            'phone' => 'required|min:8|max:8|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'roles_id' => 'required',
        ], [
            'name_lastname.required' => 'ປ້ອນຂໍ້ມູນກ່ອນ!',
            'email.unique' => 'ຂໍ້ມູນນີ້ມີໃນລະບົບເເລ້ວ!',
            'gender.required' => 'ເລືອກຂໍ້ມູນກ່ອນ!',
            'phone.required' => 'ປ້ອນຂໍ້ມູນກ່ອນ!',
            'phone.min' => 'ເບີໂທ8ໂຕເລກເທົ່ານັ້ນ!',
            'phone.max' => 'ເບີໂທ8ໂຕເລກເທົ່ານັ້ນ!',
            'phone.unique' => 'ຂໍ້ມູນນີ້ມີໃນລະບົບເເລ້ວ!',
            'password.required' => 'ປ້ອນຂໍ້ມູນກ່ອນ!',
            'password.min' => 'ລະຫັດ6ໂຕຂື້ນໄປ!',
            'confirm_password.required' => 'ປ້ອນຂໍ້ມູນກ່ອນ!',
            'confirm_password.same' => 'ລະຫັດຜ່ານບໍ່ຕົງກັນ!',
            'roles_id.required' => 'ເລືອກຂໍ້ມູນກ່ອນ!',
        ]);
        try {
            DB::beginTransaction();
            $data = new User();
            if (!empty($this->image)) {
                $this->validate([
                    'image' => 'required|mimes:jpg,png,jpeg',
                ]);
                $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
                $this->image->storeAs('upload/users', $imageName);
                $data->image = 'upload/users' . '/' . $imageName;
            } else {
                $data->image = '';
            }
            $data->code = 'EP-' . mt_rand(100000, 999999);
            $data->name_lastname = $this->name_lastname;
            $data->phone = $this->phone;
            $data->email = $this->email;
            $data->gender = $this->gender;
            $data->status = $this->status;
            $data->birtday_date = $this->birtday_date;
            $data->email = $this->email;
            $data->password = bcrypt($this->password);
            $data->roles_id = $this->roles_id;
            $data->village_id = $this->village_id;
            $data->district_id = $this->district_id;
            $data->province_id = $this->province_id;
            $data->salary_id = $this->salary_id;
            $data->position_id = $this->position_id;
            $data->nationality = $this->nationality;
            $data->religion = $this->religion;
            $data->save();
            $this->resetField();
            $this->dispatchBrowserEvent('hide-modal-add-edit');
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ສຳເລັດເເລ້ວ!',
                'icon' => 'success',
            ]);
            DB::commit();
        return redirect(route('backend.user'));
        } catch (\Exception $ex) {
            DB::rollBack();
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ມີບາງຢ່າງຜິດພາດ!',
                'icon' => 'warning',
                // 'iconColor'=>'warning',
            ]);
        }

    }
    public function edit($ids)
    {
        $this->ID = $ids;
        $data = User::find($ids);
        $this->name_lastname = $data->name_lastname;
        $this->phone = $data->phone;
        $this->email = $data->email;
        $this->gender = $data->gender;
        $this->status = $data->status;
        $this->birtday_date = $data->birtday_date;
        $this->roles_id = $data->roles_id;
        $this->village_id = $data->village_id;
        $this->province_id = $data->province_id;
        $this->district_id = $data->district_id;
        $this->salary_id = $data->salary_id;
        $this->newimage = $data->image;
        $this->position_id = $data->position_id;
        $this->nationality = $data->nationality;
        $this->religion = $data->religion;
        $this->dispatchBrowserEvent('show-modal-add-edit');
    }
    public function Update($ids)
    {
        $this->validate([
            // 'password' => 'min:6',
            'confirm_password' => 'same:password',
        ], [
            // 'password.min' => 'ລະຫັດ6ໂຕຂື້ນໄປ!',
            'confirm_password.same' => 'ລະຫັດຜ່ານບໍ່ຕົງກັນ!',
        ]);
        $this->ID = $ids;
        $data = User::find($ids);
        if ($this->image) {
            $this->validate([
                'image' => 'required|mimes:jpg,png,jpeg',
            ]);
            $filename_image = $this->image->getClientOriginalName();
            $this->image->storeAs('upload/users' . $filename_image);
            $data->image = 'upload/users' . $filename_image;
        }
        $data->name_lastname = $this->name_lastname;
        $data->phone = $this->phone;
        $data->email = $this->email;
        $data->gender = $this->gender;
        $data->status = $this->status;
        $data->birtday_date = $this->birtday_date;
        $data->roles_id = $this->roles_id;
        $data->village_id = $this->village_id;
        $data->province_id = $this->province_id;
        $data->district_id = $this->district_id;
        $data->salary_id = $this->salary_id;
        $data->position_id = $this->position_id;
        $data->nationality = $this->nationality;
        $data->religion = $this->religion;
        $data->save();
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ສຳເລັດເເລ້ວ!',
            'icon' => 'success',
        ]);
        return redirect(route('backend.user'));
        $this->resetField();
        $this->dispatchBrowserEvent('hide-modal-add-edit');
    }
    public function showDestroy($ids)
    {
        $data = User::find($ids);
        $this->ID = $data->id;
        $this->dispatchBrowserEvent('show-modal-delete');
    }
    public function destroy()
    {
        $ids = $this->ID;
        try {
            DB::beginTransaction();
            $data = User::find($ids);
            $data->delete();
            $this->resetField();
            $this->dispatchBrowserEvent('hide-modal-delete');
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ສຳເລັດເເລ້ວ!',
                'icon' => 'success',
            ]);
            DB::commit();
        return redirect(route('backend.user'));
        } catch (\Exception $ex) {
            DB::rollBack();
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ມີບາງຢ່າງຜິດພາດ!',
                'icon' => 'warning',
            ]);
        }
    }
}
