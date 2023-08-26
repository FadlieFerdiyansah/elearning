<?php

namespace App\Exports\Report;

use App\Models\Mahasiswa;
use Illuminate\Contracts\View\View;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\{WithStyles, WithHeadings, FromCollection, FromView, WithColumnWidths};

class Absensi implements FromView
{
    protected $mahasiswa;

    public function __construct($mahasiswa)
    {
        $this->mahasiswa = $mahasiswa;
    }

    public function view(): View
    {
        $mahasiswa = $this->mahasiswa;
        return view('exports.absensi', compact('mahasiswa'));
    }
}
