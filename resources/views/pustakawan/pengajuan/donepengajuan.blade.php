{{-- Styles --}}
<style>
    .badge {
        font-size: 10pt;
        padding: 9px 10px;
    }
</style>

<h2 style="font-weight: bolder">Hai, {{ Auth::user()->name }}</h2>
@foreach ($cekpengajuan as $c)
    @if ($c->status == 0)
        <h5>Pengajuan Anda Sedang Diproses</h5>
    @elseif ($c->status == 1)
        <h5>Pengajuan Anda Diterima</h5>
    @endif
@endforeach

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
        @foreach ($biodata2 as $b)
            <tr>
                <td>{{ $no }}</td>
                <td>{{ $b->no_anggota }}</td>
                <td>{{ $b->alamat }}</td>
                <td>{{ $b->pendidikan }}</td>
                <td>
                    <form action="{{ url('pustakawan/pengajuan/store') }}" method="post">
                        @csrf
                        <input type="hidden" name="biodatapustakawans_id" value="{{ $b->id }}">
                        <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                        <button type="button" class="btn btn-success btn-sm" disabled>Sudah Diajukan</button>
                    </form>
                </td>
                @foreach ($cekpengajuan as $c)
                    @if ($c->status == 0)
                        <td><span class="badge badge-warning">Belum Diverifikasi</span></td>
                    @elseif ($c->status == 1)
                        <td><span class="badge badge-success">Diterima</span></td>
                    @endif
                @endforeach
                <td>
                    <a href="{{ url('pustakawan/pengajuan/suratPDF/' .$c->id) }}" class="btn btn-danger btn-sm"
                        target="_blank">Unduh PDF</a></td>
            </tr>
            @php
                $no++;
            @endphp
        @endforeach
    </tbody>
</table>
