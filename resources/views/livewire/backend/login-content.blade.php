{{-- <div class="float-lg-start"><h4>{{ __('lang.headding1') }}</h4></div>
<div class="float-lg-start"><h4>{{ __('lang.headding2') }}</h4></div><br> --}}
{{-- <marquee scrollamount="15" direction="left"> <h1>{{ __('lang.headding1') }} {{ __('lang.headding2') }}</h1> </marquee> --}}
<div class="login-box">
    <marquee scrollamount="12" direction="left" class="text-white">
        {{-- <h1><i class="flag-icon flag-icon-la"></i> ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ</h1> --}}
        <h1><i class="fas fa-seedling text-success"></i> ຕົ້ມເເລະ ຕົ້ມລະບໍ່ ມື້ນີ້? <i class="far fa-grin-squint-tears text-danger"></i></h1>
    </marquee>
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="#" class="h2"><i class="fa fa-user-tie"></i> ຍິນດີຕ້ອນຮັບທ່ານ</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg h5">
                <a href="#" class="brand-link">
                    <img src="{{ asset('logo/logo.jpg') }}" class="img-circle elevation-2" height="70"> <br>
                    <a href="#" target="_blank" class="h5"><b>ຮ້ານ: ດາວລິດ ພົມມະຈັນ</b></a>
                </a>
            </p>
            {{-- <form> --}}
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                    </div>
                </div>
                <input type="tel" wire:model="phone" wire:keydown.enter="login"
                 class="form-control @error('phone') is-invalid @enderror"
                    placeholder="ເບີໂທ">

            </div>
            @error('phone')
                <span style="color: red" class="error">{{ $message }}</span>
            @enderror
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                <input type="password" wire:model="password" wire:keydown.enter="login"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="ລະຫັດຜ່ານ">

            </div>
            @error('password')
                <span style="color: red" class="error">{{ $message }}</span>
            @enderror
            <div class="row">
                <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" wire:model="remember">
                <label for="remember">
                  ຈຶ່ຈຳຂ້ອຍໄວ້
                </label>
              </div>
            </div>
            </div>
            <div class="social-auth-links text-center mt-2 mb-3">
                <button wire:click="login" class="btn btn-block btn-primary">
                    <i class="fa fa-sign-in-alt"></i> ເຂົ້າສູ່ລະບົບ
                </button>
                {{-- <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in Google+
                    </a> --}}
            </div>
            <!-- /.social-auth-links -->
            {{-- </form> --}}
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->
