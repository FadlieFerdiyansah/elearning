<x-app-layouts title="Dashboard">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-muted">E-Learning Teknik Elektro Information</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 col-md-3">
                            <div class="card" style="cursor: pointer">
                                <div class="card-body">
                                    <div class="text-center">
                                        <i class="fa fa-user-graduate fa-3x"></i>
                                        <div class="mt-3 font-weight-bold">
                                            <h5>Mahasiswa</h5>
                                        </div>
                                        <div class="text-small text-muted">
                                            <span class="text-primary">
                                                <i class="fas fa-caret-up"></i>
                                            </span>
                                            <h5 style="margin-top: -15px">
                                                {{ $mahasiswas }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="card" style="cursor: pointer">
                                <div class="card-body">
                                    <div class="text-center">
                                        <i class="fa fa-user fa-3x"></i>
                                        <div class="mt-3 font-weight-bold">
                                            <h5>Dosen</h5>
                                        </div>
                                        <div class="text-small text-muted">
                                            <span class="text-primary">
                                                <i class="fas fa-caret-up"></i>
                                            </span>
                                            <h5 style="margin-top: -15px">
                                                {{ $dosens }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="card" style="cursor: pointer">
                                <div class="card-body">
                                    <div class="text-center">
                                        <i class="fa fa-layer-group fa-3x"></i>
                                        <div class="mt-3 font-weight-bold">
                                            <h5>Kelas</h5>
                                        </div>
                                        <div class="text-small text-muted">
                                            <span class="text-primary">
                                                <i class="fas fa-caret-up"></i>
                                            </span>
                                            <h5 style="margin-top: -15px">
                                                {{ $kelas }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="card" style="cursor: pointer">
                                <div class="card-body">
                                    <div class="text-center">
                                        <i class="fa fa-book-open fa-3x"></i>
                                        <div class="mt-3 font-weight-bold">
                                            <h5>Matakuliah</h5>
                                        </div>
                                        <div class="text-small text-muted">
                                            <span class="text-primary">
                                                <i class="fas fa-caret-up"></i>
                                            </span>
                                            <h5 style="margin-top: -15px">
                                                {{ $matkuls }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="card" style="cursor: pointer">
                                <div class="card-body">
                                    <div class="text-center">
                                        <i class="fa fa-briefcase fa-3x"></i>
                                        <div class="mt-3 font-weight-bold">
                                            <h5>Prodi</h5>
                                        </div>
                                        <div class="text-small text-muted">
                                            <span class="text-primary">
                                                <i class="fas fa-caret-up"></i>
                                            </span>
                                            <h5 style="margin-top: -15px">
                                                {{ $fakultas }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="card" style="cursor: pointer">
                                <div class="card-body">
                                    <div class="text-center">
                                        <i class="fa fa-calendar fa-3x"></i>
                                        <div class="mt-3 font-weight-bold">
                                            <h5>Jadwal</h5>
                                        </div>
                                        <div class="text-small text-muted">
                                            <span class="text-primary">
                                                <i class="fas fa-caret-up"></i>
                                            </span>
                                            <h5 style="margin-top: -15px">
                                                {{ $jadwals }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h6 class="text-muted">Profile Admin</h6>
            </div>
            <div class="card-body">
                <x-alert />

                <div class="table-responsive">
                    <form action="{{ route('dashboard.admin_updateProfile') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <table class="table">

                            <tr>
                                <td>ID</td>
                                <td>:</td>
                                <td>{{ auth()->user()->id }}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{ auth()->user()->nama }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>
                                    {{ auth()->user()->email }}
                                </td>
                            </tr>
                            <tr>
                                <td><img src="{{ auth()->user()->foto == 'default.png' ? auth()->user()->pictureDefault : auth()->user()->picture  }}" alt="foto" style="width:100px;" class="mb-2 rounded"></td>
                                <td>:</td>
                                <td><input type="file" name="foto" class="form-control" id="foto"></td>
                            </tr>
                            <tr>
                                <td>Password saat ini</td>
                                <td>:</td>
                                <td>
                                    <input type="password" name="password_saat_ini" class="form-control @error('password_saat_ini') is-invalid @enderror" placeholder="masukan password saat ini" required>
                                    @error('password_saat_ini')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>Password Baru</td>
                                <td>:</td>
                                <td>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="masukan password baru" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>Konfirmasi Password Baru</td>
                                <td>:</td>
                                <td>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="konfirmasi password baru" autocomplete="new-password" required>

                                </td>
                            </tr>

                        </table>
                        <div class="d-flex justify-content-start">
                            <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layouts>