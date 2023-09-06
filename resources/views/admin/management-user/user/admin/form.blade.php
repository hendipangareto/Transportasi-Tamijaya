<div class="card" style="box-shadow: -8px 12px 18px 0 rgb(25 42 70 / 13%) !important">
    <div class="card-header">
        <h4 class="card-title">Form Data User Admin</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form action="javascript:void(0)" id="form-user-admin" class="form" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <input type="hidden" id="id" name="id" value="">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" id="username" class="form-control" name="username"
                                    placeholder="Silahkan masukan username">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Nama User</label>
                                <input type="text" id="name" class="form-control" name="name"
                                    placeholder="Silahkan masukan nama user admin">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" id="email" class="form-control" name="email"
                                    placeholder="Silahkan masukan email user">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="password">Password</label>                                
                                <input type="text" id="password" class="form-control" name="password"
                                    placeholder="Silahkan masukan password">
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end" >
                            <button type="submit" style="display: none" onclick="manageData('save')" class="btn btn-success" id="add-user-admin"><i class="bx bx-check"></i>Simpan</button>
                            <button type="submit" style="display: none" onclick="manageData('update')" class="btn btn-light-warning" id="edit-user-admin"><i class="bx bx-edit"></i>Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
