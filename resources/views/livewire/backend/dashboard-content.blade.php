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
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h5>150,000,000 ກີບ</h5>

                        <p>{{ __('lang.total_seller') }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">ເບິ່ງລາຍລະອຽດ <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h5>50,000,000 ກີບ</h5>

                        <p>{{ __('lang.total_debt') }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">ເບິ່ງລາຍລະອຽດ <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        {{-- <h5>53<sup style="font-size: 20px">%</sup></h5> --}}
                        <h5>270,000,000 ກີບ</h5>
                        <p>{{ __('lang.total_arrears') }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">ເບິ່ງລາຍລະອຽດ <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h5>65,500,000 ກີບ</h5>

                        <p>{{ __('lang.total_not_arrears') }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">ເບິ່ງລາຍລະອຽດ <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-cart-arrow-down"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">{{ __('lang.quantity_seller') }}</span>
                        <span class="info-box-number">1,410 <small>{{ __('lang.list') }}</small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="fas fa-hand-holding-usd"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">{{ __('lang.quantity_debt') }}</span>
                        <span class="info-box-number">410 <small>{{ __('lang.list') }}</small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">{{ __('lang.quantity_pay_success') }}</span>
                        <span class="info-box-number">648 <small>{{ __('lang.list') }}</small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">{{ __('lang.quantity_seller_not_pay_success') }}</span>
                        <span class="info-box-number">3,139 <small>{{ __('lang.list') }}</small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered">

                        <thead>
                            <tr class="text-center bg-info text-md">
                                <th colspan="8">{{ __('lang.list') }}{{ __('lang.expire_payment') }}</th>
                            </tr>
                            <tr class="text-center bg-warning">
                                <th>{{ __('lang.no') }}</th>
                                <th>{{ __('lang.created_at') }}</th>
                                <th>{{ __('lang.name') }}{{ __('lang.customers') }}</th>
                                <th>{{ __('lang.detail') }}{{ __('lang.land') }}</th>
                                <th>{{ __('lang.nguad') }}</th>
                                <th>{{ __('lang.selling_price') }}</th>
                                <th>{{ __('lang.balance') }}</th>
                                <th>{{ __('lang.status') }}</th>
                                {{-- <th>{{__('lang.action')}}</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php $stt = 1;    @endphp
                          @foreach ($sale as $item)
                              <tr>
                                  <td class="text-center">{{$stt++}}</td>
                                  <td class="text-center">{{date('d/m/Y',strtotime($item->valuedt))}}</td>
                                  <td class="text-center">{{$item->cusname->name}} {{$item->cusname->phone}}</td>
                                  <td class="text-center">{{$item->productname->short_des_la}}</td>
                                  <td class="text-center">{{$item->count_pay}} / {{$item->nguad}}</td>
                                  <td class="text-right">{{number_format($item->total_money)}} {{__('lang.lak')}}</td>
                                  <td class="text-right">{{number_format($item->balance)}} {{__('lang.lak')}}</td>
                                  <td class="text-center">
                                    @if ($item->status == 3)
                                        <span class="text-primary"><b>{{__('lang.after_exp')}}</b></span>
                                    @elseif ($item->status == 2)
                                        <span class="text-warning">{{__('lang.tran_pay')}}</span>
                                    @elseif($item->status == 1)
                                        <span class="text-success">{{__('lang.bill_pay')}}</span>
                                    @else
                                        <span class="text-danger">{{__('lang.cancel')}}</span>
                                    @endif
                                  </td> --}}
                            {{-- <td class="text-center">
                                      <button wire:click="detail({{$item->id}})" type="button" class="btn btn-info btn-sm"><i class="fas fa-server"></i></button>
                                  </td> --}}
                            {{-- </tr>
                          @endforeach --}}

                        </tbody>
                    </table>

                    <div class="d-flex justify-content-between">
                        <div>
                            {{-- {{$sale->links()}} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
