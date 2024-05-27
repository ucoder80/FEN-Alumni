<div>
    <!-- Contact Start -->
    <div class="container-fluid d-flex justify-content-center align-items-center overflow-hidden py-2 px-lg-0">
        <div class="container contact-page py-3 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-md-12 contact-form wow fadeIn">
                    <h1 class="mb-4 text-center"><i class="fas fa-user-edit"></i> ແກ້ໄຂຂໍ້ມູນສ່ວນຕົວ</h1>
                    <div class="bg-light p-4">
                        <form>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input wire:model='name_lastname' type="text" class="form-control @error('name_lastname') is-invalid @enderror" id="name_lastname" placeholder="ຊື່">
                                        <label for="name_lastname">ຊື່-ລາວ</label>
                                        @error('name_lastname')
                                        <span style="color: red" class="error">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input wire:model='name_lastname_en' type="text" class="form-control @error('name_lastname_en') is-invalid @enderror" id="name_lastname_en" placeholder="ຊື່">
                                        <label for="name_lastname_en">ຊື່-ອັງກິດ</label>
                                        @error('name_lastname_en')
                                        <span style="color: red" class="error">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input wire:model='email' type="email" class="form-control" id="email" placeholder="ອີເມວ">
                                        <label for="email">ອີເມວ</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input wire:model='subject' type="text" class="form-control" id="subject" placeholder="ຫົວຂໍ້">
                                        <label for="subject">ຫົວຂໍ້</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea wire:model='message' class="form-control" placeholder="Leave a message here" id="message" style="height: 100px"></textarea>
                                        <label for="message">ຄຳອະທິບາຍ</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button wire:click ='SendMessage' class="btn btn-primary w-100 py-3" type="button"><i class="fas fa-pen"></i> ຍືນຍັນແກ້ໄຂ</button>
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
