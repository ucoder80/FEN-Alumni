<?php

namespace App\Http\Livewire\Backend\DataStore;

use App\Models\Product;
use App\Models\ProductType;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ProductContent extends Component
{
    public $search, $code, $image, $newimage, $name, $status,$product_note,
    $ID, $product_type_id, $stock, $buy_price, $sell_price, $select_color, $note;
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $data = Product::where(function ($q) {
            $q->where('name', 'like', '%' . $this->search . '%')
                ->orwhere('code', 'like', '%' . $this->search . '%');
        })->paginate(5);
        $product_type = ProductType::orderBy('id', 'desc')->get();
        return view('livewire.backend.data-store.product-content', compact('product_type', 'data'))->layout('layouts.backend.style');
    }
    public function resetField()
    {
        $this->ID = '';
        $this->code = '';
        $this->product_type_id = '';
        $this->image = '';
        $this->name = '';
        $this->stock = '';
        $this->buy_price = '';
        $this->sell_price = '';
        $this->select_color = '';
        $this->status = '';
        $this->note = '';
    }
    public function create()
    {
        $this->resetField();
        $this->dispatchBrowserEvent('show-modal-add-edit');
    }
    public function Store()
    {
        // $this->validate([
        //     // 'name' => 'required|unique:cars',
        //     'name' => 'required',
        //     'car_types_id' => 'required',
        //     // 'engine_number' => 'required',
        //     'register_number' => 'required|unique:cars',
        //     // 'tank_number' => 'required',
        // ], [
        //     'name.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນກ່ອນ',
        //     'car_types_id.required' => 'ໃສ່ຂໍ້ມູນກ່ອນ',
        //     // 'engine_number.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນກ່ອນ',
        //     'register_number.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນກ່ອນ',
        //     'register_number.unique' => 'ຂໍ້ມູນນີ້ມີໃນລະບົບເເລ້ວ!',
        //     // 'tank_number.required' => 'ໃສ່ຂໍ້ມູນຕົວເລກກ່ອນ',
        // ]);
        try {
            DB::beginTransaction();
            $count_id = Product::count('id');
            $count = $count_id + 1;
            $data = new Product();
            if (!empty($count_id)) {
                $data->code = 'P-00' . $count;
            } else {
                $data->code = 'P-001';
            }
            if (!empty($this->image)) {
                $this->validate([
                    'image' => 'required|mimes:jpg,png,jpeg',
                ]);
                $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
                $this->image->storeAs('upload/product', $imageName);
                $data->image = 'upload/product' . '/' . $imageName;
            } else {
                $data->image = '';
            }
            $data->product_type_id = $this->product_type_id;
            $data->name = $this->name;
            $data->stock = 0;
            $data->buy_price = $this->buy_price;
            $data->sell_price = $this->sell_price;
            $data->select_color = 1;
            $data->note = $this->note;
            $data->status = 0;
            $data->save();
            DB::commit();
            $this->resetField();
            $this->dispatchBrowserEvent('hide-modal-add-edit');
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ສຳເລັດເເລ້ວ!',
                'icon' => 'success',
            ]);
        } catch (\Exception $ex) {
            DB::rollBack();
            dd($ex);
            $this->dispatch('something_went_wrong');
        }
    }
    public function edit($ids)
    {
        $this->resetField();
        $data = Product::find($ids);
        $this->ID = $data->id;
        $this->newimage = $data->image;
        $this->product_type_id = $data->product_type_id;
        $this->name = $data->name;
        $this->buy_price = $data->buy_price;
        $this->sell_price = $data->sell_price;
        $this->select_color = $data->select_color;
        $this->note = $data->note;
        $this->dispatchBrowserEvent('show-modal-add-edit');
    }
    public function Update()
    {
        // $this->validate([
        //     'name' => 'required',
        //     // 'branches_id' => 'required',
        //     'car_types_id' => 'required',
        //     // 'engine_number' => 'required',
        //     'register_number' => 'required',
        //     // 'tank_number' => 'required',
        // ], [
        //     'name.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນກ່ອນ',
        //     // 'branches_id.required' => 'ໃສ່ຂໍ້ມູນກ່ອນ',
        //     'car_types_id.required' => 'ໃສ່ຂໍ້ມູນກ່ອນ',
        //     // 'engine_number.required' => 'ໃສ່ຂໍ້ມູນຕົວເລກກ່ອນ',
        //     'register_number.required' => 'ໃສ່ຂໍ້ມູນຕົວເລກກ່ອນ',
        //     // 'tank_number.required' => 'ໃສ່ຂໍ້ມູນຕົວເລກກ່ອນ',
        // ]);
        try {
            DB::beginTransaction();
            $data = Product::find($this->ID);
            if ($this->image) {
                $this->validate([
                    'image' => 'required|mimes:jpg,png,jpeg',
                ]);
                $filename_image = $this->image->getClientOriginalName();
                $this->image->storeAs('upload/product' . $filename_image);
                $data->image = 'upload/product' . $filename_image;
            }
            $data->product_type_id = $this->product_type_id;
            $data->name = $this->name;
            $data->buy_price = $this->buy_price;
            $data->sell_price = $this->sell_price;
            $data->select_color = $this->select_color;
            $data->note = $this->note;
            $data->update();
            DB::commit();
            $this->resetField();
            $this->dispatchBrowserEvent('hide-modal-add-edit');
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ສຳເລັດເເລ້ວ!',
                'icon' => 'success',
            ]);
        } catch (\Exception $ex) {
            DB::rollBack();
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ມີບາງຢ່າງຜິດພາດ!',
                'icon' => 'error',
            ]);
        }
    }
    public function showDestory($ids)
    {
        $data = Product::find($ids);
        $this->ID = $data->id;
        $this->name = $data->name;
        $this->dispatchBrowserEvent('show-modal-delete');
    }
    public function Destory($ids)
    {
        try {
            $data = Product::find($ids);
            $data->delete();
            $this->resetField();
            $this->dispatchBrowserEvent('hide-modal-delete');
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ສຳເລັດເເລ້ວ!',
                'icon' => 'success',
            ]);
        } catch (\Exception $ex) {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ມີບາງຢ່າງຜິດພາດ!',
                'icon' => 'error',
            ]);
        }
    }
}
