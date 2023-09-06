  {{-- START TAB TRAVEL DETAIL --}}
  <div class="row">
      <div class="col-5">
          <label>Tanggal Berangkat: <span class="text-danger">*</span></label>
          <div class="form-group">
              <input type="date" id="wisata_tanggal_berangkat" onchange="calculateDate()"
                  name="wisata_tanggal_berangkat" class="form-control required" value="@php
                      echo date('Y-m-d');
                  @endphp">
          </div>
      </div>
      <div class="col-5">
          <label>Tanggal Kembali: <span class="text-danger">*</span></label>
          <div class="form-group">
              <input type="date" id="wisata_tanggal_kembali" name="wisata_tanggal_kembali" onchange="calculateDate()"
                  class="form-control required" value="@php
                      echo date('Y-m-d');
                  @endphp">
          </div>
      </div>
      <div class="col-2">
          <label>Penumpang: <span class="text-danger">*</span></label>
          <div class="form-group">
              <div class="input-group">
                  <input type="number" class="form-control" id="wisata_jumlah_penumpang"
                      name="wisata_jumlah_penumpang" value="">
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
          <h6 for="">
              Estimasi Perjalanan Wisata : <span class="font-weight-bold" id="estimate-date"> 1 </span> Hari
          </h6>
          {{-- <button onclick="calculateEstimation()" class="btn btn-sm btn-primary"><i class="bx bx-calculator"></i> HITUNG
            ESTIMASI BIAYA</button> --}}
      </div>
  </div>
  <div id="route-wisata-list">
      <div class="row" id="route-wisata-0">
          <div class="col-9">
              <label>Destinasi: <span class="text-danger">*</span></label>
              <div class="form-group">
                  <select id="destination-wisata-0" name="destination_wisata[]" class="form-control required">
                      <option value="">--Silahkan Pilih Destinasi--</option>
                      @foreach ($destinations as $destination)
                          <option value="{{ $destination->id }}">{{ $destination->destination_wisata_name }}
                          </option>
                      @endforeach
                  </select>
              </div>
          </div>
          <div class="col-2">
              <label>Estimasi Hari :</label>
              <div class="form-group">
                  <div class="input-group">
                      <input type="number" class="form-control" id="estimasi_hari_rute_wisata-0"
                          name="estimasi_hari_rute_wisata[]" value="">
                      <div class="input-group-append">
                          <span class="input-group-text">Hari</span>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-1">
              <div class="form-group mt-2">
                  <button class="btn btn-light-success btn-sm btn-block text-uppercase px-0" onclick="addRoute()"><i
                          class="bx bx-plus"></i></button>
              </div>
          </div>
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
      <div class="col-12">
          <button class="btn btn-warning btn-block" onclick="searchTravel()"><i class="bx bx-search-alt"></i> Check
              Availibility</button>
      </div>
  </div>
  <hr />
  <div id="reguler-schedule-not-available" style="display: none">
      <div class="alert alert-secondary text-center font-weight-bold" role="alert">
          Sorry, armada is not available. Try another date departure or date return.
      </div>
  </div>

  <style>
      .bg-selected {
          background-color: #e7ffe7;
      }

  </style>
  <div id="pariwisata-bus-available" style="display: none">

  </div>
  <div id="pariwisata-armada-available" class="row mt-2" style="display: none">
      <hr />
      <div class="col-md-12">
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
          <div class="row">
              <div class="col-md-12">
                  <button type="button" class="btn btn-light-primary" onClick="addItinerary()"><i
                          class="bx bx-plus-circle"></i> Add Itinerary</button>
                  <table class="table table-bordered table-hover table-data mt-2">
                      <thead>
                          <tr>
                              <th class="w-25p">Tujuan<span class="text-danger">*</span></th>
                              <th>Destinasi<span class="text-danger">*</span></th>
                              <th class="w-25p">Notes</th>
                              <th class="w-5p text-center">Action</th>
                          </tr>
                      </thead>
                      <tbody id="tbody-detail-itinerary">

                      </tbody>
                  </table>
              </div>
          </div>
          <div class="row">
              <div class="col-md-6">
                  <label>Detail Picked Bus</label>
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
                              <th class="w-25p text-right">Bus Price</th>
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
                      <tr>
                          <td>Total Rent Price <span class="text-danger">*</span></td>
                          <td>
                              <div class="input-group input-group-sm">
                                  <div class="input-group-append">
                                      <span class="input-group-text">Rp</span>
                                  </div>
                                  <input type="text"
                                      class="form-control form-control-sm text-right input-number required"
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


          </div>

          <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                      <label class="col-form-label">Catatan Travel Pariwisata</label>
                      <textarea id="notes_pariwisata" name="notes_pariwisata" style="min-height:100px;"
                          class="form-control form-control-sm "></textarea>
                  </div>
              </div>
          </div>


          <div class="row">
              <div class="col-md-6">
                  <button class="btn btn-outline-primary btn-block" onclick="printPariwisataOffering()"><i
                          class="bx bx-printer"></i>Cetak Penawaran
                      Pariwisata</button>
              </div>
              <div class="col-md-6">
                  <button class="btn btn-outline-info btn-block"><i class="bx bx-file"></i>Cetak
                      Kwitansi</button>
              </div>
          </div>
          <input type="hidden" id="total-itinerary" name="total_itinerary" value="0">
      </div>
      <div class="col-12 text-right mt-2">
          <button class="btn btn-success" type="button" onClick="changeTab(`payment-tab`)">Next</button>
      </div>
  </div>


  {{-- END TAB TRAVEL DETAIL --}}
