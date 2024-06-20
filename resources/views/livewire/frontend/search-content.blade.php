<div>

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5" style="font-family:'Noto Sans Lao';color: #193b7c ">ຜົນການຄົ້ນຫາຂອງທ່ານ</h1>
            </div>
            <div class="row g-4">
                @if ($data->count() > 0)
                @foreach ($data as $item)
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item p-4">
                            <div class="overflow-hidden mb-4">
                                <img style="width: 100%; height:220px" class="img-fluid" src="{{ asset($item->image) }}"
                                    alt="">
                            </div>
                            <h5 class="mb-3">{{ $item->name_lastname }} <br> {{ $item->name_lastname_en }}</h4>
                                <p><b>ຈົບສົກສຶກສາ:</b>
                                    @if (!empty($item->education_year))
                                        {{ $item->education_year->start_year }} -
                                        {{ $item->education_year->end_year }}
                                    @endif
                                </p>
                                <p><b>ລຸ້ນທີ່:</b>
                                    @if (!empty($item->education_year))
                                        {{ $item->education_year->genderation }}
                                    @endif
                                </p>
                                <p><b>ລະດັບການສຶກສາ: </b>
                                    @if (!empty($item->education_system))
                                        {{ $item->education_system->name }}
                                    @endif
                                </p>
                                <p><b>ພາກວິຊາ: </b>
                                    @if (!empty($item->subject->department))
                                        {{ $item->subject->department->name_la }}
                                    @endif
                                </p>
                                <p><b>ສາຂາ:</b>
                                    @if (!empty($item->subject))
                                        {{ $item->subject->name_la }}
                                    @endif
                                </p>
                                <p><b>ບ່ອນເຮັດວຽກ: </b>
                                    @if (!empty($item->work_place))
                                        {{ $item->work_place->name }}
                                    @endif
                                </p>
                                <a class="btn-slide mt-2"
                                    href="@if (!empty($item->work_place)) {{ $item->work_place->facebook }} @endif"><i
                                        class="fa fa-arrow-right"></i><span>ບ່ອນເຮັດວຽກ</span></a>
                        </div>
                    </div>
                @endforeach
                @else
                    <style>
                        @import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

                        body {
                            background-color: #eee;
                            font-family: 'Calibri', sans-serif !important;
                        }

                        .mt-100 {
                            margin-top: 10px;

                        }


                        .card {
                            margin-bottom: 30px;
                            border: 0;
                            -webkit-transition: all .3s ease;
                            transition: all .3s ease;
                            letter-spacing: .5px;
                            border-radius: 8px;
                            -webkit-box-shadow: 1px 5px 24px 0 rgba(68, 102, 242, .05);
                            box-shadow: 1px 5px 24px 0 rgba(68, 102, 242, .05);
                        }

                        .card .card-header {
                            background-color: #fff;
                            border-bottom: none;
                            padding: 24px;
                            border-bottom: 1px solid #f6f7fb;
                            border-top-left-radius: 8px;
                            border-top-right-radius: 8px;
                        }

                        .card-header:first-child {
                            border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
                        }

                        .card .card-body {
                            padding: 30px;
                            background-color: transparent;
                        }
                    </style>
                    <div class="container-fluid text-center">
                        <div class="row">

                            <div class="col-md-12">

                                <div class="card">
                                    <div class="card-body cart">
                                        <div class="col-sm-12 empty-cart-cls text-center">
                                            <img src="https://cdn.dribbble.com/users/1785628/screenshots/5605512/media/097297f8e21d501ba45d7ce437ed77bd.gif"
                                                style="width: auto; height:200px; margin-left: 38%">
                                            <h3><strong><i class="fas fa-search"></i>
                                                    ບໍ່ພົບຂໍ້ມູນທີ່ທ່ານຄົ້ນຫາ!</strong></h3>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Service End -->


</div>
