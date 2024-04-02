<div wire:poll>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h5><i class="fas fa-balance-scale"></i> ຂາຍຫນ້າຮ້ານ</h5>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    {{-- <div class="input-group row">
                                        <select wire:model='buy_lands_id' id="programsid"
                                            class="form-control form-control-md">
                                            <option class="text-center" value="" selected>-- ເລືອກໂຄງການ --
                                            </option>
                                            @foreach ($buylands as $item)
                                                <option class="text-center" value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                </div>
                                <div wire:ignore class="col-sm-4">
                                    <div class="input-group row">
                                        <select wire:model='product_type_id' id="product_type_id"
                                            class="form-control form-control-md">
                                            <option class="text-left" selected value="">-- ປະເພດສິນຄ້າ --</option>
                                            @foreach ($product_type as $item)
                                                <option class="text-left" value="{{ $item->id }}">
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group row">
                                        <input wire:model='search' type="search" class="form-control form-control-md"
                                            placeholder="ຊອກຫາ...">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-md btn-success">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Start Body -->
                            <div class="row">
                                <!-- Start Row -->
                                @foreach ($data as $item)
                                    <!-- Start Col -->
                                    <div class="col-md-2 d-flex align-items-stretch flex-column">
                                        @if ($item->stock == 0)
                                            <div class="ribbon-wrapper">
                                                <div class="ribbon bg-danger text-sm">
                                                    ຫມົດເເລ້ວ!
                                                </div>
                                            </div>
                                        @elseif($item->stock <= 10)
                                            <div class="ribbon-wrapper ribbon-sm">
                                                <div class="ribbon bg-warning text-sm">
                                                    ໃກ້ຫມົດ!
                                                </div>
                                            </div>
                                        @elseif($item->stock > 10)
                                            <div class="ribbon-wrapper ribbon-sm">
                                                <div class="ribbon bg-success text-sm">
                                                   ໃນສະຕ໋ອກ
                                                </div>
                                            </div>
                                        @endif
                                        <div class="card bg-light d-flex flex-fill">
                                            <div class="card-header border-bottom-0">
                                                <b> {{ $item->name }} </b></p>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="row text-center">
                                                    <div class="col-md-12">
                                                        @if (!empty($item))
                                                            <img class="rounded" src="{{ asset($item->image) }}"
                                                                width="50px;" height="50px;">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h2 class="lead"><b></b></h2>
                                                        <p style="line-height: 20%;" class="text-muted text-sm">
                                                            <b>ລະຫັດ: </b>
                                                            @if (!empty($item))
                                                                {{ $item->code }}
                                                            @endif
                                                        </p>
                                                        <p style="line-height: 20%;" class="text-muted text-sm">
                                                            <b>ສະຕ່ອກ: </b>
                                                            @if (!empty($item))
                                                                {{ $item->stock }}
                                                            @endif
                                                        </p>
                                                        <p style="line-height: 20%;" class="text-muted text-sm">
                                                            <small><b>ລາຄາຂາຍ:</b></small>
                                                            <small> {{ number_format($item->sell_price) }}
                                                                ₭</small>
                                                        </p>
                                                        <p style="line-height: 20%;" class="text-muted text-sm">
                                                            <small>
                                                                @if (!empty($item->zones->buyLand))
                                                                    {{ $item->zones->buyLand->name }}
                                                                @endif
                                                            </small>
                                                        </p>
                                                        {{-- @endif --}}
                                                    </div>
                                                </div>
                                                <div class="btn-group col-md-12">
                                                    @if ($item->check_2 == 1)
                                                        <button class="btn btn-warning btn-sm float-right">
                                                            <p class="mb-0"><i class="fas fa-check-circle"></i>
                                                                ໃນກະຕ່າ</p>
                                                        </button>
                                                    @else
                                                        <button wire:click='AddToCart({{ $item->id }})'
                                                            class="btn btn-info btn-sm float-right">
                                                            <i class="fas fa-cart-plus"></i> ເລືອກ
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Col -->
                                @endforeach
                            </div>
                            <div class="float-right">
                                {{ $data->links() }}
                            </div>
                        </div>
                        <!-- /.card-body -->
                        {{-- <div class="card-body">
                            <div class="row">
                                @if ($lands == null)
                                    <div class="col-12">
                                        <div class="alert alert-danger">
                                            <h5><i class="icon fas fa-ban"></i> ບໍ່ມີຂໍ້ມູນທີ່ທ່ານຄົ້ນຫາ</h5>
                                        </div>
                                    </div>
                                @else
                                    @foreach ($lands as $items)
                                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                            <div class="card bg-light d-flex flex-fill">
                                                <div class="card-body">
                                                    <img src="https://thumbs.dreamstime.com/b/land-plot-aerial-view-development-investment-identify-registration-symbol-vacant-area-map-property-real-estate-218218332.jpg"
                                                        class="img-fluid rounded" width="100%" height="100%"
                                                        alt="jacksainther">
                                                </div>
                                                <div class="card-header text-muted border-bottom-0">
                                                    {{ $items->code }}
                                                    <small>ໂຊນ:
                                                        @if (!empty($items->zomes))
                                                        {{ $items->zomes->zname }}
                                                        @endif
                                                    </small>
                                                    <small>{{ number_format($items->selling_price) }} ₭</small>
                                                    @if ($cartData->where('id', $items->id)->count() > 0)
                                                        <button class="btn btn-warning btn-sm float-right">
                                                            <p class="mb-0">In Cart</p>
                                                        </button>
                                                    @else
                                                        <button
                                                            wire:click='addCart({{ $items->id }}, {{ $items->zones_id }}, {{ $items->zones->buy_lands_id }})'
                                                            class="btn btn-success btn-sm float-right">
                                                            <i class="fas fa-cart-plus"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div> --}}
                        {{-- <div class="card-footer clearfix">
                            {{ $lands->links() }}
                        </div> --}}
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header bg-success">
                            <h4><i class="fas fa-cart-plus"></i> ກະຕ່າສິນຄ້າ</h4>
                        </div>
                        <div class="card-body">
                            <div class="col-12 table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr>
                                            <th colspan="4" class="text-bold text-right">ລວມຍອດ</th>
                                            <th colspan="2">{{ number_format($this->sum_subtotal) }} ₭</th>
                                        </tr>
                                        <tr>
                                            <th>ລຳດັບ</th>
                                            <th>ສິນຄ້າ</th>
                                            <th>ລາຄາ</th>
                                            <th>ຈຳນວນ</th>
                                            <th>ເປັນເງິນ</th>
                                            <th class="text-center">ຈັດການ</th>
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
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input wire:model.live="qty.{{ $item->id }}" style="width: 100px"
                                                                    placeholder="0" value="{{ $item->qty }}"
                                                                    min="1" type="number"
                                                                    class="form-control text-center money @error('qty.' . $item->id) is-invalid @enderror"
                                                                    wire:change="UpdateStock({{ $item->id }})">
                                                                @error('qty.' . $item->id)
                                                                    <span style="color: #ff0000"
                                                                        class="error">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                       <span class="pl-2"> {{ $item->qty }}</span>
                                                    </div>
                                                </td>
                                                <td>{{ number_format($item->subtotal) }} ₭</td>
                                                <td class="text-center">
                                                    <button wire:click="Remove_Item('{{ $item->id }}')"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fas fa-times-circle"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    {{-- @if ($sale_cart == null)
                                        <p><b>ຈຳນວນ:</b> 0 | <b>ເປັນເງິນ:</b> 0 ₭</p>
                                    @else
                                        <p><b>ຈຳນວນ:</b> {{ $cartCount }} ຕອນ | <b>ເປັນເງິນ:</b>
                                            {{ $cartTotal }} ₭</p>
                                    @endif --}}
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            {{-- @foreach ($rolepermissions as $items)
                                @if ($items->permissionname->name == 'action_sale') --}}
                            @if ($count_cart > 0)
                                <button wire:click='ClearItem' class="btn btn-danger"><i
                                        class="fas fa-trash-alt text-white"></i>
                                    ລືບທັງຫມົດ
                                </button>
                                <button wire:click.live='ShowPlaceSales' class="btn btn-success"><i
                                        class="far fa-credit-card"></i>
                                    ໄປທີ່ການຊຳລະເງິນ
                                </button>
                            @else
                                <button disabled wire:click='ClearItem' class="btn btn-danger"><i
                                        class="fas fa-trash-alt text-white"></i>
                                    ລືບທັງຫມົດ
                                </button>
                                <button disabled wire:click.live='ShowPlaceSales' class="btn btn-success"><i
                                        class="far fa-credit-card"></i>
                                    ໄປທີ່ການຊຳລະເງິນ
                                </button>
                            @endif
                            {{-- @endif
                            @endforeach --}}
                        </div>
                    </div>
                </div>
            </div>
    </section>
    @include('livewire.backend.data-store.modal-script')
    @include('livewire.backend.sales.sales-modal')
</div>
