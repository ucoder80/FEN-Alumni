<?php

namespace App\Http\Livewire\Backend;

use App\Models\Orders;
use App\Models\PaySalary;
use App\Models\Position;
use App\Models\Product;
use App\Models\Sales;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DashboardContent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $sum_total_sale, $sum_total_salary, $count_product, $count_order, $count_sale, $count_employee, $count_position;
    public function render()
    {
        // $this->sum_total_salary = PaySalary::select('total_salary')->sum('total_salary');
        // $this->sum_total_sale = Sales::select('total')->sum('total');
        // $this->count_product = Product::select('id')->count('id');

        // $this->count_order = Orders::select('id')->count('id');
        // $this->count_sale = Sales::select('id')->count('id');

        // $this->count_employee = User::select('id')->count('id');
        // $this->count_position = Position::select('id')->count('id');

        // $sales = Sales::where('status', 1)->paginate(5);

        return view('livewire.backend.dashboard-content',)->layout('layouts.backend.style');
    }
}
