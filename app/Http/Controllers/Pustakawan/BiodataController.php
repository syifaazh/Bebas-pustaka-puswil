<?php

namespace App\Http\Controllers\Pustakawan;

use App\Http\Controllers\Controller;
use App\Models\Biodatapustakawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BiodataController extends Controller
{
    function index()
    {
        $biodata = Biodatapustakawan::where('users_id', '=', Auth::user()->id)->get();
        if (count($biodata) == 0) {
            $biodata = "";
            $formbiodata = 'pustakawan.biodata.addbiodata';
        } else {
            $biodata = Biodatapustakawan::where('users_id', '=', Auth::user()->id)->first();
            $formbiodata = 'pustakawan.biodata.updatebiodata';
        }
        return view('pustakawan.biodata.based', compact('biodata', 'formbiodata'));
    }

    function store(Request $request)
    {

        $request->validate([
            'alamat' => 'required',
            'no_anggota' => 'required',
            'nim' => 'required',
            'nm_jur' => 'required',
            'nm_fak' => 'required',
            'nm_univ' => 'required',
        ]);

        $pendidikan = [$request->nm_jur, $request->nm_fak, $request->nm_univ];

        Biodatapustakawan::create([
            'users_id' => Auth::user()->id,
            'nim' => $request->nim,
            'no_anggota' => $request->no_anggota,
            'pendidikan' => json_encode($pendidikan),
            'alamat' => $request->alamat,
        ]);

        return redirect()->back()->with('success', 'Biodata telah dibuat!');
    }

    function update(Request $request, $id)
    {

        $request->validate([
            'alamat' => 'required',
            'no_anggota' => 'required',
            'nim' => 'required',
            'nm_jur' => 'required',
            'nm_fak' => 'required',
            'nm_univ' => 'required',
        ]);

        $pendidikan = [$request->nm_jur, $request->nm_fak, $request->nm_univ];

        Biodatapustakawan::find($id)->update([
            'users_id' => Auth::user()->id,
            'nim' => $request->nim,
            'no_anggota' => $request->no_anggota,
            'pendidikan' => json_encode($pendidikan),
            'alamat' => $request->alamat,
        ]);

        return redirect()->back()->with('success', 'Biodata telah diubah!');
    }
}
