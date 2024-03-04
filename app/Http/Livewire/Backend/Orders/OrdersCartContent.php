<?php

namespace App\Http\Livewire\Backend\Orders;

use App\Models\OrdersCart;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class OrdersCartContent extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search_product, $search, $branchs;
    public function render()
    {
        if (!empty($this->search_product)) {
            $products = Product::orderBy('id', 'desc')
                ->where('id', $this->search_product)
                ->paginate(12);
        } else {
            $products = Product::orderBy('id', 'desc')
                ->where('code', 'like', '%' . $this->search . '%')
                ->paginate(12);
        }
        $count_cart = OrdersCart::count();
        return view('livewire.backend.orders.orders-cart-content', compact('products', 'count_cart'))->layout('layouts.backend.style');
    }
    public function AddToCart($ids)
    {
        try {
            DB::beginTransaction();
            $product = Product::find($ids);
            $check_product = Product::where('id', $ids)->update(array('check' => 1));
            $order_cart = new OrdersCart();
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
}
