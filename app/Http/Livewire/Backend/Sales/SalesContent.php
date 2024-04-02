<?php

namespace App\Http\Livewire\Backend\Sales;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\Sales;
use App\Models\SalesCart;
use App\Models\SalesDetail;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class SalesContent extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search_product, $search, $branchs, $sum_subtotal, $qty, $customer_id, $customer_data, $type = 2, $note,$product_type_id;
    public function render()
    {
        $product_type = ProductType::all();
        $data = Product::where(function ($q) {
            $q->where('name', 'like', '%' . $this->search . '%')
                ->orwhere('code', 'like', '%' . $this->search . '%');
        });
        if($this->product_type_id)
        {
            $data = $data->where('product_type_id',$this->product_type_id);
        }
        $count_cart = SalesCart::count();
        $sale_cart = SalesCart::all();
        $customers = User::all();
        $this->sum_subtotal = $sale_cart->sum('subtotal');
        if (!empty($this->customer_id)) {
            $this->customer_data = User::orderBy('id', 'desc')
                ->where('id', $this->customer_id)->first();
        } else {
            $this->customer_id = '';
            $this->customer_data = [];
        }
        if(!empty($data))
        {
            $data = $data->paginate(12);
        }else{
            $data = [];
        }
        return view('livewire.backend.sales.sales-content', compact('data', 'count_cart', 'sale_cart', 'customers','product_type'))->layout('layouts.backend.style');
    }
    public function resetField()
    {
        $this->customer_id = '';
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
                $order_cart->price = $product->sell_price;
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
        return redirect(route('backend.sale'));
    }
    public function UpdateStock($id)
    {
        $sale_cart = SalesCart::find($id);
        $sale_cart->qty = $this->qty[$id];
        $sale_cart->subtotal = $sale_cart->price * $this->qty[$id];
        $sale_cart->save();
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ສຳເລັດເເລ້ວ!',
            'icon' => 'success',
        ]);
    }
    public function ShowPlaceSales()
    {
        $this->dispatchBrowserEvent('show-modal-sales');
    }

    public function PlaceSales()
    {
        $sum_subtotal = SalesCart::select('subtotal')->sum('subtotal');
        if ($this->customer_id == null) {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ເລືອກລູກຄ້າກ່ອນໄອເວນ!',
                'icon' => 'warning',
                'iconColor' => 'red',
            ]);
        } else {
            $outOfStockProducts = [];
            $MorethanOfStockProducts = [];
            $SalesCart = SalesCart::get();
            foreach ($SalesCart as $key => $cart_item) {
                $check_product = Product::find($cart_item->product_id);
                if ($check_product->stock < $cart_item->qty) {
                    $MorethanOfStockProducts[] = $check_product->name;
                } else if ($check_product->stock <= 0) {
                    $outOfStockProducts[] = $check_product->name;
                }
            }

            if (!empty($MorethanOfStockProducts)) {
                $MorethanOfStockProductsList = implode(", ", $MorethanOfStockProducts);
                $this->dispatchBrowserEvent('swal', [
                    'title' => 'ຈຳນວນເກີນສະຕ໋ອກ: ' . $MorethanOfStockProductsList,
                    'icon' => 'warning',
                ]);
            } elseif (!empty($outOfStockProducts)) {
                $outOfStockProductsList = implode(", ", $outOfStockProducts);
                $this->dispatchBrowserEvent('swal', [
                    'title' => 'ໝົດສະຕ໋ອກ: ' . $outOfStockProductsList,
                    'icon' => 'warning',
                ]);
            } else {
                try {
                    DB::beginTransaction();
                    $sales = new Sales();
                    $sales->code = 'SL-' . rand(100000, 999999);
                    $sales->customer_id = $this->customer_id;
                    $sales->employee_id = auth()->user()->id;
                    $sales->total = $sum_subtotal;
                    $sales->status = 1;
                    $sales->type = $this->type;
                    $sales->onepay = 1;
                    $sales->note = $this->note;
                    $sales->save();
                    foreach ($SalesCart as $key => $cart_item) {
                        $check_product = Product::find($cart_item->product_id);
                        if ($check_product->stock >= $cart_item->qty) {
                            $products = array(
                                'sales_id' => $sales->id,
                                'products_id' => $cart_item->product_id,
                                'sell_price' => $cart_item->price,
                                'stock' => $cart_item->qty,
                                'subtotal' => ($cart_item->price * $cart_item->qty),
                            );
                            $SalesDetail = SalesDetail::insert($products);
                            $clear_cart = SalesCart::where('id', $cart_item->id)->where('creator_id', auth()->user()->id)->delete();
                            if ($check_product) {
                                $check_product->stock -= $cart_item->qty; //ຕັດສະຕ່ອກ
                                $check_product->check_2 = null;
                                $check_product->save();
                            }
                            $this->dispatchBrowserEvent('swal', [
                                'title' => 'ຂາຍສິນຄ້າສຳເລັດເເລ້ວ!',
                                'icon' => 'success',
                            ]);
                            $this->dispatchBrowserEvent('hide-modal-sales');
                            $this->resetField();
                        }
                    }
                    DB::commit();
                    return redirect(route('backend.sale'));
                } catch (\Exception $ex) {
                    DB::rollBack();
                    dd($ex->getMessage());
                    $this->emit('alert', ['type' => 'error', 'message' => 'ມີບາງຢ່າງຜິດພາດ!']);
                }
            }
        }
    }

}
