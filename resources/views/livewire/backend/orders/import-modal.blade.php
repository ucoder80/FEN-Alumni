    {{-- \\\\\\\\\\\\\\\\\\\\\\\ Confirm inport \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
    <div wire:ignore.self class="modal fade" id="modal-import">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-file-import"></i> ນຳສິນຄ້າເຂົ້າສາງ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" wire:model="ID" value="{{ $ID }}">
                    <h3 class="text-center">ທ່ານຍືນຍັນນຳສິນຄ້າເຂົ້າສາງບໍ່?</h3>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ປີດ</button>
                    <button wire:click="ConfirmImport({{ $ID }})" type="button" class="btn btn-primary"><i
                            class="fas fa-check-circle"></i> ຍືນຍັນ</button>
                </div>
            </div>
        </div>
    </div>
    {{-- \\\\\\\\\\\\\\\\\\\\\\\ history Pay money \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
    <div class="modal fade" id="modal-paymoney" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    @if ($this->total > 0)
                        <h4 class="modal-title"><i class="fas fa-hand-holding-usd"></i> ຊຳລະຫນີ້
                        </h4>
                    @else
                        <h4 class="modal-title"><i class="fas fa-history"></i> ປະຫວັດການຊຳລະ
                        </h4>
                    @endif
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row text-center">
                        <input type="hidden" wire:model="ID">
                        <div class="col-md-12">
                            <h4>ຍອດຫນີ້ຕ້ອງຊຳລະ</h4>
                            <h3 class="text-danger">{{ number_format($this->total) }} ₭
                            </h3>
                        </div>
                    </div>
                    @if ($this->total > 0)
                        <td>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group clearfix">
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="radioPrimary1" value="1" wire:model="type"
                                                checked>
                                            <label class="text-success" for="radioPrimary1">ເງິນສົດ
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group clearfix">
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="radioPrimary2" value="2" wire:model="type">
                                            <label class="text-danger" for="radioPrimary2">ເງິນໂອນ
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                {{-- @if ($this->type == '2')
                                        <div class="col-sm-4">
                                            <div class="form-group clearfix">
                                                <input type="file" wire:model="payment_image">
                                            </div>
                                        </div>
                                    @endif --}}
                            </div>
                            @error('type')
                                <span style="color: red" class="error">{{ $message }}</span>
                            @enderror
                        </td>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>ຍອດຊຳລະ</label>
                                    <input wire:model.live="total_paid" placeholder="0.00" type="text"
                                        class="form-control money @error('total_paid') is-invalid @enderror">
                                    @error('total_paid')
                                        <span style="color: #ff0000" class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <td colspan="2">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button wire:click="ConfirmPayment"
                                                class="btn btn-success btn-md btn-block"><i
                                                    class="fas fa-credit-card"></i>
                                                ຍືນຍັນຊຳລະ</button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            {{-- <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fas fa-times-circle"></i> {{ __('lang.cancel') }}</button> --}}
                        </div>
                    @endif
                    <table class="table table-hover">
                        <thead class="bg-danger text-center">
                            <tr>
                                <th>ລຳດັບ</th>
                                <th>ວັນທີ</th>
                                <th>ເປັນເງິນ</th>
                                <th>ການຊຳລະ</th>
                                {{-- <th>ຮູບ</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $num = 1;
                            @endphp
                            @foreach ($orders_logs as $item)
                                <tr class="text-center">
                                    <td>{{ $num++ }}</td>
                                    <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                    <td>{{ number_format($item->total_paid) }} ₭</td>
                                    <td>
                                        @if ($item->type == '1')
                                            <p class="text-success">ເງິນສົດ</p>
                                        @elseif($item->type == '2')
                                            <p class="text-danger">ເງິນໂອນ</p>
                                        @endif
                                    </td>
                                    {{-- <td>
                                            @if (!empty($item->payment_image))
                                                <a href="{{ asset($item->payment_image) }}" target="_blank">
                                                    <img class="rounded" src="{{ asset($item->payment_image) }}"
                                                        width="50px;" height="50px;">
                                                </a>
                                            @else
                                                <img src="{{ 'logo/noimage.jpg' }}" width="50px;" height="50px;">
                                            @endif
                                        </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- \\\\\\\\\\\\\\\\\\\\\\\ Edit order item \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
    <div class="modal fade" id="modal-update-item" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-cart-plus"></i> ແກ້ໄຂໃບບິນ {{ $this->code }}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row text-center">
                        <input type="hidden" wire:model="ID">
                        <div class="col-md-12">
                            <h4>ລາຍການສັ່ງຊື້</h4>
                        </div>
                    </div>
                    <table class="table table-hover text-center">
                        <thead class="bg-light text-center">
                            <tr>
                                <th>ລຳດັບ</th>
                                <th>ສິນຄ້າ</th>
                                <th>ຈຳນວນ</th>
                                <th>ລາຄາ</th>
                                <th>ເປັນເງິນ</th>
                                <th>ຈັດການ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $num = 1;
                            @endphp
                            @foreach ($orderDetail as $item)
                                <tr class="text-center">
                                    <td>{{ $num++ }}</td>
                                    <td>
                                        @if (!empty($item->product))
                                            {{ $item->product->name }}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input wire:model="stock.{{ $item->id }}" placeholder="0.00"
                                                        value="{{ $item->stock }}" min="1" type="number"
                                                        class="form-control text-center money @error('stock.' . $item->id) is-invalid @enderror"
                                                        wire:change="UpdateStock({{ $item->id }})">
                                                    @error('stock.' . $item->id)
                                                        <span style="color: #ff0000"
                                                            class="error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-left">
                                                <div class="form-group">
                                                    {{ $item->stock }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{ number_format($item->buy_price) }} ₭
                                    </td>
                                    <td>
                                        {{ number_format($item->subtotal) }} ₭
                                    </td>
                                    <td>
                                        <button wire:click="Remove_Item({{ $item->id }})"
                                            class="btn btn-danger btn-sm"><i class="fas fa-times-circle"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
