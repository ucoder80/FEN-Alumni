<div>
    {{-- ======================================== name page ====================================================== --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h6><i class="fas fa-images"></i> ສະໄລຮູບພາບ</h6>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">ໜ້າຫຼັກ</a>
                        </li>
                        <li class="breadcrumb-item active">ສະໄລຮູບພາບ</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!--List users- table table-bordered table-striped -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a wire:click="create" class="btn btn-primary btn-sm"
                                                href="javascript:void(0)"><i class="fa fa-plus-circle"></i>
                                                ເພີ່ມໃຫມ່</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">

                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                    </div>
                                    <div class="input-group input-group-sm" style="width: 240px;">
                                        <input wire:model="search" type="text" class="form-control"
                                            placeholder="ຄົ້ນຫາ">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>ລຳດັບ</th>
                                            <th>ຮູບ</th>
                                            <th>ຫົວຂໍ້</th>
                                            <th>ເນື້ອຫາ</th>
                                            <th>ຈັດການ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $num = 1;
                                        @endphp

                                        @foreach ($slide as $item)
                                            <tr>
                                                <td>{{ $num++ }}</td>

                                                <td>
                                                    @if (!empty($item->image))
                                                        <a href="{{ asset($item->image) }}">
                                                            <img class="rounded" src="{{ asset($item->image) }}"
                                                                width="60px;" height="60px;">
                                                        </a>
                                                    @else
                                                        <img src="{{ asset('logo/noimage.jpg') }}" width="60px;"
                                                            height="60px;">
                                                    @endif
                                                </td>
                                                <td>{{ $item->header }}</td>
                                                <td>{{ $item->body }}</td>
                                                {{-- <td>{{ $item->address }}</td> --}}
                                                {{-- <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td> --}}
                                                <td>
                                                    <div class="btn-group">
                                                        <button wire:click="edit({{ $item->id }})" type="button"
                                                            class="btn btn-warning btn-sm"><i
                                                                class="fas fa-pencil-alt"></i></button>
                                                        <button wire:click="showDestroy({{ $item->id }})"
                                                            type="button" class="btn btn-danger btn-sm"><i
                                                                class="fas fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </form>
                                <div class="float-right">
                                    {{ $slide->links() }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.show-modal-add-edit -->
    <div wire:ignore.self class="modal fade" id="modal-add-edit">
        <div class="modal-dialog modal-gl">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    @if ($this->ID)
                        <h5 class="modal-title"><i class="fa fa-edit text-warning"></i> ແກ້ໄຂ</h5>
                    @else
                        <h5 class="modal-title"><i class="fa fa-plus text-success"></i> ເພີ່ມໃຫມ່</h5>
                    @endif
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        @if($this->ID)
                        <div class="container">
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' wire:model="image" id="imageUpload2"
                                        accept=".png, .jpg, .jpeg" />
                                    <label for="imageUpload2"></label>
                                </div>
                                @if ($image)
                                    <div class="avatar-preview">
                                        <img id="imagePreview2" src="{{ $image->temporaryUrl() }}" alt="" width="120px;">
                                    </div>
                                @else
                                    @if ($newimage)
                                        <div class="avatar-preview">
                                            <img id="imagePreview2" src="{{ asset('upload/slide') }}/{{ $newimage }}"
                                                alt="" width="120px;">
                                        </div>
                                    @else
                                        <div class="avatar-preview">
                                            <div id="imagePreview2"
                                                style="background-image: url({{ asset('logo/noimage.jpg') }});">
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        @else
                        <div class="container">
                            <div wire:ignore class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' wire:model="image" id="imageUpload"
                                        accept=".png, .jpg, .jpeg" />

                                    <label for="imageUpload"></label>
                                </div>
                                <label class="text-center">ໃສ່ຮູບພາບ(ຖ້າມີ)</label>
                                <div class="avatar-preview">
                                    <div id="imagePreview"
                                        style="background-image: url({{ asset('logo/noimage.jpg') }});">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>ຫົວຂໍ້</label>
                                    <input wire:model="header" type="text" placeholder="ປ້ອນຂໍ້ມູນ"
                                        class="form-control @error('header') is-invalid @enderror">
                                    @error('header')
                                        <span style="color: red" class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>ເນື້ອຫາ</label>
                                    <input wire:model="body" type="text" placeholder="ປ້ອນຂໍ້ມູນ"
                                        class="form-control @error('body') is-invalid @enderror">
                                    @error('body')
                                        <span style="color: red" class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                </div>
                </form>
                <div class="modal-footer justify-content-between bg-light">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ຍົກເລີກ</button>
                    @if ($this->ID)
                        <button wire:click="update" type="button" class="btn btn-warning fas fa-edit">ແກ້ໄຂ</button>
                    @else
                        <button wire:click="store" type="button" class="btn btn-success fas fa-save">ບັນທຶກ</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal-delete -->
    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title"><i class="fa fa-trash"></i></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <input type="hidden" wire:model="ID">
                    <h4 class="text-center">ທ່ານຕ້ອງການລຶບ<b>({{ $header }})</b> ບໍ່?</h4>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ຍົກເລີກ</button>
                    <button wire:click="destroy({{ $ID }})" type="button"
                        class="btn btn-success">ຕົກລົງ</button>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.backend.data-store.modal-script')
</div>
