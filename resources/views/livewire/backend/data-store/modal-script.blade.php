@push('scripts')
    <script>
        // document.addEventListener('livewire:initialized', function() {
        //     Livewire.on('role_id', () => {
        //         initSelectDrop();
        //     });

        //     function initSelectDrop() {
        //         $('#role_id').select2({
        //             placeholder: '@lang('lang.select')',
        //             allowClear: true
        //         });
        //         $('#role_id').on('change', function(e) {
        //             var data = $(this).val();
        //             @this.set('role_id', data);
        //         });
        //     }
        //     initSelectDrop();
        // });
        document.addEventListener('livewire:initialized', () => {
            @this.on('show-modal-add', (event) => {
                $('#modal-add').modal('show');
            });
        });
        document.addEventListener('livewire:initialized', () => {
            @this.on('show-modal-hide', (event) => {
                $('#modal-add').modal('hide');
            });
        });
        window.addEventListener('show-modal-add-edit', event => {
            $('#modal-add-edit').modal('show');
        })
        window.addEventListener('hide-modal-add-edit', event => {
            $('#modal-add-edit').modal('hide');
        })
        window.addEventListener('show-modal-delete', event => {
            $('#modal-delete').modal('show');
        })
        window.addEventListener('hide-modal-delete', event => {
            $('#modal-delete').modal('hide');
        })
    </script>
    <script>
        // $(document).ready(function() {
        //     $('#village_id').select2();
        //     $('#village_id').on('change', function(e) {
        //         var data = $('#village_id').select2("val");
        //         @this.set('village_id', data);
        //     });
        // });
    </script>
@endpush
