<div>
    <!-- Contact Start -->
    <div class="container-fluid d-flex justify-content-center align-items-center overflow-hidden px-lg-0" style="min-height: 80vh;">
        <div class="container contact-page px-lg-0">
            <div class="row g-5 mx-lg-0 justify-content-center">
                <div class="col-md-10 contact-form wow fadeIn">
                    {{-- <h1 class="mb-4 text-center" ><i class="fas fa-user-lock"></i> ເຂົ້າສູ່ລະບົບ</h1> --}}
                    <h1 class="mb-4 text-center" style="font-family:'Noto Sans Lao';color: #193b7c;" ><i class="fas fa-user-lock"></i> ເຂົ້າສູ່ລະບົບ</h1>
                    {{-- <div class="bg-light p-4"> --}}
                    <div class=" p-4" style="background-color: #f9f9f9;">
                        <form>
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input wire:model='code' type="text" class="form-control @error('code') is-invalid @enderror" id="code" placeholder="ລະຫັດນັກສຶກສາ">
                                        <label for="code">ລະຫັດນັກສຶກສາ</label>
                                        @error('code')
                                        <span style="color: red" class="error">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input wire:model='password' type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="ອີເມວ">
                                        <label for="password">ລະຫັດຜ່ານ</label>
                                        @error('password')
                                        <span style="color: red" class="error">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button wire:click='Signin' class="btn btn-primary w-100 py-3" type="button"><i class="fas fa-pen"></i> ຍືນຍັນສະໝັກ</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
</div>
