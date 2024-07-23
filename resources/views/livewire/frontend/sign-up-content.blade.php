<div>
    <script>
        $(document).ready(function() {
            $("#imageUpload").change(function(event) {
                var imageFile = event.target.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#imagePreview').attr('src', e.target.result);
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }

                if (imageFile) {
                    reader.readAsDataURL(imageFile);
                }
            });
        });
    </script>
    <!-- Contact Start -->
    <style>
        .profile-user-img {
            width: 125px;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        }

        .avatar-upload {
            position: relative;
            max-width: 205px;
            margin: auto;
            margin-bottom: 20px;

            .avatar-edit {
                position: absolute;
                right: 40px;
                z-index: 1;
                top: 90px;

                input {
                    display: none;

                    +label {
                        display: inline-block;
                        width: 34px;
                        height: 34px;
                        margin-bottom: 0;
                        border-radius: 100%;
                        background: #FFFFFF;
                        border: 1px solid #d2d6de;
                        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
                        cursor: pointer;
                        font-weight: normal;
                        transition: all .2s ease-in-out;

                        &:hover {
                            background: #f1f1f1;
                            border-color: #d6d6d6;
                        }

                        &:after {
                            content: "\f030";
                            font-family: 'FontAwesome';
                            color: #337AB7;
                            position: absolute;
                            left: 0;
                            right: 0;
                            text-align: center;
                            line-height: 34px;
                            margin: auto;
                        }
                    }
                }
            }
        }
    </style>
    <div class="container-fluid d-flex justify-content-center align-items-center overflow-hidden py-2 px-lg-0">
        <div class="container contact-page py-3 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-md-12 contact-form wow fadeIn">
                    {{-- <h1 class="mb-4 text-center"><i class="fas fa-user-edit"></i> ສະໝັກເປັນສະມາສິກເກົ່າ</h1> --}}
                    <h1 class="mb-4 text-center" style="font-family:'Noto Sans Lao';color: #193b7c;"><i class="fas fa-user-edit"></i> ສະໝັກເປັນສິດເກົ່າ</h1>
                    {{-- <div class="bg-light p-4"> --}}
                    <div class=" p-4" style="background-color: #f9f9f9;">
                        <form>
                            {{-- <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <form action="" method="post" id="form-image">
                                        <input wire:model='image' type='file' id="imageUpload"
                                            accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"></label>
                                    </form>
                                </div>
                                <div class="avatar-preview">
                                    <img class="profile-user-img img-responsive img-circle" id="imagePreview"
                                        src="https://adminlte.io/themes/AdminLTE/dist/img/user3-128x128.jpg"
                                        alt="User profile picture">
                                </div>
                            </div> --}}

                            <div class="row g-3">
                                <span class="text-bold">
                                    <h5 style="font-family:'Noto Sans Lao';color: #193b7c;" >1.ຂໍ້ມູນສ່ວນຕົວ</h5>
                                    {{-- <h5><b>1.ຂໍ້ມູນສ່ວນຕົວ</b></h5> --}}
                                </span>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input wire:model='image' type="file"
                                            class="form-control @error('image') is-invalid @enderror"
                                            id="name" placeholder="ຮູບ">
                                        <label for="name">ຮູບໂປຣຟາຍ</label>
                                        @error('image')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input wire:model='code' type="text"
                                            class="form-control @error('code') is-invalid @enderror" id="name"
                                            placeholder="ຊື່">
                                        <label for="name">ລະຫັດນັກສຶກສາ</label>
                                        @error('code')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select border-0 @error('gender') is-invalid @enderror"
                                            wire:model="gender">
                                            <option value="">ເລືອກ-ເພດ</option>
                                            <option value="1">ຍິງ</option>
                                            <option value="2">ຊາຍ</option>
                                            {{-- <option value="3">ອື່ນໆ</option> --}}
                                        </select>
                                        <label for="subject">ເພດ</label>

                                        @error('gender')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input wire:model='name_lastname' type="text"
                                            class="form-control @error('name_lastname') is-invalid @enderror"
                                            id="name" placeholder="ຊື່">
                                        <label for="name">ຊື່ ນາມສະກຸນ-ລາວ</label>
                                        @error('name_lastname')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input wire:model='name_lastname_en' type="text"
                                            class="form-control @error('name_lastname_en') is-invalid @enderror"
                                            id="name" placeholder="ຊື່">
                                        <label for="name">ຊື່ ນາມສະກຸນ-ອັງກິດ</label>
                                        @error('name_lastname_en')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input wire:model='birtday_date' type="date"
                                            class="form-control @error('birtday_date') is-invalid @enderror"
                                            id="name" placeholder="ຊື່">
                                        <label for="name">ວ.ດ.ປ ເກີດ</label>
                                        @error('birtday_date')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select border-0 @error('status') is-invalid @enderror"
                                            wire:model="status">
                                            <option value="">ເລືອກ-ສະຖານະ</option>
                                            <option value="1">ໂສດ</option>
                                            <option value="2">ມີແຟນ</option>
                                            <option value="3">ແຕ່ງງານ</option>
                                            <option value="4">ຢ່າຮ້າງ</option>
                                            <option value="5">ແຍກກັນຢູ່</option>
                                            <option value="6">ຮັກເຂົາຂ້າງດຽວ</option>
                                        </select>
                                        <label for="subject">ສະຖານະ</label>

                                        @error('status')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> --}}
                                {{-- <div class="col-md-4">
                                    <div class="form-floating">
                                        <input wire:model='nationality' type="text"
                                            class="form-control @error('nationality') is-invalid @enderror"
                                            id="name" placeholder="ຊື່">
                                        <label for="name">ສັນຊາດ</label>
                                        @error('nationality')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> --}}
                                {{-- <div class="col-md-4">
                                    <div class="form-floating">
                                        <input wire:model='religion' type="text"
                                            class="form-control @error('religion') is-invalid @enderror"
                                            id="name" placeholder="ສາສະຫນາ">
                                        <label for="name">ສາສະຫນາ</label>
                                        @error('religion')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select border-0 @error('province_id') is-invalid @enderror"
                                            wire:model="province_id">
                                            <option value="">ເລືອກ-ເເຂວງເກີດ</option>
                                            @foreach ($provinces as $item)
                                                <option value="{{ $item->id }}">{{ $item->name_la }}</option>
                                            @endforeach
                                        </select>
                                        <label for="subject">ເເຂວງເກີດ</label>
                                        @error('province_id')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select border-0 @error('district_id') is-invalid @enderror"
                                            wire:model="district_id">
                                            <option value="">ເລືອກ-ເມືອງເກີດ</option>
                                            @foreach ($districts as $item)
                                                <option value="{{ $item->id }}">{{ $item->name_la }}</option>
                                            @endforeach
                                        </select>
                                        <label for="district_id">ເມືອງເກີດ</label>
                                        @error('district_id')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select border-0 @error('village_id') is-invalid @enderror"
                                            wire:model="village_id">
                                            <option value="">ເລືອກ-ບ້ານເກີດ</option>
                                            @foreach ($villages as $item)
                                                <option value="{{ $item->id }}">{{ $item->name_la }}</option>
                                            @endforeach
                                        </select>
                                        <label for="village_id">ບ້ານເກີດ</label>
                                        @error('village_id')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input wire:model='village_id' type="text"
                                            class="form-control @error('village_id') is-invalid @enderror"
                                            id="name" placeholder="ບ້ານເກີດ">
                                        <label for="name">ບ້ານເກີດ</label>
                                        @error('village_id')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input wire:model='phone' type="number"
                                            class="form-control @error('phone') is-invalid @enderror" id="name"
                                            placeholder="ຊື່">
                                        <label for="name">ເບີໂທ</label>
                                        @error('phone')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input wire:model='email' type="email" class="form-control" id="email"
                                            placeholder="ອີເມວ">
                                        <label for="email">ອີເມວ</label>
                                    </div>
                                </div>
                                <span class="text-bold">
                                    <h5 style="font-family:'Noto Sans Lao';color: #193b7c;" >2.ຂໍ້ມູນຈົບການສຶກສາ</h5>
                                    {{-- <h5><b>2.ຂໍ້ມູນຈົບການສຶກສາ</b></h5> --}}
                                </span>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select
                                            class="form-select border-0 @error('education_year_id') is-invalid @enderror"
                                            wire:model="education_year_id">
                                            <option value="">ເລືອກ-ສົກສືກສາປີຮຽນ</option>
                                            @foreach ($EducationYears as $item)
                                                <option value="{{ $item->id }}">{{ $item->start_year }} -
                                                    {{ $item->end_year }} ລຸ້ນທີ່: {{ $item->genderation }}</option>
                                            @endforeach
                                        </select>
                                        <label for="education_year_id">ສົກສືກສາປິຮຽນ</label>
                                        @error('education_year_id')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select border-0 @error('subject_id') is-invalid @enderror"
                                            wire:model="subject_id">
                                            <option value="">ເລືອກ-ສາຂາວິຊາ</option>
                                            @foreach ($Subjects as $item)
                                                <option value="{{ $item->id }}">{{ $item->name_la }}</option>
                                            @endforeach
                                        </select>
                                        <label for="subject_id">ສາຂາວິຊາ</label>
                                        @error('subject_id')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select
                                            class="form-select border-0 @error('education_system_id') is-invalid @enderror"
                                            wire:model="education_system_id">
                                            <option value="">ເລືອກ-ລະດັບການສຶກສາ</option>
                                            @foreach ($EducationSystem as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="education_system_id">ລະດັບການສຶກສາ</label>
                                        @error('education_system_id')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        {{-- <input wire:model='system' type="text"
                                            class="form-control @error('system') is-invalid @enderror"
                                            id="name" placeholder="ລະບົບ"> --}}
                                            <select class="form-select border-0 @error('system') is-invalid @enderror"
                                            wire:model="gender">
                                            <option value="">ເລືອກ-ລະບົບ</option>
                                            <option value="1">ນອກແຜນ</option>
                                            <option value="2">ໃນແຜນ</option>
                                        </select>
                                        <label for="name">ລະບົບ</label>
                                        @error('system')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-md-4">
                                    <div class="form-floating">
                                        <input wire:model='system' type="text"
                                            class="form-control @error('system') is-invalid @enderror"
                                            id="name" placeholder="ລະບົບ">
                                        <label for="name">ລະບົບ</label>
                                        
                                        @error('system')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input wire:model='scholarship' type="text"
                                            class="form-control @error('scholarship') is-invalid @enderror"
                                            id="name" placeholder="ທືນການສືກສາ">
                                        <label for="name">ທືນການສືກສາ</label>
                                        @error('scholarship')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input wire:model='final_report' type="text"
                                            class="form-control @error('final_report') is-invalid @enderror"
                                            id="name" placeholder="ບົດໂຄງການຈົບຊັ້ນ">
                                        <label for="name">ບົດໂຄງການຈົບຊັ້ນ</label>
                                        @error('final_report')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input wire:model='advisor' type="text"
                                            class="form-control @error('advisor') is-invalid @enderror"
                                            id="name" placeholder="ອາຈານຜູ້ນຳພາ">
                                        <label for="name">ອາຈານຜູ້ນຳພາ</label>
                                        @error('advisor')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input wire:model='co_advisor' type="text"
                                            class="form-control @error('co_advisor') is-invalid @enderror"
                                            id="name" placeholder="ອາຈານຜູ້ຊ່ວຍນຳພາ">
                                        <label for="name">ອາຈານຜູ້ຊ່ວຍນຳພາ</label>
                                        @error('co_advisor')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input wire:model='grade' type="text"
                                            class="form-control @error('grade') is-invalid @enderror"
                                            id="name" placeholder="ກຽດນິຍົມ">
                                        <label for="name">ກຽດນິຍົມ</label>
                                        @error('grade')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input wire:model='performance' type="text"
                                            class="form-control @error('performance') is-invalid @enderror"
                                            id="name" placeholder="ຜົນງານນັກສຶກສາ">
                                        <label for="name">ຜົນງານນັກສຶກສາ</label>
                                        @error('performance')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <span class="text-bold">
                                    <h5 style="font-family:'Noto Sans Lao';color: #193b7c;">3.ຂໍ້ມູນສະຖານທີ່ເຮັດວຽກປະຈຸບັນ</h5>
                                    {{-- <h5><b>3.ຂໍ້ມູນສະຖານທີ່ເຮັດວຽກປະຈຸບັນ</b></h5> --}}
                                </span>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input wire:model='name_work' type="text"
                                            class="form-control @error('name_work') is-invalid @enderror"
                                            id="name" placeholder="ສະຖານທີ່ເຮັດວຽກ">
                                        <label for="name">ຊື່ ສະຖານທີ່ເຮັດວຽກ</label>
                                        @error('name_work')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input wire:model='phone_work' type="number"
                                            class="form-control @error('phone_work') is-invalid @enderror"
                                            id="name" placeholder="ເບີຕິດຕໍ່">
                                        <label for="name">ເບີຕິດຕໍ່</label>
                                        @error('phone_work')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input wire:model='email_work' type="text"
                                            class="form-control @error('email_work') is-invalid @enderror"
                                            id="name" placeholder="ອີເມວ">
                                        <label for="name">ອີເມວ</label>
                                        @error('email_work')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select
                                            class="form-select border-0 @error('province_id_work') is-invalid @enderror"
                                            wire:model="province_id_work">
                                            <option value="">ເລືອກ-ເເຂວງ</option>
                                            @foreach ($provinces as $item)
                                                <option value="{{ $item->id }}">{{ $item->name_la }}</option>
                                            @endforeach
                                        </select>
                                        <label for="subject">ເເຂວງ</label>
                                        @error('province_id_work')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select
                                            class="form-select border-0 @error('district_id_work') is-invalid @enderror"
                                            wire:model="district_id_work">
                                            <option value="">ເລືອກ-ເມືອງ</option>
                                            @foreach ($districts as $item)
                                                <option value="{{ $item->id }}">{{ $item->name_la }}</option>
                                            @endforeach
                                        </select>
                                        <label for="district_id_work">ເມືອງ</label>
                                        @error('district_id_work')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input wire:model='village_id_work' type="text"
                                            class="form-control @error('village_id_work') is-invalid @enderror"
                                            id="name" placeholder="ບ້ານ">
                                        <label for="name">ບ້ານ</label>
                                        @error('village_id_work')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input wire:model='image_work' type="file"
                                            class="form-control @error('image_work') is-invalid @enderror"
                                            id="name" placeholder="image_work">
                                        <label for="name">ຮູບໂລໂກ້/ສະຖານທີ່</label>
                                        @error('image_work')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input wire:model='facebook_work' type="text"
                                            class="form-control @error('facebook_work') is-invalid @enderror"
                                            id="name" placeholder="FaceBook">
                                        <label for="name">FaceBook Page</label>
                                        @error('facebook_work')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <span class="text-bold">
                                    <h5 style="font-family:'Noto Sans Lao';color: #193b7c;" >4.ບັນຊີເຂົ້າສູ່ລະບົບ</h5>
                                </span>
                                {{-- <div class="col-md-12">
                                    <div class="form-floating">
                                        <input wire:model='code' type="text"
                                            class="form-control @error('code') is-invalid @enderror" id="name"
                                            placeholder="ຊື່">
                                        <label for="name">ລະຫັດນັກສຶກສາ</label>
                                        @error('code')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input wire:model='password' type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            id="name" placeholder="FaceBook">
                                        <label for="name">ລະຫັດຜ່ານ</label>
                                        @error('password')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input wire:model='confirmPassword' type="password"
                                            class="form-control @error('confirmPassword') is-invalid @enderror"
                                            id="name" placeholder="FaceBook">
                                        <label for="name">ຍືນຍັນລະຫັດຜ່ານ</label>
                                        @error('confirmPassword')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button wire:click ='SignUp' class="btn btn-primary w-100 py-3" type="button"><i
                                            class="fas fa-pen"></i> ຍືນຍັນສະໝັກ</button>
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
