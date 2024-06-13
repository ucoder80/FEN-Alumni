  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary bg-danger elevation-3">
      <!-- Brand Logo -->
      <a href="{{ route('backend.dashboard') }}" class="brand-link">
          @if (!empty($about))
              <img src="{{ asset($about->logo) }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                  style="width: 40px; height:50px" style="opacity: .8">
          @else
              <img src="{{ asset('logo/noimage.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                  style="width: 50px; height:50px" style="opacity: .8">
          @endif
          <span class="brand-text font-weight-light text-md">
              @if (!empty($about))
                  {{ $about->name_la }}
              @endif
          </span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item menu-open">
                      @foreach ($function_available as $item1)
                          @if ($item1->function->name == 'action_1')
                              <a href="{{ route('backend.dashboard') }}"
                                  class="nav-link text-white {{ Request::is('dashboard') ? 'active' : '' }}">
                                  <i class="nav-icon fas fa-tachometer-alt"></i>
                                  <p>
                                      ຫນ້າຫຼັກ
                                  </p>
                              </a>
                          @endif
                      @endforeach
                  </li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-item">
                      @foreach ($function_available as $item1)
                          @if ($item1->function->name == 'action_2')
                              <a href="#" class="nav-link text-white">
                                  <i class="nav-icon fas fa-map-marked-alt"></i>
                                  <p>
                                      ຂໍ້ມູນທີ່ຢູ່
                                      <i class="fas fa-angle-left right"></i>
                                  </p>
                              </a>
                          @endif
                      @endforeach
                      @foreach ($function_available as $item1)
                          @if ($item1->function->name == 'action_7')
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="{{ route('backend.village') }}" class="nav-link text-white">
                                          <i class="fas fa-angle-double-right nav-icon"></i>
                                          <p>ບ້ານ</p>
                                      </a>
                                  </li>
                              </ul>
                          @endif
                      @endforeach
                      @foreach ($function_available as $item1)
                          @if ($item1->function->name == 'action_8')
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="{{ route('backend.district') }}" class="nav-link text-white">
                                          <i class="fas fa-angle-double-right nav-icon"></i>
                                          <p>ເມືອງ</p>
                                      </a>
                                  </li>
                              </ul>
                          @endif
                      @endforeach
                      @foreach ($function_available as $item1)
                          @if ($item1->function->name == 'action_9')
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="{{ route('backend.province') }}" class="nav-link text-white">
                                          <i class="fas fa-angle-double-right nav-icon"></i>
                                          <p>ແຂວງ</p>
                                      </a>
                                  </li>
                              </ul>
                          @endif
                      @endforeach
                  </li>
                  {{-- <li class="nav-item">
                    <a href="{{ route('backend.IncomeExpendContent') }}" class="nav-link text-white">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            ບັນທຶກປະຈຳວັນ
                        </p>
                    </a>
                </li> --}}
                  <li class="dropdown-divider"></li>
                  <li class="nav-item">
                      @foreach ($function_available as $item1)
                          @if ($item1->function->name == 'action_3')
                              <a href="#" class="nav-link text-white">
                                  <i class="nav-icon fas fa-database"></i>
                                  <p>
                                      ຈັດການຂໍ້ມູນ
                                      <i class="fas fa-angle-left right"></i>
                                      {{-- <span class="badge badge-info right">6</span> --}}
                                  </p>
                              </a>
                          @endif
                      @endforeach
                      @foreach ($function_available as $item1)
                          @if ($item1->function->name == 'action_13')
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="{{ route('backend.Department') }}" class="nav-link text-white">
                                          <i class="fas fa-angle-double-right nav-icon"></i>
                                          <p>ຂໍ້ມູນພາກວິຊາ</p>
                                      </a>
                                  </li>
                              </ul>
                          @endif
                      @endforeach
                      @foreach ($function_available as $item1)
                          @if ($item1->function->name == 'action_14')
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="{{ route('backend.Subject') }}" class="nav-link text-white">
                                          <i class="fas fa-angle-double-right nav-icon"></i>
                                          <p>ຂໍ້ມູນສາຂາວິຊາ</p>
                                      </a>
                                  </li>
                              </ul>
                          @endif
                      @endforeach
                      @foreach ($function_available as $item1)
                          @if ($item1->function->name == 'action_12')
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="{{ route('backend.role') }}" class="nav-link text-white">
                                          <i class="fas fa-angle-double-right nav-icon"></i>
                                          <p>ຂໍ້ມູນສິດນຳໃຊ້</p>
                                      </a>
                                  </li>
                              </ul>
                          @endif
                      @endforeach
                      @foreach ($function_available as $item1)
                          @if ($item1->function->name == 'action_10')
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="{{ route('backend.user') }}" class="nav-link text-white">
                                          <i class="fas fa-angle-double-right nav-icon"></i>
                                          <p>ຂໍ້ມູນຜູ້ໃຊ້</p>
                                      </a>
                                  </li>
                              </ul>
                          @endif
                      @endforeach
                      @foreach ($function_available as $item1)
                          @if ($item1->function->name == 'action_11')
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="{{ route('backend.OldStudent') }}" class="nav-link text-white">
                                          <i class="fas fa-angle-double-right nav-icon"></i>
                                          <p>ຂໍ້ມູນສິດເກົ່າ</p>
                                      </a>
                                  </li>
                              </ul>
                          @endif
                      @endforeach



                      @foreach ($function_available as $item1)
                          @if ($item1->function->name == 'action_15')
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="{{ route('backend.EducationYear') }}" class="nav-link text-white">
                                          <i class="fas fa-angle-double-right nav-icon"></i>
                                          <p>ຂໍ້ມູນສົກສຶກສາ</p>
                                      </a>
                                  </li>
                              </ul>
                          @endif
                      @endforeach
                      @foreach ($function_available as $item1)
                          @if ($item1->function->name == 'action_16')
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="{{ route('backend.WorkPlace') }}" class="nav-link text-white">
                                          <i class="fas fa-angle-double-right nav-icon"></i>
                                          <p>ຂໍ້ມູນສະຖານທີ່ເຮັດວຽກ</p>
                                      </a>
                                  </li>
                              </ul>
                          @endif
                      @endforeach
                      @foreach ($function_available as $item1)
                          @if ($item1->function->name == 'action_17')
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="{{ route('backend.EducationSystem') }}" class="nav-link text-white">
                                          <i class="fas fa-angle-double-right nav-icon"></i>
                                          <p>ຂໍ້ມູນລະບົບການຮຽນ</p>
                                      </a>
                                  </li>
                              </ul>
                          @endif
                      @endforeach
                  </li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-item">
                      @foreach ($function_available as $item1)
                          @if ($item1->function->name == 'action_4')
                              <a href="#" class="nav-link text-white">
                                  <i class="nav-icon fas fa-chart-line"></i>
                                  <p>
                                      ລາຍງານ
                                      <i class="fas fa-angle-left right"></i>
                                      {{-- <span class="badge badge-info right">6</span> --}}
                                  </p>
                              </a>
                          @endif
                      @endforeach
                      @foreach ($function_available as $item1)
                          @if ($item1->function->name == 'action_18')
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="{{ route('backend.ReportOldStudent') }}" class="nav-link text-white">
                                          <i class="fas fa-angle-double-right nav-icon"></i>
                                          <p>ລາຍງານຂໍ້ມູນສິດເກົ່າ</p>
                                      </a>
                                  </li>
                              </ul>
                          @endif
                      @endforeach
                      @foreach ($function_available as $item1)
                          @if ($item1->function->name == 'action_19')
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="{{ route('backend.ReportUser') }}" class="nav-link text-white">
                                          <i class="fas fa-angle-double-right nav-icon"></i>
                                          <p>ລາຍງານຂໍ້ມູນຜູ້ໃຊ້</p>
                                      </a>
                                  </li>
                              </ul>
                          @endif
                      @endforeach
                      @foreach ($function_available as $item1)
                          @if ($item1->function->name == 'action_20')
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="{{ route('backend.ReportWorkPlace') }}" class="nav-link text-white">
                                          <i class="fas fa-angle-double-right nav-icon"></i>
                                          <p>ລາຍງານສະຖານທີ່ເຮັດວຽກ</p>
                                      </a>
                                  </li>
                              </ul>
                          @endif
                      @endforeach
                  </li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-item">
                      @foreach ($function_available as $item1)
                          @if ($item1->function->name == 'action_5')
                              <a href="#" class="nav-link text-white">
                                  <i class="nav-icon fas fa-cog"></i>
                                  <p>
                                      ຕັ້ງຄ່າລະບົບ
                                      <i class="fas fa-angle-left right"></i>
                                      {{-- <span class="badge badge-info right">6</span> --}}
                                  </p>
                              </a>
                          @endif
                      @endforeach
                      @foreach ($function_available as $item1)
                          @if ($item1->function->name == 'action_21')
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="{{ route('backend.slide') }}" class="nav-link text-white">
                                          <i class="fas fa-angle-double-right nav-icon"></i>
                                          <p>ສະໄລຮູບພາບ</p>
                                      </a>
                                  </li>
                              </ul>
                          @endif
                      @endforeach
                      @foreach ($function_available as $item1)
                          @if ($item1->function->name == 'action_22')
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="{{ route('backend.about') }}" class="nav-link text-white">
                                          <i class="fas fa-angle-double-right nav-icon"></i>
                                          <p>ຕັ້ງຄ່າລະບົບ</p>
                                      </a>
                                  </li>
                              </ul>
                          @endif
                      @endforeach
                  </li>
                  <li class="dropdown-divider"></li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
