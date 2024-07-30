<div>
    <!-- About Start -->
    <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                    {{-- <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="@if(!empty($about))
                        {{ $about->logo }}
                    @endif" style="object-fit: cover;" alt="">
                    </div> --}}
                    <div class="position-relative h-100">
                        <img class="col-md-6" style="padding-left: 0px; padding-right: 0px; margin-left: 360px;" src="@if(!empty($about))
                        {{ $about->logo }}
                    @endif" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                   {{-- <br>
                   
                   <br> --}}
                    <h1 class="mb-5" style="font-family:'Noto Sans Lao';color: #193b7c ">
                        @if(!empty($about))
                            {{ $about->name_la }}
                        @endif
                    </h1>
                    <p class="mb-5 fs-5" >
                        @if(!empty($about))
                      <i class="fas fa-phone-alt" style="color: #193b7c "></i>  {{ $about->phone }}
                    @endif <br>
                        @if(!empty($about))
                      <i class="fas fa-envelope" style="color: #193b7c "></i>  {{ $about->email }}
                    @endif <br>
                        @if(!empty($about))
                        <i class="fas fa-address-book" style="color: #193b7c "></i> {{ $about->address }}
                    @endif
                    </p>
                    <div class="row g-4 mb-5" >
                        <div class="col-sm-14 wow fadeIn" data-wow-delay="0.5s">
                            <i class="fas fa-book-open fa-2x mb-3" style="color: #193b7c "></i>
                            {{-- <i class="fas fa-book-open fa-3x text-primary mb-3"></i> --}}
                            <p class="m-0" style="font-family:'Noto Sans Lao';>
                                @if(!empty($about))
                                {!! $about->note !!}
                                @endif
                            </p>
                        </div>
                    </div>
                    {{-- <a href="" class="btn btn-primary py-3 px-5">Explore More</a> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
</div>
