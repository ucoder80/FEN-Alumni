<?php

namespace App\Http\Livewire\Backend\Reports;

use App\Models\Sales;
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
}
