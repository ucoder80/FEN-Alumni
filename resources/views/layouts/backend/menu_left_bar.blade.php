  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-3">
      <!-- Brand Logo -->
      <a href="{{ route('backend.dashboard') }}" class="brand-link">
        @if(!empty($about))
        <img src="{{ asset( $about->logo) }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="width: 40px; height:50px"
        style="opacity: .8">
        @else
        <img src="{{ asset('logo/noimage.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="width: 50px; height:50px"
        style="opacity: .8">
        @endif
          <span class="brand-text font-weight-light text-md">
            @if(!empty($about))
            {{ $about->name_la }}
          @endif</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                  <li class="nav-item menu-open">
                      <a href="{{ route('backend.dashboard') }}"
                          class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              ຫນ້າຫຼັກ
                          </p>
                      </a>
                  </li>
                  <li class="dropdown-divider"></li>
                  {{-- ===================== ຈັດການຂໍ້ມູນຫຼັກ ======================= --}}
                  {{-- <li class="nav-item {{ (
                    strpos(Route::currentRouteName(), 'backend.employee') == 'backend.employee'
                    || strpos(Route::currentRouteName(), 'backend.customer') == 'backend.customer'
                    || strpos(Route::currentRouteName(), 'backend.customer_type') == 'backend.customer_type'
                    || strpos(Route::currentRouteName(), 'backend.land_type') == 'backend.land_type'
                    || strpos(Route::currentRouteName(), 'backend.supplier') == 'backend.supplier'
                    || strpos(Route::currentRouteName(), 'backend.item') == 'backend.item'
                    ) ? 'menu-open' : '' }}"> --}}
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-map-marked-alt"></i>
                            <p>
                                ຂໍ້ມູນທີ່ຢູ່
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('backend.village') }}" class="nav-link">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>ບ້ານ</p>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('backend.district') }}" class="nav-link">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>ເມືອງ</p>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('backend.province') }}" class="nav-link">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>ແຂວງ</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  {{-- <li class="nav-item">
                    <a href="{{ route('backend.IncomeExpendContent') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            ບັນທຶກປະຈຳວັນ
                        </p>
                    </a>
                </li> --}}
                <li class="dropdown-divider"></li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-database"></i>
                          <p>
                              ຈັດການຂໍ້ມູນ
                              <i class="fas fa-angle-left right"></i>
                              {{-- <span class="badge badge-info right">6</span> --}}
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('backend.user') }}" class="nav-link">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>ພະນັກງານ</p>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('backend.role') }}" class="nav-link">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>ສິດນຳໃຊ້</p>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('backend.position') }}" class="nav-link">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>ຕຳແໜ່ງ</p>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('backend.salary') }}" class="nav-link">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>ຂັ້ນເງິນເດືອນ</p>
                              </a>
                          </li>
                      </ul>
                      {{-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link {{ Request::is('customers') ? 'active' : '' }}">
                                <i class="fas fa-angle-double-right nav-icon"></i>
                                <p>ລູກຄ້າ</p>
                            </a>
                        </li>
                    </ul> --}}
                  </li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-item">
                    <a href="{{ route('backend.PaySalary') }}" class="nav-link">
                        <i class="nav-icon fas fa-money-bill-alt"></i>
                        <p>
                            ເບີກຈ່າຍເງິນເດືອນ
                        </p>
                    </a>
                </li>
                  {{-- ===================== orders-import ======================= --}}
                  {{-- <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-cart-plus"></i>
                          <p>
                              ສັ່ງຊື້-ນຳເຂົ້າ
                              <i class="fas fa-angle-left right"></i>
                              <span class="badge badge-info right">6</span>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('backend.OrderCart') }}" class="nav-link">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>ສັ່ງຊື້ສິນຄ້າ</p>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('backend.OrderImport') }}" class="nav-link">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>ນຳສິນຄ້າເຂົ້າສາງ</p>
                              </a>
                          </li>
                      </ul>
                  </li> --}}
                  {{-- <li class="dropdown-divider"></li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-store-alt"></i>
                          <p>
                              ການຂາຍ
                              <i class="fas fa-angle-left right"></i>
                              <span class="badge badge-info right">6</span>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('backend.sale') }}" class="nav-link">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>ຂາຍຫນ້າຮ້ານ</p>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('backend.about') }}" class="nav-link">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>ລູກຄ້າສັ່ງຊື້ຜ່ານເວບໄຊ</p>
                              </a>
                          </li>
                      </ul>
                  </li> --}}
                  <li class="dropdown-divider"></li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-chart-line"></i>
                          <p>
                              ລາຍງານ
                              <i class="fas fa-angle-left right"></i>
                              {{-- <span class="badge badge-info right">6</span> --}}
                          </p>
                      </a>
                      {{-- <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('backend.ProductsReport') }}" class="nav-link">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>ລາຍງານຂໍ້ມູນສິນຄ້າ</p>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('backend.OrdersReport') }}" class="nav-link">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>ລາຍງານການຊື້ນຳຜູ້ສະຫນອງ</p>
                              </a>
                          </li>
                      </ul> --}}
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('backend.ReportUser') }}" class="nav-link">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>ລາຍງານຂໍ້ມູນພະນັກງານ</p>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.ReportUser') }}" class="nav-link">
                                <i class="fas fa-angle-double-right nav-icon"></i>
                                <p>ລາຍງານເບີກຈ່າຍເງິນເດືອນ</p>
                            </a>
                        </li>
                    </ul>
                  </li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-hospital-alt"></i>
                          <p>
                              ຂໍ້ມູນຫ້ອງການ
                              <i class="fas fa-angle-left right"></i>
                              {{-- <span class="badge badge-info right">6</span> --}}
                          </p>
                      </a>
                      {{-- <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('backend.slide') }}" class="nav-link">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>ສະໄລຮູບພາບ</p>
                              </a>
                          </li>
                      </ul> --}}
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('backend.about') }}" class="nav-link">
                                  <i class="fas fa-angle-double-right nav-icon"></i>
                                  <p>ຂໍ້ມູນຫ້ອງການ</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  {{-- ===================== ລາຍງານ ======================= --}}
                  {{-- <li class="nav-item {{ (
                  strpos(Route::currentRouteName(), 'backend.report_buy') == 'backend.report_buy'
                  || strpos(Route::currentRouteName(), 'backend.report_sale') == 'backend.report_sale'
                  || strpos(Route::currentRouteName(), 'backend.report_payArrear') == 'backend.report_payArrear'
                  || strpos(Route::currentRouteName(), 'backend.report_payfinish') == 'backend.report_payfinish'
                  ) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            {{ __('lang.report') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.report_buy') }}" class="nav-link {{ Request::is('report-buyland') ? 'active' : '' }}">
                                <i class="fas fa-angle-double-right nav-icon"></i>
                                <p>ລາຍງານການຊື້ດິນ</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.report_sale') }}" class="nav-link {{ Request::is('report-saleland') ? 'active' : '' }}">
                                <i class="fas fa-angle-double-right nav-icon"></i>
                                <p>ລາຍງານການຂາຍດິນ</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.report_payArrear') }}" class="nav-link {{ Request::is('report-paymentArrear') ? 'active' : '' }}">
                                <i class="fas fa-angle-double-right nav-icon"></i>
                                <p>ລາຍງານຄ້າງຊຳລະ</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.report_payfinish') }}" class="nav-link {{ Request::is('report-paymentfinish') ? 'active' : '' }}">
                                <i class="fas fa-angle-double-right nav-icon"></i>
                                <p>ລາຍງານຊຳລະເເລ້ວ</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ route('backend.report_income') }}" class="nav-link {{ Request::is('report-income') ? 'active' : '' }}">
                              <i class="fas fa-angle-double-right nav-icon"></i>
                              <p>ລາຍງານລາຍຮັບ</p>
                          </a>
                      </li>
                  </ul>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ route('backend.report_expend') }}" class="nav-link {{ Request::is('report-expent') ? 'active' : '' }}">
                              <i class="fas fa-angle-double-right nav-icon"></i>
                              <p>ລາຍງານລາຍຈ່າຍ</p>
                          </a>
                      </li>
                  </ul>
                </li> --}}
                  {{-- ===================== ຜູ້ໃຊ້ ເເລະ ສິດທິ ======================= --}}
                  {{-- <li class="dropdown-divider"></li>
                <li class="nav-item {{ (
                  strpos(Route::currentRouteName(), 'backend.users') == 'backend.users'
                  || strpos(Route::currentRouteName(), 'backend.role') == 'backend.role'
                  ) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{ __('lang.users') }} & {{ __('lang.roles') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.users') }}" class="nav-link {{ Request::is('users') ? 'active' : '' }}">
                                <i class="fas fa-angle-double-right nav-icon"></i>
                                <p>{{ __('lang.users') }}</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.role') }}" class="nav-link {{ Request::is('roles') ? 'active' : '' }}">
                                <i class="fas fa-angle-double-right nav-icon"></i>
                                <p>{{ __('lang.roles') }}</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                  <li class="dropdown-divider"></li>
                  {{-- ===================== ກ່ຽວກັບບໍລິສັດ ======================= --}}
                  {{-- <li class="nav-item">
                    <a href="{{ route('about-company') }}" class="nav-link {{ Request::is('about-companys') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>
                            ກ່ຽວກັບບໍລິສັດ
                        </p>
                    </a>
                </li>
                <li class="dropdown-divider"></li> --}}
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
