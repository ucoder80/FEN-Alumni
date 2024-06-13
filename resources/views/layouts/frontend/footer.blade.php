<div>
    <!-- Footer Start -->
    <div class="container-fluid bg-danger text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top: 6rem;">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-light mb-4">ທີ່ຢູ່</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>
                    @if(!empty($about))
                        {{ $about->address }}
                    @endif
                    </p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>
                        @if(!empty($about))
                        {{ $about->phone }}
                    @endif
                    </p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>
                        @if(!empty($about))
                        {{ $about->email }}
                    @endif
                    </p>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-light mb-4">ເມນູລະບົບ</h4>
                    <a class="btn btn-link" href="">ສະມາສິກເກົ່າ</a>
                    <a class="btn btn-link" href="">ກ່ຽວກັບ</a>
                    <a class="btn btn-link" href="">ຕິດຕໍ່ພົວພັນ</a>
                    <a class="btn btn-link" href="">ສະໝັກສະມາສິກ</a>
                    <a class="btn btn-link" href="">ເຂົ້າສູ່ລະບົບ</a>
                    <a class="btn btn-link" href="">ອອກຈາກລະບົບ</a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-light mb-4">ຊ່ອງທາງຕິດຕໍ່</h4>
                    <p>
                        @if(!empty($about))
                            {{ $about->phone }}
                        @endif
                    </p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    {{-- <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        ອ້າງອີງຈາກ HTML Codex ອອກແບບ ເເລະ ພັດທະນາຕໍ່ໂດຍນັກສຶກສາ ມສ
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        {{-- Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
</div>