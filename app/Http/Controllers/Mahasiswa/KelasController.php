<?php

namespace App\Http\Controllers\Mahasiswa;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\{Absen, Jadwal, Materi, Tugas};
use App\Http\Requests\Mahasiswa\TugasRequest;
use Illuminate\Support\Facades\{Auth, Storage};

class KelasController extends Controller
{
    public function waktuSekarang()
    {
        $jakartaTime = Carbon::now('Asia/Jakarta');
        $utcPlus8Time = $jakartaTime->copy()->addHour();
        return $utcPlus8Time->format('Y-m-d H:i');
    }

    public function masuk($id)
    {
        $jadwal_id = decrypt($id);
        $jadwal = Jadwal::where('id', $jadwal_id)->first();

        $isAbsen = Auth::user()->load([
                'mahasiswaAbsenHariIni' => function ($q) use ($jadwal) {
                    $q->where('jadwal_id', $jadwal->id);
                },
                'mahasiswaAbsenHariIniIzin' => function ($q) use ($jadwal) {
                    $q->where('jadwal_id', $jadwal->id);
                },
                'mahasiswaAbsenHariIniSakit' => function ($q) use ($jadwal) {
                    $q->where('jadwal_id', $jadwal->id);
                },
                'mahasiswaAbsenHariIniTidakHadir' => function ($q) use ($jadwal) {
                    $q->where('jadwal_id', $jadwal->id);
                }
            ]);

        $absens = Auth::user()->absens()->where('jadwal_id', $jadwal_id)->paginate(5);
        // return $absens;
        $test = collect([
            ['jadwal_id' => 2, 'nama' => 'fadlie'],
            ['jadwal_id' => 3, 'nama' => 'udin']
        ]);

        //Untuk membatasi waktu absen misal : jam masuk 12:00 sedangkan waktu saat itu belum jam 12:00
        //Jadi tidak bisa absen kalau belum waktu nya dan juga berlaku untuk jam keluar, jika lebih dari waktu
        //Jam Keluar ya sudah tidak bisa absen lagi
        if (hariIndo() == $jadwal->hari) {
            $waktuAbsen = $this->waktuSekarang() >= $jadwal->jam_masuk && $this->waktuSekarang() <= $jadwal->jam_keluar;
        } else {
            $waktuAbsen = false;
        }

        $allowMhsAbsen = Absen::where('jadwal_id', $jadwal_id)->where('parent', 0)->whereDate('created_at', now())->first();
        // return $allowMhsAbsen;
        // $isAbsen = Auth::user()->isAbsen($jadwal_id)->first();
        return view('frontend.mahasiswa.kelas.masuk', compact('jadwal', 'absens', 'waktuAbsen', 'allowMhsAbsen', 'isAbsen'));
    }

    public function absen()
    {
        if (request()->has('absen')) {
            $statusAbsen = request('absen');
        } elseif (request()->has('sakit')) {
            $statusAbsen = request('sakit');
        } elseif (request()->has('izin')) {
            $statusAbsen = request('izin');
        }
        $jadwal_id = decrypt(request('jadwal'));
        $jadwal = Jadwal::where('id', $jadwal_id)->first();
        $absen = Absen::where('jadwal_id', $jadwal_id)->where('parent', 0)->latest()->first();
        $isAbsen = Auth::user()->load([
            'mahasiswaAbsenHariIni' => function ($q) use ($jadwal) {
                $q->where('jadwal_id', $jadwal->id);
            },
            'mahasiswaAbsenHariIniIzin' => function ($q) use ($jadwal) {
                $q->where('jadwal_id', $jadwal->id);
            },
            'mahasiswaAbsenHariIniSakit' => function ($q) use ($jadwal) {
                $q->where('jadwal_id', $jadwal->id);
            },
            'mahasiswaAbsenHariIniTidakHadir' => function ($q) use ($jadwal) {
                $q->where('jadwal_id', $jadwal->id);
            }
        ]);
        
        //Jika Mahasiswa yang login sudah absen pada waktu yang ditentukan jangan kasih absen lagi
        if ($isAbsen->mahasiswaAbsenHariIni == null && $isAbsen->mahasiswaAbsenHariIniIzin == null && $isAbsen->mahasiswaAbsenHariIniSakit == null) {
            // Jika belum izinkan absen
            Absen::updateOrCreate([
                'mahasiswa_id' => Auth::id(),
                'parent' => $absen->id
            ], [
                'jadwal_id' => $jadwal_id,
                'pertemuan' => $absen->pertemuan,
                'parent' => $absen->id,
                'status' => $statusAbsen,
                'updated_at' => waktuSekarang()
            ]);
        }        

        return back();
    }

