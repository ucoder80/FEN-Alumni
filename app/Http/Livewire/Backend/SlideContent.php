<?php

namespace App\Http\Livewire\Backend;

use App\Models\Slide;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class SlideContent extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $header, $body, $image, $search, $ID, $newimage;
    public function render()
    {
        $slide = Slide::orderBy('id', 'desc')
            ->where('header', 'like', '%' . $this->search . '%')
            ->paginate(5);
        return view('livewire.backend.slide-content', compact('slide'))->layout('layouts.backend.style');
    }
    public function resetform()
    {
        $this->header = '';
        $this->body = '';
        $this->image = '';
    }
    public function create()
    {
        $this->dispatchBrowserEvent('show-modal-add-edit');
    }

    public function store()
    {
        $this->validate([
            'header' => 'required',
            'image' => 'required',
        ], [
            'header.required' => 'ປ້ອນຂໍ້ມູນກ່ອນ!',
            'image.required' => 'ເລືອກຮູບພາບກ່ອນ!',
        ]);
        $data = new Slide();
        //upload image
        if (!empty($this->image)) {
            $this->validate([
                'image' => 'required|mimes:jpg,png,jpeg',
            ]);
            $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
            $this->image->storeAs('upload/slide', $imageName);
            $data->image = 'upload/slide' . '/' . $imageName;
        } else {
            $data->image = '';
        }
        $data->header = $this->header;
        $data->body = $this->body;
        $data->save();
        $this->dispatchBrowserEvent('hide-modal-add-edit');
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ສຳເລັດເເລ້ວ!',
            'icon' => 'success',
        ]);
        $this->resetform();
    }
    public function edit($ids)
    {
        $this->dispatchBrowserEvent('show-modal-add-edit');
        $Data = Slide::find($ids);
        $this->ID = $Data->id;
        $this->newimage = $Data->image;
        $this->header = $Data->header;
        $this->body = $Data->body;
    }
    public function update()
    {
        // $this->validate([
        //     'name'=>'required',
        //     'image'=>'required',
        // ],[
        //     'name.required'=>'ປ້ອນຂໍ້ມູນກ່ອນ!',
        //     'image.required'=>'ເລືອກຮູບພາບກ່ອນ!',
        // ]);
        $ids = $this->ID;
        $data = Slide::find($ids);
        $data->header = $this->header;
        $data->body = $this->body;
        if ($this->image) {
            $this->validate([
                'image' => 'required|mimes:jpg,png,jpeg',
            ]);
            $filename_image = $this->image->getClientOriginalName();
            $this->image->storeAs('upload/slide' . $filename_image);
            $data->image = 'upload/slide' . $filename_image;
        }
        $data->save();
        $this->dispatchBrowserEvent('hide-modal-add-edit');
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ!',
            'icon' => 'success',
        ]);
        $this->resetform();
    }
    public function showDestroy($ids)
    {
        $this->dispatchBrowserEvent('show-modal-delete');
        $Data = Slide::find($ids);
        $this->ID = $Data->id;
        $this->header = $Data->header;
        $this->body = $Data->body;
    }
    public function destroy()
    {
        $ids = $this->ID;
        $data = Slide::find($ids);
        $data->delete();
        $this->dispatchBrowserEvent('hide-modal-delete');
        $this->dispatchBrowserEvent('swal', [
            'title' => 'ລຶບຂໍ້ມູນສຳເລັດ!',
            'icon' => 'success',
        ]);
    }
}
