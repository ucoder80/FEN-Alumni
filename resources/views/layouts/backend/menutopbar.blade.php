        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                {{-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="https://kj.apvtemple.com/" class="nav-link"><i class="fas fa-globe"></i> ໄປທີ່ເວບໄຊ</a>
                </li> --}}
                {{-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="" class="nav-link"><i class="fas fa-heart"></i> ຖືກໃຈລູກຄ້າ</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="" class="nav-link"><i class="fas fa-book"></i> ບັນທຶກປະຈຳວັນ</a>
                </li> --}}
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    {{-- <livewire:backend.notification.nofication /> --}}
                </li>
                <!-- Messages Dropdown Menu -->
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">{{ $contact_count }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        @foreach ($contacts as $item)
                            <small>
                                <a href="#" class="dropdown-item">
                                    <!-- Message Start -->
                                    <div class="media">
                                        <img src="https://cdn2.iconfinder.com/data/icons/people-flat-design/64/People-Man-Boy-Kid-Happy-Smile-Avatar-512.png"
                                            alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                {{ $item->name }}
                                                <span class="float-right text-sm text-danger"><i
                                                        class="fas fa-star"></i></span>
                                            </h3>
                                            <p class="text-sm">{{ $item->note }}</p>
                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>
                                                {{ $item->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                    <!-- Message End -->
                                </a>
                            </small>
                        @endforeach
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">ເບິ່ງທັງຫມົດ</a>
                    </div>
                </li> --}}
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="">
                        <i class="fas fa-language"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right p-0">
                        <a class="nav-link" data-toggle="nav-item" href="{{ url('localization/lo') }}">
                            <i class="flag-icon flag-icon-la"></i> {{ __('lang.laos') }}
                        </a>
                        <a class="nav-link" data-toggle="nav-item" href="{{ url('localization/en') }}">
                            <i class="flag-icon flag-icon-us"></i> {{ __('lang.english') }}
                        </a>
                    </div>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li> --}}
                @foreach ($function_available as $item1)
                @if ($item1->function->name == 'action_6')
                @auth
                    @if (Auth::guard('admin')->user()->id != 1)
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('backend.profile', auth()->user()->id) }}">
                                {{-- @if (!empty(Auth::guard('admin')->user()->image))
                                    <img src="{{ asset('logo/logo.jpg') }}" style="width: 30px; height: 30px"
                                        alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                                @else
                                    <img src="{{ asset('logo/logo.jpg') }}" style="width: 30px; height: 30px"
                                        alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                                @endif --}}
                                <span
                                    class="brand-text font-weight-light text-md fas fa-user"> {{ Auth::guard('admin')->user()->name_lastname }}</span>
                            </a>
                        </li>
                    @endif
                @endauth
                @endif
                @endforeach
                {{-- ============================= modal logout ============================= --}}
                <li class="nav-item">
                    <a data-toggle="modal" data-target="#modal-default" class="nav-link"
                        data-controlsidebar-slide="true" role="button">
                        <i class="fas fa-sign-out-alt text-danger"></i>
                    </a>
                </li>
            </ul>
        </nav>
        {{-- =========================== modal logout ============================ --}}
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <p class="modal-title"> <i class="fas fa-sign-out-alt"></i> ອອກຈາກລະບົບ</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">ທ່ານຕ້ອງການອອກຈາກລະບົບບໍ່?</h5>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger"
                            data-dismiss="modal">ຍົກເລີກ</button>
                        <a type="button" href="{{ route('backend.logout') }}" class="btn btn-primary">ແມ່ນເເລ້ວ</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