    public function materi($id)
    {
        //Decrypt var $id dari jadwal
        $jadwal_id =  decrypt($id);

        //Setelah di decrypt cari. apakah id ada di dalam table jadwal
        //jika ada tampilkan hanya 1
        $jadwal = Jadwal::whereId($jadwal_id)->first();
        $materis = Materi::where('matkul_id', $jadwal->matkul_id)
            ->where('dosen_id', $jadwal->dosen_id)
            ->where('kelas_id', $jadwal->kelas_id)
            ->latest()->get();

        if (Auth::guard('mahasiswa')->user()->kelas_id != $jadwal->kelas_id) {
            //Jika mahasiswa yang login kelas_id tidak sama dengan kelas_id yang ada di jadwal return ke 404
            abort(404);
        }

        return view('frontend.mahasiswa.kelas.materi', compact('materis', 'jadwal'));
    }

    public function tugas($jadwalId)
    {
        $jadwal = Jadwal::whereId(decrypt($jadwalId))->first();

        $tugas = Tugas::whereJadwalId($jadwal->id)->whereParent(0)->latest()->paginate(10);
        $tugasHasBeenSent = Auth::user()->tugas()->whereJadwalId($jadwal->id)->paginate(10);

        return view('frontend.mahasiswa.kelas.tugas.index', compact('jadwal', 'tugas', 'tugasHasBeenSent'));
    }

    public function sendTugas($jadwalId, $tugasId)
    {
        $jadwal = Jadwal::whereId(decrypt($jadwalId))->firstOrFail();
        $tugas = Tugas::whereId($tugasId)->firstOrFail();

        // kondisi jika tugas pengumpulan sudah lebih dari batas waktu
        if ($tugas->pengumpulan < date('Y-m-d H:i:s')) {
            return back()->with('error', 'Batas waktu pengumpulan tugas sudah lebih dari batas waktu');
        }

        return view('frontend.mahasiswa.kelas.tugas.kirim_tugas', compact('jadwal', 'tugas'));
    }

    public function store(TugasRequest $request, $jadwalId, $tugasId)
    {
        $attr = $request->validated();

        if ($request->tipe == 'file') {
            $file = $request->file('file_or_link')->store('bahan_ajar');
            $attr['file_or_link'] = $file;
        } else {
            $attr['file_or_link'] = request('file_or_link');
        }
        $jadwal = Jadwal::whereId(decrypt($jadwalId))->firstOrFail();
        $tugas = Tugas::whereId($tugasId)->firstOrFail();
        if ($tugas->pengumpulan > date('Y-m-d H:i:s')) {
            Auth::user()->tugas()->updateOrCreate(
                $attr,
                [
                    'mahasiswa_id' => Auth::id(),
                    'parent' => $tugas->id
                ],
                [
                    'jadwal_id' => $jadwal->id,
                    'matkul_id' => $jadwal->matkul_id,
                    'judul' => $tugas->judul,
                    'parent' => $tugas->id,
                    'pertemuan' => $tugas->pertemuan,
                    'pengumpulan' => $tugas->pengumpulan,
                ]
            );

            session()->flash('success', 'Tugas berhasil dikirim');
            return redirect()->route('tugas.mhs', encrypt($jadwal->id));
        }


        session()->flash('error', 'Batas waktu pengumpulan tugas sudah lebih dari batas waktu');
        return redirect()->route('tugas.mhs', encrypt($jadwal->id));
    }
}
