<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5><i class="fas fa-database"></i>
                        ຈັດການຂໍ້ມູນ
                        <i class="fas fa-angle-double-right"></i>
                        ຜູ້ໃຊ້
                    </h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">ໜ້າຫຼັກ</a>
                        </li>
                        <li class="breadcrumb-item active">ຜູ້ໃຊ້</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
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
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                    <div wire:ignore class="form-group">
                                            <select wire:model="roles_id" id="roles_id"
                                                class="form-control @error('roles_id') is-invalid @enderror">
                                                <option value="">
                                                    ເລືອກສິດນຳໃຊ້
                                                </option>
                                                @foreach ($roles as $item)
                                                    <option value="{{ $item->id }}">
                                                            {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <input wire:model.live="search" type="text" class="form-control"
                                        placeholder="ຄົ້ນຫາ">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="bg-light">
                                        <tr style="text-align: center">
                                            <th>ລຳດັບ</th>
                                            <th>ຊື່ ນາມສະກຸນ</th>
                                            <th>ເບີໂທ</th>
                                            <th>ອີເມວ</th>
                                            <th>ເພດ</th>
                                            <th>ສະຖານະ</th>
                                            <th>ສິດນຳໃຊ້</th>
                                            <th>ວດປ ເກີດ</th>
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
                                                <td>
                                                    {{ $item->name_lastname }}
                                                </td>
                                                <td>
                                                    {{ $item->phone }}
                                                </td>
                                                <td>
                                                    {{ $item->email }}
                                                </td>
                                                <td>
                                                    @if ($item->gender == 1)
                                                        <span class="text-success">ຍິງ</span>
                                                    @elseif($item->gender == 2)
                                                        <span class="text-danger">ຊາຍ</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="text-secondary">ໂສດ</span>
                                                    @elseif($item->status == 2)
                                                        <span class="text-secondary">ມີແຟນ</span>
                                                    @elseif($item->status == 3)
                                                        <span class="text-secondary">ແຕ່ງງານ</span>
                                                    @elseif($item->status == 4)
                                                        <span class="text-secondary">ຢ່າຮ້າງ</span>
                                                    @elseif($item->status == 5)
                                                        <span class="text-secondary">ແຍກກັນຢູ່</span>
                                                    @elseif($item->status == 6)
                                                        <span class="text-secondary">ຮັກເຂົາຂ້າງດຽວ</span>
                                                    @endif
                                                </td>
                                                <td class="text-bold">
                                                    @if (!empty($item->roles))
                                                        {{ $item->roles->name }}
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ date('d/m/Y', strtotime($item->birtday_date)) }}
                                                </td>
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
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">ເລືອກເພດ</label>
                                <div class="form-group clearfix">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="radioPrimary1" value="1" wire:model="gender">
                                        <label for="radioPrimary1">ຍິງ
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="radioPrimary2" value="2" wire:model="gender"
                                            checked>
                                        <label for="radioPrimary2">ຊາຍ
                                        </label>
                                    </div>
                                </div>
                                @error('gender')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <input type="hidden" wire:model="ID">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">
                                    ຊື່ ນາມສະກຸນ</label>
                                <input type="text" class="form-control @error('name_lastname') is-invalid @enderror"
                                    wire:model="name_lastname" placeholder="ປ້ອນຂໍ້ມູນ">
                                @error('name_lastname')
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
                                <label for=""> ວດປ ເກີດ
                                </label>
                                <input type="date" class="form-control" wire:model="birtday_date"
                                    placeholder="ປ້ອນຂໍ້ມູນ">
                                @error('birtday_date')
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">ອີເມວ</label>
                                <input type="email" class="form-control @error('phone') is-invalid @enderror"
                                    wire:model="email" placeholder="ປ້ອນຂໍ້ມູນ">
                                @error('email')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""></span>
                                    ສະຖານະ</label>
                                <select class="form-control @error('status') is-invalid @enderror"
                                    wire:model="status">
                                    <option value="">ເລືອກສະຖານະ</option>
                                    <option value="1">ໂສດ</option>
                                    <option value="2">ມີແຟນ</option>
                                    <option value="3">ແຕ່ງງານ</option>
                                    <option value="4">ຢ່າຮ້າງ</option>
                                    <option value="5">ແຍກກັນຢູ່</option>
                                    <option value="6">ຮັກເຂົາຂ້າງດຽວ</option>
                                </select>
                                @error('status')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">ສິດນຳໃຊ້</label>
                                <select type="text" class="form-control" wire:model.live="roles_id"
                                    id="roles_id">
                                    <option value="">ເລືອກສິດນຳໃຊ້</option>
                                    @foreach ($roles as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('roles_id')
                                    <span style="color: red"
                                        class="error">{{ __('lang.please_fill_information_first') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""><span class="text-danger">*</span>
                                    ລະຫັດຜ່ານ</label>
                                <input type="password" class="form-control" wire:model="password"
                                    placeholder="ປ້ອນຂໍ້ມູນ">
                                @error('password')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""><span class="text-danger">*</span>
                                    ຍຶນຍັນລະຫັດຜ່ານ</label>
                                <input type="password" class="form-control" wire:model="confirm_password"
                                    placeholder="ປ້ອນຂໍ້ມູນ">
                                @error('confirm_password')
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
    <div class="modal fabe" id="modal-delete">
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
</div>
@include('livewire.backend.data-store.modal-script')
