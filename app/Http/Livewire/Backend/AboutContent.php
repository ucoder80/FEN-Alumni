<?php

namespace App\Http\Livewire\Backend;

use App\Models\About;
use Livewire\Component;
use Livewire\WithFileUploads;

class AboutContent extends Component
{
    use WithFileUploads;
    public $name_la,$name_en,$phone,$email,$note,$role,$lats,$longs,$latitude,$longitude,$address;
    public $new_img, $img;
    public function mount()
    {
        $data = About::find(1);
        $this->name_la = $data->name_la;
        $this->phone = $data->phone;
        $this->note = $data->note;
        $this->address = $data->address;
        $this->latitude = $data->latitude;
        $this->longitude = $data->longitude;
    }
    public function render()
    {
        return view('livewire.backend.about-content')->layout('layouts.backend.style');
    }
    public function update()
    {
        $this->validate([
            'name_la'=>'required',
            'phone'=>'required|regex:/^[0-9]+$/i|max:8|:abouts',
            'note'=>'required',
        ],[
            'name_la.required'=>'ປ້ອນຂໍ້ມູນກ່ອນ!',
            'phone.required'=>'ປ້ອນຂໍ້ມູນກ່ອນ!',
            'phone.regex'=>'ປ້ອນເປັນຕົວເລກທັງຫມົດ!',
            'phone.max'=>'ຕົວເລກບໍ່ເກີນ 8 ໂຕ!',
            // 'phone.unique'=>'ຂໍ້ມູນນີ້ມີໃນລະບົບເເລ້ວ!',
            'note.required'=>'ປ້ອນຂໍ້ມູນກ່ອນ!',
            // 'image.required'=>'ເລືອກຮູບພາບກ່ອນ!',
        ]);
        $data = About::find(1);
        $data->name_la = $this->name_la;
        $data->name_en = $this->name_en;
        $data->phone = $this->phone;
        $data->note = $this->note;
        $data->address = $this->address;
        $data->latitude = $this->lats;
        $data->longitude = $this->longs;
        $data->save();
        session()->flash('success', 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ');
        return redirect(route('backend.about'));
    }
}
