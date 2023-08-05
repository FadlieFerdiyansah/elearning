<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dosen\UpdateProfile;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\MahasiswaRequest;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('frontend.mahasiswa.dashboard');
    }

    public function updateProfile(UpdateProfile $request)
    {
        $mahasiswa = auth()->user();
        if ($request->foto) {
            Storage::delete($mahasiswa->foto);
            $photo = $request->file('foto')->store('images/profile');
        } else {
            $photo = $mahasiswa->foto;
        }
        if (Hash::check($request->password, $mahasiswa->password)) {
            return redirect()->back()->with('error', 'Password baru tidak boleh sama dengan password saat ini');
        }
        // if($mahasiswa->email == 'mahasiswa@gmail.com'){
        //     return back()->with('error', 'Tidak bisa merubah password pada akun demo');
        // }

        $mahasiswa->password = bcrypt($request->password);
        $mahasiswa->update([
            'foto' => $photo,
        ]);

        return redirect()->back()->with('success', 'Berhasil mengubah data profile');
    }
}
