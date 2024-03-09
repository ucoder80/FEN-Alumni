<?php

namespace App\Http\Livewire\Backend\Orders;

use App\Models\Orders;
use App\Models\OrdersDetail;
use Livewire\Component;
use Livewire\WithPagination;

class ImportUpdateContent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $ID, $sum_subtotal, $count_item, $subtotal, $idupdate;
    public $qty, $price;
    public function mount($slug_id)
    {
        $order_products = Orders::find($slug_id);
        $this->ID = $order_products->id;
        // $this->supplier_id = $order_products->supplier_id;
        // $this->total = $order_products->total;
        // $this->total_qty = $order_products->total_qty;

        $this->sum_subtotal = OrdersDetail::select('subtotal')->where('orders_id', $this->ID)->sum('subtotal');
        $this->count_item = OrdersDetail::where('orders_id', $this->ID)->count();
    }
    public function render()
    {
        // $order_products = Orders::orderBy('id','desc')
        // ->where('id',$this->ID)
        // ->where('branch_id', auth()->user()->branch->id)->paginate(10);

        $data = OrdersDetail::where('orders_id', $this->ID)->get();
        // $sum_subtotal = OrdersDetail::select('subtotal')->where('orders_id', $this->ID)->sum('subtotal');
        // $count_item = OrdersDetail::where('orders_id', $this->ID)->count();
        if ($this->qty && $this->price) {
            $this->subtotal = $this->qty * $this->price;
        }
        return view('livewire.backend.orders.import-update-content', compact('data'))->layout('layouts.backend.style');
    }
    public function resetField()
    {
        $this->qty = '';
        $this->price = '';
    }
    public function ShowUpdate($id)
    {
        $this->resetField();
        $this->dispatchBrowserEvent('show-modal-edit');
        $orderDetail = OrdersDetail::find($id);
        $this->idupdate = $orderDetail->id;
        $this->price = $orderDetail->price;
        $this->qty = $orderDetail->quantity;
    }

    public function Update()
    {
        if ($this->qty <= 0) {
            return;
        }
        $orderDetail = OrdersDetail::find($this->idupdate);
        $orderDetail->update([
            'quantity' => $this->qty,
            'subtotal' => ($this->subtotal),
        ]);
        $this->dispatchBrowserEvent('hide-modal-edit');
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ!',
            'icon' => 'success',
            'iconColor' => 'green',
        ]);
        return redirect(route('backend.import_update', $this->ID));
    }
    public function ShowDelete($id)
    {
        $orderDetail = OrdersDetail::find($id);

        $this->idupdate = $orderDetail->id;
        $this->dispatchBrowserEvent('show-modal-delete');

    }
    public function Delete()
    {
        $orderDetail = OrdersDetail::find($this->idupdate);
        $orderDetail->delete();
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ລຶບຂໍ້ມູນສຳເລັດ!',
            'icon' => 'success',
            'iconColor' => 'green',
        ]);

        $check = OrdersDetail::where('orders_id', $this->ID)->count();
        if ($check > 0) {
            return redirect(route('backend.import_update', $this->ID));
        } else {
            $order = Orders::find($this->ID);
            $order->delete();
            return redirect(route('backend.import'));
        }
    }
    public function UpdateOrder()
    {
        $order = Orders::find($this->ID);
        $order->total_qty = $this->count_item;
        $order->total = $this->sum_subtotal;
        $order->Update();
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ!',
            'icon' => 'success',
            'iconColor' => 'green',
        ]);
        return redirect(route('backend.import'));
    }
}
