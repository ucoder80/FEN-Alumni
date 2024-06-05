<div wire:poll>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5><i class="fas fa-database"></i>
                        ຈັດການຂໍ້ມູນ
                        <i class="fa fa-angle-double-right"></i>
                        ປີສົກຮຽນ
                    </h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">ໜ້າຫຼັກ</a>
                        </li>
                        <li class="breadcrumb-item active">ປີສົກຮຽນ</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    @foreach ($function_available as $item1)
    @if ($item1->function->name == 'action_15')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-befault">
                        <div class="card-header bg-light">
                            <label><i class="fa fa-plus text-primary"></i>
                                ເພີ່ມໃຫມ່/ແກ້ໄຂ</label>
                        </div>
                        <form>
                            <div class="card-body">
                                <input type="hidden" wire:model="hiddenId" value="{{ $ID }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>ສົກຮຽນປີ</label>
                                        <div class="form-group">
                                            <select wire:model="start_year" id="start_year"
                                                class="form-control @error('start_year') is-invalid @enderror">
                                                <option value="" selected>ເລືອກ-ປີ</option>
                                                @for ($start_year = 1950; $start_year <= 2050; $start_year++)
                                                    <option value="{{ $start_year }}">ປີ-{{ $start_year }}</option>
                                                @endfor
                                            </select>
                                            @error('start_year')
                                                <span style="color: red" class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label>ເຖິງປີ</label>
                                        <div class="form-group">
                                            <select wire:model="end_year" id="end_year"
                                                class="form-control @error('end_year') is-invalid @enderror">
                                                <option value="" selected>ເລືອກ-ປີ</option>
                                                @for ($end_year = 1950; $end_year <= 2050; $end_year++)
                                                    <option value="{{ $end_year }}">ປີ-{{ $end_year }}</option>
                                                @endfor
                                            </select>
                                            @error('end_year')
                                                <span style="color: red" class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label>ລຸ້ນທີ່</label>
                                        <div class="form-group">
                                            <input wire:model="genderation" type="text"
                                                class="form-control @error('genderation') is-invalid @enderror"
                                                placeholder="ປ້ອນຂໍ້ມູນ">
                                            @error('genderation')
                                                <span class="error" style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                {{-- @foreach ($function_available as $item1)
                                @if ($item1->function->name == 'Access_72') --}}
                                <div class="d-flex justify-content-between md-2">
                                    <button wire:click="resetflied" type="button" class="btn btn-warning"><i
                                            class="fa fa-refresh" aria-hidden="true"></i>
                                        ຣີເຊັດ</button>
                                    <button wire:click="store" type="button" class="btn btn-success fas fa-save">
                                        ບັນທຶກ</button>
                                </div>
                                {{-- @endif
                                @endforeach --}}
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="row">
                                <div class="col-md-5">
                                    <label></label>
                                </div>
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-4">
                                    <input wire:model.live="search" type="text" class="form-control"
                                        placeholder="ຄົ້ນຫາ...">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsvie">
                                <table class="table table-borderless tabel-striped">
                                    <thead class="bg-light">
                                        <tr class="text-center">
                                            <th>ລຳດັບ</th>
                                            <th>ສົກຮຽນປີ</th>
                                            <th>ເຖິງປີ</th>
                                            <th>ລຸ້ນທີ່</th>
                                            <th>ຈັດການ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($data as $item)
                                            <tr class="text-center">
                                                <td>
                                                    {{ $i++ }}
                                                </td>
                                                <td>
                                                    @if (!empty($item->start_year))
                                                        {{ $item->start_year }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (!empty($item->end_year))
                                                        {{ $item->end_year }}
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $item->genderation }}
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button wire:click="edit(' {{ $item->id }} ')"
                                                            type="button" class="btn btn-warning btn-sm">
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                        <button wire:click="showdelete(' {{ $item->id }} ')"
                                                            type="button" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-times-circle" aria-hidden="true">
                                                            </i></button>
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
    @endif
    @endforeach

    <!-- Modal-Delete -->
    <div wire:ignore.self class="modal fade" id="modal-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title"><i class="fa fa-trash"></i> ລຶບອອກ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" wire:model="hiddenId" value="{{ $ID }}">
                    <h3 class="text-center">ທ່ານຕ້ອງການລຶບ {{ $this->genderation }} ບໍ່?</h3>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> ຍົກເລີກ</button>
                    <button wire:click="destroy({{ $ID }})" type="button" class="btn btn-success"><i
                            class="fa fa-trash"></i>ຕົກລົງ</button>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.backend.data-store.modal-script')
</div>
