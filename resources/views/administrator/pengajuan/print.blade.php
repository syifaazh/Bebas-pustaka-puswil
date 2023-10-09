@extends('layouts.admin.master')

@section('title', 'Biodata')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="mt-0 font-weight-bold text-success">Form Biodata Baru</h6>
            </div>
            <div class="card-body">
                <form action="{{ url('administrator/pengajuan/simpan-cetak/'.$pengajuan->id) }}" method="post"> @csrf @method("PUT")

                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="row">
                                <div class="col-md-4 col-4">
                                    <div class="form-group">
                                        <label for="no_surat">Nomor Surat<sup class="text-danger">*</sup></label>
                                        <input class="form-control" type="text" name="no_surat" id="no_surat" value="{{ $no_surat }}">
                                        <small class="pl-4 text-danger">{{ $errors->first('no_surat') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-4 col-4">
                                    <div class="form-group">
                                        <label for="kode_surat">Kode Surat<sup class="text-danger">*</sup></label>
                                        <input class="form-control" type="text" name="kode_surat" id="kode_surat" value="{{ $kode_surat }}">
                                        <small class="pl-4 text-danger">{{ $errors->first('kode_surat') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-4 col-4">
                                    <div class="form-group">
                                        <label for="tahun">Tahun<sup class="text-danger">*</sup></label>
                                        <input disabled class="form-control" type="text" name="tahun" id="tahun" value="{{ date('Y', strtotime(now())) }}">
                                        <small class="pl-4 text-danger">{{ $errors->first('tahun') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="users_id">Nama Lengkap<sup class="text-danger">*</sup></label>
                                <input disabled class="form-control" type="text" name="" id="" value="{{ $pengajuan->biodatapustakawan->user->name }}">
                            </div>
                        </div>
                
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="alamat">Alamat<sup class="text-danger">*</sup></label>
                                <textarea disabled name="alamat" id="alamat" cols="" rows="1" class="form-control">{{ $pengajuan->biodatapustakawan->alamat }}</textarea>
                                <small class="text-danger">{{ $errors->first('alamat') }}</small>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="no_anggota">Nomor Anggota<sup class="text-danger">*</sup></label>
                                <input disabled class="form-control" type="number" name="no_anggota" id="no_anggota" value="{{ $pengajuan->biodatapustakawan->no_anggota }}">
                                <small class="text-danger">{{ $errors->first('no_anggota') }}</small>
                            </div>
                        </div>
                    
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nim">NIM<sup class="text-danger">*</sup></label>
                                <input disabled class="form-control" type="number" name="nim" id="nim" value="{{ $pengajuan->biodatapustakawan->nim }}">
                                <small class="text-danger">{{ $errors->first('nim') }}</small>
                            </div>
                        </div>
                    </div>
                
                    @php
                        $pendidikan = json_decode($pengajuan->biodatapustakawan->pendidikan)
                    @endphp
                
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="nm_jur">Nama Jurusan<sup class="text-danger">*</sup></label>
                                <input disabled class="form-control" type="text" name="nm_jur" id="nm_jur" value="{{ $pendidikan[0] }}">
                                <small class="pl-4 text-danger">{{ $errors->first('nm_jur') }}</small>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="nm_fak">Nama Fakultas<sup class="text-danger">*</sup></label>
                                <input disabled class="form-control" type="text" name="nm_fak" id="nm_fak" value="{{ $pendidikan[1] }}">
                                <small class="pl-4 text-danger">{{ $errors->first('nm_fak') }}</small>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="nm_univ">Nama Universitas<sup class="text-danger">*</sup></label>
                                <input disabled class="form-control" type="text" name="nm_univ" id="nm_univ" value="{{ $pendidikan[2] }}">
                                <small class="pl-4 text-danger">{{ $errors->first('nm_univ') }}</small>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="biodatapustakawans_id" value="{{ $pengajuan->biodatapustakawan->id }}">
                    <input type="hidden" name="users_id" value="{{ $pengajuan->users_id }}">

                    <button type="submit" name="status_cetak" value="0" class="btn btn-primary">Simpan & Cetak</button>
                    <button type="submit" name="status_cetak" value="1" class="btn btn-success">Simpan</button>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection