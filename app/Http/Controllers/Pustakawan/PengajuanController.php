<?php

namespace App\Http\Controllers\Pustakawan;

use App\Http\Controllers\Controller;
use App\Models\Biodatapustakawan;
use App\Models\Pengajuanbebaspustaka;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Facades\DB;

class PengajuanController extends Controller
{
    function index()
    {
        $cekpengajuan = Pengajuanbebaspustaka::where('users_id', '=', Auth::user()->id)->get();
        $biodata = Biodatapustakawan::where('users_id', '=', Auth::user()->id)->first();
        $biodata2 = Biodatapustakawan::where('users_id', '=', Auth::user()->id)->get();

        if (count($cekpengajuan) == 0) {
            $pengajuandata = "";
            $pengajuan = 'pustakawan.pengajuan.addpengajuan';
        } else {
            $pengajuandata = Pengajuanbebaspustaka::where('users_id', '=', Auth::user()->id)->first();
            $pengajuan = 'pustakawan.pengajuan.donepengajuan';
        }

        return view('pustakawan.pengajuan.based', compact('cekpengajuan','pengajuandata', 'pengajuan', 'biodata', 'biodata2'));
    }

    function store(Request $request)
    {
        Pengajuanbebaspustaka::create([
            'biodatapustakawans_id' => $request->biodatapustakawans_id,
            'users_id' => $request->users_id,
            'status' => '0',

        ]);

        return redirect()->back()->with('success', 'Pengajuan sudah dikirim!');
    }

    function update(Request $request)
    {
    }
    public function suratPDF($id){
        $pengajuan = Pengajuanbebaspustaka::find($id);

        $pdf = PDF:: loadview('pustakawan.pengajuan.surat',['surat' => $pengajuan]);

        return $pdf->download('surat.pdf');
        // return $pdf->stream();
    }

}
