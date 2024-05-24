
    <div class="row g-5 mx-lg-0">
        <div class="col-md-12 contact-form wow fadeIn" data-wow-delay="0.1s">
            <div class="bg-light p-4" style="border-radius: 50px;">
                <form>
                    <div class="row">
                        <form action="{{ route('frontend.Search') }}">
                        <div class="col-md-6 pt-2">
                            <div class="form-floating">
                                <input wire:model='search' type="text" class="form-control" id="search"
                                    placeholder="ຄົ້ນຫາຂໍ້ມູນ..." style="border-radius: 50px; font-size:20px">
                                <label for="search">ຄົ້ນຫາຂໍ້ມູນ...</label>
                            </div>
                        </div>
                    </form>
                        {{-- <div class="col-md-6 pt-2">
                            <select class="form-select border-0" wire:model='education_year_id'
                                style="height: 55px;">
                                <option selected>ສົກຮຽນປີ</option>
                                @foreach ($education_year as $item)
                                    <option value="{{ $item->id }}">{{ $item->start_year }} -
                                        {{ $item->end_year }} ລຸ້ນທີ: {{ $item->genderation }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>

