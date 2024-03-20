<div wire:ignore.self class="modal fabe" id="modal-sales">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title"><i class="fas fa-file-alt"></i> ລາຍລະອຽດການຂາຍ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="radioPrimary1" value="1" wire:model="type">
                                                <label for="radioPrimary1">ເງິນສົດ
                                                </label>
                                            </div>
                                            <div class="icheck-danger d-inline">
                                                <input type="radio" id="radioPrimary2" value="2" wire:model="type"
                                                    checked>
                                                <label for="radioPrimary2">ເງິນໂອນ
                                                </label>
                                            </div>
                                        </div>
                                        @error('type')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" wire:ignore>
                                        <select wire:model='customer_id' id="customer_id" class="form-control">
                                            <option value="" selected>----- ເລືອກ-ລູກຄ້າ -----</option>
                                            @foreach ($customers as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name_lastname }} ໂທ: {{ $item->phone }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('customer_id')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class=" table">
                                <table class="table table-striped">
                                    <thead>
                                        @if ($customer_data)
                                            @if (!empty($customer_data))
                                                <tr>
                                                    <th class="bg-light">ຊື່ ນາມສະກຸນ:</th>
                                                    <th>{{ $customer_data->name_lastname }}
                                                        {{ $customer_data->name_lastname }}</th>
                                                </tr>
                                                <tr>
                                                    <th class="bg-light">ເພດ:</th>
                                                    <th>
                                                        @if ($customer_data->gender == 1)
                                                            <span>ຍິງ</span>
                                                        @elseif($customer_data->gender == 2)
                                                            <span>ຊາຍ</span>
                                                            @else
                                                            <span>ອື່ນໆ</span>
                                                        @endif
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th class="bg-light">ເບີໂທ:</th>
                                                    <th>{{ $customer_data->phone }}</th>
                                                </tr>
                                                <tr>
                                                    <th class="bg-light">ອີເມວ:</th>
                                                    <th>{{ $customer_data->email }}</th>
                                                </tr>
                                                <tr>
                                                    <th class="bg-light">ທີ່ຢູ່:</th>
                                                    <th>
                                                    @if (!empty($customer_data->province))
                                                            {{ $customer_data->village->name_la }},
                                                            {{ $customer_data->district->name_la }},
                                                            {{ $customer_data->province->name_la }}
                                                            @else
                                                            -
                                                    @endif
                                                </th>
                                                </tr>
                                            @endif
                                        @endif
                                    </thead>
                                </table>
                            </div>
                    </div>
                    <div class="col-md-12">
                        <div class="invoice p-3 mb-2" id="forprint">
                            <!-- Table row -->
                            <div class="row">
                                <div class="col-md-12 table-responsive">
                                    <table class="table table-striped text-center">
                                        <thead>
                                            <tr class="bg-info">
                                                <th>ລຳດັບ</th>
                                                <th>ສິນຄ້າ</th>
                                                <th>ລາຄາ</th>
                                                <th>ຈຳນວນ</th>
                                                <th>ເປັນເງິນ</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $num = 1;
                                        @endphp
                                        <tbody>
                                            @foreach ($sale_cart as $item)
                                            <tr>
                                                <td>{{ $num++ }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td><small>{{ number_format($item->price) }} ₭</small></td>
                                                <td>
                                                    {{ $item->qty }}
                                                </td>
                                                <td>{{ number_format($item->subtotal) }} ₭</td>
    
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th colspan="4" class="text-bold text-right h5">ລວມຍອດ</th>
                                            <th colspan="2" class="text-bold h5">{{ number_format($this->sum_subtotal) }} ₭</th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                        class="fas fa-times-circle"></i> ຍົກເລີກ</button>
                <div wire:loading wire:target="PlaceSales">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">ກຳລັງປະມວນຜົນ...</span>
                    </div>
                </div>
                @if($count_cart > 0)
                <button wire:click='PlaceSales' type="button" class="btn btn-success"><i
                    class="fas fa-check-circle"></i> ບັນທຶກການຂາຍ</button>
                    @else
                    <button disabled wire:click='PlaceSales' type="button" class="btn btn-success"><i
                        class="fas fa-check-circle"></i> ບັນທຶກການຂາຍ</button>
                @endif
            </div>
        </div>
    </div>
</div>