<div>
    {{-- ======================================== name page ====================================================== --}}
    <div class="right_col" role="main">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5><i class="fas fa-database"></i>
                            ຈັດການຂໍ້ມູນ
                            <i class="fas fa-angle-double-right"></i>
                            ບ້ານ
                        </h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">ໜ້າຫຼັກ</a>
                            </li>
                            <li class="breadcrumb-item active">ບ້ານ</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    {{-- ======================================== show and seach data ====================================================== --}}
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-light">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input wire:model.live="search" type="text" class="form-control"
                                            placeholder="ຄົ້ນຫາ...">
                                    </div>
                                    <div class="col-md-8">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="bg-light">
                                            <tr class="text-center">
                                                <th>ລຳດັບ</th>
                                                <th>ແຂວງ</th>
                                                <th>ເມືອງ</th>
                                                <th>ຊື່ລາວ</th>
                                                <th>ຊື່ອັງກິດ</th>
                                                <th>ຊື່ຈີນ</th>
                                                {{-- @foreach ($rolepermissions as $items)
                                                @if ($items->permissionname->name == 'action_sectors') --}}
                                                <th>ຈັດການ</th>
                                                {{-- @endif
                                            @endforeach --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $num = 1;
                                            @endphp
                                            @foreach ($data as $item)
                                                <tr class="text-center">
                                                    <td>{{ $num++ }}</td>
                                                    <td>
                                                        @if (!empty($item->district->province))
                                                            {{ $item->district->province->name_la }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (!empty($item->district))
                                                            {{ $item->district->name_la }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->name_la }}</td>
                                                    <td>{{ $item->name_en }}</td>
                                                    <td>{{ $item->name_cn }}</td>
                                                    {{-- @foreach ($rolepermissions as $items)
                                                @if ($items->permissionname->name == 'action_sectors') --}}
                                                    <td>
                                                        <div class="btn-group">
                                                            <button wire:click="edit({{ $item->id }})"
                                                                type="button" class="btn btn-warning btn-sm"><i
                                                                    class="fa fa-pencil"></i></button>
                                                            @if (auth()->user()->role_id == 1)
                                                                <button wire:click="showDestroy({{ $item->id }})"
                                                                    type="button" class="btn btn-danger btn-sm"><i
                                                                        class="fa fa-trash"></i></button>
                                                            @endif
                                                        </div>
                                                        {{-- @endif
                                                        @endforeach --}}
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
                    {{-- ============================== form add-edit ==================================== --}}
                    <div class="col-md-4">
                        <div class="card card-default">
                            <div class="card-header bg-light">
                                <label>ເພີ່ມໃຫມ່/ແກ້ໄຂ</label>
                            </div>
                            <form>
                                <div class="card-body">
                                    <input type="hidden" wire:model="ID" value="{{ $ID }}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for=""><span class="text-danger">*</span>
                                                    ແຂວງ</label>
                                                <select class="form-control" wire:model.live="province_id">
                                                    <option value="">ແຂວງ</option>
                                                    @foreach ($province as $item)
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
                                                    <span style="color: red"
                                                        class="error">{{ __('lang.please_fill_information_first') }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for=""><span class="text-danger">*</span>
                                                    ເມືອງ</label>
                                                <select class="form-control" wire:model.live="district_id">
                                                    <option value="">ເມືອງ</option>
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
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>ຊື່ລາວ</label>
                                                <input wire:model="name_la" type="text"
                                                    class="form-control @error('name_la') is-invalid @enderror"
                                                    placeholder="ປ້ອນຂໍ້ມູນ">
                                                @error('name_la')
                                                    <span style="color: red" class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>ຊື່ອັງກິດ</label>
                                                <input wire:model="name_en" type="text"
                                                    class="form-control @error('name_en') is-invalid @enderror"
                                                    placeholder="ປ້ອນຂໍ້ມູນ">
                                                @error('name_en')
                                                    <span style="color: red" class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>ຊື່ຈີນ</label>
                                                <input wire:model="name_cn" type="text"
                                                    class="form-control @error('name_cn') is-invalid @enderror"
                                                    placeholder="ປ້ອນຂໍ້ມູນ">
                                                @error('name_cn')
                                                    <span style="color: red" class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-between md-2">
                                        {{-- @foreach ($rolepermissions as $items)
                            @if ($items->permissionname->name == 'action_product_type') --}}
                                        <button type="button" wire:click="resetform"
                                            class="btn btn-warning">ຣີເຊັດ</button>
                                        <button type="button" wire:click="store"
                                            class="btn btn-success">ບັນທຶກ</button>
                                        {{-- @endif
                              @endforeach --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- ======================================== modal-delete ====================================================== --}}
        <div class="modal fade" id="modal-delete">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h4 class="modal-title"><i class="fa fa-trash text-white"></i></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <input type="hidden" wire:model="ID">
                        <h4 class="text-center">{{ __('lang.do_you_want_to_delete') }} <b>({{ $name_la }})</b> ?
                        </h4>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger"
                            data-dismiss="modal">{{ __('lang.cancle') }}</button>
                        <button wire:click="destroy({{ $ID }})" type="button"
                            class="btn btn-success">{{ __('lang.save') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('livewire.backend.data-store.modal-script')

