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