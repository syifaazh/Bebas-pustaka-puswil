<h2 style="font-weight: bolder">Hai, {{ Auth::user()->name }}</h2>

<h5>Pengajuan anda sedang di proses</h5>
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor Anggota</th>
            <th>Alamat</th>
            <th>pendidikan</th>
            <th>Ajukan</th>
            <th>Status</th>
            <th>File</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
        @endphp
        @foreach($biodata2 as $b)
        <tr>
            <td>{{$no}}</td>
            <td>{{$b->no_anggota}}</td>
            <td>{{$b->alamat}}</td>
            <td>{{$b->pendidikan}}</td>
            <td>
                <form action="{{ url('pustakawan/pengajuan/store') }}" method="post">
                    @csrf
                    <input type="hidden" name="biodatapustakawans_id" value="{{ $b->id }}">
                    <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                    <button type="button" class="btn btn-success btn-sm" disabled> sudah diajukan</button>
                </form>
            </td>
            @if ($b->status == 0)
            <td><span class="badge badge-warning">Belum Diverifikasi</span></td>
            @elseif ($b->status == 1)
            <td><span class="badge badge-success">Diterima</span></td>
            @elseif ($b->status == 2)
            <td><span class="badge badge-danger">Ditolak</span></td>
            @endif

            <td><a href="{{ url('/generate-pdf') }}" class="btn btn-danger" target="_blank">Unduh PDF</a></td>
        </tr>
        @php
        $no++
        @endphp
        @endforeach
    </tbody>
</table>
