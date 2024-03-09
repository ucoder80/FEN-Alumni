<?php

namespace App\Http\Livewire\Backend\Orders;

use App\Models\Orders;
use App\Models\OrdersDetail;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ImportContent extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search, $start_date, $end_date, $status, $ID;
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
}
