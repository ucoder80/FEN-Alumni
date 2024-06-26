<div>
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg navbar-light shadow border-top border-5 border-white sticky-top p-0 " style="background-color: {{ !empty($about->f_sidebar_color) ? $about->f_sidebar_color : '' }}">
            <a href="{{ route('frontend.Home') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img width="70px" height="70px" class="img-fluid" src="{{ asset($about->logo) }}" alt="" style="border-radius: 100%; padding-bottom:10px">
                
                <h3 class="mb-1 " style="font-family:'Noto Sans Lao';color: #193b7c ">
                    @if(!empty($about->name_la))
                        {{ $about->name_la }}
                    @endif
                </h3>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="{{ route('frontend.Home') }}" class="nav-item nav-link {{ $currentRoute == 'frontend.Home' ? 'active' : '' }}"><i class="fas fa-users"></i> ສິດເກົ່າ</a>
                    {{-- <a href="about.html" class="nav-item nav-link"><i class="fas fa-users"></i> ສະມາສິກເກົ່າ</a> --}}
                    <a href="{{ route('frontend.About') }}" class="nav-item nav-link {{ $currentRoute == 'frontend.About' ? 'active' : '' }}"><i class="fas fa-address-book"></i> ກ່ຽວກັບ</a>
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
                    <a href="{{ route('frontend.Contact') }}" class="nav-item nav-link {{ $currentRoute == 'frontend.Contact' ? 'active' : '' }}"><i class="fas fa-phone-alt"></i> ຕິດຕໍ່ພົວພັນ</a>
                    @auth
                    <a href="{{ route('frontend.Profiles') }}" class="nav-item nav-link {{ $currentRoute == 'frontend.Profiles' ? 'active' : '' }}"><i class="fas fa-user-tie"></i> {{ auth()->user()->name_lastname }}</a>
                    <a href="{{ route('frontend.SignOuts') }}" class="nav-item nav-link text-danger"><i class="fas fa-sign-out-alt"></i> ອອກລະບົບ</a>
                        @else
                        <a href="{{ route('frontend.SignUp') }}" class="nav-item nav-link {{ $currentRoute == 'frontend.SignUp' ? 'active' : '' }}"><i class="fas fa-user-edit"></i> ສະໝັກສະມາຊີກ</a>
                    <a href="{{ route('frontend.SignIn') }}" class="nav-item nav-link {{ $currentRoute == 'frontend.SignIn' ? 'active' : '' }}"><i class="fas fa-user-lock"></i> ເຂົ້າສູ່ລະບົບ</a>
                    @endauth

                </div>
                <h4 class="m-0 pe-lg-5 d-none d-lg-block" style="color: #193b7c"><i class="fa fa-phone me-3"></i> +856 20 @if(!empty($about))
                    {{ $about->phone }}
                @endif</h4>
            </div>
        </nav>
        <!-- Navbar End -->
</div>