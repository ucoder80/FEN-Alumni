<?php

namespace App\Http\Livewire\Backend\Orders;

use App\Models\OrdersCart;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OrdersContent extends Component
{
    public function render()
    {
        $OrdersCarts = OrdersCart::all();
        $Count_cart = OrdersCart::select('id')->count();
        return view('livewire.backend.orders.orders-content', compact('OrdersCarts', 'Count_cart'))->layout('layouts.backend.style');
    }
    public $ID, $qty, $price, $total_paid;
    public function resetField()
    {
        $this->qty = '';
        $this->total_paid = '';
    }
    public function ShowQty($id)
    {
        $this->resetField();
        $this->dispatchBrowserEvent('show-modal-popup');
        $order_cart = OrdersCart::find($id);
        $this->ID = $order_cart->id;
        $this->qty = $order_cart->qty;
        $this->price = number_format($order_cart->price);
    }
    public function UpdateQty()
    {
        try {
            DB::beginTransaction();
            $this->price = str_replace(',', '', $this->price);
            $this->validate([
                'qty' => 'required',
                // 'total_paid' => 'required|regex:/^[0-9]+$/i|max:8|',
                'price' => 'required',
            ], [
                'qty.required' => 'ປ້ອນຂໍ້ມູນກ່ອນ!',
                'price.required' => 'ປ້ອນຂໍ້ມູນກ່ອນ!',
            ]);
            $order_cart = OrdersCart::find($this->ID);
            if ($this->qty <= 0) {
                $check_product = Product::find($order_cart->product_id);
                $check_product->check = null;
                $check_product->save();
                $order_cart->delete();
                $this->dispatchBrowserEvent('hide-modal-popup');
            } else {
                $order_cart->update([
                    'qty' => $this->qty,
                    'price' => $this->price,
                    'subtotal' => $this->price * $this->qty,
                ]);
                $products = OrdersCart::select('orders_cart.*')
                    ->join('products', 'orders_cart.product_id', '=', 'products.id')
                    ->where('orders_cart.id', $this->ID)
                    ->update(array('buy_price' => $this->price));
                $this->dispatchBrowserEvent('hide-modal-popup');
                $this->dispatchBrowserEvent('swal', [
                    'title' => 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ!',
                    'icon' => 'success',
                ]);
            }
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ມີບາງຢ່າງຜິດພາດ!',
                'icon' => 'warning',
                // 'iconColor'=>'red',
            ]);
        }
    }
    public function Remove_Item($id)
    {
        $order_cart = OrdersCart::find($id);
        $order_cart->delete();
        $check_product = Product::find($order_cart->product_id);
        $check_product->check = null;
        $check_product->save();
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ລຶບຂໍ້ມູນສຳເລັດ!',
            'icon' => 'success',
        ]);
    }
    public function ShowClear()
    {
        $this->dispatchBrowserEvent('show-modal-clear-all-cart');
    }
    public function ClearItem()
    {
        try {
            $order_cart_items = OrdersCart::all();
            foreach ($order_cart_items as $order_cart) {
                $check_product = Product::find($order_cart->product_id);
                if ($check_product) {
                    $check_product->check = null;
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
