<div class="modal fade" id="tambah-anggota" tabindex="-1" role="dialog" aria-labelledby="tambahAnggotaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahAnggotaLabel">Tambah Anggota</h5>
            </div>
            <div class="modal-body">

                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div id="tambah-anggota-form">
                            <h3>Pilih Sekolah/Instansi</h3>
                            <section>
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <select name="instansi" id="instansi" class="form-control @if ($errors->data_anggota->first('instansi')) is-invalid @endif">
                                                <option value="" disabled selected>Pilih Sekolah/Instansi</option>
                                                @foreach ($semuaInstansi as $instansi)
                                                    <option value="{{ $instansi->id }}">{{ $instansi->dataInstansi->nama_instansi }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->data_anggota->first('instansi'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('instansi') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <h3>Profil</h3>
                            <section>
                                <div class="row gutters">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="kode-anggota">Kode Anggota</label>
                                            @csrf
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('kode-anggota')) is-invalid @endif" id="kode-anggota" name="kode-anggota" required placeholder="Masukkan Kode Anggota" value="{{ old('kode-anggota') }}">
                                            @if ($errors->data_anggota->first('kode-anggota'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('kode-anggota') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="kode-anggota-lama">Kode Anggota Lama</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('kode-anggota-lama')) is-invalid @endif" id="kode-anggota-lama" name="kode-anggota-lama" required placeholder="Masukkan Kode Anggota Lama" value="{{ old('kode-anggota-lama') }}">
                                            @if ($errors->data_anggota->first('kode-anggota-lama'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('kode-anggota-lama') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('nama')) is-invalid @endif" id="nama" name="nama" required placeholder="Masukkan Nama" value="{{ old('nama') }}">
                                            @if ($errors->data_anggota->first('nama'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('nama') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="kelamin">Kelamin</label>
                                            <select name="kelamin" id="kelamin" class="form-control @if ($errors->data_anggota->first('kelamin')) is-invalid @endif">
                                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            @if ($errors->data_anggota->first('kelamin'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('kelamin') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="no-hp">No. HP</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('no-hp')) is-invalid @endif" id="no-hp" name="no-hp" required placeholder="Masukkan Nomor HP" value="{{ old('no-hp') }}">
                                            @if ($errors->data_anggota->first('no-hp'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('no-hp') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control @if ($errors->data_anggota->first('email')) is-invalid @endif" id="email" name="email" required placeholder="Masukkan Email" value="{{ old('email') }}">
                                            @if ($errors->data_anggota->first('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="tempat-lahir">Tempat Lahir</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('tempat-lahir')) is-invalid @endif" id="tempat-lahir" name="tempat-lahir" required placeholder="Masukkan Tempat Lahir" value="{{ old('tempat-lahir') }}">
                                            @if ($errors->data_anggota->first('tempat-lahir'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('tempat-lahir') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="tanggal-lahir">Tanggal Lahir</label>
                                            <input type="date" class="form-control @if ($errors->data_anggota->first('tanggal-lahir')) is-invalid @endif" id="tanggal-lahir" name="tanggal-lahir" required placeholder="Masukkan Tanggal Lahir" value="{{ old('tanggal-lahir') }}">
                                            @if ($errors->data_anggota->first('tanggal-lahir'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('tanggal-lahir') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="jenis-identitas">Jenis Identitas</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('jenis-identitas')) is-invalid @endif" id="jenis-identitas" name="jenis-identitas" required placeholder="Masukkan Jenis Identitas" value="{{ old('jenis-identitas') }}">
                                            @if ($errors->data_anggota->first('jenis-identitas'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('jenis-identitas') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="nomor-induk-kependudukan">Nomor Induk Kependudukan</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('nomor-induk-kependudukan')) is-invalid @endif" id="nomor-induk-kependudukan" name="nomor-induk-kependudukan" required placeholder="Masukkan NIK" value="{{ old('nomor-induk-kependudukan') }}">
                                            @if ($errors->data_anggota->first('nomor-induk-kependudukan'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('nomor-induk-kependudukan') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="agama">Agama</label>
                                            <select name="agama" id="agama" class="form-control @if ($errors->data_anggota->first('agama')) is-invalid @endif">
                                                <option value="" disabled selected>Pilih Agama</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Konghucu">Konghucu</option>
                                            </select>
                                            @if ($errors->data_anggota->first('agama'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('agama') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="golongan-darah">Golongan Darah</label>
                                            <select name="golongan-darah" id="golongan-darah" class="form-control @if ($errors->data_anggota->first('golongan-darah')) is-invalid @endif">
                                                <option value="" disabled selected>Pilih Golongan Darah</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                            </select>
                                            @if ($errors->data_anggota->first('golongan-darah'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('golongan-darah') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <h3>Domisili</h3>
                            <section>
                                <div class="row gutters">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label for="domisili-provinsi">Provinsi</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('domisili-provinsi')) is-invalid @endif" id="domisili-provinsi" name="domisili-provinsi" required placeholder="Masukkan Provinsi" value="{{ old('domisili-provinsi') }}">
                                            @if ($errors->data_anggota->first('domisili-provinsi'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('domisili-provinsi') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label for="domisili-kabupaten-kota">Kabupaten/Kota</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('domisili-kabupaten-kota')) is-invalid @endif" id="domisili-kabupaten-kota" name="domisili-kabupaten-kota" required placeholder="Masukkan Kabupaten/Kota" value="{{ old('domisili-kabupaten-kota') }}">
                                            @if ($errors->data_anggota->first('domisili-kabupaten-kota'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('domisili-kabupaten-kota') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label for="domisili-kecamatan">Kecamatan</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('domisili-kecamatan')) is-invalid @endif" id="domisili-kecamatan" name="domisili-kecamatan" required placeholder="Masukkan Kecamatan" value="{{ old('domisili-kecamatan') }}">
                                            @if ($errors->data_anggota->first('domisili-kecamatan'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('domisili-kecamatan') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label for="domisili-desa-kelurahan">Desa/Kelurahan</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('domisili-desa-kelurahan')) is-invalid @endif" id="domisili-desa-kelurahan" name="domisili-desa-kelurahan" required placeholder="Masukkan Desa/Kelurahan" value="{{ old('domisili-desa-kelurahan') }}">
                                            @if ($errors->data_anggota->first('domisili-desa-kelurahan'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('domisili-desa-kelurahan') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label for="domisili-alamat">Alamat</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('domisili-alamat')) is-invalid @endif" id="domisili-alamat" name="domisili-alamat" required placeholder="Masukkan Alamat" value="{{ old('domisili-alamat') }}">
                                            @if ($errors->data_anggota->first('domisili-alamat'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('domisili-alamat') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label for="domisili-rt">RT</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('domisili-rt')) is-invalid @endif" id="domisili-rt" name="domisili-rt" required placeholder="Masukkan RT" value="{{ old('domisili-rt') }}">
                                            @if ($errors->data_anggota->first('domisili-rt'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('domisili-rt') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label for="domisili-rw">RW</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('domisili-rw')) is-invalid @endif" id="domisili-rw" name="domisili-rw" required placeholder="Masukkan RW" value="{{ old('domisili-rw') }}">
                                            @if ($errors->data_anggota->first('domisili-rw'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('domisili-rw') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label for="domisili-kode-pos">Kode Pos</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('domisili-kode-pos')) is-invalid @endif" id="domisili-kode-pos" name="domisili-kode-pos" required placeholder="Masukkan Kode Pos" value="{{ old('domisili-kode-pos') }}">
                                            @if ($errors->data_anggota->first('domisili-kode-pos'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('domisili-kode-pos') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label for="domisili-no-telp">No. Telp</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('domisili-no-telp')) is-invalid @endif" id="domisili-no-telp" name="domisili-no-telp" required placeholder="Masukkan No. Telp" value="{{ old('domisili-no-telp') }}">
                                            @if ($errors->data_anggota->first('domisili-no-telp'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('domisili-no-telp') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label for="domisili-status-kepemilikan">Status Kepemilikan</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('domisili-status-kepemilikan')) is-invalid @endif" id="domisili-status-kepemilikan" name="domisili-status-kepemilikan" required placeholder="Masukkan Status Kepemilikan" value="{{ old('domisili-status-kepemilikan') }}">
                                            @if ($errors->data_anggota->first('domisili-status-kepemilikan'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('domisili-status-kepemilikan') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label for="domisili-status-tinggal">Status Tinggal</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('domisili-status-tinggal')) is-invalid @endif" id="domisili-status-tinggal" name="domisili-status-tinggal" required placeholder="Masukkan Status Tinggal" value="{{ old('domisili-status-tinggal') }}">
                                            @if ($errors->data_anggota->first('domisili-status-tinggal'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('domisili-status-tinggal') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label for="domisili-catatan">Catatan</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('domisili-catatan')) is-invalid @endif" id="domisili-catatan" name="domisili-catatan" required placeholder="Masukkan Catatan" value="{{ old('domisili-catatan') }}">
                                            @if ($errors->data_anggota->first('domisili-catatan'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('domisili-catatan') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label for="domisili-status-aktif">Status Aktif</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('domisili-status-aktif')) is-invalid @endif" id="domisili-status-aktif" name="domisili-status-aktif" required placeholder="Masukkan Status Aktif" value="{{ old('domisili-status-aktif') }}">
                                            @if ($errors->data_anggota->first('domisili-status-aktif'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('domisili-status-aktif') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <h3>Identitas</h3>
                            <section>
                                <div class="row gutters">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label for="identitas-provinsi">Provinsi</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('identitas-provinsi')) is-invalid @endif" id="identitas-provinsi" name="identitas-provinsi" required placeholder="Masukkan Provinsi" value="{{ old('identitas-provinsi') }}">
                                            @if ($errors->data_anggota->first('identitas-provinsi'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('identitas-provinsi') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label for="identitas-kabupaten-kota">Kabupaten/Kota</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('identitas-kabupaten-kota')) is-invalid @endif" id="identitas-kabupaten-kota" name="identitas-kabupaten-kota" required placeholder="Masukkan Kabupaten/Kota" value="{{ old('identitas-kabupaten-kota') }}">
                                            @if ($errors->data_anggota->first('identitas-kabupaten-kota'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('identitas-kabupaten-kota') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label for="identitas-kecamatan">Kecamatan</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('identitas-kecamatan')) is-invalid @endif" id="identitas-kecamatan" name="identitas-kecamatan" required placeholder="Masukkan Kecamatan" value="{{ old('identitas-kecamatan') }}">
                                            @if ($errors->data_anggota->first('identitas-kecamatan'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('identitas-kecamatan') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label for="identitas-desa-kelurahan">Desa/Kelurahan</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('identitas-desa-kelurahan')) is-invalid @endif" id="identitas-desa-kelurahan" name="identitas-desa-kelurahan" required placeholder="Masukkan Desa/Kelurahan" value="{{ old('identitas-desa-kelurahan') }}">
                                            @if ($errors->data_anggota->first('identitas-desa-kelurahan'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('identitas-desa-kelurahan') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label for="identitas-alamat">Alamat</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('identitas-alamat')) is-invalid @endif" id="identitas-alamat" name="identitas-alamat" required placeholder="Masukkan Alamat" value="{{ old('identitas-alamat') }}">
                                            @if ($errors->data_anggota->first('identitas-alamat'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('identitas-alamat') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label for="identitas-rt">RT</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('identitas-rt')) is-invalid @endif" id="identitas-rt" name="identitas-rt" required placeholder="Masukkan RT" value="{{ old('identitas-rt') }}">
                                            @if ($errors->data_anggota->first('identitas-rt'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('identitas-rt') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label for="identitas-rw">RW</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('identitas-rw')) is-invalid @endif" id="identitas-rw" name="identitas-rw" required placeholder="Masukkan RW" value="{{ old('identitas-rw') }}">
                                            @if ($errors->data_anggota->first('identitas-rw'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('identitas-rw') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label for="identitas-kode-pos">Kode Pos</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('identitas-kode-pos')) is-invalid @endif" id="identitas-kode-pos" name="identitas-kode-pos" required placeholder="Masukkan Kode Pos" value="{{ old('identitas-kode-pos') }}">
                                            @if ($errors->data_anggota->first('identitas-kode-pos'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('identitas-kode-pos') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label for="identitas-status-kepemilikan">Status Kepemilikan</label>
                                            <input type="text" class="form-control @if ($errors->data_anggota->first('identitas-status-kepemilikan')) is-invalid @endif" id="identitas-status-kepemilikan" name="identitas-status-kepemilikan" required placeholder="Masukkan Status Kepemilikan" value="{{ old('identitas-status-kepemilikan') }}">
                                            @if ($errors->data_anggota->first('identitas-status-kepemilikan'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->data_anggota->first('identitas-status-kepemilikan') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                {{-- <spanclass="mr-2"><i>(Jikatidakdapatdisubmit,cobacekkembalidatayangsudahandamasukkan)</i></span> --}}
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal"><i class="fa fa-minus mr-2"></i>Minimalkan</button>
            </div>
        </div>
    </div>
</div>