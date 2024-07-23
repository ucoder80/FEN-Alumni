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
                                        {{-- <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="date" wire:model="start_date" class="form-control">
                                            </div>
                                        </div><!-- end div-col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="date" wire:model="end_date" class="form-control">
                                            </div>
                                        </div><!-- end div-col --> --}}
                                        <div class="col-md-3">
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
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select wire:model="subject_id" id="subject_id"
                                                    class="form-control @error('subject_id') is-invalid @enderror">
                                                    <option value="">
                                                        ເລືອກ-ສາຂາວິຊາ
                                                    </option>
                                                    @foreach ($subject as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name_la }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select wire:model="education_system_id" id="education_system_id"
                                                    class="form-control @error('education_system_id') is-invalid @enderror">
                                                    <option value="">
                                                        ເລືອກ-ລະດັບການສືກສາ
                                                    </option>
                                                    @foreach ($education_system as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div wire:ignore class="form-group">
                                                <select wire:model="province_id" id="province_id"
                                                    class="form-control @error('province_id') is-invalid @enderror">
                                                    <option value="">
                                                        ເລືອກ-ແຂວງ
                                                    </option>
                                                    @foreach ($province as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name_la }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select wire:model="district_id" id="district_id"
                                                    class="form-control @error('district_id') is-invalid @enderror">
                                                    <option value="">
                                                        ເລືອກ-ເມືອງ
                                                    </option>
                                                    @foreach ($districts as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name_la }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select wire:model="village_id" id="village_id"
                                                    class="form-control @error('village_id') is-invalid @enderror">
                                                    <option value="">
                                                        ເລືອກ-ບ້ານ
                                                    </option>
                                                    @foreach ($villages as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name_la }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div wire:ignore class="form-group">
                                                <select wire:model="gender" id="gender"
                                                    class="form-control @error('gender') is-invalid @enderror">
                                                    <option value="">
                                                        ເລືອກ-ເພດ
                                                    </option>
                                                        <option value="1">
                                                            ຍິງ
                                                        </option>
                                                        <option value="2">
                                                            ຊາຍ
                                                        </option>
                                                        {{-- <option value="3">
                                                            ອື່ນໆ
                                                        </option> --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {{-- <button wire:click="sub()" class="btn btn-primary"><i
                                                class="fas fa-file-pdf"></i> ສະເເດງ</button> --}}
                                                <button class="btn btn-info" id="print"><i class="fas fa-print"></i>
                                                    ປິ່ຣນ</button>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-3">
                                            <div wire:ignore class="form-group">
                                                <select wire:model="status" id="status"
                                                    class="form-control @error('status') is-invalid @enderror">
                                                    <option value="">
                                                        ເລືອກ-ສະຖານະ
                                                    </option>
                                                    <option value="1">ໂສດ</option>
                                                    <option value="2">ມີແຟນ</option>
                                                    <option value="3">ແຕ່ງງານ</option>
                                                    <option value="4">ຢ່າຮ້າງ</option>
                                                    <option value="5">ແຍກກັນຢູ່</option>
                                                    <option value="6">ຮັກເຂົາຂ້າງດຽວ</option>
                                                </select>
                                            </div>
                                        </div> --}}
                                    </div><!-- end div-row -->
                                                                            {{-- @foreach ($rolepermissions as $items)
                                @if ($items->permissionname->name == 'action_report_sale') --}}
                                {{-- <div class="col-md-3">
                                    <div class="form-group">
                                        <button class="btn btn-info" id="print"><i class="fas fa-print"></i>
                                            ປິ່ຣນ</button>
                                    </div>
                                </div><!-- end div-col --> --}}
                                {{-- @endif
                        @endforeach --}}
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
                                                                class="brand-image-xl img-circle elevation-2"
                                                                height="80" width="80">
                                                        @else
                                                            <img src="{{ asset('logo/noimage.jpg') }}"
                                                                class="brand-image-xl img-circle elevation-2"
                                                                height="80" width="80">
                                                        @endif
                                                    </div>
                                                    <div class="col-md-3"></div>
                                                    <div class="col-md-6 text-right">
                                                        {{-- <h6>ເລກທີ: {{ $this->billNumber }}</h6> --}}
                                                        <h6>ວັນທີ່ພິມ: {{ date('d/m/Y') }}</h6>
                                                        <h6>ເວລາ: {{ date("H:i:s") }}</h6>
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
                                                                <h6 class="text-sm"><i class="fas fa-hospital"></i>
                                                                    ທີ່ຕັ້ງ:
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
                                                                    <th>ສາຂາວິຊາ</th>
                                                                    <th>ລະຫັດ</th>
                                                                    <th>ຮູບ</th>
                                                                    <th>ຊື່ ນາມສະກຸນ</th>
                                                                    <th>ເພດ</th>
                                                                    {{-- <th>ສະຖານະ</th> --}}
                                                                    <th>ບ່ອນເຮັດວຽກ</th>
                                                                    {{-- <th>ຕຳແຫນ່ງ</th> --}}
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
                                                                                {{ $item->education_year->start_year }}
                                                                                -
                                                                                {{ $item->education_year->end_year }}
                                                                            @endif
                                                                        </td>
                                                                        <td class="text-center">
                                                                            @if (!empty($item->subject))
                                                                                {{ $item->subject->name_la }}
                                                                                <br>
                                                                                {{ $item->subject->name_en }}
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            <a href="#" wire:click='show_detail({{ $item->id }})'>{{ $item->code }}</a>
                                                                        </td>
                                                                        <td class="text-center">
                                                                            @if (!empty($item->image))
                                                                                <a
                                                                                    href="{{ asset($item->image) }}"target="_blank">
                                                                                    <img class="rounded"
                                                                                        src="{{ asset($item->image) }}"
                                                                                        width="50px;" height="50px;">
                                                                                </a>
                                                                            @else
                                                                                <img src="https://t4.ftcdn.net/jpg/04/70/29/97/360_F_470299797_UD0eoVMMSUbHCcNJCdv2t8B2g1GVqYgs.jpg"
                                                                                    width="50px;" height="50px;">
                                                                            @endif
                                                                        </td>
                                                                        <td class="text-center">
                                                                            @if (!empty($item->name_lastname))
                                                                                {{ $item->name_lastname }}
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            @if (!empty($item))
                                                                                @if ($item->gender == 1)
                                                                                    <span>ຍິງ</span>
                                                                                @else
                                                                                    <span>ຊາຍ</span>
                                                                                @endif
                                                                            @endif
                                                                        </td>
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
                                                                        <td>
                                                                            @if (!empty($item->work_place))
                                                                                {{ $item->work_place->name }}
                                                                                @else
                                                                                ວ່າງງານ
                                                                            @endif
                                                                        </td>
                                                                        {{-- <td>
                                                                            @if (!empty($item->position))
                                                                                {{ $item->position->name }}
                                                                            @endif
                                                                        </td> --}}
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
    {{-- \\\\\\\\\\\\\\\\\\\\\\\ show detail  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
    <div class="modal fade" id="modal-detail" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-address-book"></i> ປະຫວັດຫຍໍ້ສີດເກົ່າ: {{ $this->code }}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body right_content2">
                    <div class="row">
                        <div class="container">
                            <div wire:ignore.self class="avatar-upload">
                                <div class="avatar-preview">
                                   @if($this->newimage)
                                   <div id="imagePreview"
                                   style="background-image: url({{ asset($this->newimage) }});">
                               </div>
                               @else
                               <div id="imagePreview"
                               style="background-image: url('https://t4.ftcdn.net/jpg/04/70/29/97/360_F_470299797_UD0eoVMMSUbHCcNJCdv2t8B2g1GVqYgs.jpg');">
                           </div>
                                   @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center pt-3">
                        <input type="hidden" wire:model="ID">
                        <div class="col-md-12">
                            <h4><b>{{ $this->name_lastname }} - {{ $this->name_lastname_en }}</b></h4>
                        </div>
                    </div>
                    <table class="table table-hover responsive">
                        <thead class="bg-light text-left">
                            <tr>
                                <th>ເພດ:</th>
                                <th>
                                    @if ($this->gender == 1)
                                        <span>ຍິງ</span>
                                    @else
                                        <span>ຊາຍ</span>
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <th>ເບີໂທ:</th>
                                <th>{{ $this->phone }}</th>
                            </tr>
                            <tr>
                                <th>ວ.ດ.ປ ເກີດ:</th>
                                <th>{{ $this->birtday_date }}</th>
                            </tr>
                            <tr>
                                <th>ທີ່ຢູ່ປະຈຸບັນ: </th>
                                <th>
                                    @if (!empty($this->village_data))
                                        {{ $this->village_data }}
                                    @endif -
                                    @if (!empty($this->district_data))
                                        {{ $this->district_data }}
                                    @endif -
                                    @if (!empty($this->province_data))
                                        {{ $this->province_data }}
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <th>ອີເມວ: </th>
                                <th>{{ $this->email }}</th>
                            </tr>
                            {{-- <tr>
                                <th>ສະຖານະ: </th>
                                <th>
                                    @if ($this->status == 2)
                                        <span>ມີແຟນ</span>
                                    @elseif($this->status == 3)
                                        <span>ແຕ່ງງານ</span>
                                    @elseif($this->status == 4)
                                        <span>ຢ່າຮ້າງ</span>
                                    @elseif($this->status == 5)
                                        <span>ແຍກກັນຢູ່</span>
                                    @elseif($this->status == 6)
                                        <span>ຮັກເຂົາຂ້າງດຽວ</span>
                                    @endif
                                </th>
                            </tr> --}}
                            <tr>
                                <th>ສິດເຂົ້າສູ່ລະບົບ: </th>
                                <th> {{ $this->roles_data }}</th>
                            </tr>
                            {{-- <tr>
                                <th>ສັນຊາດ: </th>
                                <th>{{ $this->nationality }}</th>
                            </tr>
                            <tr>
                                <th>ສາສະຫນາ: </th>
                                <th>{{ $this->religion }}</th>
                            </tr> --}}
                            <tr>
                                <th>ປິຈົບສົກສືກສາ: </th>
                                <th>
                                    @if (!empty($this->education_start_year_data))
                                        {{ $this->education_start_year_data }} -
                                        {{ $this->education_end_year_data }}
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <th>ສາຂາວິຊາຮຽນ: </th>
                                <th>
                                    @if (!empty($this->subject_data))
                                        {{ $this->subject_data }}
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <th>ລະບົບ: </th>
                                <th>
                                    @if (!empty($this->system))
                                        {{ $this->system }} 
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <th>ທຶນການສຶກສາ: </th>
                                <th>
                                    @if (!empty($this->scholarship))
                                        {{ $this->scholarship }} 
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <th>ໂຄງການຈົບຊັ້ນ: </th>
                                <th>
                                    @if (!empty($this->final_report))
                                        {{ $this->final_report }} 
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <th>ອາຈານຊ່ວຍນຳພາ: </th>
                                <th>
                                    @if (!empty($this->advisor))
                                        {{ $this->advisor }} 
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <th>ອາຈານຜູ້ຊ່ວຍນຳພາ: </th>
                                <th>
                                    @if (!empty($this->co_advisor))
                                        {{ $this->co_advisor }} 
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <th>ກຽດນິຍົມ: </th>
                                <th>
                                    @if (!empty($this->grade))
                                        {{ $this->grade }} 
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <th>ຜົນງານນັກສຶກສາ: </th>
                                <th>
                                    @if (!empty($this->performance))
                                        {{ $this->performance }} 
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <th>ສະຖານທີ່ເຮັດວຽກປະຈຸບັນ: </th>
                                <th>
                                    @if (!empty($this->work_place_data))
                                        {{ $this->work_place_data }}
                                    @endif
                                </th>
                            </tr>
                        </thead>
                    </table>
                    {{-- </div> --}}
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary fas fa-times-circle" data-dismiss="modal">
                        ປິດ</button>
                    <button id="print2" type="button" class="btn btn-success"> <i class="fas fa-print"></i>
                    </button>
                </div>
            </div>
        </div>
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
         <script>
            $(document).ready(function() {
                $('#print2').click(function() {
                    printDiv();

                    function printDiv() {
                        var printContents = $(".right_content2").html();
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
</div>
