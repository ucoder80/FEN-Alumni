<div wire:poll>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5><i class="fas fa-database"></i>
                        ຈັດການຂໍ້ມູນ
                        <i class="fa fa-angle-double-right"></i>
                        ສິນຄ້າ
                    </h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">ໜ້າຫຼັກ</a>
                        </li>
                        <li class="breadcrumb-item active">ສິນຄ້າ</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-2">
                                    <a href="javascript:ovid(0)" wire:click="create" class="btn btn-primary btn-sm"><i
                                            class="fa fa-plus-circle"></i>
                                        ເພີ່ມໃຫມ່</a>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-3">
                                </div>
                                {{-- <div class="col-md-3" wire:ignore>
                                    <div class="form-group">
                                        <select wire:model="car_types_id" name="" id="search_car_type"
                                            class="form-control">
                                            <option value="">{{ __('lang.select') }}{{ __('lang.car_type') }}
                                            </option>
                                            @foreach ($car_types as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="col-md-3">
                                    <input wire:model.live="search" type="text" class="form-control"
                                        placeholder="ຄົ້ນຫາ...">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ລຳດັບ</th>
                                            <th>ລະຫັດ</th>
                                            <th>ຮູບພາບ</th>
                                            <th>ປະເພດສິນຄ້າ</th>
                                            <th>ຊື່ສິນຄ້າ</th>
                                            <th>ລາຄາຊື້</th>
                                            <th>ລາຄາຂາຍ</th>
                                            <th>ສະຕ໋ອກ</th>
                                            <th>ສະຖານະ</th>
                                            <th>ຈັດການ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $num = 1;
                                        @endphp
                                        @foreach ($data as $item)
                                            <tr class="text-center">
                                                <td>{{ $num++ }}</td>
                                                <td>{{ $item->code }}</td>
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
                                                    @if (!empty($item->product_type))
                                                        {{ $item->product_type->name }}
                                                    @endif
                                                </td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ number_format($item->buy_price) }}</td>
                                                <td>{{ number_format($item->sell_price) }}</td>
                                                <td>
                                                    <p class="bg-primary h5 rounded">{{ $item->stock }}</p>
                                                </td>
                                                <td>
                                                    @if ($item->stock >= 10)
                                                        <span class="text-success"><i class="fas fa-check-circle"></i>
                                                            ໃນສະຕ໋ອກ</span>
                                                    @elseif($item->stock > 0 && $item->stock <= 10)
                                                        <span class="text-warning"><i class="fas fa-warning"></i>
                                                            ໃກ້ຫມົດ!</span>
                                                    @elseif($item->stock <= 0)
                                                        <span class="text-danger"><i class="fas fa-box-open"></i>
                                                            ຫມົດເເລ້ວ!</span>
                                                    @endif
                                                    {{-- @if ($item->status == 1)
                                                        <span class="text-success">{{ __('lang.empty') }}</span>
                                                    @elseif($item->status == 2)
                                                        <span class="text-warning">{{ __('lang.not_empty') }}</span>
                                                    @endif --}}
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button wire:click="edit('{{ $item->id }}')" type="button"
                                                            class="btn btn-warning btn-sm"><i
                                                                class="fa fa-edit"></i></button>
                                                        <button wire:click="showDestory('{{ $item->id }}')"
                                                            type="button" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-times-circle"></i></button>
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
    {{-- ================Add Edit ================= --}}
    <div wire:ignore.self class="modal fade" id="modal-add-edit">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    @if ($this->ID)
                        <h4 class="modal-title"><i class="fas fa-edit text-warning"></i> ແກ້ໄຂ</h4>
                    @else
                        <h4 class="modal-title"><i class="fas fa-plus text-success"></i> ເພີ່ມໃຫມ່</h4>
                    @endif
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div wire:ignore class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' wire:model="image" id="imageUpload"
                                    class="@error('image') is-invalid @enderror" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <label class="text-center">ຮູບສິນຄ້າ</label>
                            <div class="avatar-preview">
                                <div id="imagePreview"
                                    style="background-image: url({{ asset('logo/noimage.jpg') }});">
                                </div>
                            </div>
                        </div>
                    </div>
                    @error('image')
                        <span style="color: red" class="error">{{ $message }}</span>
                    @enderror
                    {{-- <div class="container">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' wire:model="image" id="imageUpload2" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload2"></label>
                            </div>
                            @if ($image)
                                <div class="avatar-preview">
                                    <img id="imagePreview2" src="{{ asset($image->temporaryUrl()) }}" alt=""
                                        width="120px;">
                                </div>
                            @else
                                <div class="avatar-preview">
                                    <div id="imagePreview2"
                                        style="background-image: url({{ asset('logo/noimage.jpg') }});">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div> --}}
                    <div class="row">
                        <input type="hidden" wire:model="hiddenId">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>ປະເພດສິນຄ້າ <span class="text-danger">*</span></label>
                                <div class="input-group row">
                                    <select wire:model="product_type_id" id=""
                                        class="form-control @error('product_type_id') is-invalid @enderror">
                                        <option value="" selected>ເລືອກ</option>
                                        @foreach ($product_type as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button type="button" wire:click="show_CarType"
                                            class="btn btn-md btn-success">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                @error('product_type_id')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""> ຊື່ສິນຄ້າ</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    wire:model="name" placeholder="ປ້ອນຂໍ້ມູນ" />
                                @error('name')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            @if ($this->ID)
                                <div class="form-group">
                                    <label for=""> ສະຕ໋ອກ</label>
                                    <input disabled type="text"
                                        class="form-control money @error('stock') is-invalid @enderror"
                                        wire:model="stock" placeholder="0">
                                    @error('stock')
                                        <span class="error" style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""> ລາຄາຊື້</label>
                                <input type="text" class="form-control money @error('buy_price') is-invalid @enderror"
                                    wire:model="buy_price" placeholder="0.00">
                                @error('buy_price')
                                    <span class="error" style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""> ລາຄາຂາຍ</label>
                                <input type="text" class="form-control money @error('sell_price') is-invalid @enderror"
                                    wire:model="sell_price" placeholder="0.00">
                                @error('sell_price')
                                    <span class="error" style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="detail">ຄຳອະທິບາຍ</label>
                                <div wire:ignore>
                                    <textarea class="form-control" id="product_note" wire:model="note">{{ $note }}</textarea>
                                </div>
                                @error('note')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> ປິດ</button>
                    @if ($this->ID)
                        <button wire:click="Update" type="button" class="btn btn-warning"><i
                                class="fas fa-pen-alt"></i>
                            ແກ້ໄຂ</button>
                    @else
                        <button wire:click="Store" type="button" class="btn btn-success"><i
                                class="fa fa-floppy-o"></i>
                            ບັນທຶກ</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- /.modal-delete-->
    <div wire:ignore class="modal fabe" id="modal-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title"><i class="fa fa-trash"> </i> ລຶບອອກ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">ທ່ານຕ້ອງການລຶບຂໍ້ມູນນີ້ {{ $this->name }} ອອກບໍ່?</h3>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button wire:click="Destory({{ $ID }})" type="button" class="btn btn-success"><i
                            class="fa fa-trash"></i> ລຶບອອກ</button>
                </div>
            </div>
        </div>
    </div>
</div>
@include('livewire.backend.data-store.modal-script')
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#search_branches').select2();
            $('#search_branches').on('change', function(e) {
                var data = $('#search_branches').select2("val");
                @this.set('branches_id', data);
            });
            $('#search_car_type').select2();
            $('#search_car_type').on('change', function(e) {
                var data = $('#search_car_type').select2("val");
                @this.set('car_types_id', data);
            });
        });
    </script>
@endpush
