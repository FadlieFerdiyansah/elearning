<x-app-layouts title="Kirim Tugas">
    <div class="card">
        <div class="card-body col-8">
            <form action="{{ route('sendTugas', [encrypt($jadwal->id), $tugas->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <x-input type="text" attr="jadwal_id" label="Jadwal ID" value="{{ $tugas->jadwal_id }}" readonly/>
                <x-input type="text" attr="matkul_id" label="Matkul ID" value="{{ $tugas->matkul_id }}" readonly/>
                <x-input type="text" attr="judul" label="Judul tugas" value="{{ $tugas->judul }}" readonly/>
                <x-input type="text" attr="pertemuan" label="Pertemuan" value="{{ $tugas->pertemuan }}" readonly/>
                <x-input type="text" attr="pengumpulan" label="Pengumpulan" value="{{ date('Y-m-d H:i', strtotime($tugas->pengumpulan)) }}" readonly/>
               <div class="form-group">
                    <label for="tipe">Tipe</label>
                    <select class="form-control selectric @error('tipe') is-invalid @enderror" name="tipe" id="tipe">
                        <option disabled selected>Pilih Tipe</option>
                        <option value="file">File</option>
                        <option value="link">Link</option>
                    </select>
                    @error('tipe')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group" id="formLink">
                    <x-input type="text" label="Link" attr="file_or_link" id="link" />
                </div>
                <div class="form-group" id="formFile">
                    <x-input type="file" label="File" attr="file_or_link" id="file" />
                    <code>Max Ukuran File <b>100 Mb</b> </code>
                </div>
                <x-textarea attr="deskripsi" label="Deskripsi" readonly>{{ $tugas->deskripsi }}</x-textarea>
                <x-button>Kirim</x-button>
            </form>
        </div>
    </div>
     @push('scripts')
    <script src="{{ asset('assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    @endpush
    @push('lastScripts')
    <script>
        $(document).ready(function(){
            $('#formLink').hide();
            $('#formFile').hide();
            $("#tipe").change(function() {
                if ($("#tipe option:selected").val() == 'file') {
                        $('#formLink').hide();
                        $('#formFile').show();
                    } else {
                        $('#formFile').hide();
                        $('#formLink').show();
                    }
                });
            });
    </script>
    @endpush
</x-app-layouts>