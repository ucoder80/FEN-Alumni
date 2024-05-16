<div wire:poll>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5><i class="fas fa-database"></i>
                        ຈັດການຂໍ້ມູນ
                        <i class="fa fa-angle-double-right"></i>
                        ພາກວິຊາ
                    </h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">ໜ້າຫຼັກ</a>
                        </li>
                        <li class="breadcrumb-item active">ພາກວິຊາ</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

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
                                        <label>ຊື່ພາກວິຊາ-ລາວ</label>
                                        <div class="form-group">
                                            <input wire:model="name_la" type="text"
                                                class="form-control @error('name_la') is-invalid @enderror"
                                                placeholder="ປ້ອນຂໍ້ມູນ">
                                            @error('name_la')
                                                <span class="error" style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label>ຊື່ພາກວິຊາ-ອັງກິດ</label>
                                        <div class="form-group">
                                            <input wire:model="name_en" type="text"
                                                class="form-control @error('name_en') is-invalid @enderror"
                                                placeholder="ປ້ອນຂໍ້ມູນ">
                                            @error('name_en')
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
                                    <button wire:click="store" type="button"
                                        class="btn btn-success fas fa-save"> ບັນທຶກ</button>
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
                                            <th>ຊື່ພາກວິຊາ-ລາວ</th>
                                            <th>ຊື່ພາກວິຊາ-ອັງກິດ</th>
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
                                                    {{ $item->name_la }}
                                                </td>
                                                <td>
                                                    {{ $item->name_en }}
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
                    <h3 class="text-center">ທ່ານຕ້ອງການລຶບ {{ $this->name_la }} ບໍ່?</h3>
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

