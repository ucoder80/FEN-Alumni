<div>
<!-- Carousel Start -->
<div class="container-fluid">
    <div class="owl-carousel header-carousel position-relative mb-1">
@foreach ($slide as $item)
<div class="owl-carousel-item position-relative">
    <h4><marquee scrollamount="12" direction="left" class="text-white">
        <h1><i class="flag-icon flag-icon-la"></i> ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ
            ວັດທະນາຖາວອນ</h1>
    </marquee></h4>
    <img class="img-fluid" src="{{ asset($item->image) }}" alt="">
    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(6, 3, 21, .5);">
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-10 col-lg-8">
                    <h2 class="display-3 text-white animated slideInDown mb-4">{{ $item->header }} </h2>
                    <p class="fs-5 fw-medium text-white mb-4 pb-2">{{ $item->body }}</p>
                    {{-- <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                    <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Free Quote</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
        {{-- <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="frontend/img/carousel-2.jpg" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(6, 3, 21, .5);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Transport & Logistics Solution</h5>
                            <h1 class="display-3 text-white animated slideInDown mb-4">#1 Place For Your <span class="text-primary">Transport</span> Solution</h1>
                            <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                            <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Free Quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
<!-- Carousel End -->


<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container py-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-5">ສິດເກົ່າຄະນະ</h1>
        </div>
        <div class="row g-4">
            @foreach ($data as $item)
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img style="width: 100%; height:220px" class="img-fluid" src="{{ asset($item->image) }}" alt="">
                    </div>
                    <h5 class="mb-3">{{ $item->name_lastname }} <br> {{ $item->name_lastname_en }}</h4>
                    <p><b>ຈົບສົກສຶກສາ:</b> 
                        @if(!empty($item->education_year))
                        {{ $item->education_year->start_year }} -
                        {{ $item->education_year->end_year }} 
                        @endif
                    </p>
                    <p><b>ລູ້ນທີ່:</b> 
                        @if(!empty($item->education_year))
                        {{ $item->education_year->genderation }}
                        @endif
                    </p>
                    <p><b>ລະດັບການສຶກສາ: </b>
                        @if(!empty($item->education_system))
                        {{ $item->education_system->name }}
                        @endif
                    </p>
                    <p><b>ພາກວິຊາ: </b>
                        @if(!empty($item->subject->department))
                        {{ $item->subject->department->name_la }}
                        @endif
                    </p>
                    <p><b>ສາຂາ:</b> 
                        @if(!empty($item->subject))
                        {{ $item->subject->name_la }}
                        @endif
                    </p>
                    <p><b>ບ່ອນເຮັດວຽກ: </b>
                        @if(!empty($item->work_place))
                        {{ $item->work_place->name }}
                        @endif
                    </p>
                    <a class="btn-slide mt-2" href="@if(!empty($item->work_place))
                        {{ $item->work_place->facebook }}
                        @endif"><i class="fa fa-arrow-right"></i><span>ບ່ອນເຮັດວຽກ</span></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Service End -->


</div>
