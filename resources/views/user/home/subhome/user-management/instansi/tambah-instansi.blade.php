<div class="modal fade" id="tambah-instansi" tabindex="-1" role="dialog" aria-labelledby="tambahInstansiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahInstansiLabel">Tambah Sekolah/Instansi</h5>
                <div style="display: inline-block">
                    <button type="button" id="tutup-tambah-instansi" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" title="Tutup">
                        <span aria-hidden="true"><i class="fa fa-times-circle"></i></span>
                    </button>
                    <button type="button" class="close" id="reset-tambah-instansi-input" data-toggle="tooltip" title="Reset Input">
                        <span aria-hidden="true"><i class="fa fa-sync"></i></span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <form id="tambah-instansi-form" action="{{ route('user.home.user-management.instansi.add') }}" method="POST">
                            <div class="row gutters">
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                    <div class="form-group">
                                        <label for="nama-instansi">Nama Instansi</label>
                                        @csrf
                                        <input type="text" class="form-control @if ($errors->tambah_instansi->first('nama-instansi')) is-invalid @endif" id="nama-instansi" name="nama-instansi" required placeholder="Masukkan Nama Instansi" value="{{ old('nama-instansi') }}">
                                        @if ($errors->tambah_instansi->first('nama-instansi'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->tambah_instansi->first('nama-instansi') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                    <div class="form-group">
                                        <label for="nomor-kelompok-pmr">Nomor Kelompok PMR</label>
                                        <input type="text" class="form-control @if ($errors->tambah_instansi->first('nomor-kelompok-pmr')) is-invalid @endif" id="nomor-kelompok-pmr" name="nomor-kelompok-pmr" required placeholder="Masukkan Nomor Kelompok PMR" value="{{ old('nomor-kelompok-pmr') }}">
                                        @if ($errors->tambah_instansi->first('nomor-kelompok-pmr'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->tambah_instansi->first('nomor-kelompok-pmr') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                    <div class="form-group">
                                        <label for="alamat-instansi">Alamat Instansi</label>
                                        <input type="text" class="form-control @if ($errors->tambah_instansi->first('alamat-instansi')) is-invalid @endif" id="alamat-instansi" name="alamat-instansi" required placeholder="Masukkan Alamat Instansi" value="{{ old('alamat-instansi') }}">
                                        @if ($errors->tambah_instansi->first('alamat-instansi'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->tambah_instansi->first('alamat-instansi') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                    <div class="form-group">
                                        <label for="penanggung-jawab-pmr">Penanggung Jawab PMR</label>
                                        <input type="text" class="form-control @if ($errors->tambah_instansi->first('penanggung-jawab-pmr')) is-invalid @endif" id="penanggung-jawab-pmr" name="penanggung-jawab-pmr" required placeholder="Masukkan Penanggung Jawab PMR" value="{{ old('penanggung-jawab-pmr') }}">
                                        @if ($errors->tambah_instansi->first('penanggung-jawab-pmr'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->tambah_instansi->first('penanggung-jawab-pmr') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                    <div class="form-group">
                                        <label for="pembina-pmr">Pembina PMR</label>
                                        <input type="text" class="form-control @if ($errors->tambah_instansi->first('pembina-pmr')) is-invalid @endif" id="pembina-pmr" name="pembina-pmr" required placeholder="Masukkan Pembina PMR" value="{{ old('pembina-pmr') }}">
                                        @if ($errors->tambah_instansi->first('pembina-pmr'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->tambah_instansi->first('pembina-pmr') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                    <div class="form-group">
                                        <label for="jumlah-calon-anggota-pmr">Jumlah Calon Anggota PMR</label>
                                        <input type="number" placeholder="0" class="form-control @if ($errors->tambah_instansi->first('jumlah-calon-anggota-pmr')) is-invalid @endif" id="jumlah-calon-anggota-pmr" name="jumlah-calon-anggota-pmr" required value="{{ old('jumlah-calon-anggota-pmr') }}">
                                        @if ($errors->tambah_instansi->first('jumlah-calon-anggota-pmr'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->tambah_instansi->first('jumlah-calon-anggota-pmr') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                    <div class="form-group">
                                        <label for="jumlah-siswa">Jumlah Siswa</label>
                                        <input type="number" placeholder="0" class="form-control @if ($errors->tambah_instansi->first('jumlah-siswa')) is-invalid @endif" id="jumlah-siswa" name="jumlah-siswa" required value="{{ old('jumlah-siswa') }}">
                                        @if ($errors->tambah_instansi->first('jumlah-siswa'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->tambah_instansi->first('jumlah-siswa') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                    <div class="form-group">
                                        <label for="kepala-instansi">Kepala Instansi</label>
                                        <input type="text" class="form-control @if ($errors->tambah_instansi->first('kepala-instansi')) is-invalid @endif" id="kepala-instansi" name="kepala-instansi" required placeholder="Masukkan Kepala Instansi" value="{{ old('kepala-instansi') }}">
                                        @if ($errors->tambah_instansi->first('kepala-instansi'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->tambah_instansi->first('kepala-instansi') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control @if ($errors->tambah_instansi->first('email')) is-invalid @endif" id="email" name="email" required placeholder="Masukkan Email" value="{{ old('email') }}">
                                        @if ($errors->tambah_instansi->first('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->tambah_instansi->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <button type="submit" class="btn btn-lg btn-primary">Kirim</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>