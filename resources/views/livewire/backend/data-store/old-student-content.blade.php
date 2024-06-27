<div wire:poll>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5><i class="fas fa-database"></i>
                        ຈັດການຂໍ້ມູນ
                        <i class="fas fa-angle-double-right"></i>
                        ສີດເກົ່າ
                    </h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">ໜ້າຫຼັກ</a>
                        </li>
                        <li class="breadcrumb-item active">ສີດເກົ່າ</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    @foreach ($function_available as $item1)
    @if ($item1->function->name == 'action_11')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!--customers -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                          <div class="row pb-1">
                            <div class="col-md-3">
                                <a wire:click="create" class="btn btn-primary btn-sm" href="javascript:void(0)"><i
                                        class="fa fa-plus-circle"></i> ເພີ່ມໃຫມ່</a>
                            </div>
                          </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div wire:ignore class="form-group">
                                        <select wire:model="education_year_id" id="education_year_id"
                                            class="form-control @error('education_year_id') is-invalid @enderror">
                                            <option value="">
                                                ເລືອກ-ປີສົກຮຽນ
                                            </option>
                                            @foreach ($education_year as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->start_year }} -
                                                    {{ $item->end_year }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select wire:model="subject_id" id="subject_id"
                                            class="form-control @error('subject_id') is-invalid @enderror">
                                            <option value="">
                                                ເລືອກ-ສາຂາວິຊາ
                                            </option>
                                            @foreach ($Subjects as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name_la }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div wire:ignore class="form-group">
                                        <select wire:model="province_id" id="province_id"
                                            class="form-control @error('province_id') is-invalid @enderror">
                                            <option value="">
                                                ເລືອກ-ແຂວງ
                                            </option>
                                            @foreach ($provinces as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name_la }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select wire:model="district_id" id="district_id"
                                            class="form-control @error('district_id') is-invalid @enderror">
                                            <option value="">
                                                ເລືອກ-ເມືອງ
                                            </option>
                                            @foreach ($districts as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name_la }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select wire:model="village_id" id="village_id"
                                            class="form-control @error('village_id') is-invalid @enderror">
                                            <option value="">
                                                ເລືອກ-ບ້ານ
                                            </option>
                                            @foreach ($villages as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name_la }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div wire:ignore class="form-group">
                                        <select wire:model="gender" id="gender"
                                            class="form-control @error('gender') is-invalid @enderror">
                                            <option value="">
                                                ເລືອກ-ເພດ
                                            </option>
                                                <option value="1">
                                                    ຍິງ
                                                </option>
                                                <option value="2">
                                                    ຊາຍ
                                                </option>
                                                <option value="3">
                                                    ອື່ນໆ
                                                </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div wire:ignore class="form-group">
                                        <select wire:model="status" id="status"
                                            class="form-control @error('status') is-invalid @enderror">
                                            <option value="">
                                                ເລືອກ-ສະຖານະ
                                            </option>
                                            <option value="1">ໂສດ</option>
                                            <option value="2">ມີແຟນ</option>
                                            <option value="3">ແຕ່ງງານ</option>
                                            <option value="4">ຢ່າຮ້າງ</option>
                                            <option value="5">ແຍກກັນຢູ່</option>
                                            <option value="6">ຮັກເຂົາຂ້າງດຽວ</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="col-md-3">
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
                                </div> --}}
                                <div class="col-md-3">
                                    <input wire:model.live="search" type="text" class="form-control"
                                        placeholder="ຄົ້ນຫາ">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                @foreach ($data as $item)
                                    <div class="col-md-3 d-flex align-items-stretch flex-column">
                                        <div class="card bg-light d-flex flex-fill">
                                            <div class="card-header border-bottom-0 justify-content-between">
                                                <b>{{ $item->name_lastname }} <br> {{ $item->name_lastname_en }} </b>

                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @if (!empty($item->image))
                                                            <img class="rounded" src="{{ asset($item->image) }}"
                                                                width="100%;" height="250px; ">
                                                        @else
                                                            <img class="rounded" src="{{ asset('logo/noimage.jpg') }}"
                                                                width="100%;" height="250px; ">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h2 class="lead"><b></b></h2>
                                                        <p style="line-height: 20%;" class="text-muted text-sm">
                                                            <b>ລະຫັດ: </b>
                                                            {{ $item->code }}
                                                        </p>
                                                        <p style="line-height: 20%;" class="text-muted text-sm">
                                                            <b>ເບີໂທ:</b>
                                                            {{ $item->phone }}
                                                        </p>
                                                        <p style="line-height: 20%;" class="text-muted">
                                                            <b>ຈົບສົກຮຽນ:</b>
                                                            @if (!empty($item->education_year))
                                                                {{ $item->education_year->start_year }} -
                                                                {{ $item->education_year->end_year }} 
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="btn-group col-md-12">
                                                    <button wire:click='show_detail({{ $item->id }})'
                                                        class="btn btn-secondary btn-sm float-right">
                                                        <i class="fas fa-address-book"></i>
                                                        ປະຫວັດຫຍໍ້
                                                    </button>
                                                    <button wire:click="edit({{ $item->id }})" type="button"
                                                        class="btn btn-warning btn-sm"><i
                                                            class="fas fa-pencil-alt"></i></button>
                                                    <button wire:click="showDestroy({{ $item->id }})"
                                                        type="button" class="btn btn-danger btn-sm"><i
                                                            class="fas fa-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{-- <div class="float-right">
                                {{ $data->links() }}
                            </div> --}}
                            {{-- <div class="card-body">
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
                        </div> --}}
                        </div>
                    </div>
                </div>
            </div>
    </section>
    @endif
    @endforeach
    {{-- =========== Add-Edit ============================ --}}
    <div wire:ignore.self class="modal fade" id="modal-add-edit">
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
                                <input type='file' wire:model="image" id="imageUpload" accept=".png, .jpg, .jpeg" />

                                <label for="imageUpload"></label>
                            </div>
                            <label class="text-center">ໃສ່ຮູບພາບ(ຖ້າມີ)</label>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url({{ asset('logo/noimage.jpg') }});">
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
                                    ຊື່ ນາມສະກຸນ-ລາວ</label>
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
                                <label for="">
                                    ຊື່ ນາມສະກຸນ-ອັງກິດ</label>
                                <input type="text"
                                    class="form-control @error('name_lastname_en') is-invalid @enderror"
                                    wire:model="name_lastname_en" placeholder="ປ້ອນຂໍ້ມູນ">
                                @error('name_lastname_en')
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
                        <div class="col-md-4">
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
                        <div class="col-md-4">
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
                                <label for="">ສົກຮຽນປີ</label>
                                <select type="text"
                                    class="form-control @error('education_year_id') is-invalid @enderror"
                                    wire:model.live="education_year_id" id="education_year_id">
                                    <option value="">ເລືອກສົກຮຽນປີ</option>
                                    @foreach ($EducationYears as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->start_year }} - 
                                            {{ $item->end_year }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('education_year_id')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">ສາຂາວີິຊາ</label>
                                <select type="text" class="form-control @error('subject_id') is-invalid @enderror"
                                    wire:model.live="subject_id" id="subject_id">
                                    <option value="">ເລືອກສາຂາວີິຊາ</option>
                                    @foreach ($Subjects as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name_la }} 
                                        </option>
                                    @endforeach
                                </select>
                                @error('subject_id')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">ສະຖານທີ່ເຮັດວຽກ</label>
                                <select type="text"
                                    class="form-control @error('work_place_id') is-invalid @enderror"
                                    wire:model.live="work_place_id" id="work_place_id">
                                    <option value="">ເລືອກສະຖານທີ່ເຮັດວຽກ</option>
                                    @foreach ($WorkPlaces as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }} 
                                        </option>
                                    @endforeach
                                </select>
                                @error('work_place_id')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">ລະດັບການສຶກສາ</label>
                                <select type="text"
                                    class="form-control @error('education_system_id') is-invalid @enderror"
                                    wire:model.live="education_system_id" id="education_system_id">
                                    <option value="">ເລືອກລະດັບການສຶກສາ</option>
                                    @foreach ($EducationSystem as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }} 
                                        </option>
                                    @endforeach
                                </select>
                                @error('education_system_id')
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
    <div class="modal fade" id="modal-detail" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-address-book"></i> ປະຫວັດຫຍໍ້ສີດເກົ່າ: {{ $this->code }}
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
                            <h4><b>{{ $this->name_lastname }} - {{ $this->name_lastname_en }}</b></h4>
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
                                <th>ປີສົກຮຽນຈົບ: </th>
                                <th>
                                    @if (!empty($this->education_start_year_data))
                                        {{ $this->education_start_year_data }} -
                                        {{ $this->education_end_year_data }} 
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <th>ສາຂາວິຊາຮຽນ: </th>
                                <th>
                                    @if (!empty($this->subject_data))
                                        {{ $this->subject_data }} 
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <th>ສະຖານທີ່ເຮັດວຽກປະຈຸບັນ: </th>
                                <th>
                                    @if (!empty($this->work_place_data))
                                        {{ $this->work_place_data }}
                                    @endif
                                </th>
                            </tr>
                        </thead>
                    </table>
                    {{-- </div> --}}
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary fas fa-times-circle" data-dismiss="modal">
                        ປິດ</button>
                    <button id="print" type="button" class="btn btn-success"> <i class="fas fa-print"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@include('livewire.backend.data-store.modal-script')
