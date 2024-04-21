<?php

namespace App\Http\Livewire\Backend\Reports;

use App\Models\Product;
use Livewire\Component;

class ProductsContent extends Component
{
    public $status;
    public function render()
    {
        $data = Product::all();
        if ($this->status) {
            $data = $data->where('status', $this->status);
        }
        return view('livewire.backend.reports.products-content', compact('data'))->layout('layouts.backend.style');
    }
}
