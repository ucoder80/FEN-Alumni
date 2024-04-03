<div wire:poll>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h6><i class="fas fa-chart-line"></i>
                        ລາຍງານ
                        <i class="fa fa-angle-double-right"></i>
                        ການຂາຍໃຫ້ລູກຄ້າ
                    </h6>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item active">ການຂາຍໃຫ້ລູກຄ້າ</li>
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="date" wire:model="start_date" class="form-control">
                                    </div>
                                </div><!-- end div-col -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="date" wire:model="end_date" class="form-control">
                                    </div>
                                </div><!-- end div-col -->
                                <div class="col-md-2">
                                    <div wire:ignore class="form-group">
                                        <select wire:model.live="type" id="type" class="form-control">
                                            <option value="">ເລືອກ-ປະເພດເງິນ
                                            </option>
                                            <option value="1">ເງິນສົດ</option>
                                            <option value="2">ເງິນໂອນ</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- @foreach ($rolepermissions as $items)
                                @if ($items->permissionname->name == 'action_report_sale') --}}
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {{-- <button wire:click="sub()" class="btn btn-primary"><i
                                                class="fas fa-file-pdf"></i> ສະເເດງ</button> --}}
                                        <button class="btn btn-info" id="print"><i class="fas fa-print"></i>
                                            ປິ່ຣນ</button>
                                    </div>
                                </div><!-- end div-col -->
                                {{-- @endif
                                @endforeach --}}
                            </div><!-- end div-row -->
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="right_content">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <h6>ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ ສັນຕິພາບ ເອກະລາດ</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <h6>ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາ ຖາວອນ</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                ============= <span> <i style="font-size: 30px"
                                                        class="fas fa-yin-yang text-info"></i></span> =============
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 text-center">
                                                @if (!empty($about))
                                                    <img src="{{ asset($about->logo) }}"
                                                        class="brand-image-xl img-circle elevation-2" height="80"
                                                        width="80">
                                                @else
                                                    <img src="{{ asset('logo/noimage.jpg') }}"
                                                        class="brand-image-xl img-circle elevation-2" height="80"
                                                        width="80">
                                                @endif
                                            </div>
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6 text-right">
                                                {{-- <h6>ເລກທີ: {{ $this->billNumber }}</h6> --}}
                                                <h6>ວັນທີ່ພິມ: {{ date('d/m/Y') }}</h6>
                                                <h6>ເວລາ: {{ date('H:i:s') }}</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h5 class="text-center">
                                                    @if (!empty($about))
                                                        {{ $about->name_la }}
                                                    @endif
                                                </h5>
                                                <h6 class="text-sm"><i class="fas fa-phone-alt"></i> ຕິດຕໍ່:
                                                    @if (!empty($about))
                                                        {{ $about->phone }}
                                                    @endif
                                                    <h6 class="text-sm"><i class="fas fa-envelope"></i> ອີເມວ:
                                                        @if (!empty($about))
                                                            {{ $about->email }}
                                                        @endif
                                                        <h6 class="text-sm"><i class="fas fa-hospital"></i> ທີ່ຕັ້ງ:
                                                            @if (!empty($about))
                                                                {{ $about->address }}
                                                            @endif
                                                        </h6>
                                            </div>
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <h4><u><b>ລາຍງານ-ການຂາຍໃຫ້ລູກຄ້າ</b></u></h4>
                                                <h4><b>ວັນທີ່:
                                                        @if (!empty($start_date))
                                                            {{ date('d-m-Y', strtotime($start_date)) }}
                                                        @endif
                                                        ຫາ ວັນທີ່:
                                                        @if (!empty($end_date))
                                                            {{ date('d-m-Y', strtotime($end_date)) }}
                                                        @endif
                                                    </b></h4>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-striped table-hover responsive">
                                                    <thead>
                                                        <tr class="text-center bg-gradient-info text-bold">
                                                            <th>ລຳດັບ</th>
                                                            <th>ວັນທີ</th>
                                                            <th>ລະຫັດ</th>
                                                            <th>ລູກຄ້າ</th>
                                                            <th>ຍອດລວມ</th>
                                                            <th>ປະເພດ</th>
                                                            <th>ສະຖານະ</th>
                                                            <th>ຜູ້ສ້າງ</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $no = 1 @endphp
                                                        @foreach ($data as $item)
                                                            <tr class="text-center">
                                                                <td>{{ $no++ }}</td>
                                                                {{-- <td class="text-center">
                                                                    <a href="javascript:void(0)"
                                                                        wire:click="ShowDetail({{ $item->id }})">{{ $item->code }}</a>
                                                                </td> --}}
                                                                <td>{{ date('d/m/Y', strtotime($item->created_at)) }}
                                                                </td>
                                                                <td class="text-center">
                                                                    @if (!empty($item->code))
                                                                        {{ $item->code }}
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if (!empty($item->customer))
                                                                        {{ $item->customer->name_lastname }} <br>
                                                                        <i class="fas fa-phone-alt"></i>
                                                                        {{ $item->customer->phone }}
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    {{ number_format($item->total) }} ₭
                                                                </td>
                                                                <td>
                                                                    @if ($item->type == 1)
                                                                        <span class="text-success"><i
                                                                                class="fas fa-hand-holding-usd"></i>
                                                                            ເງິນສົດ</span>
                                                                    @elseif($item->type == 2)
                                                                        <span class="text-danger"><i
                                                                                class="fas fa-hand-holding-usd"></i>
                                                                            ເງິນໂອນ</span>
                                                                    @endif
                                                                </td>
                                                                <td class="text-center">
                                                                    @if ($item->status == 1)
                                                                        <span class="text-success"><i
                                                                                class="fas fa-check-circle"></i>
                                                                            ສຳເລັດ</span>
                                                                    @endif
                                                                </td>
                                                                <td class="text-center">
                                                                    @if (!empty($item->employee))
                                                                        {{ $item->employee->name_lastname }}
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        <tr class="text-center">
                                                            <td class="bg-light text-right" colspan="6">
                                                                <i>
                                                                    <h5><b>ລວມເງິນທັງໝົດ</b></h5>
                                                                </i>
                                                            </td>
                                                            <td colspan="2" class="text-left bg-light">
                                                                <h5><b>{{ number_format($sum_total) }} ₭</b></h5>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body-->
                    </div><!-- end card -->
                </div>
            </div>
        </div>
    </section>
</div>
@push('scripts')
    <script>
        window.addEventListener('show-modal-detail', event => {
            $('#modal-detail').modal('show');
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
