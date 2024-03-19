<?php

namespace App\Http\Livewire\Backend\Sales;

use App\Models\Product;
use Livewire\Component;
use App\Models\SalesCart;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class SalesContent extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search_product, $search, $branchs;
    public function render()
    {
        if (!empty($this->search_product)) {
            $data = Product::orderBy('id', 'desc')
                ->where('id', $this->search_product)
                ->paginate(12);
        } else {
            $data = Product::orderBy('id', 'desc')
                ->where('code', 'like', '%' . $this->search . '%')
                ->paginate(12);
        }
        $count_cart = SalesCart::count();
        $sale_cart = SalesCart::all();
        return view('livewire.backend.sales.sales-content',compact('data','count_cart','sale_cart'))->layout('layouts.backend.style');
    }
    public function AddToCart($ids)
    {
        try {
            DB::beginTransaction();
            // Check if the product is already in the cart for the current user
            $existingCartItem = SalesCart::where('creator_id', auth()->user()->id)
                ->where('product_id', $ids)
                ->first();
            if ($existingCartItem) {
                // If the product is already in the cart, you can handle it accordingly
                $this->dispatchBrowserEvent('swal', [
                    'title' => 'ສິນຄ້າມີໃນກະຕ່າເເລ້ວ!',
                    'icon' => 'warning',
                ]);
            } else {
                $product = Product::find($ids);
                $check_product = Product::where('id', $ids)->update(['check_2' => 1]);

                $order_cart = new SalesCart();
                $order_cart->creator_id = auth()->user()->id;
                $order_cart->product_id = $product->id;
                $order_cart->name = $product->name;
                $order_cart->price = $product->buy_price;
                $order_cart->qty = 1;
                $order_cart->subtotal = $order_cart->price * $order_cart->qty;
                $order_cart->save();

                $this->dispatchBrowserEvent('swal', [
                    'title' => 'ເພີ່ມໃສ່ກະຕ່າເເລ້ວ!',
                    'icon' => 'success',
                    'iconColor' => 'green',
                ]);
            }
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ມີບາງຢ່າງຜິດພາດ!',
                'icon' => 'warning',
            ]);
        }
    }
    public function Remove_Item($id)
    {
        $sale_cart = SalesCart::find($id);
        $sale_cart->delete();
        $check_product = Product::find($sale_cart->product_id);
        $check_product->check_2 = null;
        $check_product->save();
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ລຶບຂໍ້ມູນສຳເລັດ!',
            'icon' => 'success',
        ]);
    }
    public function ClearItem()
    {
        try {
            $order_cart_items = SalesCart::all();
            foreach ($order_cart_items as $order_cart) {
                $check_product = Product::find($order_cart->product_id);
                if ($check_product) {
                    $check_product->check_2 = null;
                    $check_product->save();
                }
                $order_cart->delete();
            }
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ລຶບອອກກະຕ່າທັງຫມົດເເລ້ວ!',
                'icon' => 'success',
            ]);
            $this->dispatchBrowserEvent('hide-modal-clear-all-cart');
        } catch (\Exception $ex) {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ມີບາງຢ່າງຜິດພາດ: ' . $ex->getMessage(),
                'icon' => 'error',
            ]);
        }
    }
}
