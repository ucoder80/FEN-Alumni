<div wire:poll>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h6><i class="fas fa-cart-plus"></i> ສັ່ງຊື້-ນຳເຂົ້າ <i class="fa fa-angle-double-right"></i>
                        ກະຕ່າສິນຄ້າ </h6>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item active">ກະຕ່າສິນຄ້າ</li>
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
                        {{-- <div class="card-header bg-primary">
                            <div class="row">
                                <div class="col-md-4" wire:ignore>
                                    <div class="form-group">
                                        <select wire:model="product_id" id="selectProduct"
                                            class="form-control @error('product_id') is-invalid @enderror">
                                            <option value="" selected>
                                                {{ __('lang.select') }}{{ __('lang.product') }}</option>
                                            @foreach ($products as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                    {{ number_format($item->total_price) }}</option>
                                            @endforeach
                                        </select>
                                        @error('product_id')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button wire:click="AddToCart" type="button" class="btn btn-primary"><i
                                            class="fas fa-cart-plus"></i> {{ __('lang.select') }}ໃສ່ກະຕ່າ</button>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3" wire:ignore>
                                    @foreach ($res_function_available as $items)
                                        @if ($items->ResFunctions->name == 'action_34')
                                            <div class="form-group">

                                                <div class="input-group">
                                                    <select wire:model="supplier_id" id="selectSupplier"
                                                        class="form-control @error('supplier_id') is-invalid @enderror">
                                                        <option value="0" selected>
                                                            {{ __('lang.select') }}{{ __('lang.supplier') }}</option>
                                                        @foreach ($suppliers as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                                {{ $item->lastname }} {{ $item->phone }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('supplier_id')
                                                        <span style="color: red" class="error">{{ $message }}</span>
                                                    @enderror
                                                    <div class="input-group-append">
                                                        <button type="button" wire:click="addSupplier"
                                                            class="btn btn-md btn-success">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div> --}}
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped bg-light">
                                    <thead>
                                        <tr class="text-center bg-light">
                                            <th>ລຳດັບ</th>
                                            <th>ຮູບ</th>
                                            <th>ຊື່</th>
                                            <th>ລາຄາຊື້</th>
                                            <th>ຈຳນວນ</th>
                                            <th>ເປັນເງິນ</th>
                                            <th>
                                                {{-- @foreach ($res_function_available as $items)
                                                    @if ($items->ResFunctions->name == 'action_35') --}}
                                                @if ($Count_cart)
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        wire:click="ShowClear"><i class="fas fa-trash-alt"></i>
                                                        ລຶບທັງຫມົດ
                                                    </button>
                                                @else
                                                    <button disabled type="button" class="btn btn-danger btn-sm"><i
                                                            class="fas fa-trash-alt"></i>
                                                        ລຶບທັງຫມົດ
                                                    </button>
                                                @endif
                                                {{-- @endif
                                                @endforeach --}}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $stt = 1;
                                        @endphp

                                        @foreach ($OrdersCarts as $item)
                                            <tr>
                                                <td class="text-center">{{ $stt++ }}</td>
                                                <td class="text-center">
                                                    @if (!empty($item->image))
                                                        <a href="{{ asset($item->image) }}"target="_blank">
                                                            <img class="rounded" src="{{ asset($item->image) }}"
                                                                width="50px;" height="50px;">
                                                        </a>
                                                    @else
                                                        <img src="{{ 'logo/noimage.jpg' }}" width="50px;"
                                                            height="50px;">
                                                    @endif
                                                </td>
                                                <td>{{ $item->name }}</td>
                                                <td class="text-center">{{ number_format($item->price) }}
                                                </td>
                                                <td class="text-center">
                                                    <div>
                                                        <div class="btn-group btn-group-sm btn-sm"
                                                            data-toggle="buttons">
                                                            <button type="button" class="btn btn-success btn-sm">
                                                                {{ $item->qty }} </button>
                                                            <button type="button" class="btn btn-warning btn-sm"
                                                                wire:click="ShowQty({{ $item->id }})"> <i
                                                                    class="fas fa-pen-alt"></i> </button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center"><b>{{ number_format($item->subtotal) }}
                                                    </b>
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        wire:click="Remove_Item({{ $item->id }})"><i
                                                            class="fas fa-times-circle"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4" class="text-right">
                                                <h5><b>ຈຳນວນ:
                                                        {{ number_format($Count_cart) }} @if ($Count_cart != 1)
                                                            ລາຍການ
                                                        @else
                                                            ລາຍການ
                                                        @endif
                                                    </b></h5>
                                            </td>
                                            <td colspan="3" class="text-center">
                                                <h5><b>ຍອດລວມ:
                                                        {{-- {{ number_format($sum_subtotal) }}  --}}
                                                    </b></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group clearfix">
                                                            <div class="icheck-success d-inline">
                                                                <input type="radio" id="radioPrimary1" value="cash"
                                                                    wire:model="payment_type" checked>
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
                                                                <input type="radio" id="radioPrimary2"
                                                                    value="transfer" wire:model="payment_type">
                                                                <label class="text-danger" for="radioPrimary2">ເງິນໂອນ
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- @if ($this->payment_type == 'transfer') --}}
                                                    <div class="col-sm-4">
                                                        <div class="form-group clearfix">
                                                            <input type="file" wire:model="payment_image">
                                                        </div>
                                                    </div>
                                                    {{-- @endif --}}
                                                </div>
                                                @error('payment_type')
                                                    <span style="color: red" class="error">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td colspan="3">
                                                <h6><b>
                                                    <input wire:model="total_paid" placeholder="0.00"
                                                            type="text" onkeypress="validate(event)"
                                                            class="form-control money
                                                          @error('total_paid') is-invalid @enderror">
                                                        @error('total_paid')
                                                            <span style="color: red"
                                                                class="error">{{ $message }}</span>
                                                        @enderror
                                                        <span>ປ້ອນເງິນຊຳລະ</span>
                                                </h6>
                                            </td>
                                            <td colspan="2">
                                                @if ($Count_cart)
                                                    <div class="col-md-12 text-center">
                                                        <button wire:click="PlaceOrder" class="btn btn-primary"><i
                                                                class="fas fa-credit-card">
                                                            </i> ສັ່ງຊື້ເລີຍ</button>
                                                    </div>
                                                @else
                                                    <div class="col-md-12 text-center">
                                                        <button wire:click="PlaceOrder" class="btn btn-primary"><i
                                                                class="fas fa-credit-card">
                                                            </i> ສັ່ງຊື້ເລີຍ</button>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    </tfoot>

                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('livewire.backend.orders.orders-modal-form')
    @include('livewire.backend.data-store.modal-script')
</div>
