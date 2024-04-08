<?php

namespace App\Http\Livewire\Backend\Reports;

use App\Models\Sales;
use App\Models\SalesDetail;
use Livewire\Component;

class SalesReportsContent extends Component
{
    public $start_date, $end_date, $type;
    public function mount()
    {
        $this->start_date = date('Y-m-d');
        $this->end_date = date('Y-m-d');
    }
    public function render()
    {
        $end = date('Y-m-d H:i:s', strtotime($this->end_date . '23:23:59'));
        if ($this->start_date && $this->end_date) {
            $data = Sales::whereBetween('created_at', [$this->start_date, $end])->get();
        } else {
            $data = [];
        }
        $sum_total = $data->sum('total');
        if ($this->type) {
            $data = $data->where('type', $this->type);
            $sum_total = $data->where('type', $this->type)->sum('total');
        }
        return view('livewire.backend.reports.sales-reports-content', compact('data', 'sum_total'))->layout('layouts.backend.style');
    }
    public $search, $code, $ID, $caculate, $SalesDetail = [], $sum_SalesDetail_subtotal, $sum_SalesDetail_stock, $customer_data,$total_paid;
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
        $sales = Sales::find($id);
        $this->ID = $sales->id;
        $this->customer_data = $sales->customer;
        $this->code = $sales->code;
        $this->sum_SalesDetail_subtotal = SalesDetail::select('subtotal')->where('sales_id', $this->ID)->sum('subtotal');
        $this->sum_SalesDetail_stock = SalesDetail::select('stock')->where('sales_id', $this->ID)->sum('stock');
        $this->SalesDetail = SalesDetail::where('sales_id', $this->ID)->get();
    }
}
