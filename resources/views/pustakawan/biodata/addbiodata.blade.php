<form action="{{ url('pustakawan/biodata/store') }}" method="post"> @csrf @method("POST")
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
                <textarea name="alamat" id="alamat" cols="" rows="1" class="form-control">{{ old('alamat') }}</textarea>
                <small class="text-danger">{{ $errors->first('alamat') }}</small>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="no_anggota">Nomor Anggota<sup class="text-danger">*</sup></label>
                <input class="form-control" type="number" name="no_anggota" id="no_anggota" value="{{ old('no_anggota') }}">
                <small class="text-danger">{{ $errors->first('no_anggota') }}</small>
            </div>
        </div>
    
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="nim">NIM<sup class="text-danger">*</sup></label>
                <input class="form-control" type="number" name="nim" id="nim" value="{{ old('nim') }}">
                <small class="text-danger">{{ $errors->first('nim') }}</small>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-12">
            <div class="form-group">
                <label for="nm_jur">Nama Jurusan<sup class="text-danger">*</sup></label>
                <input class="form-control" type="text" name="nm_jur" id="nm_jur" value="{{ old('nm_jur') }}">
                <small class="pl-4 text-danger">{{ $errors->first('nm_jur') }}</small>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="form-group">
                <label for="nm_fak">Nama Fakultas<sup class="text-danger">*</sup></label>
                <input class="form-control" type="text" name="nm_fak" id="nm_fak" value="{{ old('nm_fak') }}">
                <small class="pl-4 text-danger">{{ $errors->first('nm_fak') }}</small>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="form-group">
                <label for="nm_univ">Nama Universitas<sup class="text-danger">*</sup></label>
                <input class="form-control" type="text" name="nm_univ" id="nm_univ" value="{{ old('nm_univ') }}">
                <small class="pl-4 text-danger">{{ $errors->first('nm_univ') }}</small>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Kirim</button>
    </form>