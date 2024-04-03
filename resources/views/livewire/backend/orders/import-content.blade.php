<div wire:poll>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h6><i class="fas fa-cart-plus"></i> ສັ່ງຊື້-ນຳເຂົ້າ <i class="fa fa-angle-double-right"></i>
                        ນຳສິນຄ້າເຂົ້າສາງ</h6>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">ໜ້າຫຼັກ</a>
                        </li>
                        <li class="breadcrumb-item active">ນຳສິນຄ້າເຂົ້າສາງ</li>
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
                        <div class="card-header bg-light">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="date" wire:model="start_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="date" wire:model="end_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <input wire:model.live="search" type="text" class="form-control"
                                        placeholder="ຄົ້ນຫາ...">
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select wire:model="status" class="form-control">
                                            <option value="" selected>ເລືອກ-ສະຖານະ</option>
                                            <option value="1">ລໍຖ້າຮັບ</option>
                                            <option value="2">ນຳເຂົ້າສຳເລັດ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select wire:model="status" class="form-control">
                                            <option value="" selected>ເລືອກ-ຊຳລະ</option>
                                            <option value="1">ຄ້າງຊຳລະ</option>
                                            <option value="2">ຊຳລະເເລ້ວ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5"></div>
                                <div class="col-md-1">
                                    {{-- <a href="{{route('backend.order_add')}}" type="button" class="btn btn-warning" style="width: auto;"><i class="fa fa-cart-plus"></i> {{__('lang.purchase_orders')}}</a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped text-sm">
                                    <thead>
                                        <tr class="text-center bg-light">
                                            <th>ລຳດັບ</th>
                                            <th>ວັນທີ</th>
                                            <th>ລະຫັດ</th>
                                            <th>ຜູ້ສະຫນອງ</th>
                                            <th>ຍອດລວມ</th>
                                            <th>ຍອດຊຳລະ</th>
                                            <th>ຍອດຫນີ້</th>
                                            <th>ຊຳລະ</th>
                                            <th>ສະຖານະ</th>
                                            <th>ຜູ້ສ້າງ</th>
                                            <th>ຈັດການ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $num = 1;
                                        @endphp

                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $num++ }}</td>
                                                <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                                <td>{{ $item->code }}</td>
                                                <td>
                                                    @if (!empty($item->supplier))
                                                        {{ $item->supplier->name_lastname }} <br>
                                                        {{ $item->supplier->phone }}
                                                    @endif
                                                </td>
                                                <td class="text-primary">{{ number_format($item->total) }}
                                                    ₭</td>
                                                <td class="text-success">
                                                    {{ number_format($item->orders_logs_sum_total_paid) }}
                                                    ₭</td>
                                                <td class="text-danger">
                                                    {{ number_format($item->total - $item->orders_logs_sum_total_paid) }}
                                                    ₭
                                                </td>
                                                <td>
                                                    @if ($item->total == $item->orders_logs_sum_total_paid)
                                                        <span class="text-success fas fa-check-circle"> ຊຳລະເເລ້ວ</span>
                                                    @elseif($item->total > $item->orders_logs_sum_total_paid)
                                                        <span class="text-danger fas fa-hand-holding-usd">
                                                            ຄ້າງຊຳລະ</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->status == '1')
                                                        <p class="text-warning"><span
                                                                class="spinner-grow spinner-grow-sm" role="status"
                                                                aria-hidden="true"></span> ລໍຖ້າຮັບ</p>
                                                    @elseif($item->status == '2')
                                                        <p class="text-success"><i class="fas fa-check-circle"></i>
                                                            ນຳເຂົ້າສຳເລັດ</p>
                                                    @elseif($item->status == '3')
                                                        <p class="text-danger"><i class="fas fa-times-circle"></i>
                                                            ຍົກເລີກ</p>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (!empty($item->employee))
                                                        {{ $item->employee->name_lastname }}
                                                    @endif
                                                </td>
                                                <td width="2%" style="text-align: center">
                                                    <div wire:ignore class="btn-group btn-left">
                                                        <button type="button"
                                                            class="btn btn-info btn-sm dropdown-toggle dropdown-icon"
                                                            data-toggle="dropdown">ຈັດການ
                                                        </button>
                                                        <div class="dropdown-menu" role="menu">
                                                            @if ($item->status != '2')
                                                                {{-- @foreach ($res_function_available as $items)
                                                                    @if ($items->ResFunctions->name == 'action_37') --}}
                                                                <a class="dropdown-item" href="javascript:void(0)"
                                                                    wire:click="ShowConfirm({{ $item->id }})"><i
                                                                        class="fas fa-file-import">
                                                                    </i> ນຳເຂົ້າສາງ</a>
                                                            @endif
                                                            {{-- @endforeach --}}
                                                            {{-- <li class="dropdown-divider"></li> --}}
                                                            {{-- @foreach ($res_function_available as $items)
                                                                    @if ($items->ResFunctions->name == 'action_40') --}}
                                                            <a class="dropdown-item"
                                                                wire:click='ShowUpdate({{ $item->id }})'
                                                                href="javascript:void(0)"><i class="fas fa-edit"></i>
                                                                ແກ້ໄຂ</a>
                                                            {{-- @endif
                                                                @endforeach

                                                            @endif --}}
                                                            {{-- <a class="dropdown-item" href="javascript:void(0)"
                                                                wire:click="UpdateImport({{ $item->id }})"><i
                                                                    class="fas fa-pencil-alt">
                                                                    {{ __('lang.edit') }}</i></a> --}}
                                                            {{-- @if ($item->total_money - $item->total_paid != 0)
                                                                @foreach ($res_function_available as $items)
                                                                    @if ($items->ResFunctions->name == 'action_38') --}}
                                                            @if ($item->total == $item->orders_logs_sum_total_paid)
                                                                <a class="dropdown-item" href="javascript:void(0)"
                                                                    wire:click="ShowPayment({{ $item->id }})"><i
                                                                        class="fas fa-history"></i>
                                                                    ປະຫັວດຊຳລະ</a>
                                                                    @else
                                                                    <a class="dropdown-item" href="javascript:void(0)"
                                                                    wire:click="ShowPayment({{ $item->id }})"><i
                                                                        class="fas fa-hand-holding-usd"></i>
                                                                    ຊຳລະຫນີ້</a>
                                                            @endif
                                                            {{-- @endif
                                                                @endforeach
                                                            @else --}}
                                                            {{-- @foreach ($res_function_available as $items)
                                                                    @if ($items->ResFunctions->name == 'action_38') --}}
                                                            {{-- @endif
                                                                @endforeach --}}
                                                            {{-- @endif --}}
                                                            {{-- @foreach ($res_function_available as $items)
                                                                @if ($items->ResFunctions->name == 'action_40') --}}
                                                            <a class="dropdown-item" href="javascript:void(0)"
                                                                wire:click="ShowBill({{ $item->id }})"><i
                                                                    class="fas fa-print">
                                                                </i> ພິມບິນ</a>
                                                            </a>
                                                            {{-- @endif
                                                            @endforeach --}}
                                                            {{-- @foreach ($res_function_available as $items)
                                                                @if ($items->ResFunctions->name == 'action_40') --}}
                                                            {{-- <a class="dropdown-item" href="javascript:void(0)"
                                                                wire:click="ShowDetail({{ $item->id }})"><i
                                                                    class="fas fa-file"></i>
                                                                ລາຍລະອຽດ</a> --}}
                                                            </a>
                                                            {{-- @endif
                                                            @endforeach --}}
                                                            {{-- <li class="dropdown-divider"></li> --}}
                                                            {{-- <a class="dropdown-item" href="javascript:void(0)"
                                                                wire:click=""><i class="fas fa-times-circle">
                                                                    ຍົກເລີກ</i></a> --}}
                                                        </div>
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
    @include('livewire.backend.orders.import-modal')
    @include('livewire.backend.data-store.modal-script')
</div>
