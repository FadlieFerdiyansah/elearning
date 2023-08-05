<?php

namespace App\Http\Controllers\Dosen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dosen\UpdateProfile;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\DosenRequest;
use Illuminate\Support\Facades\Storage;
class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('frontend.dosen.dashboard');
    }

    public function updateProfile(UpdateProfile $request)
    {
        $dosen = auth()->user();
        if ($request->foto) {
            Storage::delete($dosen->foto);
            $photo = $request->file('foto')->store('images/profile');
        } else {
            $photo = $dosen->foto;
        }
        if (Hash::check($request->password, $dosen->password)) {
            return redirect()->back()->with('error', 'Password baru tidak boleh sama dengan password saat ini');
        }
        // if($dosen->email == 'dosen@gmail.com'){
        //     return back()->with('error', 'Tidak bisa merubah password pada akun demo');
        // }
        $dosen->password = bcrypt($request->password);
        $dosen->update([
            'foto' => $photo,
        ]);

        return redirect()->back()->with('success', 'Berhasil mengubah data profile');
    }
}
