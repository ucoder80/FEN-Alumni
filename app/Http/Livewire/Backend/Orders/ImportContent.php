<?php

namespace App\Http\Livewire\Backend\Orders;

use App\Models\Orders;
use App\Models\OrdersDetail;
use App\Models\Orderslogs;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ImportContent extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search, $start_date, $end_date, $status, $ID, $caculate;

    public function render()
    {
        $end = date('Y-m-d H:i:s', strtotime($this->end_date . '23:23:59'));
        $data = Orders::withSum('orders_logs', 'total_paid')
            ->where(function ($query) {
                $query->where('code', 'like', '%' . $this->search . '%');
            })->get();
        if ($this->start_date && $this->end_date) {
            $data = $data->whereBetween('created_at', [$this->start_date, $end]);
        }
        if ($this->status) {
            $data = $data->where('status', $this->status);
        }
        if (!empty($data)) {
            $data = $data;
        } else {
            $data = [];
        }
        return view('livewire.backend.orders.import-content', compact('data'))->layout('layouts.backend.style');
    }
    public function resetField()
    {
        $this->total_paid = '';
        // $this->payment_image = '';
        $this->type = '';
    }
    public function ShowConfirm($ids)
    {
        $this->dispatchBrowserEvent('show-modal-import');
        $orders = Orders::find($ids);
        $this->ID = $orders->id;
    }
    public function ConfirmImport()
    {
        $ids = $this->ID;
        $orderDetail = OrdersDetail::where('orders_id', $ids)->get();
        foreach ($orderDetail as $item) {
            $product = Product::find($item->product_id);
            $product->stock = $product->stock + $item->stock;
            $product->save();
        }
        $orders = Orders::find($ids);
        $orders->status = "2";
        $orders->save();
        $this->dispatchBrowserEvent('hide-modal-import');
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ນຳເຂົ້າສາງສຳເລັດ!',
            'icon' => 'success',
        ]);
    }
    public $orders_logs = [], $sum_subtotal_paid, $total, $payment_logs = [], $total_paid, $type;
    public function ShowPayment($id)
    {
        $this->resetField();
        $this->dispatchBrowserEvent('show-modal-paymoney');
        $orders = Orders::find($id);
        $this->ID = $orders->id;
        $this->sum_subtotal_paid = Orderslogs::select('total_paid')->where('orders_id', $this->ID)->sum('total_paid');
        $this->orders_logs = Orderslogs::where('orders_id', $this->ID)->get();
        $this->total = $orders->total - $this->sum_subtotal_paid;
    }
    public function ConfirmPayment()
    {
        $this->validate([
            'total_paid' => 'required',
            'type' => 'required',
        ], [
            'total_paid.required' => 'ປ້ອນຂໍ້ມູນກ່ອນ',
            'type.required' => 'ເລືອກຂໍ້ມູນກ່ອນ',
        ]);
        $orders = Orders::find($this->ID);
        $this->sum_subtotal_paid = Orderslogs::select('total_paid')->where('orders_id', $orders->id)->sum('total_paid');
        if (($orders->total - $this->sum_subtotal_paid) < str_replace(',', '', $this->total_paid)) {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ທ່ານປ້ອນເງິນເກີນຍອດຫນີ້!',
                'icon' => 'warning',
                'iconColor' => 'red',
            ]);
        } else {
            if ($orders->total == $this->sum_subtotal_paid) {
                $orders->check_payment = "2";
            } elseif ($orders->total > $this->sum_subtotal_paid) {
                $orders->check_payment = "1";
            } elseif ($orders->total == $this->sum_subtotal_paid) {
                $orders->check_payment = "1";
            }
            $orders->update();
            $orders_logs = new Orderslogs();
            $orders_logs->orders_id = $orders->id;
            $orders_logs->total_paid = str_replace(',', '', $this->total_paid);
            $orders_logs->type = $this->type;
            $orders_logs->dated = Carbon::now();
            // if (!empty($this->payment_image)) {
            //     $this->validate([
            //         'payment_image' => 'required|mimes:jpg,png,jpeg',
            //     ]);
            //     $imageName = Carbon::now()->timestamp . '.' . $this->payment_image->extension();
            //     $this->payment_image->storeAs('upload/payment', $imageName);
            //     $orders_logs->payment_image = 'upload/payment' . '/' . $imageName;
            // } else {
            //     $orders_logs->payment_image = '';
            // }
            $orders_logs->save();
            $this->dispatchBrowserEvent('hide-modal-paymoney');
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ຊຳລະຫນີ້ສຳເລັດ!',
                'icon' => 'success',
                'iconColor' => 'green',
            ]);
        }
    }
    public $orderDetail = [], $stock = [],$code;
    public function ShowUpdate($ids)
    {
        $this->dispatchBrowserEvent('show-modal-update-item');
        $orders = Orders::find($ids);
        $this->ID = $orders->id;
        $this->code = $orders->code;
        $this->orderDetail = OrdersDetail::where('orders_id', $this->ID)->get();
        $this->stock = $this->orderDetail->pluck('stock');
    }

    public function Remove_Item($id)
    {
        $OrdersDetail = OrdersDetail::find($id);
        $OrdersDetail->delete();
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ລຶບຂໍ້ມູນສຳເລັດ!',
            'icon' => 'success',
        ]);
    }

    public function UpdateStock($id)
    {
        $orderDetail = OrdersDetail::find($id);
        $orderDetail->stock = $this->stock[$id];
        $orderDetail->subtotal = $orderDetail->buy_price * $this->stock[$id];
        $orderDetail->save();
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ແກ້ໄຂຈຳນວນສຳເລັດ!',
            'icon' => 'success',
        ]);
    }

}
