<?php

namespace App\Models;

use App\Traits\TimeUTC8;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory, TimeUTC8;

    protected $fillable = [ 'parent','mahasiswa_id', 'status', 'pertemuan', 'jadwal_id', 'kd_matkul'];
    // protected $with = ['jadwal'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }



    // public function getStatusAttribute($value)
    // {
    //     return $value == 1 ? 'Hadir' : 'Tidak Hadir';
    // }

    // public function getCreatedAtAttribute($value)
    // {
    //     return Carbon::parse($this->attributes['created_at'])->translatedFormat('Y-m-d');
    // }

    public function getTanggalAttribute($value)
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }
}
