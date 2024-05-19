<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Contacts;

class ContactsContent extends Component
{
    public function render()
    {
        return view('livewire.frontend.contacts-content')->layout('layouts.frontend.style');
    }
    public $name, $email, $subject, $message,$about;
    public function resetform()
    {
        $this->name = '';
        $this->email = '';
        $this->subject = '';
        $this->message = '';
    }
    public function SendMessage()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ], [
            'name.required' => 'ປ້ອນຂໍ້ມູນກ່ອນ!',
            'email.required' => 'ປ້ອນຂໍ້ມູນກ່ອນ!',
            'subject.required' => 'ປ້ອນຂໍ້ມູນກ່ອນ!',
            'message.required' => 'ປ້ອນຂໍ້ມູນກ່ອນ!',
        ]);
        $data = new Contacts();
        $data->name = $this->name;
        $data->email = $this->email;
        $data->subject = $this->subject;
        $data->message = $this->message;
        $data->save();
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ສຳເລັດເເລ້ວ!',
            'icon' => 'success',
        ]);
        $this->resetform();
    }
}
