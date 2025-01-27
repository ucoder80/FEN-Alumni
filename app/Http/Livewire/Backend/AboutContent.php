<?php

namespace App\Http\Livewire\Backend;

use App\Models\About;
use Livewire\Component;
use Livewire\WithFileUploads;

class AboutContent extends Component
{
    use WithFileUploads;
    public $name_la, $name_en, $phone, $email, $note, $role, $lats, $longs, $latitude, $longitude, $address, $logo;
    public $new_img, $img;
    public $f_sidebar_color, $b_sidebar_color;
    public function mount()
    {
        $data = About::find(1);
        $this->name_la = $data->name_la ?? '';
        $this->phone = $data->phone ?? '';
        $this->email = $data->email ?? '';
        $this->note = $data->note ?? '';
        $this->address = $data->address ?? '';
        $this->latitude = $data->latitude ?? '';
        $this->longitude = $data->longitude ?? '';
        $this->b_sidebar_color = $data->b_sidebar_color ?? '';
        $this->f_sidebar_color = $data->f_sidebar_color ?? '';
        if ($this->logo) {
            $this->logo = $data->logo ?? '';
        }
    }
    public function render()
    {
        return view('livewire.backend.about-content')->layout('layouts.backend.style');
    }
    public function update()
    {
        $this->validate([
            'name_la' => 'required',
            'phone' => 'required|regex:/^[0-9]+$/i|max:8',
            'note' => 'required',
        ], [
            'name_la.required' => 'ປ້ອນຂໍ້ມູນກ່ອນ!',
            'phone.required' => 'ປ້ອນຂໍ້ມູນກ່ອນ!',
            'phone.regex' => 'ປ້ອນເປັນຕົວເລກທັງຫມົດ!',
            'phone.max' => 'ຕົວເລກບໍ່ເກີນ 8 ໂຕ!',
            'note.required' => 'ປ້ອນຂໍ້ມູນກ່ອນ!',
        ]);

        $data = About::firstOrNew(['id' => 1]);

        if ($this->logo) {
            $this->validate([
                'logo' => 'required|mimes:jpg,png,jpeg',
            ]);

            $filename_logo = $this->logo->getClientOriginalName();
            $this->logo->storeAs('upload/logo', $filename_logo);
            $data->logo = 'upload/logo/' . $filename_logo;
        }

        $data->name_la = $this->name_la;
        $data->name_en = $this->name_en;
        $data->phone = $this->phone;
        $data->email = $this->email;
        $data->note = $this->note;
        $data->address = $this->address;
        $data->latitude = $this->lats;
        $data->longitude = $this->longs;
        $data->b_sidebar_color = $this->b_sidebar_color;
        $data->f_sidebar_color = $this->f_sidebar_color;
        $data->save();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'ສຳເລັດເເລ້ວ!',
            'icon' => 'success',
        ]);

        return redirect(route('backend.about'));
    }

}
