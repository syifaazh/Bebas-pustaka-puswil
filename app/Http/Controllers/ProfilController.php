<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function profil()
    {
        return view('profil.info');
    }

    public function profil_info_update(Request $request)
    {
        User::find(Auth::user()->id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('warning', 'Data anda telah diubah!');
    }

    function profil_password_update(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:8'
        ]);


        $pass = \request('password');

        User::find(Auth::user()->id)->update /* $data = */([
            'password' => Hash::make($pass),
        ]);

        return redirect()->back()->with('warning', 'Password Anda Telah Diubah. Untuk memastikan harap lakukan percobaan masuk kembali!');
    }
}
