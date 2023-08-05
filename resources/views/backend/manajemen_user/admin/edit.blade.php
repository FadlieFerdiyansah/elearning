<x-app-layouts>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/bundles/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @endpush
    <div class="card">
        <div class="card-header">
            <h4>Form Update Admin</h4>
        </div>
        <div class="card-body col-md-8 col-sm">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    {!! session('success') !!}
                </div>
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
                @endforeach
            </div>
            @endif
            <form action="{{ route('admins.update',$admin) }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group">
                    <img src="{{ $admin->foto == 'default.png' ? $admin->pictureDefault : $admin->picture  }}"
                        alt="foto" style="width:100px;" class="mb-3 rounded">
                    <input type="file" name="foto" class="form-control" id="foto">
                </div>
                <!-- <x-input type="number" attr="id" label="Id" value="{{ $admin->id }}" readonly /> -->
                <x-input type="text" attr="nama" label="Nama" value="{{ $admin->nama }}" />
                <x-input type="text" attr="email" label="Email" value="{{ $admin->email }}" />
                <x-button>Update</x-button>
            </form>
        </div>
    </div>
    @push('lastScripts')
    <script src="{{ asset('assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
    @endpush
</x-app-layouts>