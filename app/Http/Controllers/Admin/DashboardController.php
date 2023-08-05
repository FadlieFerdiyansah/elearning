<?php

namespace App\Http\Controllers\Admin;

use ZipArchive;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Jadwal;
use App\Models\Matkul;
use App\Models\Fakultas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\AdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\UpdateProfile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        // $role = Role::find(2);
        // $role->givePermissionTo(['jadwal kuliahm']);
        // dd(new ZipArchive);
        // $user =  Auth::user()->roles;
        // return $role->givePermissionTo(['']);
        // return $role->hasPermissionTo('management absensi');

        // return $user;

        // return $user->hasPermissionTo('jadwal mengajar');
        $dosens = Dosen::count();
        $mahasiswas = Mahasiswa::count();
        $kelas = Kelas::count();
        $matkuls = Matkul::count();
        $fakultas = Fakultas::count();
        $jadwals = Jadwal::count();
        return view('backend.dashboard', compact('dosens', 'mahasiswas', 'matkuls', 'kelas', 'fakultas', 'jadwals'));
    }

    public function dashboard()
    {
        return view('backend.dashboard');
    }
    public function updateProfile(UpdateProfile $request)
    {
        $admin = auth()->user();
        if ($request->foto) {
            Storage::delete($admin->foto);
            $photo = $request->file('foto')->store('images/profile');
        } else {
            $photo = $admin->foto;
        }

        if (Hash::check($request->password, $admin->password)) {
            return redirect()->back()->with('error', 'Password baru tidak boleh sama dengan password saat ini');
        }
        // if($admin->email == 'admin@gmail.com'){
        //     return back()->with('error', 'Tidak bisa merubah password pada akun demo');
        // }
        $admin->password = bcrypt($request->password);
        $admin->update([
            'foto' => $photo,
        ]);

        return redirect()->back()->with('success', 'Berhasil mengubah data profile');
    }
}
