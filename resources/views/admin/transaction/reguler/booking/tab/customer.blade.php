 {{-- START TAB CUSTOMER DATA --}}
 <div class="d-flex justify-content-between mb-2">
     <label>Customer: <span style="color:red;">*</span></label>
     <button type="button" class="btn btn-outline-success btn-sm" style="" onclick="openCreateCustomer()"><i
             class="bx bx-plus-circle"></i> Tambah Customer</button>
 </div>
 <div class="form-group">
     <select id="transaction_customer_master" name="transaction_customer_master" class="form-control required">
     </select>
 </div>
 <hr />
 <div id="customer_detail_section" style="display:none;">
     <h5>Customer Detail</h5>
     <div class="row">
         <div class="col-4">
             <label>Customer Code</label>
             <div class="form-group">
                 <input type="hidden" id="transaction_customer_id" name="transaction_customer_id"
                     class="form-control required" />
                 <input id="transaction_customer_code" name="transaction_customer_code" class="form-control required"
                     readonly />
             </div>
         </div>
         <div class="col-4">
             <label>Customer NIK</label>
             <div class="form-group">
                 <input id="transaction_customer_nik" name="transaction_customer_nik" class="form-control required"
                     readonly />
             </div>
         </div>
         <div class="col-4">
             <label>Customer Phone</label>
             <div class="form-group">
                 <input id="transaction_customer_phone" name="transaction_customer_phone" class="form-control required"
                     readonly />
             </div>
         </div>
         <div class="col-6">
             <label>Customer Name</label>
             <div class="form-group">
                 <input id="transaction_customer_name" name="transaction_customer_name" class="form-control required"
                     readonly />
             </div>
         </div>
         <div class="col-6">
             <label>Customer Email</label>
             <div class="form-group">
                 <input id="transaction_customer_email" name="transaction_customer_email" class="form-control required"
                     readonly />
             </div>
         </div>
     </div>
     <div class="w-100 text-right">
         <button class="btn btn-success" type="button" onClick="changeTab(`travel-detail-tab`)">Next</button>
     </div>
 </div>
 {{-- END TAB CUSTOMER DATA --}}
