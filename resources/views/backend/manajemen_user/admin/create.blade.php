<x-app-layouts title="Tambah Admin">
    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/bundles/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @endpush
    <div class="card">
        <div class="card-header">
            <h4>Form Create Admin</h4>
        </div>
        <div class="card-body col-md-8 col-sm">
            <form action="{{ route('admins.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <x-input type="file" attr="foto" label="Foto Profile" />
                <!-- <x-input type="number" attr="id" label="ID" /> -->
                <x-input type="text" attr="nama" label="Nama Lengkap" />
                <x-input type="email" attr="email" label="Email" />
                <x-input type="password" attr="password" label="Password" />
                <x-button>Simpan</x-button>
            </form>
        </div>
    </div>
    @push('lastScripts')
    <script src="{{ asset('assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
    @endpush
</x-app-layouts>