<div wire:poll>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5><i class="fas fa-money-bill-alt"></i>
                        ເບີກຈ່າຍເງິນເດືອນ
                    </h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">ໜ້າຫຼັກ</a>
                        </li>
                        <li class="breadcrumb-item active">ເບີກຈ່າຍເງິນເດືອນ</li>
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
                                    <a wire:click="ShowCreateSalary" class="btn btn-primary btn-sm"
                                        href="javascript:void(0)"><i class="fa fa-plus-circle"></i> ສ້າງໃຫມ່</a>
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                    {{-- <div wire:ignore class="form-group">
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
                                    </div> --}}
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
                                                <th>ຊື່ ນາມສະກຸນ</th>
                                                <th>ເພດ</th>
                                                <th>ເດືອນ/ປີ</th>
                                                <th>ຂັ້ນເງິນເດືອນ</th>
                                                <th>ລວມເງິນ</th>
                                                <th>ປະເພດ</th>
                                                <th>ສະຖານະ</th>
                                                <th>ວັນທີຖອນ</th>
                                                <th>ຜູ້ສ້າງ</th>
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
                                                        @if (!empty($item->employee))
                                                            {{ $item->employee->name_lastname }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (!empty($item->employee))
                                                            @if ($item->employee->gender == 1)
                                                                <span> ຍິງ</span>
                                                            @else
                                                                <span> ຊາຍ</span>
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $item->month }}/{{ $item->years }}
                                                    </td>
                                                    <td>
                                                        @if (!empty($item->employee->salary))
                                                            {{ number_format($item->employee->salary->salary) }} ₭
                                                        @endif
                                                    </td>
                                                    <td class="text-bold">
                                                        @if (!empty($item->total_salary))
                                                            {{ number_format($item->total_salary) }} ₭
                                                        @endif
                                                    </td>
                                                    <td class="text-bold">
                                                        @if (!empty($item->type))
                                                            @if($item->type == 1)
                                                                <span class="text-primary">ເງິນສົດ</span>
                                                                @else
                                                                <span class="text-danger">ເງິນໂອນ</span>
                                                            @endif
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->status == 1)
                                                            <span class="text-warning"><i class="fas fa-warning"></i> ຍັງບໍ່ຖອນ</span>
                                                        @elseif($item->status == 2)
                                                            <span class="text-success"><i class="fas fa-check-circle"></i> ຖອນສຳເລັດ</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (!empty($item->date_pay))
                                                            {{ date('d/m/Y', strtotime($item->date_pay)) }}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (!empty($item->creator))
                                                            {{ $item->creator->name_lastname }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button wire:click="edit({{ $item->id }})"
                                                                type="button" class="btn btn-info btn-sm"><i
                                                                    class="fas fa-hand-holding-usd"></i></button>
                                                            <button wire:click="edit({{ $item->id }})"
                                                                type="button" class="btn btn-warning btn-sm"><i
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
                                        {{-- {{ $data->links() }} --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    {{-- =========== Add-Edit ============================ --}}
    {{-- <div wire:ignore.self class="modal fade" id="modal-add-edit">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
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
                                <input type="text"
                                    class="form-control @error('name_lastname') is-invalid @enderror"
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
                                            {{ $item->name_la }}
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
                                            {{ $item->name_la }}
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
                                            {{ $item->name_la }}
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
                                <select type="text" class="form-control @error('roles_id') is-invalid @enderror"
                                    wire:model.live="roles_id" id="roles_id">
                                    <option value="">ເລືອກສິດນຳໃຊ້</option>
                                    @foreach ($roles as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('roles_id')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">
                                    ສັນຊາດ</label>
                                <input type="text" class="form-control @error('nationality') is-invalid @enderror"
                                    wire:model="nationality" placeholder="ປ້ອນຂໍ້ມູນ">
                                @error('nationality')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">
                                    ສາສະຫນາ</label>
                                <input type="text" class="form-control @error('religion') is-invalid @enderror"
                                    wire:model="religion" placeholder="ປ້ອນຂໍ້ມູນ">
                                @error('religion')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">ຕໍາແໜ່ງ</label>
                                <select type="text" class="form-control @error('position_id') is-invalid @enderror"
                                    wire:model.live="position_id" id="position_id">
                                    <option value="">ເລືອກຕໍາແໜ່ງ</option>
                                    @foreach ($position as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('position_id')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">ຂັ້ນເງິນເດືອນ</label>
                                <select type="text" class="form-control @error('salary_id') is-invalid @enderror"
                                    wire:model.live="salary_id" id="salary_id">
                                    <option value="">ເລືອກຂັ້ນເງິນເດືອນ</option>
                                    @foreach ($salary as $item)
                                        <option value="{{ $item->id }}">
                                            {{ number_format($item->salary) }} ₭
                                        </option>
                                    @endforeach
                                </select>
                                @error('salary_id')
                                    <span style="color: red" class="error">{{ $message }}</span>
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
    </div> --}}
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
    {{-- ======== delete ======== --}}
    <div wire:ignore.self class="modal fabe" id="modal-add-edit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title"><i class="fas fa-plus"> </i> ສ້າງໃຫມ່</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h3>ສຳຫຼັບເດືອນ: {{ $month }} ປີ: {{ $years }}</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select wire:model="years" id="years"
                                    class="form-control @error('years') is-invalid @enderror">
                                    <option value="" selected>ເລືອກ-ປີ</option>
                                    @for ($years = 1950; $years <= 2050; $years++)
                                        <option value="{{ $years }}">ປີ-{{ $years }}</option>
                                    @endfor
                                </select>
                                @error('years')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <select wire:model="month" id="month"
                                    class="form-control @error('month') is-invalid @enderror">
                                    <option value="" selected>ເລືອກ-ເດືອນ</option>
                                    @for ($month = 1; $month <= 12; $month++)
                                        <option value="{{ $month }}">ເດືອນ-{{ $month }}</option>
                                    @endfor
                                </select>
                                @error('month')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">ຍົກເລີກ</button>
                    <button wire:click="PaySalary" type="button" class="btn btn-success"><i
                            class="fas fa-check-circle"></i> ຍືນຍັນ</button>
                </div>
            </div>
        </div>
    </div>
</div>
@include('livewire.backend.data-store.modal-script')
