<table>
    <thead>
    <tr>
        <th width="80px" style="font-weight: bold">Kelas</th>
        <th width="90px" style="font-weight: bold">NIM</th>
        <th width="210px" style="font-weight: bold">Nama</th>
        <th width="240px" style="font-weight: bold">Mata Kuliah</th>
        @for ($i = 1; $i <= 16; $i++)
            <th style="font-weight: bold; text-align: center">P {{ $i }}</th>
        @endfor
        <th width="70px" style="font-weight: bold; text-align: center">Total Hadir</th>
        <th width="100px" style="font-weight: bold; text-align: center">Total Tidak Hadir</th>
        <th width="70px" style="font-weight: bold; text-align: center">Total Izin</th>
        <th width="70px" style="font-weight: bold; text-align: center">Total Sakit</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($mahasiswa as $mhs)
            <tr>
                <td>{{ $mhs['kelas'] }}</td>
                <td>{{ $mhs['nim'] }}</td>
                <td>{{ $mhs['nama'] }}</td>
                <td>{{ $mhs['matkul'] }}</td>
                @for ($i = 1; $i <= 16; $i++)
                    <th style="text-align: center;">{{ $mhs["p$i"] ?? '' }}</th>
                @endfor
                <td style="text-align: center; text-align: center">{{ $mhs['hadir'] }}</td>
                <td style="text-align: center; text-align: center">{{ $mhs['tidak_hadir'] }}</td>
                <td style="text-align: center; text-align: center">{{ $mhs['izin'] }}</td>
                <td style="text-align: center; text-align: center">{{ $mhs['sakit'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>