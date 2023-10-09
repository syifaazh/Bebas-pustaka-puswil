<form action="{{ url('pustakawan/biodata/update/'.$biodata->id) }}" method="post"> @csrf @method("PUT")
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="users_id">Nama Lengkap<sup class="text-danger">*</sup></label>
                <input disabled class="form-control" type="text" name="" id="" value="{{ Auth::user()->name }}">
            </div>
        </div>

        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="alamat">Alamat<sup class="text-danger">*</sup></label>
                <textarea name="alamat" id="alamat" cols="" rows="1" class="form-control">{{ $biodata->alamat }}</textarea>
                <small class="text-danger">{{ $errors->first('alamat') }}</small>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="no_anggota">Nomor Anggota<sup class="text-danger">*</sup></label>
                <input class="form-control" type="number" name="no_anggota" id="no_anggota" value="{{ $biodata->no_anggota }}">
                <small class="text-danger">{{ $errors->first('no_anggota') }}</small>
            </div>
        </div>
    
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="nim">NIM<sup class="text-danger">*</sup></label>
                <input class="form-control" type="number" name="nim" id="nim" value="{{ $biodata->nim }}">
                <small class="text-danger">{{ $errors->first('nim') }}</small>
            </div>
        </div>
    </div>

    @php
        $pendidikan = json_decode($biodata->pendidikan)
    @endphp

    <div class="row">
        <div class="col-md-4 col-12">
            <div class="form-group">
                <label for="nm_jur">Nama Jurusan<sup class="text-danger">*</sup></label>
                <input class="form-control" type="text" name="nm_jur" id="nm_jur" value="{{ $pendidikan[0] }}">
                <small class="pl-4 text-danger">{{ $errors->first('nm_jur') }}</small>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="form-group">
                <label for="nm_fak">Nama Fakultas<sup class="text-danger">*</sup></label>
                <input class="form-control" type="text" name="nm_fak" id="nm_fak" value="{{ $pendidikan[1] }}">
                <small class="pl-4 text-danger">{{ $errors->first('nm_fak') }}</small>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="form-group">
                <label for="nm_univ">Nama Universitas<sup class="text-danger">*</sup></label>
                <input class="form-control" type="text" name="nm_univ" id="nm_univ" value="{{ $pendidikan[2] }}">
                <small class="pl-4 text-danger">{{ $errors->first('nm_univ') }}</small>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Kirim</button>
    </form>