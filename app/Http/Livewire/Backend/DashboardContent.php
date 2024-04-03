<?php

namespace App\Http\Livewire\Backend;

use App\Models\Orders;
use App\Models\Product;
use App\Models\Sales;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DashboardContent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $sum_total_sale, $sum_total_order, $count_product, $count_order, $count_sale, $count_employee, $count_customer;
    public function render()
    {
        $this->sum_total_order = Orders::select('total')->sum('total');
        $this->sum_total_sale = Sales::select('total')->sum('total');
        $this->count_product = Product::select('id')->count('id');

        $this->count_order = Orders::select('id')->count('id');
        $this->count_sale = Sales::select('id')->count('id');

        $this->count_employee = User::select('id')->whereIn('roles_id', [1, 2])->count('id');
        $this->count_customer = User::select('id')->where('roles_id', 4)->count('id');

        $sales = Sales::where('status', 1)->paginate(5);

        return view('livewire.backend.dashboard-content', compact('sales'))->layout('layouts.backend.style');
    }
}
