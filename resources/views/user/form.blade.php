<div class="modal fade" id="modal-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLabel">Tambah {{$level}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/kelas/store" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="username" name="username"
                                    placeholder="Nama" oninput="validasiInput(this)">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name="email" placeholder="Email">
                        </div>
                        <div class="col-md-6">
                            <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                            <div id="warning-message-password" style="color: red; display: none;">
                                Password minimal 8 karakter dan 1 huruf kapital
                            </div>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control form-control-lg" name="level" id="exampleFormControlSelect2">
                                <option value="">Level</option>
                                <option value="admin">Admin</option>
                                <option value="guru">Guru</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
