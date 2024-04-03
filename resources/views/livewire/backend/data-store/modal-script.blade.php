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
        window.addEventListener('show-modal-popup', event => {
            $('#modal-popup').modal('show');
        })
        window.addEventListener('hide-modal-popup', event => {
            $('#modal-popup').modal('hide');
        })
        window.addEventListener('show-modal-clear-all-cart', event => {
            $('#modal-clear-all-cart').modal('show');
        })
        window.addEventListener('hide-modal-clear-all-cart', event => {
            $('#modal-clear-all-cart').modal('hide');
        })
        window.addEventListener('show-modal-import', event => {
            $('#modal-import').modal('show')
        })
        window.addEventListener('hide-modal-import', event => {
            $('#modal-import').modal('hide')
        })
        window.addEventListener('show-modal-paymoney', event => {
            $('#modal-paymoney').modal('show')
        })
        window.addEventListener('hide-modal-paymoney', event => {
            $('#modal-paymoney').modal('hide')
        })
        window.addEventListener('show-modal-update-item', event => {
            $('#modal-update-item').modal('show')
        })
        window.addEventListener('hide-modal-update-item', event => {
            $('#modal-update-item').modal('hide')
        })
        window.addEventListener('show-modal-sales', event => {
            $('#modal-sales').modal('show')
        })
        window.addEventListener('hide-modal-sales', event => {
            $('#modal-sales').modal('hide')
        })
        window.addEventListener('show-modal-bill', event => {
            $('#modal-bill').modal('show')
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#supplier_id').select2();
            $('#supplier_id').on('change', function(e) {
                var data = $('#supplier_id').select2("val");
                @this.set('supplier_id', data);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#customer_id').select2();
            $('#customer_id').on('change', function(e) {
                var data = $('#customer_id').select2("val");
                @this.set('customer_id', data);
            });
        });
    </script>
    <script>
        $('#product_note').summernote({
            placeholder: 'ລາຍລະອຽດ',
            height: 150,
            callbacks: {
                onChange: function(contents, $editable) {
                    @this.set('product_note', contents);
                }
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#product_type_id').select2();
            $('#product_type_id').on('change', function(e) {
                var data = $('#product_type_id').select2("val");
                @this.set('product_type_id', data);
            });
        });
    </script>
        <script>
            $(document).ready(function() {
                $('#print').click(function() {
                    printDiv();
    
                    function printDiv() {
                        var printContents = $(".right_content").html();
                        var originalContents = document.body.innerHTML;
                        document.body.innerHTML = printContents;
                        window.print();
                        document.body.innerHTML = originalContents;
                    }
                    location.reload();
                });
            });
        </script>
@endpush
