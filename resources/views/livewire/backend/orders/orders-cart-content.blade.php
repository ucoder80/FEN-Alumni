<div wire:poll>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h5><i class="fas fa-cart-plus"></i> ສັ່ງຊື້ນຳ-ເຂົ້າສາງ</h5>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <div class="row">
                                {{-- @if ($this->branchs)
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <select class="form-control" wire:model="branch_id">
                                                <option value="">--{{ __('lang.branch') }}--</option>
                                                @foreach ($branchs as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif --}}
                                <div wire:ignore class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group row">
                                            <select wire:model='search_product' id="search_products"
                                                class="form-control form-control-md">
                                                <option class="text-center" selected value="">----
                                                    ຄົ້ນຫາສິນຄ້າ ----
                                                </option>
                                                @foreach ($products as $item)
                                                    <option class="text-center" value="{{ $item->id }}">
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group row">

                                        <input wire:model='search' type="search" class="form-control form-control-md"
                                            placeholder="ຄົ້ນຫາ...">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-md btn-success">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-right">
                                    @if (!empty($count_cart))
                                        <a href="{{ route('backend.order') }}">
                                            <button type="button" class="btn btn-success btn-md">
                                                <i class="text-lg fa fa-shopping-cart"></i>
                                                <span
                                                    class="badge badge-danger navbar-badge text-md">{{ $count_cart }}</span>
                                            </button>
                                        </a>
                                    @else
                                        <a href="#">
                                            <button disabled type="button" class="btn btn-success">
                                                <i class="text-lg fa fa-shopping-cart"></i>
                                            </button>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Start Body -->
                            <div class="row">
                                <!-- Start Row -->
                                @foreach ($products as $item)
                                    <!-- Start Col -->
                                    <div class="col-md-3 d-flex align-items-stretch flex-column">
                                        @if ($item->qty == 0)
                                            <div class="ribbon-wrapper">
                                                <div class="ribbon bg-danger text-sm">
                                                    ຫມົດເເລ້ວ!
                                                </div>
                                            </div>
                                        @elseif($item->qty <= 10)
                                            <div class="ribbon-wrapper ribbon-sm">
                                                <div class="ribbon bg-warning text-sm">
                                                    ໃກ້ຫມົດ!
                                                </div>
                                            </div>
                                        @elseif($item->qty > 10)
                                            <div class="ribbon-wrapper ribbon-sm">
                                                <div class="ribbon bg-success text-sm">
                                                   ໃນສະຕ໋ອກ
                                                </div>
                                            </div>
                                        @endif
                                        <div class="card bg-light d-flex flex-fill">
                                            <div class="card-header border-bottom-0">
                                                <b>{{ $item->name }} </b>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @if (!empty($item->image))
                                                            <img class="rounded" src="{{ asset($item->image) }}"
                                                                width="100%;" height="120px; ">
                                                        @else
                                                            <img class="rounded" src="{{ asset('logo/noimage.jpg') }}"
                                                                width="100%;" height="120px; ">
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
                                                            <b>ລາຄາຊື້:</b>
                                                            {{ number_format($item->buy_price) }}
                                                        </p>
                                                        <p style="line-height: 20%;" class="text-muted">
                                                            <b>ສະຕ໋ອກ:</b> {{ $item->stock }}
                                                        </p>
                                                    </div>
                                                </div>

                                                {{-- @foreach ($res_function_available as $items)
                                                    @if ($items->ResFunctions->name == 'action_33') --}}
                                                        <div class="btn-group col-md-12">
                                                            @if ($item->check == 1)
                                                                <button disabled
                                                                    class="btn btn-warning btn-sm float-right">
                                                                    <i class="fas fa-check-circle"></i>
                                                                    ໃນກະຕ່າເເລ້ວ
                                                                </button>
                                                            @else
                                                                <button wire:click="AddToCart({{ $item->id }})"
                                                                    class="btn btn-success btn-sm float-right">
                                                                    <i class="fas fa-cart-plus"></i>
                                                                    ເກັບໃສ່ກະຕ່າ
                                                                </button>
                                                            @endif
                                                        </div>
                                                    {{-- @endif
                                                @endforeach --}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="float-right">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#search_products').select2();
            $('#search_products').on('change', function(e) {
                var data = $('#search_products').select2("val");
                @this.set('search_product', data);
            });
        });
    </script>
    <script>
        window.addEventListener('showforma', event => {
            $('#modala').modal('show');
        });
        window.addEventListener('closeforma', event => {
            $('#modala').modal('hide');
        });
    </script>
@endpush
