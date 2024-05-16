<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5><i class="fas fa-cog"></i>
                         {{-- ຂໍ້ມູນເວບໄຊ <i class="fa fa-angle-double-right"></i> --}}
                        ຕັ້ງຄ່າລະບົບ</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a
                                href="{{ route('backend.dashboard') }}">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item active">ຕັ້ງຄ່າລະບົບ</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" style="background: linear-gradient(90deg, rgba(26,159,245,1) 20%, rgba(33,8,176,1) 52%, rgba(61,8,176,1) 84%);">
                                <h5 style="color:#fff"><b><i class="fas fa-building"></i> ຂໍ້ມູນຕັ້ງຄ່າລະບົບ</b></h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="container">
                                            <div wire:ignore class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type='file' wire:model="logo" id="imageUpload"
                                                        class="@error('logo') is-invalid @enderror" accept=".png, .jpg, .jpeg" />
                                                    <label for="imageUpload"></label>
                                                </div>
                                                <label class="text-center">ປ່ຽນໂລໂກ</label>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview"
                                                        style="background-image: url({{ asset('logo/noimage.jpg') }});">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @error('logo')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">ຊື່</label>
                                            <input type="text" wire:model="name_la" class="form-control @error('name_la') is-invalid @enderror" placeholder="ຊື່ອົງກອນ">
                                            @error('name_la')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">ເບີໂທ</label>
                                            <input type="text" wire:model="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="ຂໍ້ມູນຕິດຕໍ່">
                                            @error('phone')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="detail">ທີ່ຢູ່ຫ້ອງການ</label>
                                            <div wire:ignore>
                                                <textarea class="form-control" wire:model="address">{{$address}}</textarea>
                                            </div>
                                            @error('address')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="detail">ຄຳອະທິບາຍຕັ້ງຄ່າລະບົບຫ້ອງການ</label>
                                            <div wire:ignore>
                                                <textarea class="form-control" id="note" wire:model="note">{{$note}}</textarea>
                                            </div>
                                            @error('note')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12" wire:ignore>
                                        <div id="map-update-s" style="height:250px; width: 100%;" class="my-3"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>ສະເເດງແຜນທີ່</label>
                                            <button type="button" class="btn btn-outline-primary form-control"><a href="#" onclick="getLocations()"><i class="fas fa-map-marker-alt"></i> ສະເເດງແຜນທີ່ <i class="icon-long-arrow-right"></i></a></button>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>lat</label>
                                            <input wire:model="lats" placeholder="lat" type="text"
                                                class="form-control @error('lats') is-invalid @enderror" id="lats" readonly>
                                            @error('lats')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>long</label>
                                            <input wire:model="longs" placeholder="long" type="text"
                                                class="form-control @error('longs') is-invalid @enderror" id="longs" readonly>
                                            @error('longs')
                                            <span style="color: red" class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="card-footer">
                                {{-- @foreach ($rolepermissions as $items)
                                @if ($items->permissionname->name == 'action_about') --}}
                                <a href="{{ route('backend.dashboard') }}" class="btn btn-info"><i class="fas fa-arrow-left"></i> ກັບຄືນຫນ້າຫຼັກ</a>
                                <button wire:click.live="update" class="btn btn-success float-right"><i class="fa fa-edit"></i> ບັນທຶກແກ້ໄຂ</button>
                               {{-- @endif
                                @endforeach --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </section>
    </div>
    @include('layouts.backend.about-page-script')
    