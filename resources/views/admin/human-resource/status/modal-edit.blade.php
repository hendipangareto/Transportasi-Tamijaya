@foreach($status as $item)

    <div class="modal fade text-left" id="UpdateModalStatus-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Form Update Status</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <form action="{{ route('human-resource.status.update-status', $item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <label>Kode Status: </label>
                        <div class="form-group">
                            <input type="text" readonly id="status_code" name="status_code"
                                   class="form-control bg-transparent" value="{{ $item->status_code }}">
                        </div>
                        <label>Nama Status: </label>
                        <div class="form-group">
                            <input type="text"  id="status_name" name="status_name"
                                   class="form-control" value="{{ $item->status_name }}">
                        </div>
                        <label>Deskripsi Status: </label>
                        <div class="form-group">
                                    <textarea class="form-control" name="status_description" id="status_description" cols="30"
                                              rows="3" data-value="{{ $item->status_description }}">{{ $item->status_description }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="edit-agent" class="btn btn-success mr-1"><i
                                class="bx bx-save mt"></i> Update</button>
                    </div>
                </form>


            </div>
        </div>
    </div>

@endforeach
