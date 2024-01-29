<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5><i class="fas fa-cog"></i>
                        ຈັດການຂໍ້ມູນ
                        <i class="fas fa-angle-double-right"></i>
                        ສິດນຳໃຊ້
                    </h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">ໜ້າຫຼັກ</a>
                        </li>
                        <li class="breadcrumb-item active">ສິດນຳໃຊ້</li>
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
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-3">
                                    <input wire:model.live="search" type="text" class="form-control"
                                        placeholder="ຄົ້ນຫາ">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- <div class="row mb-1">
                                <div class="col-md-1">
                                    <select name="" id="" wire:model.live="page_number"
                                        class="form-control">
                                        <option value="10">10</option>
                                        <option value="30">30</option>
                                        <option value="100">100</option>
                                        <option value="1000">1,000</option>
                                        <option value="all">{{ __('lang.all') }}</option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="bg-light">
                                        <tr style="text-align: center">
                                            <th>ລຳດັບ</th>
                                            <th>ຊື່</th>
                                            <th>ຄວາມຫມາຍ</th>
                                            <th>ຈັດການ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $stt = 1;
                                        @endphp
                                        @foreach ($data as $item)
                                            <tr style="text-align: center">
                                                <td>
                                                    @if ($this->page_number == 'all')
                                                        {{ $stt++ }}
                                                    @else
                                                        {{ ($data->currentPage() - 1) * $this->page_number + $stt++ }}
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $item->name }}
                                                </td>
                                                <td>
                                                    {{ $item->des }}
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
    <!-- /.modal-add -->
    <div wire:ignore.self class="modal fade" id="modal-add-edit">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title">
                        @if ($this->ID)
                            <i class="fa fa-edit"></i> ແກ້ໄຂ
                        @else
                            <i class="fa fa-plus"></i> ເພີ່ມໃຫມ່
                        @endif
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" wire:model="ID">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">ຊື່ <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" wire:model="name" placeholder="ປ້ອນຂໍ້ມູນ">
                            </div>
                            @error('name')
                                <span style="color: red" class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">ຄວາມຫມາຍ</label>
                                <input type="text" class="form-control" wire:model="des" placeholder="ປ້ອນຂໍ້ມູນ">
                            </div>
                            @error('des')
                                <span style="color: red" class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="table-responsive">
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($functions as $item)
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>
                                            <h5><b>
                                                    <input type="checkbox" value="{{ $item->id }}"
                                                        style="width:20px;height:20px ; accent-color: #194bff;"
                                                        wire:model="selected"
                                                        wire:click="delete_parent({{ $item->id }})">
                                                    {{ $item->des }}
                                                </b></h5>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($this->selected as $get_item)
                                        @if (intval($get_item) == $item->id)
                                            @php
                                                $child_fucntion = Illuminate\Support\Facades\DB::table('functions')
                                                    ->where('parent_id', $get_item)
                                                    ->get();

                                            @endphp
                                            @foreach ($child_fucntion as $item_child)
                                                <tr>

                                                    <td>
                                                        <input type="checkbox" value="{{ $item_child->id }}"
                                                            style="width:20px;height:20px ;margin-left:10%; accent-color: #194bff;"
                                                            wire:model="selected"
                                                            wire:click="delete_child({{ $item_child->id }})"
                                                            style="margin-left:10%;">
                                                        {{ $item_child->des }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    @foreach ($this->selected as $get_item_child)
                                                        @if (intval($get_item_child) == $item_child->id)
                                                            @php
                                                                $child_fucntion_child = Illuminate\Support\Facades\DB::table('functions')
                                                                    ->where('parent_id', $item_child->id)
                                                                    ->get();
                                                            @endphp
                                                            @if ($child_fucntion_child->count() > 0)
                                                                @foreach ($child_fucntion_child as $item_child_two)
                                                                    <td><input type="checkbox"
                                                                            value="{{ $item_child_two->id }}"
                                                                            wire:model="selected"
                                                                            style="width:20px;height:20px ;margin-left:30%; accent-color: #194bff;"
                                                                            style="margin-left:20%;">
                                                                        {{ $item_child_two->des }}
                                                                    </td>
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <hr />
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fas fa-times-circle"></i> ປິດ</button>
                    @if ($this->ID)
                        <button wire:click="update" type="button" class="btn btn-warning"><i
                                class="fas fa-edit"></i> ແກ້ໄຂ</button>
                    @else
                        <button wire:click="Store" type="button" class="btn btn-success"><i
                                class="fas fa-save"></i> ບັນທຶກ</button>
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
{{-- @push('scripts')
<script>
    document.addEventListener('livewire:initialized', () => {
        @this.on('show-modal-add', (event) => {
            $('#modal-add').modal('show');
        });
    });
    document.addEventListener('livewire:initialized', () => {
        @this.on('show-modal-hide', (event) => {
            $('#modal-add').modal('hide');
        });
    });
    //Delete
    window.addEventListener('show-modal-delete', event => {
        $('#modal-delete').modal('show');
    })
    window.addEventListener('hide-modal-delete', event => {
        $('#modal-delete').modal('hide');
    })
</script>
@endpush --}}
