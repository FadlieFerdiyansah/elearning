<?php

namespace App\Http\Controllers\Dosen\Exports;

use App\Exports\Report\Absensi;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Matkul;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ExportAbsensiController extends Controller
{
    public function __invoke(Kelas $kelas, Matkul $matkul)
    {
        $mahasiswa = Mahasiswa::with(['absens' => function($query) {
            $query->whereIn('parent', Auth::user()->absens->pluck('id'))->select('id','mahasiswa_id','pertemuan', 'status');
        }, 'kelas'])->where('kelas_id', $kelas->id)->get(['id', 'kelas_id', 'nim', 'nama']);

        // $lastPertemuan = Auth::user()->tugas->where('matkul_id', $matkul->id)->load('matkul')->max('pertemuan');
        $lastPertemuan = $kelas->jadwals()->where('dosen_id', Auth::id())->first()->absens->where('parent', 0)->max('pertemuan');
        foreach($mahasiswa as $i => $mhs){
            $formatMhs[$i] = [
                'kelas' => $mhs->kelas->kd_kelas,
                'nim' => $mhs->nim,
                'nama' => $mhs->nama,
                'matkul' => Str::lower($matkul->nm_matkul),
            ];
            $totalHadir = 0;
            $totalTidakHadir = 0;
            $totalIzin = 0;
            $totalSakit = 0;
            for($j = 1; $j <= $lastPertemuan; $j++){
                $formatMhs[$i]["p$j"] = '-';
                if($mhs->absens->where('pertemuan', $j)->count() > 0){
                    $absen = $mhs->absens->where('pertemuan', $j)->first();
                    // $formatMhs[$i]["p$j"] = $absen->status == '1' ? 'v' : ($absen->status == '2' ? 'I' : ($absen->status == '3' ? 'S' : 'A'));
                    // $absen->status == '1' ? 'v' : ($absen->status == '2' ? 'I' : ($absen->status == '3' ? 'S' : 'A'))

                    if ($absen->status == '1') {
                        $formatMhs[$i]["p$j"] = '.';
                        $totalHadir += 1;
                    } elseif ($absen->status == '2') {
                        $formatMhs[$i]["p$j"] = 'I';
                        $totalIzin += 1;
                    } elseif ($absen->status == '3') {
                        $formatMhs[$i]["p$j"] = 'S';
                        $totalSakit += 1;
                    } else {
                        $formatMhs[$i]["p$j"] = 'A';
                        $totalTidakHadir += 1;
                    }

                    $formatMhs[$i]["hadir"] = $totalHadir;
                    $formatMhs[$i]["tidak_hadir"] = $totalTidakHadir;
                    $formatMhs[$i]["izin"] = $totalIzin;
                    $formatMhs[$i]["sakit"] = $totalSakit;
                }
            }
        }
            
        return Excel::download(new Absensi($formatMhs), "Laporan_Absensi_Kelas_{$formatMhs[0]['kelas']}.xlsx");
        // return Excel::download(new Absensi(collect($formatMhs)), "Laporan_Absensi_Kelas_{$formatMhs[0]['kelas']}.xlsx");
    }
}
