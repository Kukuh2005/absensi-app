<form class="myForm{{$item->id}}store" id="{{$item->id}}" action="/absensi/{{$kelas->id}}/store" method="POST" style="display: block">
    @csrf
    <div class="card card-tale mb-2 mt-4 bg-white shadow">
        <div class="card-header rounded-pill bg-info" style="margin-top: -20px">
            <h5 class="text-light">{{$item->nama_siswa}}</h5>
            <input type="text" value="{{$item->id}}" name="siswa_id" hidden>
            <input type="text" value="{{$item->kelas_id}}" name="kelas_id" hidden>
            <input type="text" value="{{auth()->user()->id}}" name="user_id" hidden>
        </div>
        <div class="card-body">
            <div class="form-group">
                <input type="radio" id="masuk{{$item->id}}" name="status" value="masuk">
                <label class="text-dark" for="masuk{{$item->id}}">Masuk</label>
            </div>
            <div class="form-group">
                <input type="radio" id="izin{{$item->id}}" name="status" value="izin">
                <label class="text-dark" for="izin{{$item->id}}">Izin</label>
            </div>
            <div class="form-group">
                <input type="radio" id="sakit{{$item->id}}" name="status" value="sakit">
                <label class="text-dark" for="sakit{{$item->id}}">Sakit</label>
            </div>
            <div class="form-group">
                <input type="radio" id="tanpa_keterangan{{$item->id}}" name="status" value="tanpa keterangan">
                <label class="text-dark" for="tanpa_keterangan{{$item->id}}">Tanpa Keterangan</label>
            </div>            
            <div class="form-group">
                <button type="button" class="btn btn-warning" id="btn-edit{{$item->id}}" onclick="editAbsensi({{$item->id}})" style="display: none">Edit</button>
            </div>
        </div>
    </div>
</form>