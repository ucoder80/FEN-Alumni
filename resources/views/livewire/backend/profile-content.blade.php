<div>
    {{-- ======================================== header page ====================================================== --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4><i class="fas fa-user-tie"></i> ໂປຣຟາຍຜູ້ໃຊ້ </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">ຫນ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item active">ໂປຣຟາຍຜູ້ໃຊ້</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    @foreach ($function_available as $item1)
        @if ($item1->function->name == 'action_6')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                {{-- <div class="col-md-5">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                @if (!empty(Auth::guard('admin')->user()->image))
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ asset('profile') }}/{{ Auth::guard('admin')->user()->image }}"
                                        alt="User profile picture">
                                @else
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ asset('logo/noimage.png') }}" alt="User profile picture">
                                @endif
                            </div>
                            <h3 class="profile-username text-center">{{ Auth::guard('admin')->user()->name }}</h3>

                            <p class="text-muted text-center">{{ Auth::guard('admin')->user()->lastname }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>ລະຫັດ: </b> <a class="float-center">{{ Auth::guard('admin')->user()->code }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>ສິດທິເຂົ້າໃຊ້: </b> <a class="float-center">
                                        @if (!empty(Auth::guard('admin')->user()->roles))
                                            {{ Auth::guard('admin')->user()->roles->name }}
                                        @endif
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>ເພດ: </b>
                                    @if (Auth::guard('admin')->user()->gender == 1)
                                        <a class="float-center">ຍິງ</a>
                                    @elseif(Auth::guard('admin')->user()->gender == 2)
                                        <a class="float-center">ຊາຍ</a>
                                    @endif
                                </li>
                                <li class="list-group-item">
                                    <b>ສະຖານະ: </b> <a class="float-center">
                                        @if (Auth::guard('admin')->user()->status == 1)
                                            <a class="float-center">ໂສດ</a>
                                        @elseif(Auth::guard('admin')->user()->status == 2)
                                            <a class="float-center">ມີເເຟນ</a>
                                        @elseif(Auth::guard('admin')->user()->status == 3)
                                            <a class="float-center">ແຕ່ງງານ</a>
                                        @endif
                                </li>
                                <li class="list-group-item">
                                    <b>ທີ່ຢູ່: </b> <a class="float-center">
                                        {{ Auth::guard('admin')->user()->village->name_la }},
                                        {{ Auth::guard('admin')->user()->district->name_la }},
                                        {{ Auth::guard('admin')->user()->province->name_la }}</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div> --}}
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="settings">
                                    <form class="form-horizontal">
                                        {{-- <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">ຮູບພາບ</label>
                                            <div class="col-sm-10">
                                                <input type="file" wire:model="image" accept=".png, .jpg, .jpeg"
                                                    class="form-control" id="inputName" placeholder="ປ້ອນຂໍ້ມູນ">
                                            </div>
                                        </div> --}}
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">ເພດ</label>
                                            <div class="form-group clearfix">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="radioPrimary1" value="1"
                                                        wire:model="gender">
                                                    <label for="radioPrimary1">ຍິງ
                                                    </label>
                                                </div>
                                                <div class="icheck-danger d-inline">
                                                    <input type="radio" id="radioPrimary2" value="2"
                                                        wire:model="gender" checked>
                                                    <label for="radioPrimary2">ຊາຍ
                                                    </label>
                                                </div>
                                            </div>
                                            @error('gender')
                                                <span style="color: red" class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">ຊື່ ນາມສະກຸນ</label>
                                            <div class="col-sm-10">
                                                <input type="text" wire:model="name_lastname" class="form-control"
                                                    id="inputName" placeholder="ປ້ອນຂໍ້ມູນ">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">ເບີໂທ</label>
                                            <div class="col-sm-10">
                                                <input type="number" wire:model="phone" class="form-control"
                                                    id="inputName" placeholder="ປ້ອນຂໍ້ມູນ">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">ວດປ ເກີດ</label>
                                            <div class="col-sm-10">
                                                <input type="date" wire:model="birtday_date" class="form-control"
                                                    id="inputName" placeholder="ປ້ອນຂໍ້ມູນ">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">ອີເມວ</label>
                                            <div class="col-sm-10">
                                                <input type="email" wire:model="email" class="form-control"
                                                    id="inputEmail" placeholder="ປ້ອນຂໍ້ມູນ">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">ສະຖານະ </label>
                                            <div class="col-sm-10">
                                            <select wire:model.live="status" id="status" class="form-control">
                                                <option value="">ເລືອກສະຖານະ</option>
                                                <option value="1">ໂສດ</option>
                                                <option value="2">ມີແຟນ</option>
                                                <option value="3">ແຕ່ງງານ</option>
                                                <option value="4">ຢ່າຮ້າງ</option>
                                                <option value="5">ແຍກກັນຢູ່</option>
                                                <option value="6">ຮັກເຂົາຂ້າງດຽວ</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="button" wire:click="updateProfile"
                                                    class="btn btn-warning"><i class="fas fa-edit"></i>
                                                    ແກ້ໄຂໂປຣຟາຍ</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                {{-- ============ chage password ============== --}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="settings">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="inputName2"
                                                class="col-sm-2 col-form-label">ລະຫັດຜ່ານເກົ່າ</label>
                                            <div class="col-sm-10">
                                                <input type="password" wire:model="currentPassword"
                                                    class="form-control @error('currentPassword') is-invalid @enderror"
                                                    id="inputName2" placeholder="ປ້ອນຂໍ້ມູນ">
                                                @error('currentPassword')
                                                    <span style="color: red" class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2"
                                                class="col-sm-2 col-form-label">ລະຫັດຜ່ານໃຫມ່</label>
                                            <div class="col-sm-10">
                                                <input type="password" wire:model="newPassword"
                                                    class="form-control @error('newPassword') is-invalid @enderror"
                                                    id="inputName2" placeholder="ປ້ອນຂໍ້ມູນ">
                                                @error('newPassword')
                                                    <span style="color: red" class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2"
                                                class="col-sm-2 col-form-label">ຍືນຍັນລະຫັດໃຫມ່</label>
                                            <div class="col-sm-10">
                                                <input type="password" wire:model="confirmPassword"
                                                    class="form-control @error('confirmPassword') is-invalid @enderror"
                                                    id="inputName2" placeholder="ປ້ອນຂໍ້ມູນ">
                                                @error('confirmPassword')
                                                    <span style="color: red" class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="button" wire:click="changePassword"
                                                    class="btn btn-warning"><i class="fas fa-key"></i>
                                                    ປ່ຽນລະຫັດຜ່ານ</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @endif
    @endforeach
</div>
<!-- /.content-wrapper -->
