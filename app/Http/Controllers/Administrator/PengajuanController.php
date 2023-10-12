<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Biodatapustakawan;
use App\Models\Pengajuanbebaspustaka;
use App\Models\Rekap;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PengajuanController extends Controller
{
    function index()
    {
        return view('administrator.pengajuan.index');
    }

    function print($id)
    {

        $rekap_latest = Rekap::select('no_surat', 'kode_surat')->latest()->first();

        $no_surat = $rekap_latest == null ? '001' : "00" . intval($rekap_latest->no_surat) + 1;
        $kode_surat = $rekap_latest == null ? '2492' :  $rekap_latest->kode_surat;

        $pengajuan = Pengajuanbebaspustaka::find($id);
        return view('administrator.pengajuan.print', compact('pengajuan', 'no_surat', 'kode_surat'));
    }

    function simpanCetak(Request $request, $id)
    {

        $request->validate([
            'no_surat' => 'required',
            'kode_surat' => 'required',
            // 'tahun' => 'required',
        ]);


        $data = [
            'no_surat' => $request->no_surat,
            'kode_surat' => $request->kode_surat,
            'tahun' => date('Y', strtotime(now())),
            'biodatapustakawans_id' => $request->biodatapustakawans_id,
            'status_cetak' => intval($request->status_cetak),
        ];

        Rekap::create($data);
        Pengajuanbebaspustaka::destroy($id);

        // dd(boolval($request->status_cetak));

        if ($request->status_cetak == '0') {
            return redirect('/administrator/print/latest');
        } else {
            return redirect('/administrator/rekap/');
        }
    }


    function confirm(Request $request, $id)
    {
        $pengajuan = Pengajuanbebaspustaka::find($id);
        $pengajuan->status = 1;
        $pengajuan->save();

        // $request->validate([
        //     'no_surat' => 'required',
        //     'kode_surat' => 'required',
        //     // 'tahun' => 'required',
        // ]);


        // $data = [
        //     'no_surat' => $request->no_surat,
        //     'kode_surat' => $request->kode_surat,
        //     'tahun' => date('Y', strtotime(now())),
        //     'biodatapustakawans_id' => $request->biodatapustakawans_id,
        //     'status_cetak' => intval($request->status_cetak),
        // ];

        // Rekap::create($data);
        // Pengajuanbebaspustaka::destroy($id);

        // if ($request->status_cetak == '0') {
        //     return redirect('/administrator/print/latest');
        // } else {
        //     return redirect('/administrator/rekap/');
        // }

        return redirect('/administrator/pengajuan');
    }
   


    function tablePengajuan(Request $request)
    {
        $anggotas = Pengajuanbebaspustaka::all();
        // dd($anggotas);
        // dd(DataTables::of($anggotas));
        if ($request->ajax()) {
            return DataTables::of($anggotas)
                ->addColumn('name', function ($data) {
                    return $data->biodatapustakawan->user->name;
                })
                ->addColumn('no_anggota', function ($data) {
                    return $data->biodatapustakawan->no_anggota;
                })
                ->addColumn('nim', function ($data) {
                    return $data->biodatapustakawan->nim;
                })
                ->addColumn('alamat', function ($data) {
                    return $data->biodatapustakawan->alamat;
                })
                ->addColumn('action', function ($data) {
                    // return $data->a;
                    return '<div style="display: inline-flex;" class="">
                        <a target="_blank" href="' . url('') . '/administrator/pengajuan/print/' . $data->id . '" class="btn btn-primary btn-sm mr-3"><i class="fa-solid fa-print"></i></a> 
                        <a href="' . url('') . '/administrator/pengajuan/delete/' . $data->id . '" class="btn btn-danger btn-sm mr-3"><i class="fas fa-trash"></i></a> 
                        <a href="' . url('') . '/administrator/pengajuan/confirm/' . $data->id . '" class="btn btn-success btn-sm name="status_cetak" value="1"><i class="fas fa-check"></i></a>
                        </div>';
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }
}
