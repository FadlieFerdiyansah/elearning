<x-app-layouts title="Buat Matakuliah">
    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/bundles/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @endpush
    <div class="card">
        <div class="card-header">
            <h4>Form Create Matakuliah</h4>
        </div>
        <div class="card-body col-md-8 col-sm">
            <form action="{{ route('matkuls.store') }}" method="post">
                @csrf
                <x-select2 label="Prodi" attr="fakultas_id" :dataArray="$fakultas" valueOption="id" labelOption="nama" />
                <x-input type="text" attr="nm_matkul" label="Matakuliah" autofocus="autofocus" />
                <x-input type="text" attr="sks" label="SKS" />
                <x-button>Simpan</x-button>
            </form>
        </div>
    </div>
    @push('lastScripts')
    <script src="{{ asset('assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
    @endpush
</x-app-layouts>