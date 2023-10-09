<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Print Css -->
    <link href="{{ url('public') }}/admin-assets/css/print.css" rel="stylesheet" />

    <!-- Bootstrap Core Css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    {{-- halaman surat --}}
    <div id="tampil_surat">
        
        {{-- cop surat --}}
        <div id="kepala_surat">
            
            {{-- logo kab --}}
            {{-- <div id="cop_img">
                <img src="{{ url('public/img/acehbesarlogo.png') }}" width="88">
            </div> --}}
            {{-- end logo kab --}}
            {{-- cop text --}}
            <div id="cop_text">
                <strong>PEMERINTAH ACEH <br>
                <span>DINAS PERPUSTAKAAN DAN KEARSIPAN</span> <br>
                </strong>
            </div>
            {{-- end cop text --}}
            {{-- kosong --}}
            <div id="cop_kosong">
                
            </div>
            {{-- end kosong --}}

        </div>
        {{-- end cop surat --}}
        {{-- <div class="garis tipis"></div> --}}
        <p style="font-weight: bold" id="cop_alamat">Jln. T. NyakArief Telepon: (0651) 7552323 Faximile: (0651) 7551951 Banda Aceh</p>
        <p style="font-weight: bold; margin-top: 30px;" id="cop_alamat">Website : arpus.acehprov.go.id E-mail : <span style="text-decoration: underline">arpus@acehprov.go.id</span></p>
        <div class="garis tebal" style="margin-top: -5px;"></div>
        <div class="garis tipis" style="margin-top: 2px;"></div>

        {{-- judul dan nomor surat --}}
        <div class="container">
            <div id="judul_surat">
                <p style="font-size: 16px; text-decoration: underline; margin-bottom: 0px">SURAT KETERANGAN BEBAS PUSTAKA</p>
                <p style="font-size: 16px">Nomor : {{ $pengajuanuser->no_surat }}/{{ $pengajuanuser->kode_surat }}/{{ $pengajuanuser->tahun }}</p>
            </div>
        </div>
        {{-- end judul dan nomor surat --}}

        {{-- pembuka surat --}}
        <div id="pembuka_surat">
            <span>Berdasarkan pengecekan Administrasi Bidang Layanan Perpustakaan dengan ini menyatakan: </span>
        </div>
        {{-- end pembuka surat --}}
        <br>
        {{-- biodata --}}
        <div id="biodata_surat">
            <table>
                    <tr>
                        <td class="luas">Nama</td>
                        <td class="titikdua">: </td>
                        <td> {{ ucwords($pengajuanuser->biodatapustakawan->user->name) }}</td>
                    </tr>
                    <tr>
                        <td class="luas">NIM</td>
                        <td class="titikdua">: </td>
                        <td> {{ $pengajuanuser->biodatapustakawan->nim }}</td>
                    </tr>
                    <tr>
                        <td class="luas">No Anggota</td>
                        <td class="titikdua">: </td>
                        <td> {{ $pengajuanuser->biodatapustakawan->no_anggota }}</td>
                    </tr>
                    <tr>
                        <td class="luas">Jur/Fak/Univ</td>
                        <td class="titikdua">: </td>
                        <td> {{ $pendidikan[0].'/'.$pendidikan[1].'/'.$pendidikan[2] }}</td>
                    </tr>
                    
                    <tr>
                        <td class="luas">Alamat</td>
                        <td class="titikdua">: </td>
                        <td> {{ $pengajuanuser->biodatapustakawan->alamat }}</td>
                    </tr>
            </table>
        </div>
        {{-- end biodata --}}

        {{-- deskripsi surat --}}
        <div id="deskripsi_surat">
            <span> Yang namanya tersebut diatas tidak terkait lagi dengan pinjaman buku-buku pada Dinas Perpustakaan dan Kearsipan Aceh. Surat Keterangan ini diberikan untuk keperluan </span>
            <br><br>
            <div style="text-align: center"><strong>BEBAS PUSTAKA</strong></div>
        </div>
        {{-- end deskripsi surat --}}

        {{-- penutup surat --}}
        <div id="penutup_surat">
            <span>Demikian surat ini dibuat untuk dipergunakan sebagaimana mestinya.</span>
        </div>
        {{-- end penutup surat --}}

        {{-- ttd --}}
        {{-- <div id="ttd_surat">
            <div class="boxs">
                <span>Babah Jurong, 10 Oktober 2020</span><br>
                <span>Keuchik Gampong</span><br>
                <br><br><br>
                <span style="font-weight: bold; text-decoration: underline">SYUKRI TGK. IDRIS</span>
            </div>
        </div> --}}
        <div id="ttd_surat">
            <table align="right">
                <tr>
                    <td><span>Lamceu, {{ Carbon\Carbon::parse(date("Y-m-d", strtotime($pengajuanuser->created_at)))->isoFormat("D MMMM Y") }}</span></td>
                </tr>
                <tr>
                    <td><span>an. Kepala Dinas Perpustakaan dan Kearsipan Aceh <br>
                        Sub Koordinator Layanan Perpustakaan
                        </span></td>
                </tr>
                <tr>
                    <td style="padding: 40px 0"></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td><span style="font-weight: bold; text-decoration: underline">LISA SISKA DEWI, S.Sos.</span></td>
                </tr>
            </table>
        </div>
        {{-- end ttd --}}

    
    </div>
    {{-- end halaman surat --}}

    <script>
        window.print();
    </script>

</body>
</html>