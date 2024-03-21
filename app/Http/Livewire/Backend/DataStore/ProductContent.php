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
    public $search, $code, $image, $newimage, $name, $status, $product_note,
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
        $this->validate([
            'name' => 'required|unique:products',
            'image' => 'required',
            'product_type_id' => 'required',
            'buy_price' => 'required',
            'sell_price' => 'required',
        ], [
            'name.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນກ່ອນ!',
            'name.unique' => 'ຂໍ້ມູນນີ້ມີໃນລະບົບເເລ້ວ!',
            'image.required' => 'ອັບຮູບສິນຄ້າກ່ອນ!',
            'product_type_id.required' => 'ເລືອກຂໍ້ມູນກ່ອນ!',
            'buy_price.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນກ່ອນ!',
            'sell_price.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນກ່ອນ!',
        ]);
        try {
            DB::beginTransaction();
            $count_id = Product::count('id');
            $count = $count_id + 1;
            if ($this->buy_price >= $this->sell_price) {
                $this->dispatchBrowserEvent('swal', [
                    'title' => 'ລາຄາຊື້ຕ້ອງນ້ອຍກວ່າລາຄາຂາຍ!',
                    'icon' => 'warning',
                ]);
            } else {
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
                $data->buy_price = str_replace(',', '', $this->buy_price);
                $data->sell_price = str_replace(',', '', $this->sell_price);
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
            }

        } catch (\Exception $ex) {
            DB::rollBack();
            // dd($ex);
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
        $this->stock = $data->stock;
        $this->buy_price = $data->buy_price;
        $this->sell_price = $data->sell_price;
        $this->select_color = $data->select_color;
        $this->note = $data->note;
        $this->dispatchBrowserEvent('show-modal-add-edit');
    }
    public function Update()
    {
        $this->validate([
            'name' => 'required',
            'product_type_id' => 'required',
            'buy_price' => 'required',
            'sell_price' => 'required',
        ], [
            'name.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນກ່ອນ!',
            'product_type_id.required' => 'ເລືອກຂໍ້ມູນກ່ອນ!',
            'buy_price.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນກ່ອນ!',
            'sell_price.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນກ່ອນ!',
        ]);
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
            $data->stock = $this->stock;
            $data->buy_price = str_replace(',', '', $this->buy_price);
            $data->sell_price = str_replace(',', '', $this->sell_price);
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
        $this->ID = $ids;
        $data = Product::find($ids);
        $this->name = $data->name;
        $this->dispatchBrowserEvent('show-modal-delete');
    }
    public function Destory()
    {
        $data = Product::find($this->ID);
        $data->delete();
        $this->resetField();
        $this->dispatchBrowserEvent('hide-modal-delete');
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ສຳເລັດເເລ້ວ!',
            'icon' => 'success',
        ]);
    }
}
