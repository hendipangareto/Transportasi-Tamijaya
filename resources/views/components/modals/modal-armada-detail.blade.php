{{-- Modal Armada Detail --}}
<div class="modal fade" id="ArmadaDetailModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-md-5">
                        <h4 class="mb-4">Informasi Bus</h4>
                        <ul>
                            {{-- <li>
                                <label>Kode Bus</label>
                                <p id="bus_gallery_bus_code"></p>
                            </li> --}}
                            <li>
                                <label>Tipe Bus</label>
                                <p id="bus_gallery_bus_type"></p>
                            </li>
                            <li>
                                <label>Kapasitas Bus</label>
                                <p id="bus_gallery_bus_capacity"></p>
                            </li>
                            <li>
                                <label>Nama Bus</label>
                                <p id="bus_gallery_bus_name"></p>
                            </li>
                            <li>
                                <label>Deskripsi Bus</label>
                                <p id="bus_gallery_description"></p>
                            </li>
                            <li>
                                <label>Fasilitas Bus</label>
                                <ul class="bus-facilities" id="bus_gallery_facility">
                                    {{-- <li>
                                        <div class="card--facilities-sm">
                                             <ion-icon name="checkmark-done-outline" class="icon mr-2"></ion-icon>
                                            Bus AC
                                        </div>
                                    </li> --}}
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="col-12 col-md-7">
                        <h4 class="mb-4">Galeri Bus</h4>
                        <img src="{{ asset('images/executive.png') }}" id="bus_gallery_bus_image" class="img-fluid d-block mx-auto">
                        
                        <h5 class="mt-4">Detail Bus</h5>
                        <div class="owl-carousel owl-theme" id="owl-carousel-4">
                            <div class="item">
                                <img src="{{ asset('images/mb-01.png') }}" class="img-fluid w-100">
                            </div>
                            <div class="item">
                                <img src="{{ asset('images/mb-02.png') }}" class="img-fluid w-100">
                            </div>
                            <div class="item">
                                <img src="{{ asset('images/mb-03.png') }}" class="img-fluid w-100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>