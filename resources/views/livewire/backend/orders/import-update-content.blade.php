<div wire:ignore>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h6><i class="fas fa-shopping-cart"></i> {{ __('lang.purchase_orders') }} <i
                            class="fa fa-angle-double-right"></i>
                        {{ __('lang.into_the_warehouse') }} <i class="fa fa-angle-double-right"></i>
                        {{ __('lang.edit') }}</h6>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">{{ __('lang.home') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('lang.edit') }}</li>
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
                        <div class="card-header bg-info">
                            <div class="row">
                                {{-- <div class="col-md-4" wire:ignore>
                                    <div class="form-group">
                                        <select wire:model="product_id" id="selectProduct"
                                            class="form-control @error('product_id') is-invalid @enderror">
                                            <option value="" selected>
                                                {{ __('lang.select') }}{{ __('lang.product') }}</option>
                                            @foreach ($products as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                    {{ number_format($item->buy_price) }}</option>
                                            @endforeach
                                        </select>
                                        @error('product_id')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> --}}
                                {{-- <div class="col-md-2">
                                    <button wire:click="addProduct" type="button"
                                        class="btn btn-primary">{{ __('lang.select') }}</button>
                                </div> --}}
                                <div class="col-md-9"></div>
                                <div class="col-md-3" wire:ignore>
                                    <div class="form-group">
                                        <select wire:model="supplier_id" id="selectSupplier"
                                            class="form-control @error('supplier_id') is-invalid @enderror">
                                            <option value="0" selected>
                                                {{ __('lang.select') }}{{ __('lang.supplier') }}</option>
                                            {{-- @foreach ($members as $item)
                                    <option value="{{ $item->id }}">{{ $item->firstname }} {{ $item->lastname }} {{ $item->phone }}</option>
                                @endforeach --}}
                                        </select>
                                        @error('supplier_id')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center bg-light">
                                            <th>{{ __('lang.no') }}</th>
                                            <th>{{ __('lang.images') }}</th>
                                            <th>{{ __('lang.name') }}</th>
                                            <th>{{ __('lang.price') }}</th>
                                            <th>{{ __('lang.amount') }}</th>
                                            <th>{{ __('lang.subtotal') }}</th>
                                            <th>{{ __('lang.manage') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $num = 1;
                                        @endphp

                                        @foreach ($order_product_detail as $item)
                                            <tr>
                                                <td style="text-align: center">{{ $num++ }}</td>
                                                <td class="text-center">
                                                    @if (!empty($item->product->image))
                                                        <a href="{{ asset($item->product->image) }}">
                                                            <img class="rounded" src="{{ asset($item->product->image) }}"
                                                                width="50px;" height="50px;">
                                                        </a>
                                                    @else
                                                        <img src="{{ 'logo/noimage.jpg' }}" width="50px;"
                                                            height="50px;">
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $item->product->name }}
                                                </td>
                                                <td class="text-center">
                                                    {{ number_format($item->price) }} {{ $curency_symbol }}
                                                </td>
                                                <td class="text-center">{{ $item->quantity }}</td>
                                                <td class="text-center">
                                                    {{ number_format($item->subtotal) }} {{ $curency_symbol }}</td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <button wire:click="ShowUpdate({{ $item->id }})"
                                                            type="button" class="btn btn-warning btn-sm"><i
                                                                class="fas fa-pencil-alt"></i></button>
                                                        <button wire:click="ShowDelete({{ $item->id }})" type="button"
                                                            class="btn btn-danger btn-sm"><i
                                                            class="fas fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center">
                                                <h5><b>{{ __('lang.total_quantity') }}:
                                                        {{ number_format($count_item) }} {{ __('lang.item') }}</b>
                                                </h5>
                                            </td>
                                            <td class="text-center">
                                                <h5><b>{{ __('lang.total_money') }}:
                                                        {{ number_format($this->sum_subtotal) }}
                                                        {{ $curency_symbol }}</b></h5>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"></td>
                                            <td colspan="2">
                                                <h6><b><input wire:model="total_paid" placeholder="ຈຳນວນເງິນຊຳລະ"
                                                            type="text"
                                                            class="form-control
                                                         @error('total_paid') is-invalid @enderror">
                                                        @error('total_paid')
                                                            <span style="color: red"
                                                                class="error">{{ $message }}</span>
                                                        @enderror
                                                </h6>
                                            </td>
                                            <td colspan="2">
                                                <button class="btn btn-warning" wire:click="UpdateOrder">{{__('lang.update')}}</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>

                            <a href="{{route('backend.import')}}" class="btn btn-warning">{{__('lang.back')}}</a>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- |||||||||||||||| Modal Edit Price Qty|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| --}}
    <div class="modal fade" id="modal-edit" wire:ignore>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('lang.edit') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" wire:model="hiddenId">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('lang.qty') }}</label>
                                <input wire:model="qty" type="number" class="form-control">
                                @error('qty')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>ເປັນເງິນ</label>
                                <input  type="number" class="form-control" readonly wire:model='subtotal'>
                                {{-- @error('subtotal')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default"
                        data-dismiss="modal">{{ __('lang.cancel') }}</button>
                    <button wire:click="Update" type="button" class="btn btn-primary"><i
                            class="fas fa-save"></i>{{ __('lang.save') }}</button>
                </div>
            </div>
        </div>
    </div>


    <div wire:ignore.self class="modal fade" id="modal-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title"><i class="fa fa-trash text-white"></i></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    
                    <h4 class="text-center">{{__('lang.do_you_want_to_delete')}}{{__('lang.bo')}}?</h4>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">{{__('lang.cancel')}}</button>
                    <button wire:click="Delete()" type="button"

                    class="btn btn-success">{{__('lang.ok')}}</button>

                </div>
            </div>
        </div>
    </div>

</div>
@push('scripts')
    <script>
        window.addEventListener('show-modal-edit', event => {
            $('#modal-edit').modal('show');
        })
        window.addEventListener('hide-modal-edit', event => {
            $('#modal-edit').modal('hide');
        })
        window.addEventListener('show-modal-delete', event => {
            $('#modal-delete').modal('show');
        })
        window.addEventListener('hide-modal-delete', event => {
            $('#modal-delete').modal('hide');
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#selectProduct').select2();
            $('#selectProduct').on('change', function(e) {
                var data = $('#selectProduct').select2("val");
                @this.set('product_id', data);
            });
        });
        $(document).ready(function() {
            $('#selectSupplier').select2();
            $('#selectMember').on('change', function(e) {
                var data = $('#selectSupplier').select2("val");
                @this.set('member_id', data);
            });
        });
    </script>

    <script type="text/javascript">
        $('.money').simpleMoneyFormat();
    </script>
@endpush
