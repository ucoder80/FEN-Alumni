
    <div class="row g-5 mx-lg-0">
        <div class="col-md-12 contact-form wow fadeIn">
            <div class="bg-light p-4">
                    <div class="row">
                        <form action="{{ route('frontend.Search') }}">
                            <div class="col-md-12 pt-2 d-flex">
                                <div class="form-floating flex-grow-1">
                                    <input wire:model='search' type="text" class="form-control" id="search" name="search" required
                                        placeholder="ຄົ້ນຫາຂໍ້ມູນ..." style="border-radius: 50px; font-size:20px">
                                    <label for="search">ຄົ້ນຫາຂໍ້ມູນ...</label>
                                </div>
                                <button type="submit" class="btn btn-primary ms-2" style="border-radius: 50%; height: 55px; width: 55px;">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>

