<x-app-layouts title="Masuk kelas">
    <div class="row">
        <div class="col-md-4">
            <div class="pricing">
                <div class="pricing-title">
                    presensi
                </div>
                <div class="pricing-padding">
                    <div class="pricing-price">
                        <h2>{{ $jadwal->hari }}</h2>
                        <h5>{{ $jadwal->jam_masuk .' - '. $jadwal->jam_keluar }}</h5>
                        <div>Jam masuk - Jam keluar {{ $jadwal->kd_kelas }}</div>
                    </div>
                    <div>
                        <table class="table">
                            <thead>
                                <tr align="left">
                                    <th>Dosen</th>
                                    <td>{{ $jadwal->dosen->nama }}</td>
                                </tr>
                                <tr align="left">
                                    <th>Matakuliah</th>
                                    <td>{{ $jadwal->matkul->nm_matkul }}</td>
                                </tr>
                                <tr align="left">
                                    <th>SKS</th>
                                    <td>{{ $jadwal->matkul->sks }}</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                @if ($waktuAbsen && $allowMhsAbsen)
                <div class="pricing-cta p-2">
                    @if ($isAbsen->mahasiswaAbsenHariIni == null && $isAbsen->mahasiswaAbsenHariIniIzin == null && $isAbsen->mahasiswaAbsenHariIniSakit == null)
                    <form action="{{ route('absen') }}" method="post">
                        @csrf
                        <input type="hidden" name="jadwal" value="{{ encrypt($jadwal->id) }}">
                        {{-- <button class="btn btn-primary form-control">{{ $isAbsen ? 'Sudah Absen' : 'Absen' }} <i class="fas fa-arrow-right"></i></button> --}}
                        <div class="row">
                            <div class="col-4">
                                <button class="btn btn-primary form-control text-uppercase" name="absen" value="1">Absen <i class="fas fa-arrow-right"></i></button>
                            </div>
                            <div class="col-4">
                                <button class="btn btn-warning form-control text-uppercase" name="izin" value="2">Izin <i class="fas fa-arrow-right"></i></button>
                            </div>
                            <div class="col-4">
                                <button class="btn btn-dark form-control text-uppercase" name="sakit" value="3">Sakit <i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </form>
                    @else
                        <button class="btn btn-success form-control text-uppercase" disabled>Sudah Melakukan Absensi</i></button>
                    @endif

                </div>
                @else
                <div class="pricing-cta bg-primary">
                    <button class="btn btn-primary form-control disabled">Absensi belum dibuka <i
                            class="fas fa-arrow-right"></i></button>
                </div>
                @endif
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mb-4 mb-lg-0 text-center">
                                {{-- <a href="{{ route('materi', [$jadwal->kelas_id,$jadwal->matkul_id]) }}"> --}}
                                <a href="{{ route('materi.mhs', encrypt($jadwal->id)) }}">
                                    <i data-feather="book-open"></i>
                                    <div class="mt-2 font-weight-bold">Materi</div>
                                </a>
                            </div>
                            <a href="{{ route('tugas.mhs', encrypt($jadwal->id)) }}" class="col mb-4 mb-lg-0 text-center">
                                <i data-feather="clipboard"></i>
                                <div class="mt-2 font-weight-bold">Tugas</div>
                            </a>
                            {{-- <div class="col mb-4 mb-lg-0 text-center">
                                <i data-feather="message-square"></i>
                                <div class="mt-2 font-weight-bold">Diskusi</div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="card w-100">
                    <div class="card-header">
                        <h4>Rekap Absen</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Status</th>
                                        <th>Matakuliah</th>
                                        <th>Pertemuan</th>
                                        <th>Tanggal Dan Waktu Absen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($absens as $i => $absen)
                                    <tr>
                                        <th scope="row">{{ $absens->firstItem() + $i }}</th>
                                        <td>
                                            <span class="badge badge-{{ $absen->status == 1 ? 'success' : ($absen->status == 2 ? 'warning' : ($absen->status == 3 ? 'dark' : 'danger')) }}">
                                                {{ $absen->status == 1 ? 'Absen' : ($absen->status == 2 ? 'Izin' : ($absen->status == 3 ? 'Sakit' : 'Tidak Hadir')) }}
                                            </span>
                                            
                                        </td>
                                        <td>{{ $jadwal->matkul->nm_matkul }}</td>
                                        <td>{{ $absen->pertemuan }}</td>
                                        <td>{{ $absen->status == true ? $absen->updated_at : '' }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-secondary">Tidak ada rekap absen</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $absens->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layouts>
