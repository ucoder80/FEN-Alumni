<div>
    <!-- Contact Start -->
    <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container contact-page py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-md-6 contact-form wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="mb-4">ທ່ານມີຄຳຖາມຫຍັງບໍ່?</h1>
                    <div class="bg-light p-4">
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input wire:model='name' type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="ຊື່">
                                        <label for="name">ຊື່</label>
                                        @error('name')
                                        <span style="color: red" class="error">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input wire:model='email' type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="ອີເມວ">
                                        <label for="email">ອີເມວ</label>
                                        @error('email')
                                        <span style="color: red" class="error">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input wire:model='subject' type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" placeholder="ຫົວຂໍ້">
                                        <label for="subject">ຫົວຂໍ້</label>
                                        @error('subject')
                                        <span style="color: red" class="error">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea wire:model='message' class="form-control @error('message') is-invalid @enderror" placeholder="Leave a message here" id="message" style="height: 100px"></textarea>
                                        <label for="message">ຄຳອະທິບາຍ</label>
                                        @error('message')
                                        <span style="color: red" class="error">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button wire:click ='SendMessage' class="btn btn-primary w-100 py-3" type="button"> ສົ່ງຂໍ້ຄວາມ <i class="fas fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s">
                    <div class="position-relative h-100">
                        <iframe class="position-absolute w-100 h-100" style="object-fit: cover;"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        frameborder="0" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
</div>
