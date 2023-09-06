  {{-- START TAB TRAVEL DETAIL --}}
  <style>
      .sm-input {
          width: 35px;
          padding-left: 5px;
          padding-right: 5px
      }

      .sm-height {
          height: 20px !important;
      }

  </style>

  <div class="row">
      <div class="col-5">
          <label>Tanggal Berangkat: <span class="text-danger">*</span></label>
          <div class="form-group">
              <input type="date" id="wisata_tanggal_berangkat" onchange="calculateWisataDate()"
                  name="wisata_tanggal_berangkat" class="form-control required" min="@php
                      echo date('Y-m-d');
                  @endphp"
                  value="@php
                      echo date('Y-m-d');
                  @endphp">
          </div>
      </div>
      <div class="col-5">
          <label>Tanggal Kembali: <span class="text-danger">*</span></label>
          <div class="form-group">
              <input type="date" id="wisata_tanggal_kembali" name="wisata_tanggal_kembali"
                  onchange="calculateWisataDate()" class="form-control required" min="@php
                      echo date('Y-m-d');
                  @endphp"
                  value="@php
                      echo date('Y-m-d');
                  @endphp">
          </div>
      </div>
      <div class="col-2">
          <label>Penumpang: <span class="text-danger">*</span></label>
          <div class="form-group">
              <div class="input-group">
                  <input type="number" class="form-control" id="wisata_jumlah_penumpang"
                      name="wisata_jumlah_penumpang" value="100">
                  <div class="input-group-append">
                      <span class="input-group-text">Orang</span>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="row my-1">
      <div class="col-md-12 d-flex justify-content-between">
          <h6 class="text-uppercase font-weight-bold">Rute Wisata</h6>
          {{-- <button onclick="openModal('new-route')" class="btn py-0 btn-sm btn-outline-primary"><i
                  class="bx bx-plus-circle"></i> Tambah Master Rute</button> --}}
      </div>
  </div>
  <div id="route-wisata-list">
      <div class="row" id="route-wisata-0">
          <div class="col-4">
              <label>Dari: <span class="text-danger">*</span></label>
              <div class="form-group">
                  <select id="from_wisata" name="from_wisata" class="form-control required"
                      onchange="calculateEstimationRouteDay()">
                      <option value="">--Silahkan Pilih Destinasi--</option>
                      @foreach ($destinations as $destination)
                          <option value="{{ $destination->id }}">{{ $destination->destination_wisata_name }}
                          </option>
                      @endforeach
                  </select>
              </div>
          </div>
          <div class="col-4">
              <label>Ke: <span class="text-danger">*</span></label>
              <div class="form-group">
                  <select id="target_wisata" name="target_wisata" class="form-control required"
                      onchange="calculateEstimationRouteDay()">
                      <option value="">--Silahkan Pilih Destinasi--</option>
                      @foreach ($destinations as $destination)
                          <option value="{{ $destination->id }}">{{ $destination->destination_wisata_name }}
                          </option>
                      @endforeach
                  </select>
              </div>
          </div>
          <div class="col-2">
              <label>perjalanan :</label>
              <div class="form-group">
                  <div class="input-group">
                      <input type="number" class="form-control bg-transparent" id="estimasi_perjalanan_pariwisata"
                          name="estimasi_perjalanan_pariwisata" value="" readonly>
                      <div class="input-group-append">
                          <span class="input-group-text">Hari</span>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-2">
              <label>Wisata :</label>
              <div class="form-group">
                  <div class="input-group">
                      <input type="number" class="form-control bg-transparent" id="estimasi_hari_pariwisata"
                          name="estimasi_hari_pariwisata" value="" readonly>
                      <div class="input-group-append">
                          <span class="input-group-text">Hari</span>
                      </div>
                  </div>
              </div>
          </div>
          {{-- <div class="col-1">
            <div class="form-group mt-2">
                <button class="btn btn-light-success btn-sm btn-block text-uppercase px-0" onclick="addRoute()"><i
                        class="bx bx-plus"></i></button>
            </div>
        </div> --}}
      </div>
  </div>

  {{-- <div class="row">
    <div class="col-5">
        <label>Ke Provinsi: <span class="text-danger">*</span></label>
        <div class="form-group">
            <select id="province-to" onchange="changeProvince('to')" name="province_to" class="form-control required">
                <option value="">--Silahkan Pilih Provinsi--</option>
                @foreach ($provinces as $province)
                    <option value="{{ $province->id }}">{{ $province->state_name }}</option>

                @endforeach
            </select>
        </div>
    </div>
    <div class="col-5">
        <label>Ke Kota: <span class="text-danger">*</span></label>
        <div class="form-group">
            <select id="city-to" name="city_to" class="form-control required">
                <option value="">--Silahkan Pilih Kota--</option>
            </select>
        </div>
    </div>
    <div class="col-2">
        <label>Destinasi Wisata</label>
        <div class="form-group">
            <button class="btn btn-light-primary btn-block text-uppercase" onclick="openDestination('to')"><i
                    class="bx bx-info-circle"></i>
                Lihat</button>
        </div>
    </div>
</div> --}}
  <hr />
  <div class="row">
      <div class="col-6">
          <button class="btn btn-warning btn-block" onclick="checkAvailability()"><i class="bx bx-search-alt"></i>
              Cek
              Ketersediaan</button>
      </div>
      <div class="col-6">
          <button class="btn btn-success btn-block" disabled id="btn-next-transaction" onclick="nextTransaction()"><i
                  class="bx bx-fast-forward"></i>
              Lanjut Transaksi</button>
      </div>
  </div>
  <hr />
  <style>
      .bg-selected {
          background-color: #e7ffe7;
      }

  </style>


  {{-- END TAB TRAVEL DETAIL --}}


  {{-- style="display: none" --}}
  <div id="pariwisata-bus-availability" class="row" style="display: none">
      <div class="col-md-4">
          <h6 class="text-uppercase font-weight-bold">Data Ketersediaan Bus : <span></span></h6>
          <hr>
          <table style="font-size:11px!important;">
              <tr>
                  <td>Mikro Bus (20 - 30 seats) </td>
                  <td>:</td>
                  <td><span id="mikro-bus-av"></span> Bus Available</td>
              </tr>
              <tr>
                  <td>Medium Bus ( 30 -39 seats)</td>
                  <td>:</td>
                  <td><span id="medium-bus-av"></span> Bus Available</td>
              </tr>
              <tr>
                  <td>Big Bus(40 - 50 seats) </td>
                  <td>:</td>
                  <td><span id="big-bus-av"></span> Bus Available</td>
              </tr>
          </table>
          <hr>
          <label for="">
              Kapasitas Penumpang : <span id="text-capcity-passanger"></span><br>
              Sisa Kapasitas Penumpang : <span id="text-offside-passanger"></span><br>
              Status : <span class="text-success">DONE</span>
          </label>

          {{-- <div class="row mt-2">
              <div class="col-md-6">
                  <button class="btn btn-outline-primary btn-block" onclick="printPariwisataOffering()"><i
                          class="bx bx-printer"></i>Cetak</button>
              </div>
              <div class="col-md-6">
                  <button class="btn btn-outline-success btn-block" onclick="savePariwisataOffering()"><i
                          class="bx bx-check-circle"></i>Simpan</button>
              </div>
          </div> --}}
      </div>
      <div class="col-md-8">
          <h6 class="text-uppercase font-weight-bold">Estimasi Biaya : <span></span></h6>
          <hr>
          <style>
              #table-estimate-bus thead th {
                  padding-top: 10px;
                  padding-bottom: 10px;
              }

          </style>
          <table class="table" id="table-estimate-bus">
              <thead>
                  <th style="width:20%">Tipe</th>
                  <th style="width:15%">Unit <span class="text-danger">*</span> </th>
                  <th>Hari</th>
                  <th>Harga</th>
                  <th>Total Harga</th>
              </thead>
              <tbody>
                  <tr>
                      <td style="width:20%">Mikro Bus</td>
                      <td style="width:15%"><input onchange="calculatePriceBus('mikro')" type="text" id="mikro-bus-unit"
                              name="offering_unit_mikro" placeholder="0"
                              class="form-control form-control-sm text-center sm-input"></td>
                      <td>
                          <input type="text"
                              class="form-control form-control-sm bg-transparent sm-input text-center day-wisata"
                              readonly>
                      </td>
                      <td>
                          <div class="input-group input-group-sm">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">Rp.</span>
                              </div>
                              <input type="text" class="form-control bg-transparent input-number" readonly
                                  id="mikro-bus-price" name="mikro_unit_offering_price">
                          </div>
                      </td>
                      <td>
                          <div class="input-group input-group-sm">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">Rp.</span>
                              </div>
                              <input type="text" class="form-control bg-transparent input-number" id="mikro-bus-total-price" value="0" readonly>
                          </div>
                      </td>
                  </tr>
                  <tr>
                      <td style="width:20%">Medium Bus</td>
                      <td><input onchange="calculatePriceBus('medium')" type="text" name="offering_unit_medium"
                              id="medium-bus-unit" placeholder="0"
                              class="form-control form-control-sm text-center sm-input"></td>
                      <td>
                          <input type="text"
                              class="form-control form-control-sm  bg-transparent sm-input text-center day-wisata"
                              readonly>
                      </td>
                      <td>
                          <div class="input-group input-group-sm">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">Rp.</span>
                              </div>
                              <input type="text" class="form-control bg-transparent input-number" readonly
                                  id="medium-bus-price" name="medium_unit_offering_price">
                          </div>
                      </td>
                      <td>
                          <div class="input-group input-group-sm">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">Rp.</span>
                              </div>
                              <input type="text" class="form-control bg-transparent input-number" id="medium-bus-total-price"
                                  value="0" readonly>
                          </div>
                      </td>
                  </tr>
                  <tr>
                      <td style="width:20%">Big Bus</td>
                      <td><input onchange="calculatePriceBus('big')" type="text" name="offering_unit_bigbus"
                              id="big-bus-unit" placeholder="0"
                              class="form-control form-control-sm text-center sm-input"></td>
                      <td>
                          <input type="text"
                              class="form-control form-control-sm  bg-transparent sm-input text-center day-wisata"
                              readonly>
                      </td>
                      <td>
                          <div class="input-group input-group-sm">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">Rp.</span>
                              </div>
                              <input type="text" class="form-control bg-transparent input-number" readonly
                                  id="big-bus-price" name="bigbus_unit_offering_price">
                          </div>
                      </td>
                      <td>
                          <div class="input-group input-group-sm">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">Rp.</span>
                              </div>
                              <input type="text" class="form-control bg-transparent input-number" id="big-bus-total-price" value="0" readonly>
                          </div>
                      </td>
                  </tr>
                  <tr>
                      <td colspan="4" class="font-weight-bold text-right">TOTAL BIAYA</td>
                      <td>
                          <div class="input-group input-group-sm">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">Rp.</span>
                              </div>
                              <input type="text" class="form-control bg-transparent input-number" readonly
                                  id="total-price-bus" name="total_offering_price">
                          </div>
                      </td>
                  </tr>
              </tbody>
          </table>
      </div>
  </div>

  <div id="pariwisata-next-transaction" style="display: none">
      <div class="row">
          <div class="col-md-6">
              <h6 class="text-uppercase font-weight-bold">Data Penjajakan</h6>
              <style>
                  .table-penjajakan thead tr th,
                  .table-penjajakan tbody tr td {
                      padding-top: 10px;
                      padding-bottom: 10px;
                      font-size: 11px !important;
                  }

              </style>
              <table class="table table-penjajakan" id="table-estimate-bus">
                  <thead>
                      <tr>
                          <th>Tipe</th>
                          <th>Unit</th>
                          <th>Hari</th>
                          <th>Harga</th>
                          <th>Total Harga</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>Mikro Bus</td>
                          <td id="td-mikro-bus-unit">
                          </td>
                          <td class="td-day-wisata"> </td>
                          <td id="td-mikro-bus-price"> </td>
                          <td id="td-mikro-bus-total-price"> </td>
                      </tr>
                      <tr>
                          <td>Medium Bus</td>
                          <td id="td-medium-bus-unit">
                          </td>
                          <td class="td-day-wisata"> </td>
                          <td id="td-medium-bus-price"> </td>
                          <td id="td-medium-bus-total-price"> </td>
                      </tr>
                      <tr>
                          <td>Big Bus</td>
                          <td id="td-big-bus-unit">
                          </td>
                          <td class="td-day-wisata"> </td>
                          <td id="td-big-bus-price"> </td>
                          <td id="td-big-bus-total-price"> </td>
                      </tr>
                      <tr>
                          <td colspan="4" class="font-weight-bold text-right">TOTAL BIAYA</td>
                          <td id="td-total-price-bus"></td>
                      </tr>
                  </tbody>
              </table>
              <label for="">Catatan Pariwisata :</label>
              <textarea name="notes_pariwisata" class="form-control form-control-sm" placeholder="Silahkan tulis catatan Pariwisata"></textarea>
          </div>
          <div class="col-md-6">


              <div class="d-flex justify-content-between">
                  <label>Data Detail Tujuan Wisata</label>
                  <button type="button" class="btn btn-sm btn-light-primary py-0" onclick="addItinerary()"><i
                          class="bx bx-plus-circle"></i> Add Itinerary</button>
              </div>


              <table class="table table-bordered table-hover table-data mt-1">
                  <thead>
                      <tr>
                          <th class="w-25p">Tujuan<span class="text-danger">*</span></th>
                          <th>Destinasi<span class="text-danger">*</span></th>
                          <th class="w-25p">Notes</th>
                          <th class="w-5p text-center">Act.</th>
                      </tr>
                  </thead>
                  <tbody id="tbody-detail-itinerary">

                  </tbody>
              </table>
          </div>
      </div>
      <style>
          .table-data thead tr th {
              font-size: 11px !important;
              padding-top: 10px !important;
              padding-bottom: 10px !important;
          }

          .table-data tfoot tr td {
              font-size: 11px !important;
              padding-top: 10px !important;
              padding-bottom: 10px !important;
              padding-left: 10px !important;
              padding-right: 10px !important;
          }

      </style>
      {{-- <div class="row">
          <div class="col-md-12">
          </div>
      </div> --}}


      <div class="row mt-2">
          <div class="col-md-6">
              <div class="d-flex justify-content-between">
                    <input type="hidden" id="schedule_pariwisata" name="schedule_pariwisata" >
                  <label>Detail Picked Bus</label>
                  <button class="btn py-0 btn-sm btn-outline-warning" onclick="checkAvailableArmada()"><i
                          class="bx bx-time"></i> Jadwal Bus</button>
              </div>
              <style>
                  #table-bus-price tbody tr td {
                      font-size: 12px !important;
                  }

              </style>
              <table class="table table-bordered table-hover table-data mt-1" id="table-bus-price">
                  <thead>
                      <tr>
                          <th class="w-25p">Tipe Bus</th>
                          <th class="w-25p">No Police</th>
                      </tr>
                  </thead>
                  <tbody id="tbody-armada-booked">
                  </tbody>
              </table>
          </div>


          <div class="col-md-6">

              <table class="table table-bordered table-hover table-data">
                  <tr>
                      <td>Total Hari <span class="text-danger">*</span></td>
                      <td>
                          <div class="input-group input-group-sm">
                              <input type="text"
                                  class="form-control form-control-sm bg-transparent text-right input-number required"
                                  id="total-days" name="total_days" value="1" readonly>
                              <div class="input-group-append">
                                  <span class="input-group-text">Hari</span>
                              </div>
                          </div>
                      </td>
                  </tr>
                  {{-- <tr>
                    <td>Total Hari Tambahan<span class="text-danger">*</span></td>
                    <td>
                        <div class="input-group input-group-sm">
                            <input type="text"
                                class="form-control form-control-sm bg-transparent text-right input-number required"
                                id="additional-total-days" name="additional_total_days" placeholder="0"
                                onchange="calculateEstimationRouteDay()">
                            <div class="input-group-append">
                                <span class="input-group-text">Hari</span>
                            </div>
                        </div>
                    </td>
                </tr> --}}
                  <tr>
                      <td>Total Rent Price <span class="text-danger">*</span></td>
                      <td>
                          <div class="input-group input-group-sm">
                              <div class="input-group-append">
                                  <span class="input-group-text">Rp</span>
                              </div>
                              <input type="text" class="form-control form-control-sm text-right input-number required"
                                  id="bus-price" name="bus_price">
                          </div>
                      </td>
                  </tr>
                  <tr>
                      <td>Additional Price <span class="text-danger">*</span></td>
                      <td>
                          <div class="input-group input-group-sm">
                              <div class="input-group-append">
                                  <span class="input-group-text">Rp</span>
                              </div>
                              <input type="text" class="form-control form-control-sm text-right input-number "
                                  id="additional-price" name="additional_price" value="" placeholder="0"
                                  onchange="calculateTotalPrice()">
                          </div>
                      </td>
                  </tr>
                  <tr>
                      <td>Discount <span class="text-danger">*</span></td>
                      <td>
                          <div class="input-group input-group-sm">
                              <div class="input-group-append">
                                  <span class="input-group-text">Rp</span>
                              </div>
                              <input type="text" class="form-control form-control-sm text-right input-number "
                                  id="discount" name="discount" value="" placeholder="0"
                                  onchange="calculateTotalPrice()">
                          </div>
                      </td>
                  </tr>
                  <tr>
                      <td class="font-weight-bold">TOTAL PRICE</td>
                      <td>
                          <div class="input-group input-group-sm">
                              <div class="input-group-append">
                                  <span class="input-group-text">Rp</span>
                              </div>
                              <input type="text"
                                  class="form-control form-control-sm text-right input-number bg-transparent"
                                  id="total-price" name="total_price" value="0" readonly>
                          </div>
                      </td>
                  </tr>
              </table>
          </div>
          <div class="col-md-12">
              <div class="w-100 text-right">
                  <button class="btn btn-primary" type="button" onClick="printOffering()">Cetak Penawaran</button>
                  <button class="btn btn-success" type="button" onClick="changeTab(`payment-tab`)">Next</button>
                  {{-- <button class="btn btn-outline-success" type="button" onClick="savePariwisataOffering()"><i
                          class="bx bxs-save"></i> Save Data</button> --}}
              </div>
          </div>
      </div>
  </div>
