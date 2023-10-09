<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Rekap;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RekapController extends Controller
{
    function index()
    {
        return view('administrator.rekap.index');
    }

    function tableRekap(Request $request)
    {
        $anggotas = Rekap::all();
        // dd($anggotas);
        // dd(DataTables::of($anggotas));
        if ($request->ajax()) {
            return DataTables::of($anggotas)
                ->addColumn('no_surat', function ($data) {

                    $no_surat = $data->no_surat . ' / ' . $data->kode_surat . ' / ' . $data->tahun;

                    return $no_surat;
                })
                ->addColumn('tgl_surat', function ($data) {
                    return Carbon::parse(date("Y-m-d", strtotime($data->created_at)))->isoFormat("D MMMM Y");
                })
                ->addColumn('name', function ($data) {
                    return $data->biodatapustakawan->user->name;
                })
                ->addColumn('no_anggota', function ($data) {
                    return $data->biodatapustakawan->no_anggota;
                })
                ->addColumn('status', function ($data) {
                    if ($data->status_cetak == 0) {
                        return '<span style="font-size: 15px;" class="badge badge-success"><i class="fa-solid fa-check"></i></i></span>';
                    } else {
                        return '<span style="font-size: 15px;" class="badge badge-warning"><i class="fa-solid fa-xmark"></i></i></span>';
                    }
                })
                ->addColumn('action', function ($data) {
                    // return $data->a;
                    return '<div style="display: inline-flex;" class="">
                    <a target="_blank" href="' . url('') . '/administrator/print/print-ulang/' . $data->id . '" class="btn btn-primary btn-sm mr-3"><i class="fa-solid fa-print"></i></a> 
                    </div>';
                })
                ->rawColumns(['action', 'status'])
                ->addIndexColumn()
                ->make(true);
        }
    }
}
