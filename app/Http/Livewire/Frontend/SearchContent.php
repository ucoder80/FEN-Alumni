<?php

namespace App\Http\Livewire\Frontend;

use App\Models\User;
use Livewire\Component;

class SearchContent extends Component
{
    public $search, $datas;
    public function mount()
    {
        $this->datas = 'Allprojects';
        $this->fill(request()->only('search'));
    }
    public function render()
    {
        $data = User::orderBy('id', 'desc')->where('roles_id', 4)->where(function ($q) {
            $q->where('name_lastname', 'like', '%' . $this->search . '%')
                ->orwhere('code', 'like', '%' . $this->search . '%');
                // ->orwhere('note', 'like', '%' . $this->search . '%');
        })->get();
        return view('livewire.frontend.search-content', compact('data'))->layout('layouts.frontend.style');
    }
}
