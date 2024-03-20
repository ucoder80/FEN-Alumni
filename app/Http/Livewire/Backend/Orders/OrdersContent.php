<?php

namespace App\Http\Livewire\Backend\Orders;

use App\Models\Orders;
use App\Models\OrdersCart;
use App\Models\OrdersDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OrdersContent extends Component
{
    public $supplier_id;
    public $ID, $qty, $price, $total_paid, $type, $note, $sum_subtotal;
    public function render()
    {
        $OrdersCarts = OrdersCart::all();
        $Count_cart = OrdersCart::select('id')->count();
        $suppliers = User::all();
        $this->sum_subtotal = OrdersCart::select('subtotal')->sum('subtotal');
        return view('livewire.backend.orders.orders-content', compact('OrdersCarts', 'Count_cart', 'suppliers'))->layout('layouts.backend.style');
    }
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
    public function PlaceOrder()
    {
        $sum_subtotal = OrdersCart::select('subtotal')->sum('subtotal');
        if ($this->supplier_id == null) {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ເລືອກຜູ້ຈຳຫນ່າຍກ່ອນ!!',
                'icon' => 'warning',
                'iconColor' => 'red',
            ]);
        } else {
            try {
                DB::beginTransaction();
                $orders = new Orders();
                $orders->code = 'OD-' . rand(100000, 999999);
                $orders->supplier_id = $this->supplier_id;
                $orders->employee_id = auth()->user()->id;
                $orders->total = $sum_subtotal;
                $orders->status = 1;
                $orders->note = $this->note;
                $orders->save();
                $OrderCart = OrdersCart::get();
                foreach ($OrderCart as $key => $cart_item) {
                    if ($cart_item->branch_id == auth()->user()->branch_id) {
                        $products = array(
                            'orders_id' => $orders->id,
                            'product_id' => $cart_item->product_id,
                            'buy_price' => $cart_item->price,
                            'stock' => $cart_item->qty,
                            'subtotal' => ($cart_item->price * $cart_item->qty),
                        );
                        $OrdersDetail = OrdersDetail::insert($products);
                        $clear_cart = OrdersCart::where('id', $cart_item->id)->where('creator_id', auth()->user()->id)->delete();
                    }
                    $check_product = Product::find($cart_item->product_id);
                    if ($check_product) {
                        $check_product->check = null;
                        $check_product->save();
                    }
                }
                $this->dispatchBrowserEvent('swal', [
                    'title' => 'ສັ່ງຊື້ສຳເລັດເເລ້ວ!',
                    'icon' => 'success',
                ]);
                DB::commit();
                return redirect(route('backend.OrderImport'));
            } catch (\Exception $ex) {
                DB::rollBack();
                // dd($ex->getMessage());
                $this->emit('alert', ['type' => 'error', 'message' => 'ມີບາງຢ່າງຜິດພາດ!']);
            }
        }
    }
}
