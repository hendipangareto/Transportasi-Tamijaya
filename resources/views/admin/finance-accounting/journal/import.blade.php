<form action="javascript:void(0)" id="form-import-journal" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <label>Excel File</label>
            <div class="form-group">
                <input type="file" id="journal-file" name="file" class="form-control form-control-sm">
            </div>
        </div>
        <div class="col-12">

            <div class="form-group">
                <button type="submit" id="add-journal" class="btn btn-success mt-1  float-right"
                onclick="generateDatatoJSON()"><i class="bx bx-check mt"></i> Submit</button>
            </div>
        </div>
    </div>
</form>
@push('page-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
@endpush
