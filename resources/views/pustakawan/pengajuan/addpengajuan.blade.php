<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor Anggota</th>
            <th>Alamat</th>
            <th>pendidikan</th>
            <th>Ajukan</th>
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
                    <button type="submit" class="btn btn-success btn-sm">Ajukan</button>
                </form>
            </td>
        </tr>
        @php
        $no++
        @endphp
        @endforeach
    </tbody>
</table>