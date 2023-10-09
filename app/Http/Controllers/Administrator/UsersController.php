<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Userrole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    function index()
    {
        return view('administrator.users.index');
    }

    public function detail($id)
    {
        $user = User::find($id);
        $userroles = Userrole::all();
        return view('administrator.users.detail', compact('user', 'userroles'));
    }

    function update($id, Request $request)
    {
        User::find($id)->update([
            'userroles_id' => $request->userroles_id
        ]);

        return redirect()->back()->with('warning', 'Data user telah diubah!');
    }

    function resetpass($id)
    {
        $pass = 'bebasperpus123';

        User::find($id)->update /* $data = */([
            'password' => Hash::make($pass),
        ]);

        return redirect()->back()->with('warning', 'Password user telah direset!');
    }

    function delUser($id)
    {
        User::destroy($id);
        return redirect('administrator/users')->with('delete', 'User telah dihapus!');
    }

    public function tableUser(Request $request)
    {
        $anggotas = User::all();
        // dd($anggotas);
        // dd(DataTables::of($anggotas));
        if ($request->ajax()) {
            return DataTables::of($anggotas)
                ->addColumn('name', function ($data) {
                    return $data->name;
                })
                ->addColumn('username', function ($data) {
                    return $data->username;
                })
                ->addColumn('userrole', function ($data) {
                    if ($data->userroles_id == 1) {
                        return '<span style="font-size: 15px;" class="badge badge-success">' . $data->userrole->name . '</span>';
                    } else {
                        return '<span style="font-size: 15px;" class="badge badge-warning">' . $data->userrole->name . '</span>';
                    }
                })
                ->addColumn('action', function ($data) {
                    // return $data->a;
                    return '<div style="display: inline-flex;" class=""><a href="' . url('') . '/administrator/users/detail/' . $data->id . '" class="btn btn-info btn-sm mr-1"><i class="fas fa-edit"></i></a> <a href="' . url('') . '/administrator/users/del-user/' . $data->id . '" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></div>';
                })
                ->rawColumns(['userrole'], ['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }
}
