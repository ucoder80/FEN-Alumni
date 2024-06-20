<div wire:poll>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5><i class="nav-icon fas fa-tachometer-alt"></i> ໜ້າຫຼັກ</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item active">ໜ້າຫຼັກ</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    @foreach ($function_available as $item1)
    @if ($item1->function->name == 'action_1')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                {{-- <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h4>{{ number_format($this->sum_total_salary) }} ₭</h4>
                            <h5>ລວມຍອດການຈ່າຍເງິນເດືອນ</h5>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">ເບິ່ງລາຍລະອຽດ <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div> --}}
                <!-- ./col -->
                {{-- <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h4>{{ $this->count_position }} ຕໍາແໜ່ງ</h4>
                            <h5>ຕຳແໜ່ງວຽກທັງຫມົດ</h5>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">ເບິ່ງລາຍລະອຽດ <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div> --}}

                <!-- ./col -->
            </div>
            <!-- /.row -->

            <div class="row">
                {{-- <div class="col-md-6 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fas fa-cart-arrow-down"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text pt-1">ຈຳນວນສັ່ງຊື້ນຳຜູ້ສະຫນອງ</span>
                            <span class="info-box-number">{{ $this->count_order }} <small> ລາຍການ</small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="fas fa-cart-plus"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text pt-1">ຈຳນວນຂາຍໃຫ້ລູກຄ້າ</span>
                            <span class="info-box-number">{{ $this->count_sale }} <small> ລາຍການ</small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div> --}}
                <!-- /.col -->
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon text-white" style="background-color: {{ !empty($about->b_sidebar_color) ? $about->b_sidebar_color : '' }}"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text pt-1"><h4>ຜູ້ໃຊ້ທັງຫມົດ</h4></span>
                            <span class="info-box-number"><h4>{{ $this->count_user }} ຄົນ</h4></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon text-white" style="background-color: {{ !empty($about->b_sidebar_color) ? $about->b_sidebar_color : '' }}"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text pt-1"><h4>ສິດເກົ່າທັງຫມົດ</h4></span>
                            <span class="info-box-number"><h4>{{ $this->old_student }} ຄົນ</h4></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon text-white" style="background-color: {{ !empty($about->b_sidebar_color) ? $about->b_sidebar_color : '' }}"><i class="fas fa-school"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text pt-1"><h4>ສະຖານທີ່ເຮັດວຽກທັງຫມົດ</h4></span>
                            <span class="info-box-number"><h4>{{ $this->work_place }} ບ່ອນ</h4></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon text-white" style="background-color: {{ !empty($about->b_sidebar_color) ? $about->b_sidebar_color : '' }}"><i class="fas fa-book-open"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text pt-1"><h4>ພາກວິຊາທັງຫມົດ</h4></span>
                            <span class="info-box-number"><h4>{{ $this->department }} ພາກ</h4></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                {{-- <div class="col-md-6 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon text-white" style="background-color: {{ !empty($about->b_sidebar_color) ? $about->b_sidebar_color : '' }}"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text pt-1">ລູກຄ້າທັງຫມົດ</span>
                            <span class="info-box-number">{{ $this->count_employee }} <small> ຄົນ</small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div> --}}
                <!-- /.col -->
            </div>
            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered responsive">

                            <thead>
                                <tr class="text-center bg-info text-md">
                                    <th colspan="8"><i class="fas fa-cart-plus"></i> ລາຍການສັ່ງຊື້ຜ່ານເວບໄຊລ່າສຸດ
                                    </th>
                                </tr>
                                <tr class="text-center bg-light">
                                    <th>ລຳດັບ</th>
                                    <th>ວັນທີ</th>
                                    <th>ລະຫັດ</th>
                                    <th>ລູກຄ້າ</th>
                                    <th>ເປັນເງິນ</th>
                                    <th>ສະຖານະ</th>
                                    <th>ຈັດການ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $stt = 1;    @endphp
                                @foreach ($sales as $item)
                                    <tr>
                                        <td class="text-center">{{ $stt++ }}</td>
                                        <td class="text-center">{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                        <td class="text-center">{{ $item->code }}</td>
                                        <td class="text-center">
                                            @if (!empty($item->customer))
                                                {{ $item->customer->name_lastname }} <br><i
                                                    class="fas fa-phone-alt"></i> {{ $item->customer->phone }}
                                            @endif
                                        </td>
                                        <td class="text-center">{{ number_format($item->total) }} ₭</td>
                                        <td class="text-center">
                                            @if ($item->status == 1)
                                                <span class="text-success"><b> <i class="fas fa-plus"></i>
                                                        ໃຫມ່</b></span>
                                            @elseif ($item->status == 2)
                                                <span class="text-warning">{{ __('lang.tran_pay') }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('backend.sale') }}" class="btn btn-info btn-sm"><i
                                                    class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="float-right">
                            {{ $sales->links() }}
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @endif
    @endforeach
</div>
