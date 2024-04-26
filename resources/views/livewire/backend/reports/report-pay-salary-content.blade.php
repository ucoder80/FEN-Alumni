<div wire:poll>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h6><i class="fas fa-chart-line"></i>
                        ລາຍງານ
                        <i class="fa fa-angle-double-right"></i>
                        ເບີກຈ່າຍເງິນເດືອນ
                    </h6>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item active">ເບີກຈ່າຍເງິນເດືອນ</li>
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
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="date" wire:model="start_date" class="form-control">
                                    </div>
                                </div><!-- end div-col -->
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="date" wire:model="end_date" class="form-control">
                                    </div>
                                </div><!-- end div-col -->
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select wire:model="years" id="years"
                                            class="form-control @error('years') is-invalid @enderror">
                                            <option value="" selected>ເລືອກ-ປີ</option>
                                            @for ($yearss = 1950; $yearss <= 2050; $yearss++)
                                                <option value="{{ $yearss }}">ປີ-{{ $yearss }}</option>
                                            @endfor
                                        </select>
                                        @error('years')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select wire:model="month" id="month"
                                            class="form-control @error('month') is-invalid @enderror">
                                            <option value="" selected>ເລືອກ-ເດືອນ</option>
                                            @for ($monthh = 1; $monthh <= 12; $monthh++)
                                                <option value="{{ $monthh }}">ເດືອນ-{{ $monthh }}</option>
                                            @endfor
                                        </select>
                                        @error('month')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div wire:ignore class="form-group">
                                        <select wire:model="employee_id" id="employee_id"
                                            class="form-control @error('employee_id') is-invalid @enderror">
                                            <option value="">
                                                ພະນັກງານ
                                            </option>
                                            @foreach ($employees as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name_lastname }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="col-md-3">
                                    <input wire:model.live="search" type="text" class="form-control"
                                        placeholder="ຄົ້ນຫາ">
                                </div> --}}
                                <div class="col-md-2">
                                    <div class="btn-group">
                                        <button type="button" id="print" class="btn btn-info btn-md"><i
                                                class="fas fa-print"></i> ພິມອອກ</button>
                                    </div>
                                </div>
                            </div>
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
                                                    <h4><u><b>ລາຍງານ-ເບີກຈ່າຍເງິນເດືອນ</b></u></h4>
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
                                                    <thead class="bg-light">
                                                        <tr>
                                                            <th colspan="9" class="text-right">
                                                                <h3><i>ລວມຍອດຈ່າຍເງິນເດືອນໃຫ້ພະນັກງານ</i></h3>
                                                            </th>
                                                            <th colspan="2">
                                                                <h3 class="text-bold">{{ number_format($sum_total_salary) }} ₭</h3>
                                                            </th>
                                                        </tr>
                                                        <tr style="text-align: center" class="bg-info">
                                                            <th>ລຳດັບ</th>
                                                            <th>ຊື່ ນາມສະກຸນ</th>
                                                            <th>ເພດ</th>
                                                            <th>ເດືອນ/ປີ</th>
                                                            <th>ຂັ້ນເງິນເດືອນ</th>
                                                            <th>ລວມເງິນ</th>
                                                            <th>ປະເພດ</th>
                                                            <th>ສະຖານະ</th>
                                                            <th>ວັນທີຖອນ</th>
                                                            <th>ຜູ້ສ້າງ</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @foreach ($data as $item)
                                                            <tr style="text-align: center">
                                                                <td>
                                                                    {{ $i++ }}
                                                                </td>
                                                                <td>
                                                                    @if (!empty($item->employee))
                                                                        {{ $item->employee->name_lastname }}
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if (!empty($item->employee))
                                                                        @if ($item->employee->gender == 1)
                                                                            <span> ຍິງ</span>
                                                                        @else
                                                                            <span> ຊາຍ</span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    {{ $item->month }}/{{ $item->years }}
                                                                </td>
                                                                <td>
                                                                    @if (!empty($item->employee->salary))
                                                                        {{ number_format($item->employee->salary->salary) }} ₭
                                                                    @endif
                                                                </td>
                                                                <td class="text-bold">
                                                                    @if (!empty($item->total_salary))
                                                                        {{ number_format($item->total_salary) }} ₭
                                                                    @endif
                                                                </td>
                                                                <td class="text-bold">
                                                                    @if (!empty($item->type))
                                                                        @if ($item->type == 1)
                                                                            <span class="text-primary">ເງິນສົດ</span>
                                                                        @else
                                                                            <span class="text-danger">ເງິນໂອນ</span>
                                                                        @endif
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($item->status == 1)
                                                                        <span class="text-warning"><i class="fas fa-warning"></i>
                                                                            ຍັງບໍ່ຖອນ</span>
                                                                    @elseif($item->status == 2)
                                                                        <span class="text-success"><i
                                                                                class="fas fa-check-circle"></i> ຖອນສຳເລັດ</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if (!empty($item->date_pay))
                                                                        {{ date('d/m/Y', strtotime($item->date_pay)) }} <br>
                                                                        {{ date('H:i:s', strtotime($item->date_pay)) }}
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if (!empty($item->creator))
                                                                        {{ $item->creator->name_lastname }}
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
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
