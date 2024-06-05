<div wire:poll>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h6><i class="fas fa-chart-line"></i>
                        ລາຍງານ
                        <i class="fa fa-angle-double-right"></i>
                        ຂໍ້ມູນສິດເກົ່າ
                    </h6>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item active">ຂໍ້ມູນສິດເກົ່າ</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    @foreach ($function_available as $item1)
    @if ($item1->function->name == 'action_18')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {{-- <input type="date" wire:model="start_date" class="form-control"> --}}
                                    </div>
                                </div><!-- end div-col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{-- <input type="date" wire:model="end_date" class="form-control"> --}}
                                    </div>
                                </div><!-- end div-col -->
                                <div class="col-md-4">
                                    <div wire:ignore class="form-group">
                                        <select wire:model="education_year_id" id="education_year_id"
                                            class="form-control @error('education_year_id') is-invalid @enderror">
                                            <option value="">
                                                ເລືອກ-ປີສົກຮຽນ
                                            </option>
                                            @foreach ($education_year as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->start_year }} -
                                                    {{ $item->end_year }} 
                                                </option>
                                            @endforeach
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
                                                    <h4><u><b>ລາຍງານ-ຂໍ້ມູນສິດເກົ່າ</b></u></h4>
                                                {{-- <h4><b>ວັນທີ່:
                                                        @if (!empty($start_date))
                                                            {{ date('d-m-Y', strtotime($start_date)) }}
                                                        @endif
                                                        ຫາ ວັນທີ່:
                                                        @if (!empty($end_date))
                                                            {{ date('d-m-Y', strtotime($end_date)) }}
                                                        @endif
                                                    </b></h4> --}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-striped table-hover responsive">
                                                    <thead>
                                                        <tr class="text-center bg-gradient-info text-bold">
                                                            <th>ລຳດັບ</th>
                                                            <th>ຈົບສົກຮຽນ</th>
                                                            <th>ລະຫັດ</th>
                                                            <th>ຮູບ</th>
                                                            <th>ຊື່ ນາມສະກຸນ</th>
                                                            <th>ເພດ</th>
                                                            <th>ບ່ອນເຮັດວຽກ</th>
                                                            <th>ຕຳແຫນ່ງ</th>
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
                                                                <td class="text-center">
                                                                    @if (!empty($item->education_year))
                                                                        {{ $item->education_year->start_year }} -
                                                                        {{ $item->education_year->start_year }} 
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    {{ $item->code }}
                                                                </td>
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
                                                                <td class="text-center">
                                                                    @if (!empty($item->name_lastname))
                                                                        {{ $item->name_lastname }}
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if (!empty($item))
                                                                        @if($item->gender == 1)
                                                                        <span>ຍິງ</span>
                                                                        @else
                                                                        <span>ຊາຍ</span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if (!empty($item->work_place))
                                                                    {{ $item->work_place->name }}
                                                                @endif
                                                                </td>
                                                                <td>
                                                                    @if (!empty($item->position))
                                                                    {{ $item->position->name }}
                                                                @endif
                                                                </td>
                                                                {{-- <td>
                                                                    {{ $item->nationality }}
                                                                </td>
                                                                <td>
                                                                    {{ $item->religion }}
                                                                </td> --}}
                                                                {{-- <td>
                                                                    @if ($item->status == 1)
                                                                        <span class="text-secondary">ໂສດ</span>
                                                                    @elseif($item->status == 2)
                                                                        <span class="text-secondary">ມີແຟນ</span>
                                                                    @elseif($item->status == 3)
                                                                        <span class="text-secondary">ແຕ່ງງານ</span>
                                                                    @elseif($item->status == 4)
                                                                        <span class="text-secondary">ຢ່າຮ້າງ</span>
                                                                    @elseif($item->status == 5)
                                                                        <span class="text-secondary">ແຍກກັນຢູ່</span>
                                                                    @elseif($item->status == 6)
                                                                        <span class="text-secondary">ຮັກເຂົາຂ້າງດຽວ</span>
                                                                    @endif
                                                                </td> --}}
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
    @endif
    @endforeach
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
