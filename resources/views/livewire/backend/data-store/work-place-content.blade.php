<div wire:poll>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5><i class="fas fa-database"></i>
                        ຈັດການຂໍ້ມູນ
                        <i class="fas fa-angle-double-right"></i>
                        ສະຖານທີ່ເຮັດວຽກ
                    </h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">ໜ້າຫຼັກ</a>
                        </li>
                        <li class="breadcrumb-item active">ສະຖານທີ່ເຮັດວຽກ</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    @foreach ($function_available as $item1)
    @if ($item1->function->name == 'action_16')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!--customers -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-3">
                                    <a wire:click="create" class="btn btn-primary btn-sm" href="javascript:void(0)"><i
                                            class="fa fa-plus-circle"></i> ເພີ່ມໃຫມ່</a>
                                </div>
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-3">
                                    <input wire:model.live="search" type="text" class="form-control"
                                        placeholder="ຄົ້ນຫາ">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="bg-light">
                                        <tr style="text-align: center">
                                            <th>ລຳດັບ</th>
                                            <th>ໂລໂກ</th>
                                            <th>ຊື່ບ່ອນເຮັດວຽກ</th>
                                            <th>ເບີໂທ</th>
                                            <th>ອີເມວ</th>
                                            <th>FaceBook</th>
                                            <th>ທີ່ຢູ່</th>
                                            <th>ຈັດການ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($data as $item)
                                            <tr style="text-align: center">
                                                <td>
                                                    {{ $i++ }}
                                                </td>
                                                <td class="text-center">
                                                    @if (!empty($item->image))
                                                        <a href="{{ asset($item->image) }}"target="_blank">
                                                            <img class="rounded" src="{{ asset($item->image) }}"
                                                                width="50px;" height="50px;">
                                                        </a>
                                                    @else
                                                        <img src="{{ 'images/noimage.jpg' }}" width="50px;"
                                                            height="50px;">
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $item->name }}
                                                </td>
                                                <td>
                                                    {{ $item->phone }}
                                                </td>
                                                <td>
                                                    {{ $item->email }}
                                                </td>
                                                <td>
                                                    @if($item->facebook)
                                                    <a href="{{ $item->facebook }}"><i class="fa fa-facebook"></i> Fanpage</a>
                                                    @else
                                                    -
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(!empty($item->village))
                                                    {{ $item->village->name_la }}, <br>
                                                    @endif
                                                    @if(!empty($item->district))
                                                    {{ $item->district->name_la }}, 
                                                    @endif
                                                    @if(!empty($item->province))
                                                    {{ $item->province->name_la }}
                                                    @endif
                                                </td>
                                                {{-- <td>
                                                    {{ date('d/m/Y', strtotime($item->birtday_date)) }}
                                                </td> --}}
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
                                <div class="float-right">
                                    {{ $data->links() }}
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    @endif
    @endforeach
    {{-- =========== Add-Edit ============================ --}}
    <div wire:ignore.self class="modal fade" id="modal-add-edit">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title">
                        @if ($this->ID)
                            <i class="fas fa-edit"></i> ແກ້ໄຂ
                        @else
                            <i class="fas fa-plus"></i> ເພີ່ມໃຫມ່
                        @endif
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div wire:ignore class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' wire:model="image" id="imageUpload" accept=".png, .jpg, .jpeg" />

                                <label for="imageUpload"></label>
                            </div>
                            <label class="text-center">ໂລໂກ/ຮູບສະຖານທີ່(ຖ້າມີ)</label>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url({{ asset('logo/noimage.jpg') }});">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <input type="hidden" wire:model="ID">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">
                                    ຊື່ບ່ອນເຮັດວຽກ</label>
                                <input type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    wire:model="name" placeholder="ປ້ອນຂໍ້ມູນ">
                                @error('name')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""> ເບີໂທ
                                </label>
                                <input type="number" min="1"
                                    class="form-control @error('phone') is-invalid @enderror" wire:model="phone"
                                    placeholder="ປ້ອນຂໍ້ມູນ" onkeypress="validateNumber(event)">
                                @error('phone')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">ອີເມວ</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    wire:model="email" placeholder="ປ້ອນຂໍ້ມູນ">
                                @error('email')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""><span class="text-danger"></span>
                                    ແຂວງ</label>
                                <select class="form-control" wire:model.live="province_id" id="province_id">
                                    <option value="">ເລືອກຂໍ້ມູນ</option>
                                    @foreach ($provinces as $item)
                                        <option value="{{ $item->id }}">
                                            {{-- @if (Config::get('app.locale') == 'lo') --}}
                                            {{ $item->name_la }}
                                            {{-- @elseif(Config::get('app.locale') == 'en')
                                                {{ $item->name_en }}
                                            @elseif(Config::get('app.locale') == 'cn')
                                                {{ $item->name_cn }}
                                            @endif --}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('province_id')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div wire:ignore.self class="form-group">
                                <label for=""><span class="text-danger"></span>
                                    ເມືອງ</label>
                                <select class="form-control" wire:model.live="district_id" id="district_id">
                                    <option value="">ເລືອກຂໍ້ມູນ</option>
                                    @foreach ($districts as $item)
                                        <option value="{{ $item->id }}">
                                            {{-- @if (Config::get('app.locale') == 'lo') --}}
                                            {{ $item->name_la }}
                                            {{-- @elseif(Config::get('app.locale') == 'en')
                                                {{ $item->name_en }}
                                            @elseif(Config::get('app.locale') == 'cn')
                                                {{ $item->name_cn }}
                                            @endif --}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('district_id')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div wire:ignore.self class="form-group">
                                <label for=""><span class="text-danger"></span>
                                    ບ້ານ</label>
                                <select class="form-control" wire:model.live="village_id" id="village_id">
                                    <option value="">ເລືອກຂໍ້ມູນ</option>
                                    @foreach ($villages as $item)
                                        <option value="{{ $item->id }}">
                                            {{-- @if (Config::get('app.locale') == 'lo') --}}
                                            {{ $item->name_la }}
                                            {{-- @elseif(Config::get('app.locale') == 'en')
                                                {{ $item->name_en }}
                                            @elseif(Config::get('app.locale') == 'cn')
                                                {{ $item->name_cn }}
                                            @endif --}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('village_id')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">FaceBook</label>
                                <input type="facebook" class="form-control @error('facebook') is-invalid @enderror"
                                    wire:model="facebook" placeholder="ປ້ອນຂໍ້ມູນ">
                                @error('facebook')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary fas fa-times-circle" data-dismiss="modal">
                        ປິດ</button>
                    @if ($this->ID)
                        <button wire:click="Update({{ $ID }})" type="button"
                            class="btn btn-warning fas fa-edit">
                            ແກ້ໄຂ</button>
                    @else
                        <button wire:click="Store" type="button" class="btn btn-success fas fa-save">
                            ບັນທຶກ</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{-- ======== delete ======== --}}
    <div wire:ignore.self class="modal fabe" id="modal-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title"><i class="fa fa-trash"> </i> ລຶບອອກ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">ທ່ານຕ້ອງການລຶບຂໍ້ມູນນີ້ອອກບໍ່?</h3>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button wire:click="destroy({{ $ID }})" type="button" class="btn btn-success"><i
                            class="fa fa-trash"></i> ລຶບອອກ</button>
                </div>
            </div>
        </div>
    </div>
    {{-- \\\\\\\\\\\\\\\\\\\\\\\ show detail  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
    {{-- <div class="modal fade" id="modal-detail" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-address-book"></i> ໂປຣຟາຍສະຖານທີ່ເຮັດວຽກ: {{ $this->code }}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body right_content">
                    <div class="row">
                        <div class="container">
                            <div wire:ignore.self class="avatar-upload">
                                <div class="avatar-preview">
                                    <div id="imagePreview"
                                        style="background-image: url({{ asset($this->newimage) }});">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center pt-3">
                        <input type="hidden" wire:model="ID">
                        <div class="col-md-12">
                            <h4><b>{{ $this->name }}</b></h4>
                        </div>
                    </div>
                    <table class="table table-hover responsive">
                        <thead class="bg-light text-left">
                            <tr>
                                <th>ເພດ:</th>
                                <th>
                                    @if ($this->gender == 1)
                                        <span>ຍິງ</span>
                                    @else
                                        <span>ຊາຍ</span>
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <th>ເບີໂທ:</th>
                                <th>{{ $this->phone }}</th>
                            </tr>
                            <tr>
                                <th>ວ.ດ.ປ ເກີດ:</th>
                                <th>{{ $this->birtday_date }}</th>
                            </tr>
                            <tr>
                                <th>ທີ່ຢູ່ປະຈຸບັນ: </th>
                                <th>
                                    @if (!empty($this->village_data))
                                        {{ $this->village_data }}
                                    @endif -
                                    @if (!empty($this->district_data))
                                        {{ $this->district_data }}
                                    @endif -
                                    @if (!empty($this->province_data))
                                        {{ $this->province_data }}
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <th>ອີເມວ: </th>
                                <th>{{ $this->email }}</th>
                            </tr>
                            <tr>
                                <th>ສະຖານະ: </th>
                                <th>
                                    @if ($this->status == 2)
                                        <span>ມີແຟນ</span>
                                    @elseif($this->status == 3)
                                        <span>ແຕ່ງງານ</span>
                                    @elseif($this->status == 4)
                                        <span>ຢ່າຮ້າງ</span>
                                    @elseif($this->status == 5)
                                        <span>ແຍກກັນຢູ່</span>
                                    @elseif($this->status == 6)
                                        <span>ຮັກເຂົາຂ້າງດຽວ</span>
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <th>ສິດເຂົ້າສູ່ລະບົບ: </th>
                                <th> {{ $this->roles_data }}</th>
                            </tr>
                            <tr>
                                <th>ສັນຊາດ: </th>
                                <th>{{ $this->nationality }}</th>
                            </tr>
                            <tr>
                                <th>ສາສະຫນາ: </th>
                                <th>{{ $this->religion }}</th>
                            </tr>
                            <tr>
                                <th>ຕຳແໜ່ງ: </th>
                                <th>
                                    @if (!empty($this->position_data))
                                        {{ $this->position_data }}
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <th>ຂັ້ນເງິນເດຶອນ: </th>
                                <th>
                                    @if (!empty($this->salary_data))
                                        {{ number_format($this->salary_data) }} ₭
                                    @endif
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary fas fa-times-circle" data-dismiss="modal">
                        ປິດ</button>
                    <button id="print" type="button" class="btn btn-success"> <i class="fas fa-print"></i>
                    </button>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@include('livewire.backend.data-store.modal-script')
