<x-app-layouts>
    <div class="card">
        <div class="card-header">
            <h5 class="text-uppercase">Buat absen untuk kelas <b>{{ $jadwal->kelas->kd_kelas }}</b></h5>
        </div>
        <div class="card-body col-md-8 col-sm">
            <x-alert/>
            <form action="{{ route('absensi.store') }}" method="post">
                @csrf
                <input type="hidden" value="{{ encrypt($jadwal->id) }}" name="jadwal">
                <input type="hidden" name="kelas" value="{{ $jadwal->kelas->id }}">
                <x-input attr="matkul" label="Matakuliah" readonly value="{{ $jadwal->matkul->nm_matkul }}" />
                <div class="form-group">
                    <label for="pertemuan">Pertemuan</label>
                    {{-- <input autofocus type="text" name="pertemuan"
                        class="form-control @error('pertemuan')is-invalid @enderror" id="pertemuan"
                        value="{{ $absen->pertemuan ?? '' }}"> --}}

                        <select name="pertemuan" class="form-control">
                            @for ($i = 1; $i <= 16; $i++)
                                <option value="{{ $i }}" {{ $semuaPertemuan->where('pertemuan', $i)->first() ? 'disabled' : ''}}>{{ $i }}</option>
                            @endfor
                        </select>
                    @error('pertemuan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <x-button>Simpan</x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layouts>