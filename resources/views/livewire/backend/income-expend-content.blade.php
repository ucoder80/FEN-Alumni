<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5><i class="fas fa-money-bill-alt"></i>
                        ລາຍຮັບ-ລາຍຈ່າຍ
                    </h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">ໜ້າຫຼັກ</a>
                        </li>
                        <li class="breadcrumb-item active">ລາຍຮັບ-ລາຍຈ່າຍ</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="date" wire:model.live="start_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="date" wire:model.live="end_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <select wire:model.live="select_type" id="" class="form-control">
                                        <option value="">ເລືອກ-ປະເພດ
                                        </option>
                                        <option class="text-success" value="1">ລາຍຮັບ</option>
                                        <option class="text-danger" value="2">ລາຍຈ່າຍ</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input wire:model.live="search" type="text" class="form-control"
                                        placeholder="ຄົ້ນຫາ">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless table-striped">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>ລຳດັບ</th>
                                            <th>ວັນທີ</th>
                                            <th>ທຸລະກຳ</th>
                                            <th>ເປັນເງິນ</th>
                                            <th>ປະເພດ</th>
                                            <th>ຈັດການ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ date('d/m/Y', strtotime($item->dated)) }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    {{ number_format($item->total_price) }} ₭
                                                </td>
                                                <td>
                                                    @if ($item->type == '1')
                                                        <span class="text-success">ລາຍຮັບ</span>
                                                    @else
                                                        <span class="text-danger">ລາຍຈ່າຍ</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button wire:click="edit('{{ $item->id }}')" type="button"
                                                            class="btn btn-warning btn-sm"><i
                                                                class="fa fa-edit"></i></button>
                                                        <button wire:click="showDelete({{ $item->id }})"
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

                <!---- Add Data --->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-light">
                            <label><i class="fa fa-plus text-success"></i> ເພີ່ມໃຫມ່/ແກ້ໄຂ</label>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <input type="hidden" wire:model="ID" value="({{ $ID }})">
                                    <div class="col-md-12 text-right">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="form-group clearfix">
                                                    <div class="icheck-success d-inline">
                                                        <input type="radio" id="radioPrimary1" value="1"
                                                            wire:model="type">
                                                        <label for="radioPrimary1">ລາຍຮັບ
                                                        </label>
                                                    </div>
                                                    <div class="icheck-danger d-inline">
                                                        <input type="radio" id="radioPrimary2" value="2"
                                                            wire:model="type" checked>
                                                        <label for="radioPrimary2">ລາຍຈ່າຍ
                                                        </label>
                                                    </div>
                                                </div>
                                                @error('type')
                                                    <span style="color: red" class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label>ທຸລະກຳ <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input wire:model="name" type="text"
                                                class="form-control  @error('name') is-invalid @enderror"
                                                placeholder="ປ້ອນຂໍ້ມູນ">
                                            @error('name')
                                                <span class="error" style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    @push('scripts')
                                        <script type="text/javascript">
                                            $('.money').simpleMoneyFormat();
                                        </script>
                                    @endpush
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>ເປັນເງິນ <span
                                                    style="color:red">*</span></label>
                                            <input wire:model="total_price" type="text"
                                                placeholder="ປ້ອນຂໍ້ມູນ"
                                                class="form-control money @error('total_price') is-invalid @enderror"
                                                onkeypress="validateNumber(event)">
                                            @error('total_price')
                                                <span style="color: red" class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label>ວັນທີ <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input wire:model.live="dated" type="date"
                                                class="form-control  @error('date') is-invalid @enderror"
                                                placeholder="ປ້ອນຂໍ້ມູນ">
                                            @error('dated')
                                                <span class="error" style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                                    <div class="d-flex justify-content-between">
                                        <button wire:click="resetFiled" class="btn btn-warning"><i
                                                class="fa fa-refresh"></i>
                                           ຍົກເລີກ </button>
                                        <button wire:click="Create" type="button"
                                            class="btn btn-success">ບັນທຶກ</button>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--- MOdal-Delete --->
    <div wire:ignore.self class="modal fade" id="modal-Delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title"><i class="fa fa-trash"></i> ລຶບອອກ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" wire:model="ID" value="{{ $ID }}">
                    <h3 class="text-center">ທ່ານຕ້ອງການລຶບ {{ $this->name }} ?</h3>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> ຍົກເລີກ</button>
                    <button wire:click="Delete({{ $ID }})" type="button" class="btn btn-success"><i
                            class="fa fa-trash"></i> ຕົກລົງ</button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function validateNumber(evt) {
            var theEvent = evt || window.event;
            // Handle paste
            if (theEvent.type === 'paste') {
                key = event.clipboardData.getData('text/plain');
            } else {
                // Handle key press
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }
            var regex = /[0-9]|\./;
            if (!regex.test(key)) {
                theEvent.returnValue = false;
                if (theEvent.preventDefault) theEvent.preventDefault();
            }
        }

        window.addEventListener('show-modal-Delete', event => {
            $('#modal-Delete').modal('show');
        })
        window.addEventListener('hide-modal-Delete', event => {
            $('#modal-Delete').modal('hide');
        })

        $(document).ready(function() {
            $('#branches_id').select2();
            $('#branches_id').on('change', function(e) {
                var data = $('#branches_id').select2("val");
                @this.set('branches_id', data);
            });
        });
        $(document).ready(function() {
            $('#car_id').select2();
            $('#car_id').on('change', function(e) {
                var data = $('#car_id').select2("val");
                @this.set('car_id', data);
            });
        });
        $(document).ready(function() {
            $('#select_branches').select2();
            $('#select_branches').on('change', function(e) {
                var data = $('#select_branches').select2("val");
                @this.set('select_branches', data);
            });
        });
    </script>
@endpush
