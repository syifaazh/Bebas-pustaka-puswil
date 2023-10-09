<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Rekap;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    function latest()
    {
        $pengajuanuser = Rekap::latest()->first();

        $pendidikan = json_decode($pengajuanuser->biodatapustakawan->pendidikan);

        // dd($pengajuanuser->biodatapustakawan->user->name);
        return view('administrator.file.print', compact('pengajuanuser', 'pendidikan'));
    }

    function printUlang($id)
    {

        Rekap::find($id)->update([
            'status_cetak' => 0
        ]);

        $pengajuanuser = Rekap::find($id);
        $pendidikan = json_decode($pengajuanuser->biodatapustakawan->pendidikan);

        // dd($pengajuanuser->biodatapustakawan->user->name);
        return view('administrator.file.print', compact('pengajuanuser', 'pendidikan'));
    }
}
