<nav class="main-header navbar navbar-expand-md navbar-light navbar-white"
    @if (request()->is('check-bill-restaurant')) style="position: sticky;top:0;" @endif>
    <div class="container-fluid">
        <a href="{{ route('backend.dashboard') }}" class="navbar-brand">
            @if (!empty($about))
                <img src="{{ asset($about->logo) }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="width: 40px; height:50px" style="opacity: .8">
            @else
                <img src="{{ asset('logo/noimage.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="width: 50px; height:50px" style="opacity: .8">
            @endif
            <!-- <span class="brand-text font-weight-light"> {{ __('lang.title') }}</span> -->
        </a>
        <!-- Left navbar links -->
        <div class="collapse navbar-collapse order-3" id="navbarCollapse">

            <ul class="navbar-nav">
                {{-- ========= ຕັ້ງຄ່າລະບົບ ========== --}}
                {{-- @foreach ($function_available as $item1)
                    @if ($item1->function->name == 'action_data') --}}
                <li class="nav-item dropdown  text-bold">
                    <a id="dropdownSubMenu1" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" class="nav-link dropdown-toggle"><i class="fas fa-database"></i>
                        ຈັດການຂໍ້ມູນ</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <li class="dropdown-submenu dropdown-hover">
                            <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">
                                <i class="fa fa-angle-double-right main-web-color"></i>
                                ຂໍ້ມູນທີ່ຢູ່</a>
                            <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                <li>
                                    <a tabindex="-1" href="{{ route('backend.village') }}" class="dropdown-item"><i
                                            class="fa fa-angle-double-right main-web-color"></i>
                                        ບ້ານ</a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="{{ route('backend.district') }}" class="dropdown-item"><i
                                            class="fa fa-angle-double-right main-web-color"></i>
                                        ເມືອງ</a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="{{ route('backend.province') }}" class="dropdown-item"><i
                                            class="fa fa-angle-double-right main-web-color"></i>
                                        ແຂວງ</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-divider"></li>
                        {{-- @foreach ($function_available as $item2)
                                    @if ($item2->function->name == 'access_branch') --}}
                        <li><a href="{{ route('backend.user') }}" class="dropdown-item"><i
                                    class="fa fa-angle-double-right main-web-color"></i>
                                ຜູ້ໃຊ້</a>
                        </li>
                        {{-- @endif
                                @endforeach
                                @foreach ($function_available as $item2)
                                    @if ($item2->function->name == 'access_role') --}}
                        <li><a href="{{ route('backend.role') }}" class="dropdown-item"><i
                                    class="fa fa-angle-double-right main-web-color"></i>
                                ສິດນຳໃຊ້</a>
                        </li>
                        {{-- @endif
                                @endforeach --}}
                    </ul>
                </li>
                {{-- @endif
                @endforeach --}}
                {{-- ============== income expend ============== --}}
                {{-- @foreach ($function_available as $item1)
                @if ($item1->function->name == 'income_expend') --}}
                <li class="nav-item dropdown  text-bold">
                    <a id="dropdownSubMenu1" href="" aria-haspopup="true" aria-expanded="false" class="nav-link">
                        <i class="fas fa-money-bill-alt"></i> ລາຍຮັບລາຍຈ່າຍ
                    </a>
                </li>
                {{-- @endif
            @endforeach --}}
                {{-- ============== reports ============== --}}
                <li class="nav-item dropdown  text-bold">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" class="nav-link dropdown-toggle">
                        <i class="fas fa-chart-line"></i> ລາຍງານ
                    </a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        {{-- @foreach ($function_available as $item1)
                            @if ($item1->function->name == 'report_all') --}}
                        <li>
                            <a href="" class="dropdown-item"><i
                                    class="fa fa-angle-double-right main-web-color"></i>
                                {{-- ລາຍຮັບ-ລາຍຈ່າຍ --}}
                            </a>
                        </li>
                        {{-- @endif
                        @endforeach --}}
                    </ul>
                </li>
                {{-- ============== reports ============== --}}
                <li class="nav-item dropdown  text-bold">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" class="nav-link dropdown-toggle">
                        <i class="fas fa-globe"></i> ຂໍ້ມູນເວບໄຊ
                    </a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        {{-- @foreach ($function_available as $item1)
                                            @if ($item1->function->name == 'report_all') --}}
                        <li>
                            <a href="{{ route('backend.slide') }}" class="dropdown-item"><i
                                    class="fa fa-angle-double-right main-web-color"></i>
                                ສະໄລຮູບພາບ
                            </a>
                        <li class="dropdown-divider"></li>
                        <a href="{{ route('backend.about') }}" class="dropdown-item"><i
                                class="fa fa-angle-double-right main-web-color"></i>
                            ກ່ຽວກັບ
                        </a>
                </li>
                {{-- @endif
                                        @endforeach --}}
            </ul>
            </li>
        </div>
        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <!-- Notifications Dropdown Menu -->
            {{-- <li class="nav-item dropdown  text-bold">
                <a class="nav-link" data-toggle="dropdown" href="">
                    <i class="fas fa-language"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right p-0">
                    <a class="nav-link" data-toggle="nav-item" href="{{ url('localization/lo') }}">
                        <i class="flag-icon flag-icon-la"></i> {{ __('lang.lao') }}
                    </a>
                    <a class="nav-link" data-toggle="nav-item" href="{{ url('localization/en') }}">
                        <i class="flag-icon flag-icon-us"></i> {{ __('lang.english') }}
                    </a>
                    <a class="nav-link" data-toggle="nav-item" href="{{ url('localization/cn') }}">
                        <i class="flag-icon flag-icon-cn"></i> {{ __('lang.chinese') }}
                    </a>
                </div>
            </li> --}}
            <li class="nav-item dropdown  text-bold">
            <li class="nav-item dropdown  text-bold">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <img src="{{ asset('logo/logo.jpg') }}" style="width: 30px; height: 30px" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    {{ auth()->user()->name_lastname }}
                    <span class="brand-text font-weight-light text-md"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right p-0">
                    <a class="nav-link" data-toggle="nav-item" href="{{ route('backend.profile') }}">
                        <i class="fas fa-user-tie"></i> ໂປຣຟາຍ
                    </a>
                    <div class="dropdown-divider"></div>
                    <a data-toggle="modal" data-target="#modal-default" class="nav-link"
                        data-controlsidebar-slide="true" role="button">
                        <i class="fas fa-sign-out-alt text-danger"></i> ອອກຈາກລະບົບ
                    </a>
                </div>
            </li>
            <li class="user-footer">

            </li>
        </ul>
        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
{{-- =========================== modal logout ============================ --}}
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <p class="modal-title"> <i class="fas fa-sign-out-alt"></i>ອອກຈາກລະບົບ</p>
                <button type="button" class="close bg-dangerr" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="text-center">ທ່ານຕ້ອງການອອກຈາກລະບົບບໍ່?</h5>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">ຍົກເລີກ</button>
                <a type="button" href="{{ route('backend.logout') }}" class="btn btn-primary">ຕົກລົງ</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
