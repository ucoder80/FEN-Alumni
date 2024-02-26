<div wire:poll>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5><i class="fas fa-cog"></i>
                        {{ __('lang.settings') }}
                        <i class="fa fa-angle-double-right"></i>
                        {{ __('lang.car') }}
                    </h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">{{ __('lang.home') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('lang.car') }}</li>
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
                                @foreach ($function_available as $item1)
                                    @if ($item1->function->name == 'Access_75')
                                        <div class="col-md-1">
                                            <a href="javascript:ovid(0)" wire:click="create"
                                                class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i>
                                                {{ __('lang.add') }}</a>
                                        </div>
                                    @endif
                                @endforeach
                                <div class="col-md-2"></div>
                                <div class="col-md-3">
                                    @if (auth()->user()->role_id == 1)
                                        <div class="form-group">
                                            <select wire:model="select_branches_id" name="" id=""
                                                class="form-control">
                                                <option value="">{{ __('lang.select') }}{{ __('lang.branch') }}
                                                </option>
                                                @foreach ($get_all_branches as $item)
                                                    <option value="{{ $item->id }}">
                                                        @if (Config::get('app.locale') == 'lo')
                                                            {{ $item->name_la }}
                                                        @elseif(Config::get('app.locale') == 'en')
                                                            {{ $item->name_en }}
                                                        @else
                                                            {{ $item->name_cn }}
                                                        @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-3" wire:ignore>
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
                                </div>
                                <div class="col-md-3">
                                    <input wire:model.live="search" type="text" class="form-control"
                                        placeholder="{{ __('lang.search') }}">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>{{ __('lang.no') }}</th>
                                            @if (auth()->user()->role_id == '1')
                                                <th>{{ __('lang.branch') }}</th>
                                            @endif
                                            <th>{{ __('lang.code') }}</th>
                                            <th>{{ __('lang.image') }}</th>
                                            <th>{{ __('lang.name') }}</th>
                                            <th>{{ __('lang.car_type') }}</th>
                                            <th>{{ __('lang.engine_number') }}</th>
                                            <th>{{ __('lang.tank_number') }}</th>
                                            <th>{{ __('lang.register_number') }}</th>
                                            <th>{{ __('lang.status') }}</th>
                                            <th>{{ __('lang.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($data as $item)
                                            <tr class="text-center">
                                                <td>{{ $i++ }}</td>
                                                @if (auth()->user()->role_id == '1')
                                                    <td>
                                                        @if (Config::get('app.locale') == 'lo')
                                                            {{ !empty($item->branches->name_la) ? $item->branches->name_la : '' }}
                                                        @elseif(Config::get('app.locale') == 'en')
                                                            {{ !empty($item->branches->name_en) ? $item->branches->name_en : '' }}
                                                        @else
                                                            {{ !empty($item->branches->name_cn) ? $item->branches->name_cn : '' }}
                                                        @endif
                                                    </td>
                                                @endif
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
                                                <td>{{ !empty($item->name) ? $item->name : '' }}</td>
                                                <td>{{ !empty($item->car_types->name) ? $item->car_types->name : '' }}
                                                </td>

                                                <td>{{ !empty($item->engine_number) ? $item->engine_number : '' }}</td>
                                                <td>{{ !empty($item->tank_number) ? $item->tank_number : '' }}</td>
                                                <td>{{ !empty($item->register_number) ? $item->register_number : '' }}
                                                </td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="text-success">{{ __('lang.empty') }}</span>
                                                    @elseif($item->status == 2)
                                                        <span class="text-warning">{{ __('lang.not_empty') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        @foreach ($function_available as $item1)
                                                            @if ($item1->function->name == 'Access_76')
                                                                <button wire:click="edit('{{ $item->id }}')"
                                                                    type="button" class="btn btn-warning btn-sm"><i
                                                                        class="fa fa-edit"></i></button>
                                                            @endif
                                                        @endforeach
                                                        @foreach ($function_available as $item1)
                                                            @if ($item1->function->name == 'Access_77')
                                                                <button wire:click="showDestory('{{ $item->id }}')"
                                                                    type="button" class="btn btn-danger btn-sm"><i
                                                                        class="fa fa-times-circle"></i></button>
                                                            @endif
                                                        @endforeach
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
    {{-- <div wire:ignore.self class="modal fade" id="modal-add">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title"><i class="fa fa-plus text-success"></i> {{ __('lang.add') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
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
                                        style="background-image: url({{ asset('images/noimage.jpg') }});">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <input type="hidden" wire:model="hiddenId">
                        <div class="col-md-4" wire:ignore>
                            @if (auth()->user()->role_id == 1)
                                <label>{{ __('lang.branch') }} <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <select wire:model="branches_id" name="" id="search_branches"
                                        class="form-control @error('branches_id') is-invalid @enderror">
                                        <option value="">{{ __('lang.select') }}</option>
                                        @foreach ($get_all_branches as $item)
                                            <option value="{{ $item->id }}">
                                                @if (Config::get('app.locale') == 'lo')
                                                    {{ $item->name_la }}
                                                @elseif(Config::get('app.locale') == 'en')
                                                    {{ $item->name_en }}
                                                @else
                                                    {{ $item->name_cn }}
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('branches_id')
                                        <span class="error"
                                            style="color: red;">{{ __('lang.please_fill_information_first') }}</span>
                                    @enderror
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{ __('lang.car_type') }} <span class="text-danger">*</span></label>
                                <div class="input-group row">
                                    <select wire:model="car_types_id" id=""
                                        class="form-control @error('car_types_id') is-invalid @enderror">
                                        <option value="" selected>{{ __('lang.select') }}</option>
                                        @foreach ($car_types as $item)
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
                                @error('car_types_id')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""> {{ __('lang.name') }} <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    wire:model="name" placeholder="{{ __('lang.enter_the_data') }}" />
                                @error('name')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""> {{ __('lang.engine_number') }} <span
                                        class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('engine_number') is-invalid @enderror"
                                    wire:model="engine_number" placeholder="{{ __('lang.enter_the_data') }}">
                                @error('engine_number')
                                    <span class="error" style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""> {{ __('lang.tank_number') }} <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('tank_number') is-invalid @enderror"
                                    wire:model="tank_number" placeholder="{{ __('lang.enter_the_data') }}">
                                @error('tank_number')
                                    <span class="error" style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""> {{ __('lang.register_number') }} <span
                                        class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('register_number') is-invalid @enderror"
                                    wire:model="register_number" placeholder="{{ __('lang.enter_the_data') }}">
                                @error('register_number')
                                    <span class="error" style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">{{ __('lang.description') }}</label>
                                <textarea wire:model="note" id="" cols="30" rows="4" class="form-control"
                                    placeholder="{{ __('lang.input') }}"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('lang.cancel') }}</button>
                    <button wire:click="Store" type="button" class="btn btn-success"><i class="fa fa-floppy-o"></i>
                        {{ __('lang.save') }}</button>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- /.modal-edit -->
    {{-- <div wire:ignore.self class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title"><i class="fa fa-pencil-square-o text-warning" aria-hidden="true"></i>
                        {{ __('lang.edit') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="container">
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' wire:model="image" id="imageUpload2"
                                        accept=".png, .jpg, .jpeg" />
                                    <label for="imageUpload2"></label>
                                </div>
                                @if ($image)
                                    <div class="avatar-preview">
                                        <img id="imagePreview2" src="{{ asset($image->temporaryUrl()) }}"
                                            alt="" width="120px;">
                                    </div>
                                @else
                                    @if ($newimage)
                                        <div class="avatar-preview">
                                            <img id="imagePreview2" src="{{ asset($newimage) }}" alt=""
                                                width="120px;">
                                        </div>
                                    @else
                                        <div class="avatar-preview">
                                            <div id="imagePreview2"
                                                style="background-image: url({{ asset('images/noimage.jpg') }});">
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            @if (auth()->user()->role_id == 1)
                                <label>{{ __('lang.branch') }} <span style="color: red;">*</span></label>
                                <div class="form-group">
                                    <select wire:model="branches_id" name="" id=""
                                        class="form-control @error('branches_id') is-invalid @enderror">
                                        <option value="">{{ __('lang.select') }}</option>
                                        @foreach ($get_all_branches as $item)
                                            <option value="{{ $item->id }}">
                                                @if (Config::get('app.locale') == 'lo')
                                                    {{ $item->name_la }}
                                                @elseif(Config::get('app.locale') == 'en')
                                                    {{ $item->name_en }}
                                                @else
                                                    {{ $item->name_cn }}
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('branches_id')
                                        <span class="error"
                                            style="color: red;">{{ __('lang.please_fill_information_first') }}</span>
                                    @enderror
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{ __('lang.status') }} <span class="text-danger">*</span></label>
                                <div class="input-group row">
                                    <select wire:model.live="status"
                                        class="form-control @error('status') is-invalid @enderror">
                                        <option value="" selected>{{ __('lang.select') }}</option>
                                        <option value="1">{{ __('lang.empty') }}</option>
                                        <option value="2">{{ __('lang.not_empty') }}</option>
                                    </select>
                                    @error('status')
                                        <span style="color: red" class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{ __('lang.car_type') }} <span class="text-danger">*</span></label>
                                <div class="input-group row">
                                    <select wire:model.live="car_types_id"
                                        class="form-control @error('car_types_id') is-invalid @enderror">
                                        <option value="" selected>{{ __('lang.select') }}</option>
                                        @foreach ($car_types as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('car_types_id')
                                        <span style="color: red" class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">{{ __('lang.name') }} <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    wire:model="name" placeholder="{{ __('lang.enter_the_data') }}" />
                                @error('name')
                                    <span style="color: red"
                                        class="error">{{ __('lang.please_fill_information_first') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""> {{ __('lang.engine_number') }} <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" wire:model="engine_number"
                                    placeholder="{{ __('lang.enter_the_data') }}">
                                @error('engine_number')
                                    <span class="error"
                                        style="color: red;">{{ __('lang.please_fill_information_first') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""> {{ __('lang.tank_number') }} <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" wire:model="tank_number"
                                    placeholder="{{ __('lang.enter_the_data') }}">
                                @error('tank_number')
                                    <span class="error"
                                        style="color: red;">{{ __('lang.please_fill_information_first') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""> {{ __('lang.register_number') }} <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" wire:model="register_number"
                                    placeholder="{{ __('lang.enter_the_data') }}">
                                @error('register_number')
                                    <span class="error"
                                        style="color: red;">{{ __('lang.please_fill_information_first') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">{{ __('lang.description') }}</label>
                                <textarea wire:model="note" id="" cols="30" rows="4" class="form-control"
                                    placeholder="{{ __('lang.input') }}"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('lang.cancel') }}</button>
                    <button wire:click="creatEdit" type="button" class="btn btn-warning"><i class="fa fa-edit"></i>
                        {{ __('lang.edit') }}</button>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- /.modal-delete-->
    {{-- <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title"><i class="fa fa-trash"> </i> {{ __('lang.delete') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h3 class="text-center">{{ __('lang.do_you_want_to_delete') }}</h3>
                </div>
                <div class="modal-footer justify-content-between">

                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('lang.cancel') }}</button>
                    <button wire:click="Delete({{ $hiddenId }})" type="button" class="btn btn-success"><i
                            class="fa fa-trash"></i> {{ __('lang.ok') }}</button>
                </div>
            </div>
        </div>
    </div> --}}
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
