<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JadwalRequest;
use App\Models\{Jadwal, Kelas, Dosen};
use App\Http\Resources\JadwalResource;

class JadwalController extends Controller
{
    public function index()
    {
        if (request()->expectsJson()) {
            if (request('filter')) {
                $kelas = Kelas::where('kd_kelas', 'like', '%' . request('filter') . '%')->first();
                return JadwalResource::collection($kelas->jadwals);
            }
            return JadwalResource::collection(Jadwal::paginate(10));
        }
        return view('backend.jadwal.index');
    }

    public function create()
    {
        return view('backend.jadwal.create');
    }

    public function store(JadwalRequest $request)
    {
        // info(json_encode(request()->all()));
        // {"kelas_id":"2","dosen_id":"1","matkul_id":"1","hari":"Sabtu","jam_masuk":"13:00","jam_keluar":"01:00"}
        // check if kelas dosen matkul same in 1 day and return back with error
        $check = Jadwal::
        // where('kelas_id', $request->kelas_id)
            where('dosen_id', $request->dosen_id)
            // ->where('matkul_id', $request->matkul_id)
            ->where('hari', $request->hari)
            // ->where('jam_masuk', '>=', $request->jam_masuk)
            // ->where('jam_keluar', '<=', $request->jam_keluar)
            ->get();
            
            $requestedJamMasuk = $request->jam_masuk;
            $requestedJamKeluar = $request->jam_keluar;
        if ($check) {
            // && $request->jam_masuk <= $check->jam_keluar && $request->jam_keluar <= $check->jam_keluar
            // info("request masuk $request->jam_masuk > $check->jam_masuk && request keluar $request->jam_keluar < $check->jam_keluar");
            foreach ($check as $chk) {
                $existingJamMasuk = $chk->jam_masuk;
                $existingJamKeluar = $chk->jam_keluar;
                if(
                    ($requestedJamMasuk >= $existingJamMasuk && $requestedJamMasuk < $existingJamKeluar) ||
                    ($requestedJamKeluar > $existingJamMasuk && $requestedJamKeluar <= $existingJamKeluar) ||
                    ($requestedJamMasuk <= $existingJamMasuk && $requestedJamKeluar >= $existingJamKeluar)
                    ){
                    return response()->json(['message' => "Jadwal untuk di jam $request->jam_masuk - $request->jam_keluar sudah ada.", 'status' => false]);
                }
            }
            // return response()->json(['message' => "Jadwal sudah ada dihari $request->hari, dan di jam $request->jam_masuk - $request->jam_keluar"]);
        }

        Jadwal::create($request->all());
        $dosen = Dosen::where('id', $request->dosen_id)->first();
        $dosen->kelas()->updateExistingPivot(['kelas_id' => $request->kelas_id], ['matkul_id' => $request->matkul_id]);
        $kelas = Kelas::find($request->kelas_id);
        return response()->json(['message' => 'Berhasil membuat jadwal untuk kelas ' . $kelas->kd_kelas]);
    }

    public function edit(Jadwal $jadwal)
    {
        return view('backend.jadwal.edit', compact('jadwal'));
    }

    public function update(Jadwal $jadwal)
    {
        $jadwal->update(request()->all());
        // update dosen
        $dosen = Dosen::where('id', request()->dosen_id)->first();
        $dosen->kelas()->updateExistingPivot(['kelas_id' => $jadwal->kelas_id], ['matkul_id' => $jadwal->matkul_id]);
        // update kelas
        $kelas = Kelas::find($jadwal->kelas_id);
        return response()->json(['message' => 'Berhasil memperbarui jadwal untuk kelas ' . $kelas->kd_kelas]);
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return response()->json(['message' => 'Berhasil menghapus jadwal']);
    }

    //Mendapatkan data dosen berdasarkan kelas
    public function getDosenByKelasId(Kelas $kelas)
    {
        return $kelas->dosens()->orderBy('nama')->get();
    }

    //Mendapatkan data matkul berdasarkan dosen
    public function getMatkulByDosenId(Dosen $dosen)
    {
        return $dosen->matkuls()->orderBy('nm_matkul')->get();
    }
}
