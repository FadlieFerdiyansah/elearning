<x-app-layouts>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/bundles/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @endpush
    <div class="card">
        <div class="card-header">
            <h4>Form Edit Matakuliah &raquo; {{ $matkul->nm_matkul }}</h4>
        </div>
        <div class="card-body col-md-8 col-sm">
            <form action="{{ route('matkuls.update',$matkul->id) }}" method="post">
                @csrf
                @method('put')
                <x-select2 :isSelected="$matkul->fakultas" label="Prodi" attr="fakultas_id" :dataArray="$fakultas"
                    valueOption="id" labelOption="nama" />
                <x-input type="text" attr="nm_matkul" label="Matakuliah" value="{{ $matkul->nm_matkul }}" />
                <x-input type="text" attr="sks" label="SKS" value="{{ $matkul->sks }}" />
                <x-button>Simpan</x-button>
            </form>
        </div>
    </div>
    @push('lastScripts')
    <script src="{{ asset('assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
    @endpush
</x-app-layouts>