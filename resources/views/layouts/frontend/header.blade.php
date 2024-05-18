<div>
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow border-top border-5 border-primary sticky-top p-0">
            <a href="{{ route('frontend.Home') }}" class="navbar-brand bg-primary d-flex align-items-center px-4 px-lg-5">
            <img width="70px" height="70px" class="img-fluid" src="{{ asset($about->logo) }}" alt="" style="border-radius: 50%;">
                
                <h2 class="mb-2 text-white">
                    @if(!empty($about->name_la))
                        {{ $about->name_la }}
                    @endif
                </h2>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="{{ route('frontend.Home') }}" class="nav-item nav-link active"><i class="fas fa-users"></i> ສະມາສິກເກົ່າ</a>
                    {{-- <a href="about.html" class="nav-item nav-link"><i class="fas fa-users"></i> ສະມາສິກເກົ່າ</a> --}}
                    <a href="{{ route('frontend.About') }}" class="nav-item nav-link"><i class="fas fa-address-book"></i> ກ່ຽວກັບ</a>
                    {{-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu fade-up m-0">
                            <a href="price.html" class="dropdown-item">Pricing Plan</a>
                            <a href="feature.html" class="dropdown-item">Features</a>
                            <a href="quote.html" class="dropdown-item">Free Quote</a>
                            <a href="team.html" class="dropdown-item">Our Team</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Page</a>
                        </div>
                    </div> --}}
                    <a href="{{ route('frontend.Contact') }}" class="nav-item nav-link"><i class="fas fa-phone-alt"></i> ຕິດຕໍ່ພົ່ວພັນ</a>
                </div>
                <h4 class="m-0 pe-lg-5 d-none d-lg-block"><i class="fa fa-headphones text-primary me-3"></i>+012 345 6789</h4>
            </div>
        </nav>
        <!-- Navbar End -->
</div>