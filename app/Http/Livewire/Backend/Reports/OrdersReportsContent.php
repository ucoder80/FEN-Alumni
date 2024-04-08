<?php

namespace App\Http\Livewire\Backend\Reports;

use App\Models\Orders;
use App\Models\OrdersDetail;
use Livewire\Component;

class OrdersReportsContent extends Component
{
    public $start_date, $end_date, $status;
    public function mount()
    {
        $this->start_date = date('Y-m-d');
        $this->end_date = date('Y-m-d');
    }
    public function render()
    {
        $end = date('Y-m-d H:i:s', strtotime($this->end_date . '23:23:59'));
        if ($this->start_date && $this->end_date) {
            $data = Orders::whereBetween('created_at', [$this->start_date, $end])->get();
        } else {
            $data = [];
        }
        $sum_total = $data->sum('total');
        if ($this->status) {
            $data = $data->where('status', $this->status);
            $sum_total = $data->where('status', $this->status)->sum('total');
        }
        return view('livewire.backend.reports.orders-reports-content', compact('data', 'sum_total'))->layout('layouts.backend.style');
    }
    public $search, $code, $ID, $caculate, $OrdersDetail = [], $sum_OrdersDetail_subtotal, $sum_OrdersDetail_stock, $supplier_data,$total_paid,$type;
    public function resetField()
    {
        $this->total_paid = '';
        // $this->payment_image = '';
        $this->type = '';
    }
    public function ShowDetail($id)
    {
        $this->resetField();
        $this->dispatchBrowserEvent('show-modal-detail');
        $orders = Orders::find($id);
        $this->ID = $orders->id;
        $this->supplier_data = $orders->supplier;
        $this->code = $orders->code;
        $this->sum_OrdersDetail_subtotal = OrdersDetail::select('subtotal')->where('orders_id', $this->ID)->sum('subtotal');
        $this->sum_OrdersDetail_stock = OrdersDetail::select('stock')->where('orders_id', $this->ID)->sum('stock');
        $this->OrdersDetail = OrdersDetail::where('orders_id', $this->ID)->get();
    }
}
