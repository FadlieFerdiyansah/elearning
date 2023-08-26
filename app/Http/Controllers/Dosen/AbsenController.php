<?php

namespace App\Http\Controllers\Dosen;

use Carbon\Carbon;
use App\Models\{Jadwal, Absen, Mahasiswa};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    public function index()
    {
        $absensi = Absen::with('jadwal')->where([
            ['dosen_id', Auth::Id()],
            ['parent', 0]
        ])->whereDate('created_at', Carbon::today())->latest()->get(['id','dosen_id','jadwal_id','pertemuan']);

        return view('frontend.dosen.absensi.index',compact('absensi'));
    }

    public function create($jadwal_id)
    {
        $jadwal = Jadwal::findOrFail(decrypt($jadwal_id));
        
        $kelasActive = Auth::guard('dosen')->user()->jadwals()->where('hari',hariIndo())->get();
        $absen = Absen::where('dosen_id', Auth::Id())
                ->where('jadwal_id', $jadwal->id)
                ->whereDate('created_at', now())
                ->first();
        return view('frontend.dosen.absensi.create',compact('kelasActive','jadwal', 'absen'));
    }
    
    public function store()
    {
        $jadwal_id = decrypt(request('jadwal'));
        $jadwal = Jadwal::findOrFail($jadwal_id);
        
        request()->validate([
            'pertemuan' => 'required'
        ]);

        $absen = Auth::user()->absens()->create([
            'jadwal_id' => $jadwal_id,
            'kd_matkul' => $jadwal->matkul->kd_matkul,
            'pertemuan' => request('pertemuan'),
        ]);
        
        $mahasiswas = Mahasiswa::where('kelas_id', request('kelas'))->get();
        
        foreach ($mahasiswas as $mahasiswa) {
            $mahasiswa->absens()->create([
                'jadwal_id' => $jadwal_id,
                'kd_matkul' => $jadwal->matkul->kd_matkul,
                'parent' => $absen->id,
                'mahasiswa_id' => $mahasiswa->id,
                'pertemuan' => $absen->pertemuan,
            ]);
        }
        
        session()->flash('success', 'Berhasil membuat absen hari ini');
        return redirect(route('kelas.masuk',request('jadwal')));
    }

    public function edit($id)
    {
        $absensi = Absen::find(decrypt($id));

        return view('frontend.dosen.absensi.edit', compact('absensi'));
    }

    public function update($id)
    {
        $absen = Absen::find(decrypt($id));
        
        $absen->update([
            'pertemuan' => request('pertemuan'),
        ]);

        return redirect(route('absensi.index'));
    }

    public function destroy($id)
    {
        $absen = Absen::findOrFail(decrypt($id));
        $absen->delete();
        
        Absen::whereNotNull('mahasiswa_id')->where('parent', $absen->id)->delete();
        return redirect(route('absensi.index'));
    }
}
