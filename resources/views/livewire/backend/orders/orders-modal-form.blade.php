{{-- Edit cart --}}
<div class="modal fade" id="modal-popup" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-edit"></i> ແກ້ໄຂ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" wire:model="ID">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ລາຄາຊື້</label>
                            <input wire:model="price" type="text" onkeypress="validate(event)"
                                class="form-control money @error('price') is-invalid @enderror">
                            @error('price')
                                <span style="color: red" class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ຈຳນວນ</label>
                            <input wire:model="qty" min="1" type="number"
                                class="form-control @error('qty') is-invalid @enderror">
                            @error('qty')
                                <span style="color: #ff0000" class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                            class="fas fa-times-circle"></i> ຍົກເລີກ</button>
                    <button wire:click="UpdateQty" type="button" class="btn btn-success"><i
                            class="fas fa-check-circle"></i> ບັນທຶກ</button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Delete all cart --}}
    <div wire:ignore.self class="modal fade" id="modal-clear-all-cart">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title"><i class="fa fa-trash text-white"></i></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <input type="hidden" wire:model="ID">
                    <h4 class="text-center">ທ່ານຕ້ອງການລຶບທັງຫມົດບໍ່?</h4>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-info fas fa-times-circle" data-dismiss="modal"> ປີດ</button>
                    <button wire:click="ClearItem" type="button" class="btn btn-success fas fa-check-circle"> ແມ່ນເເລ້ວ</button>
                </div>
            </div>
        </div>
    </div>